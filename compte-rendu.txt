# IsiInstaPaper

Outils de travail :
- Silex : a été préféré à Symfony tout seul pour sa facilité d'utilisation et l'absence de bundles qui obligent à travailler une logique sur laquelle on a difficilement la main.
- Twig pour utiliser des layouts html et afficher les variables et ainsi limiter le nombre de fichiers html
- Wamp (PHP, serveur Apache, MySQL)

Fonctionnement :
- Importer les fichiers .sql de db/ dans phpmyadmin pour créer la base et les tables nécessaires (d'abord database.sql)
- Aller sur http://localhost/isiinstapaper/ sous serveur Apache
- S'inscrire (choix d'un email + mot de passe) puis se connecter avec les mêmes identifiants pour aller sur les autres pages

Ce qui a été fait :
- Les entités Person, Link, Repertory (folders)
- La connexion a la base de données (connexion.php => singleton)
- Le "model" : XFinder pour les requêtes find, XGateway pour les autres. Le choix du Row Data Gateway a été utilisé pour bien séparer les composants et parce que c'est suivant cette philosophie que j'ai travaillé en stage l'an passé. Ce sont des singletons.
- Les controlleurs : un par fichier "vue" principal pour envoyer les données propres à cette vue (singletons)
- Les vues : layout (menus) et buttons (pour les liens - Edit, Share...) sont inclus dans links (page de liste de liens selon répertoire), login (page de login/inscription) et content.twig (page d'un lien - contenu).
- Routage (routes.php)
- Authentification/inscription/session, stockage en base et responsive design de la page login
- Requête HTTP GET pour obtenir le contenu d'un lien (affiché à la volée avec print_r pour tester)
- Tentative de sauvegarde d'un lien en base mais problème de format d'objets dans la requête Insert.
- Les pages visitables sont "/", "/login" et "/read".

Ce qui n'a pas été fait mais qui était prévu :
- Création de répertoires
- Affichage du contenu d'un lien et liste de liens selon catégories
- Worker pour surveiller les mises à jour d'un contenu
- LIKE/MOVE/ARCHIVE/DELETE/SHARE/NOTE/EDIT pour un lien
- Gestion du profil
- Bookmarklet
