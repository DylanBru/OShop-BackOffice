<?php


session_start();

var_dump($_SESSION);

$serializedSession = serialize($_SESSION);
var_dump($serializedSession);
var_dump(json_encode($_SESSION));
var_dump(unserialize($serializedSession));


/* 
les données sont écrites dans un fichier texte 
- le nom du fichier est envoyé au navigateur et stocké dans un cookie
- à chaque connexion le navigateur envoit ce cookie ( avec le nom du fichier de session )
- ainsi coté back PHP peut récupérer à nouveau les informations du fichier 

*/