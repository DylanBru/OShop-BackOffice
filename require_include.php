<?php

/*
require vs include
require génère une erreur et arrete le script s'il ne trouve pas le fichier

include affiche un warning et continue du script s'il ne trouve pas le fichier


once vs rien

include_once n'exécutera pas le code si le fichier a déjà été inclu ( ou require ou _once )

include toto.php
include toto.php > toto toto

include_once tata.php
include_once tata.php > tata
*/

// toto.php
echo 'toto';