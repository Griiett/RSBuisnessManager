RSBuisnessManager, c'est quoi ?
=================

RSBuisnessManager "Bêta" est un logiciel de gestion de commandes pour runescape à faire tourner en local. Il peut servir à plusieurs choses.
Ce qui est partagé est avant-tout un script, ce n'est pas un site complet. Vous n'aurez qu'une seule page actif.
Le projet a été developpé en local, et n'as jamais été testé sur un serveur en ligne, il a donc été developpé par une seule personne (Jules Amilo).

Le début du developpement a été lancé le 26/06/2013. Vous pouvez obtenir une aide qu'en faisant une demande sur skype. (Voir fichier : modules.php)

Une erreur de connexion ?
=================

Si vous avez une erreur du style :
<code>Warning: mysql_fetch_assoc() expects parameter 1 to be resource, boolean given in *** on line 14</code> ouvrez le fichier "modules.php" à la ligne 8 et 9.
<code>mysql_connect('localhost', 'root', ''); mysql_select_db('travail');</code> modifiez les informations par les votres.

Comment installer le script ?
=================
Pour installer ce script, c'est très simple. 
1. Téléchargez l'archive "runescape.rar" et décompressez-la.
2. Ouvrez le fichier, et renommez-le comme vous le souhaiter, ou déplacez-le où vous voulez.
3. Ouvrez votre base de données et exécutez le fichier "buisness_rs.sql".
4. Lancez le site (ou le local) et commencez à utiliser le script !

Le gestionnaire est optimisé pour que la démarche de création des commandes sois simple à utiliser et à comprendre.
Le fichier "modules.php" est entièrement commenté (sauf quelques lignes à la fin).

Bonne utilisateur du script, cependant sachez que c'était "pour m'entraîner", le script sera tenu à jour mais ne sera pas forcement pour d'autres types de concept. Le script est quand même très maniable, il sera pour la plupart facile de le modifier.
