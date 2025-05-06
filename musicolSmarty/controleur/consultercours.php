<?php
// chargement des ressources
require $_SERVER['DOCUMENT_ROOT'] .  "/include/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Smarty\Smarty;

// chargement de l'interface
$titre = "Consulter les cours d'une journée";

// récupération du planning dans un tableau associatif dont la clé est l'id du jour
// Ce tableau contient des objets 'Jour'
// Chaque objet Jour contient un id, un libellé et un tableau à index numérique contenant les objets Cours
$musicol = new Passerelle(new Select());
$lePlanning = $musicol->getLePlanning();
// Récupération du jour transmis en POST ou du premier jour (la première clé du tableai
$idJour = $_POST['idJour'] ?? array_key_first($lePlanning);
// Alimentation d'un tableau $lesJours
$lesJours = [];
foreach ($lePlanning as $jour) {
    $lesJours[] = ['id' => $jour->getId(), 'libelle' => $jour->getLibelle()];
}
// transmission dans la vue d
$vue = new Smarty();
$vue->assign('lesJours', $lesJours);
$vue->assign('idJour', $idJour);
$vue->assign('lesCours', $lePlanning[$idJour]->getLesCours()); // tableau d’objets Cours
$vue->display('../vue/lescours.tpl');