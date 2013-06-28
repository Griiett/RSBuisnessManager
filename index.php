<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RuneScape Buisness - Peaux de dragon vert</title>
<link rel="stylesheet" type="text/css" href="global.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />
</head>
<body><!-- <div class="dragon"></div> -->
<div id="navigation">
<div class="navigation">
<span class="float_right">
<strong></strong>
</span>
<span class="active">RSBuisnessManager Bêta</span>
</div>
</div>
<div class="container"><div id="logo"><img src="http://www.runescape.com/l=2/img/global/logos/runescape.png"></div>
<?php require('modules.php'); ?>
<div class="stats"><div class="titre">Statistiques des commandes terminées</div><p>
<strong>Nombre de packets vendus :</strong> <span style="color: red;"><?php echo round($nb_packet2); ?></span><br />
<strong>Nombre de peaux vendues :</strong> <span style="color: red;"><?php echo $nb_peau; ?></span><br />
<strong>Nombre de pièces d'or récoltées :</strong> <span style="color: red;"><?php echo round($nb_piece); ?></span><br />
<strong>Nombre de pièces d'or taxées :</strong> <span style="color: red;"><?php echo round($nb_taxe); ?></span> (<strong><i>Désactivé</i></strong>)<br />
<strong>Moyenne de prix par unité de peau :</strong> <span style="color: red;"><?php echo round($nb_moyen); ?></span></p>
<div class="bas_stats"><p>Les bénéfices s'élèvent à <span style="color: red"><strong><?php echo $nb_benefices; ?></strong></span> pièces d'or.</p></div></div>
<div class="ajouter"><div class="titre">Changelog et avancements</div><p>
<strong>28/06/2013 :</strong> Ajout de l'onglet "Commandes terminées", même principe que pour les commandes en cours<br />
<strong>28/06/2013 :</strong> Automatisation du comptage de packet vendus en fonction du nombre de peaux acquises<br />
<strong>28/06/2013 :</strong> Ajout d'un menu et d'une option permettant de choisir de voir toutes les commandes ou que les commandes en cours<br />
<strong>27/06/2013 :</strong> Le prix moyen se calcul seul et automatiquement en faisant la division des bénéfices par le nombre de peaux acquises<br />
<strong>27/06/2013 :</strong> Si le status choisi lors de l'enregistrement d'une commande est "Terminée (2)", le nombre de peaux déjà acquises (x/x) est automatiquement égal au nombre de peaux recherchées<br />
<strong>27/06/2013 :</strong> La ligne de statistique "Nombre de peaux vendues" prend en compte les peaux déjà obtenus en utilisant la colonne "Status de la commande" du tableau<br />
<strong>27/06/2013 :</strong> Quelques avancés HTML et CSS / mise en place de quelques images<br />
<strong>27/06/2013 :</strong> Finalisation du système de gestion automatique des commandes : ajouter 5, 15 et 28 / maximisation (si $valeur >= $peau_ok) / mise à jour automatique des status<br />
<strong>27/06/2013 :</strong> Ajout des avancements<br />
<strong>26/06/2013 :</strong> Première structure PHP et MySQL<br />
<strong>26/06/2013 :</strong> Première structure HTML et CSS<br />
<strong>26/06/2013 :</strong> Début du développement</p></div>
<div style="clear:both;"></div><br />
<nav>
            <ul class="fancyNav">
                <li id="news"><a href="index.php">Toutes les commandes</a></li>
                <li id="about"><a href="index.php?commandes=1">Commandes en cours</a></li>
  			<li id="about"><a href="index.php?commandes=2">Commandes terminées</a></li>
            </ul>
        </nav><br />
<?php if (!isset($_GET['commandes'])) { ?><div class="commandes"><div class="titre">Liste de toutes les commandes</div><p>
<?php if (isset($_GET['message']) AND $_GET['message'] == "add") { ?><h3><span style="color: green">Une entrée viens d'être ajoutée. (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<?php if (isset($_GET['message']) AND $_GET['message'] == "del") { ?><h3><span style="color: green">Une entrée viens d'être suprimée. (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<?php if (isset($_GET['message']) AND $_GET['message'] == "sta") { ?><h3><span style="color: green">Une commande viens de prendre le status "Terminée". (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<?php if (isset($_GET['message']) AND $_GET['message'] == "ad2") { ?><h3><span style="color: green">Les peaux ont été ajoutées. (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<table>
<thead><tr><th scope="col">Nombre de packet(s)</th><th scope="col">Nombre de peau(x)</th><th scope="col">Nombre de pièces récoltées</th><th scope="col">Status de la commande</th><th scope="col">Action à appliquer</th></tr></thead>

<tbody>
<form method="post" action="modules.php">
<td><strong><i>Automatique</i></strong></td>
<td><input type="text" name="peau" /></td>
<td><input type="text" name="piece" /></td>
<td>       <select name="status" id="status">
           <option value="1">En cours</option>
           <option value="2">Terminée</option>
       </select></td>
<td><input type="submit" value="Ajouter cette commande" name="valide" /></td>
			</form>
<?php $requete = 'SELECT * FROM buisness_rs';  $msqreq = mysql_query($requete); while($donnees = mysql_fetch_array($msqreq)){ ?><tr><td>
<?php $nb_packet = round($donnees['nb_peau']) / 28;
if ($nb_packet <= 0.9) { $nb_packet = 0; }
echo $nb_packet ?></td>
<td><?php echo $donnees['nb_peau']; ?></td>
<td><?php echo $donnees['nb_piece']; ?></td>
<td><?php if ($donnees['status'] == "1") { ?><span style="color: red">En cours (<?php echo $donnees['nb_peauOK']; ?>/<?php echo $donnees['nb_peau']; ?>)</span><?php } else { ?><span style="color: green">Terminée (<?php echo $donnees['nb_peauOK']; ?>/<?php echo $donnees['nb_peau']; ?>)</span><?php } ?></td>
<td><a href="modules.php?suppr=<?php echo $donnees['id']; ?>">Supprimer</a></td>
<?php if ($donnees['status'] == "1") { ?><td><a href="modules.php?status=<?php echo $donnees['id']; ?>&valeur=<?php echo $donnees['nb_peau']; ?>">Commande terminée</a> (ajouter <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=1&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">1</a>, <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=5&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">5</a>, <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=15&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">15</a>, <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=28&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">28</a>)</td><?php } ?></tr></tbody><?php } ?>
</table>
</p></div><?php } ?>

<?php if (isset($_GET['commandes'])) { ?><div class="commandes"><div class="titre">Liste de toutes les commandes</div><p>
<?php if (isset($_GET['message']) AND $_GET['message'] == "add") { ?><h3><span style="color: green">Une entrée viens d'être ajoutée. (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<?php if (isset($_GET['message']) AND $_GET['message'] == "del") { ?><h3><span style="color: green">Une entrée viens d'être suprimée. (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<?php if (isset($_GET['message']) AND $_GET['message'] == "sta") { ?><h3><span style="color: green">Une commande viens de prendre le status "Terminée". (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<?php if (isset($_GET['message']) AND $_GET['message'] == "ad2") { ?><h3><span style="color: green">Les peaux ont été ajoutées. (<a href="index.php">Effacer ce message</a>)</span></h3><?php } ?>
<table>
<thead><tr><th scope="col">Nombre de packet(s)</th><th scope="col">Nombre de peau(x)</th><th scope="col">Nombre de pièces récoltées</th><th scope="col">Status de la commande</th><th scope="col">Action à appliquer</th></tr></thead>

<tbody>
<form method="post" action="modules.php">
<td><strong><i>Automatique</i></strong></td>
<td><input type="text" name="peau" /></td>
<td><input type="text" name="piece" /></td>
<td>       <select name="status" id="status">
           <option value="1">En cours</option>
           <option value="2">Terminée</option>
       </select></td>
<td><input type="submit" value="Ajouter cette commande" name="valide" /></td>
			</form>
<?php $requete = 'SELECT * FROM buisness_rs WHERE status = '.$_GET['commandes'].'';  $msqreq = mysql_query($requete); while($donnees = mysql_fetch_array($msqreq)){ ?><tr><td>
<?php $nb_packet = round($donnees['nb_peau']) / 28;
if ($nb_packet <= 0.9) { $nb_packet = 0; }
echo $nb_packet ?>
</td>
<td><?php echo $donnees['nb_peau']; ?></td>
<td><?php echo $donnees['nb_piece']; ?></td>
<td><?php if ($donnees['status'] == "1") { ?><span style="color: red">En cours (<?php echo $donnees['nb_peauOK']; ?>/<?php echo $donnees['nb_peau']; ?>)</span><?php } else { ?><span style="color: green">Terminée (<?php echo $donnees['nb_peauOK']; ?>/<?php echo $donnees['nb_peau']; ?>)</span><?php } ?></td>
<td><a href="modules.php?suppr=<?php echo $donnees['id']; ?>">Supprimer</a></td>
<?php if ($donnees['status'] == "1") { ?><td><a href="modules.php?status=<?php echo $donnees['id']; ?>&valeur=<?php echo $donnees['nb_peau']; ?>">Commande terminée</a> (ajouter <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=1&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">1</a>, <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=5&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">5</a>, <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=15&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">15</a>, <a href="modules.php?id=<?php echo $donnees['id']; ?>&valeur=28&valeur2=<?php echo $donnees['nb_peauOK']; ?>&valeur3=<?php echo $donnees['nb_peau']; ?>">28</a>)</td><?php } ?></tr></tbody><?php } ?>
</table>
</p></div><?php } ?><br /></div>
</body>
</html>
