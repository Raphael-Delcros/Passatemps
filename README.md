# README

## Informations générales

Passatemps est un site de vente d'occasion de jeux de société. Ceci est un exercice fait en S3 et S4 à l'IUT de Bayonne et du Pays Basque par un groupe de six élèves.

## Installations requises

```bash
npm install
```

```bash
composer install
```

## Configuration de la base de données

Modifier le fichier `constantesExemple.yaml` qui se trouve dans le dossier `config` pour configurer votre base de données.

Renommer ensuite ce fichier en `constantes.yaml`.

## Configuration du forum

Dans les instructions suivantes, remplacez "emplacement" par le nom du dossier qui contiendra le code du forum.
Lancer la commande suivante, le dossier "emplacement" doit sois : ne pas exister ou être vide.

```bash
composer create-project phpbb/phpbb
```

Ensuite, allez sur votre site, et ajouter "/emplacement" à la fin de l'URL.
Exemple:
nomdevotresite.fr/emplacement/

Cette page vous permettra d'installer et de configuer phpbb à vos besoins.

Les packs de langue se trouvent dans [ce site](https://www.phpbb.com/languages/). Pour l'installer, il suffit de placer le dossier dans le fichier .zip à l'intérieur du dossier "language" dans le dossier où phpbb a été installé.
Des thèmes et des extensions peuvent être trouvés sur [le site phpbb officiel](https://www.phpbb.com/customise/).
