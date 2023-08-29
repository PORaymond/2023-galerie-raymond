<?php

/****************************************************************************************
 * Description : Page cachée qui permet à un Administrateur de se connecter à son compte
 *
 * Date : 3 octobre 2022
 * Auteurs : Elisabeth Tremblay, Olivier Raymond
 ****************************************************************************************/
class LoginAdmin extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        return "vLoginAdmin";
    }
}