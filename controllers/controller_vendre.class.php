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

   
}
