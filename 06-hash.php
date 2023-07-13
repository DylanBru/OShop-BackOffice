<?php
$motDePasse = 'secret972';


echo '################ CRYPTAGE ' . PHP_EOL;


/* 
ce qui se crypte est décryptable donc on ne va pas utiliser ce procédé pour sécuriser nos mots de passe 
ROT13 est un ancien algorithme de cryptage 
*/

$correspondance = [
    's' => '#',
    'e' => 'a',
    'c' => '-',
    'r' => ';',
    't' => 'P',
    '9' => 'u',
    '7' => 'V',
    '2' => '!',
];


$motDePasseCrypte = str_replace(array_keys($correspondance), $correspondance, $motDePasse);

$decrypte = str_replace($correspondance, array_keys($correspondance), $motDePasseCrypte);
var_dump($motDePasse, $motDePasseCrypte, $decrypte);


echo '################ HASHAGE ' . PHP_EOL;

/* Un hashage :
- n'est pas réversible
- génère un hash différent pour un même mot de passe


explication by Adrien DELAIGUE @X-Ray 2023
t'as une hacheuse 
=> tu la règles 
=> tu passes ton mdp de la BDD dedans 

Password verify 
=> prend ce que tu as mis dans le form de connexion 
=> passe le dans la hacheuse avec les même paramètres [NDF : les paramètres sont stockés dans le hash]
=> verifie si ce qui sort est bien égal a ce qu'on avait a la sortie de la hacheuse dans la BDD 
Mais dans aucun cas il est capable de "déhacher" ce qui est passé dans la machine xD
*/

$hash1 = crypt($motDePasse, '');
$hash2 = crypt($motDePasse, '');

var_dump($hash1, $hash2);

$motDePasseHashe = password_hash($motDePasse, PASSWORD_DEFAULT);

$exempleHash = '$2y$10$ii4bX9k95kQgNT0./80aEe8pfqmluXtlHKLzXR.J1H9TrHEebvuL6'; // secret972
$exempleHash = '$2y$10$iN6W4Urnby9zSA1EXcNNC.KDZDgdemM4ADM1fm/oc9p5hGU5TsxWa'; // secret972

var_dump(password_verify('toto', $motDePasseHashe));
var_dump(password_verify('secret972', $motDePasseHashe));

var_dump($motDePasseHashe);

