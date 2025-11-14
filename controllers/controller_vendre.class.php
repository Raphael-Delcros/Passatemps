<?php

class ControllerVendre extends controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    public function creer()
    {
        $template = $this->getTwig()->load('vendre.html.twig');
        echo $template->render();
    }

   public function confirmerVente()
   {
        // bla bla bla faut faire le formulaire bouh bouh créer une annonce tout ca tout ca
        extract($_GET,EXTR_OVERWRITE);
        var_dump($_GET);

       // Logique pour confirmer la vente (par exemple, enregistrer les données dans la base de données)
       $template = $this->getTwig()->load('vendre.html.twig');
       echo $template->render();
   }

}
