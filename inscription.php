<?php

require_once "inc/config.inc.php";
session_start();

/**
 * Récupère les données d'un formulaire d'inscription, les traite puis affiche un message correspondant
 */
$gest = new Gestionnaire ();
echo $gest->inscription($_POST);