<?php

function clear() {

    if (PHP_OS === "WINNT") {
        system("cls");
    }
    else {
        system("clear");
    }
}


$possible_words =["bebida","prisma","ala","dolar","gato","piloto"];

define("MAX_ATTEMPS",6);

echo "juego del ahorcado!\n\n";

$choosen_word = $possible_words[rand(0,5)];
$choosen_word = strtolower($choosen_word);
$word_length = strlen($choosen_word);
$discovered_letters = str_pad("",$word_length,"_");
$attempts = 0;
do {

echo "palabras de $word_length  letras \n\n";
echo $discovered_letters . "\n\n";

//pedimos al usario que escriba
$player_letter =readline("escribe una letra ");
$player_letter =strtolower($player_letter);

if(str_contains($choosen_word,$player_letter)){
    //verificamos todas las ocurrencias de esta letra para reemplazarla
    $offset = 0;
    while (($letter_position = strpos($choosen_word,$player_letter,$offset))!== false) {
        $discovered_letters[$letter_position]=$player_letter;
        $offset= $letter_position + 1;
    }
}else{
    clear();
    $attempts++;
        echo "letra incorrecta . te quedan " . (MAX_ATTEMPS - $attempts) . "intentos";
        sleep(2);
}
clear();
} while ($attempts < MAX_ATTEMPS && $discovered_letters != $choosen_word);

clear();
if ($attempts < MAX_ATTEMPS) {
    echo "ganaste \n\n";
}else {
    echo "perdiste \n\n";
}
echo "la palabra es : $choosen_word \n";
echo "adivinaste: $discovered_letters ";
echo "\n";