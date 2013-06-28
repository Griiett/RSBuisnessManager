<?php
/*
Développement par : Jules Amilo
Avec l'aide de : Baptiste Raabe & les avis de Floréal
Commencé le 26/06/2013, en l'espoir de faire fleurir un jour un bon commerce de peaux de dragon (ou autres, selon le temps) et en apprendre d'avantage sur MySQL
*/
// Connexion à MySQL
mysql_connect('localhost', 'root', '');
mysql_select_db('travail'); // Connexion à "localhost", avec l'utilisateur "root", le mot de passe "" et la table "travail"
// Connexion à MySQL

// Enregistrement des variables pour les statistiques
$nb_peau1=mysql_query('SELECT SUM(nb_peauOK) AS  nb_peauOK FROM buisness_rs');
$donnees_total2=mysql_fetch_assoc($nb_peau1); 
$nb_peau=$donnees_total2['nb_peauOK']; // On forme la variable $nb_peau qui est en faite le nombre de peaux déjà vendus

$nb_piece1=mysql_query('SELECT SUM(nb_piece) AS  nb_piece FROM buisness_rs WHERE status = "2"');
$donnees_total3=mysql_fetch_assoc($nb_piece1); 
$nb_piece=$donnees_total3['nb_piece']; // On forme la variable $nb_piece qui est en faite le nombre de pièces déjà obtenues

$nb_taxe = $nb_piece / 4; // On calcul la taxe (25% du prix total, sois le prix total divisé par le nombre de pièce obtenues)
// Enregistrement des variables pour les statistiques

// Partie enregistrement des nouvelles commandes
  if (isset($_POST['valide'])) {
		$packet = $_POST['packet'];
		$peau = $_POST['peau'];
		$statu = $_POST['status'];
		$piece = $_POST['piece'];
	if ($statu == "2") { $peauOK = $peau;
		$requete = "INSERT INTO `buisness_rs`(`nb_packet`, `nb_peauOK`, `nb_peau`, `status`, `nb_piece`) VALUES ($packet,$peauOK,$peau,$statu,$piece)";
		mysql_query($requete);
		header("Location: index.php?message=add");  } // On transforme des variables, et on insert des informations selon le choix de l'utilisateur, puis on l'envoie sur l'accueil

	if ($statu == "1") { $peauOK = 0;
		$requete = "INSERT INTO `buisness_rs`(`nb_packet`, `nb_peauOK`, `nb_peau`, `status`, `nb_piece`) VALUES ($packet,$peauOK,$peau,$statu,$piece)";
		mysql_query($requete);
		header("Location: index.php?message=add");  } } // De même qu'au dessus, même "paragraphe" de code
// Partie enregistrement des nouvelles commandes

// Partie modification des status
	if (isset($_GET['status'])) {
		$valeur_news = $_GET['valeur'];
		mysql_query("UPDATE buisness_rs SET status = 2 WHERE id = ".$_GET['status']."") or die (mysql_error());
		mysql_query("UPDATE buisness_rs SET nb_peauOK = ".$valeur_news." WHERE id = ".$_GET['status']."") or die (mysql_error());
		header("Location: index.php?message=sta"); } // On change le status "En cours" à "Terminée" et on met la table nb_peauOK égal à celle de nb_peau
// Partie modification des status

// Partie supprésion des commandes
	if (isset($_GET['suppr'])) {
		mysql_query("DELETE FROM buisness_rs WHERE id = ".$_GET['suppr']."") or die (mysql_error());
		header("Location: index.php?message=del"); } // On supprime la commande choisie (localisation par ID)
// Partie supprésion des commandes

// Partie ajout de peaux (sans validé la commande) et quelques sécurités
	if (isset($_GET['valeur'])) {
		$valeur_news = $_GET['valeur2'] + $_GET['valeur'];
		$valeur_max = $_GET['valeur3'];
		mysql_query("UPDATE buisness_rs SET nb_peauOK = ".$valeur_news." WHERE id = ".$_GET['id']."") or die (mysql_error());
	if ($valeur_news >= $valeur_max) {
		mysql_query("UPDATE buisness_rs SET status = 2 WHERE id = ".$_GET['id']."") or die (mysql_error());
		mysql_query("UPDATE buisness_rs SET nb_peauOK = ".$valeur_max." WHERE id = ".$_GET['id']."") or die (mysql_error()); }
		header("Location: index.php?message=ad2"); } /* Quelques sécurités pour ne pas pouvoir ajouter plus de peaux que la commande en elle-même,
														et on ajoute autant de peaux que nous souhaitons pour faire avancer la commande */
// Partie ajout de peaux (sans validé la commande) et quelques sécurités

// Quelques ajouts - non commenté
$nb_benefices = round($nb_piece);
$nb_moyen = $nb_benefices / $nb_peau;
$nb_packet2 = $nb_peau / 28;
// Quelques ajouts - non commenté
?>
