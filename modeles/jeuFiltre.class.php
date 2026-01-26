<?php

/**
 * @file JeuFilter.class.php
 * @brief Classe pour construire des filtres dynamiques sur les jeux
 */

class JeuFilter
{
    private array $conditions = [];
    private array $params = [];
    private array $joins = [];

    /**
     * @brief Filtre par catégories (tableau ou chaîne unique)
     * * 
     * @param array|string $categories Une catégorie ou un tableau de catégories
     * @return self
     */
    public function parCategories($categories): self
    {
        if (empty($categories)) {
            return $this;
        }

        $categories = is_array($categories) ? $categories : [$categories];

        $this->ensureJoin('cataloguer');
        $this->ensureJoin('categorie');

        $placeholders = [];
        foreach ($categories as $index => $cat) {
            $key = "cat_$index";
            $placeholders[] = ":$key";
            $this->params[$key] = $cat;
        }

        $this->conditions[] = "LOWER(categorie.nom) IN (" . implode(', ', $placeholders) . ")";

        return $this;
    }

    /**
     * @brief Filtre par nombre de joueurs (cherche les jeux qui acceptent ce nombre)
     */
    public function pourNombreJoueurs(int $nbJoueurs): self
    {
        if ($nbJoueurs > 0) {
            $this->conditions[] = "J.nbJoueursMin <= :nbJoueurs";
            $this->conditions[] = "J.nbJoueursMax >= :nbJoueurs";
            $this->params['nbJoueurs'] = $nbJoueurs;
        }
        return $this;
    }

    /**
     * @brief Filtre par plage de joueurs min/max
     */
    public function plageJoueurs(?int $min = null, ?int $max = null): self
    {
        if ($min !== null && $min > 0) {
            $this->conditions[] = "J.nbJoueursMax >= :joueurs_min";
            $this->params['joueurs_min'] = $min;
        }

        if ($max !== null && $max > 0) {
            $this->conditions[] = "J.nbJoueursMin <= :joueurs_max";
            $this->params['joueurs_max'] = $max;
        }

        return $this;
    }

    /**
     * @brief Filtre par durée de partie (en minutes)
     */
    public function dureeParcelle(?int $dureeMin = null, ?int $dureeMax = null): self
    {
        if ($dureeMin !== null && $dureeMin > 0) {
            $this->conditions[] = "J.dureePartie >= :duree_min";
            $this->params['duree_min'] = $dureeMin;
        }

        if ($dureeMax !== null && $dureeMax > 0) {
            $this->conditions[] = "J.dureePartie <= :duree_max";
            $this->params['duree_max'] = $dureeMax;
        }

        return $this;
    }

    /**
     * @brief Filtre pour savoir si c'est une extension ou non
     */
    public function estExtension(bool $estExtension): self
    {
        if ($estExtension) {
            $this->conditions[] = "J.idJeuPrincipal IS NOT NULL";
        } else {
            $this->conditions[] = "J.idJeuPrincipal IS NULL";
        }
        return $this;
    }

    /**
     * @brief Filtre pour les jeux qui ont des extensions
     */
    public function aDesExtensions(bool $aExtensions): self
    {
        if ($aExtensions) {
            $this->conditions[] = "EXISTS (
                SELECT 1 FROM jeu ext 
                WHERE ext.idJeuPrincipal = J.idJeu
            )";
        } else {
            $this->conditions[] = "NOT EXISTS (
                SELECT 1 FROM jeu ext 
                WHERE ext.idJeuPrincipal = J.idJeu
            )";
        }
        return $this;
    }

    /**
     * @brief Filtre par nom (recherche partielle)
     */
    public function parNom(string $nom): self
    {
        if (!empty($nom)) {
            $this->conditions[] = "LOWER(J.nom) LIKE :nom";
            $this->params['nom'] = '%' . strtolower($nom) . '%';
        }
        return $this;
    }

    /**
     * @brief Filtre par date de sortie (avant/après)
     */
    public function dateSortie(?string $apres = null, ?string $avant = null): self
    {
        if ($apres !== null) {
            $this->conditions[] = "J.dateSortie >= :date_apres";
            $this->params['date_apres'] = $apres;
        }

        if ($avant !== null) {
            $this->conditions[] = "J.dateSortie <= :date_avant";
            $this->params['date_avant'] = $avant;
        }

        return $this;
    }

    /**
     * @brief Assure qu'une jointure est présente (évite les doublons)
     */
    private function ensureJoin(string $table): void
    {
        if (in_array($table, $this->joins)) {
            return;
        }

        switch ($table) {
            case 'cataloguer':
                $this->joins[] = 'cataloguer';
                break;
            case 'categorie':
                if (!in_array('cataloguer', $this->joins)) {
                    $this->ensureJoin('cataloguer');
                }
                $this->joins[] = 'categorie';
                break;
        }
    }

    /**
     * @brief Génère la clause WHERE
     */
    public function buildWhereClause(): string
    {
        if (empty($this->conditions)) {
            return '';
        }
        return 'WHERE ' . implode(' AND ', $this->conditions);
    }

    /**
     * @brief Génère les JOINs nécessaires
     */
    public function buildJoins(): string
    {
        $sql = '';

        if (in_array('cataloguer', $this->joins)) {
            $sql .= " JOIN cataloguer ON J.idJeu = cataloguer.idJeu";
        }

        if (in_array('categorie', $this->joins)) {
            $sql .= " JOIN categorie ON cataloguer.idCategorie = categorie.idCategorie";
        }

        return $sql;
    }

    /**
     * @brief Retourne les paramètres pour le binding PDO
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @brief Réinitialise tous les filtres
     */
    public function reset(): self
    {
        $this->conditions = [];
        $this->params = [];
        $this->joins = [];
        return $this;
    }

    /**
     * @brief Méthode statique pour créer une instance
     */
    public static function create(): self
    {
        return new self();
    }
}
