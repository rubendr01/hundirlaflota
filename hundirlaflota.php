<?php
include_once 'console.php';

//HUNDIR LA FLOTA (Ruben i Michel)
//PSEUDOCODI

// Dos jugador juguen a enfonsar vaixells i un guanya
// Dues fases:
// - Col·locació dels vaixells
// - Joc

// A la primera fase, cada jugador col·loca els seus vaixells
// Ho han de fer de forma alterna, sense veure el taulell de l'altre.
// Podem utilitzar readLines() per canviar de jugador sense veure el taulell

// A la segona fase, de forma alterna, cada jugador fa un moviment i el sistema
// indica si es aigua, tocat o tocat i enfonsat.

// Necessitem quatre arrays de 10x10
// Necessitem una variable jugador, que ha d'anar canviant en cada ronda.

// Primera part
// Pintem el nom del joc
// Pintem el jugador en curs (num 1). També li podem demanar el nom
// Pintem el taulell de col·locació 
// Bucle demanant la posició dels vaixells
//  - Posició
//  - Orientació
//  - Comprovem que la ubicació es correcta (Dintre del taulell i respectant els vaixells)
// Fins que acabem amb tots els vaixells col·locats
// Pausa per a pasar de jugador
// El mateix pel jugador 2

// Segona part
// Bucle fins que un dels jugadors guanya
//  - Demanem casella objectiu
//  - Verifiquem casella vàlida
//  - Marquem resultat mísil (en el taulell de batalla del jugador en curs i en el taulell 
//    de col·locació de l'altre jugador)
//  - Cambiem de jugador
// Fi bucle principal
// Felicitem al jugador que ha guanyat


//Creamos tableros
$tablero_pos1 = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
];

$tablero_pos2 = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
];

$tablero_batalla1 = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
];

$tablero_batalla2 = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
];


$jugador1 = 1;
$jugador2 = 2;
$noms_jugadors[$jugador1] = "";
$noms_jugadors[$jugador2] = "";

$letras = [
    "A" => 0, "a" => 0,
    "B" => 1, "b" => 1,
    "C" => 2, "c" => 2,
    "D" => 3, "d" => 3,
    "E" => 4, "e" => 4,
    "F" => 5, "f" => 5,
    "G" => 6, "g" => 6,
    "H" => 7, "h" => 7,
    "I" => 8, "i" => 8,
    "J" => 9, "j" => 9,
];
//$letras[letra] 

function main()
{
    global $jugador1, $jugador2, $noms_jugadors, $tablero_pos1, $tablero_pos2, $tablero_batalla1, $tablero_batalla2;
    //Inicio juego
    system("clear");
    echo "============================\n";
    echo "      HUNDIR LA FLOTA!      \n";
    echo "============================\n";
    echo "Pulsa cualquier botón para empezar";
    readline("");
    system("clear");

    elegirNombres();
    $tablero_pos1 = colocar_barcos($tablero_pos1, $jugador1);
    $tablero_pos2 = colocar_barcos($tablero_pos2, $jugador2);

    batalla($tablero_pos1, $tablero_pos2);
}

function elegirNombres()
{
    global $noms_jugadors, $jugador1, $jugador2;
    //Preguntamos por el nombre de los jugadores
    do {
        $noms_jugadors[$jugador1] = readLine('Introduce nombre jugador 1: ');
    } while ($noms_jugadors[$jugador1] == "");

    do {
        $noms_jugadors[$jugador2] = readLine('Introduce nombre jugador 2: ');
    } while ($noms_jugadors[$jugador2] == "");

    readline("Turno del jugador 1");
}

//colocar barcos en cada tablero
function colocar_barcos($tablero_pos, $jugador)
{
    global $letras;
    //JUGADOR1
    echo "Coloca tu estrategia naval " . $jugador . ": \n";

    //Indicamos el numero de barcos que hay en total de cada tipo
    $barco1 = 1; //1 - 1 - 1 - 1
    $barco2 = 2; //22 - 22 - 22
    $barco3 = 3; //333 - 333
    $barco4 = 4; //4444 - 4444
    do {
        //Clear
        system("clear");

        //Imprimir tablero
        imprimir_tablero($tablero_pos, $jugador); // tablero jugador 1;

        //Bucle seleccion y colocación. Cuando se acabe pasa de jugador
        //Seleccionar barco:
        // - Barco de 1 (x 4)
        // - Barco de 2 (x 3)
        // - Barco de 3 (x 2)
        // - Barco de 4 (x 1)
        echo "Selecciona un barco: \n";
        echo "Barco de 1: " . $barco1 . " u/s\n";
        echo "Barco de 2: " . $barco2 . " u/s\n";
        echo "Barco de 3: " . $barco3 . " u/s\n";
        echo "Barco de 4: " . $barco4 . " u/s\n";

        do { //controlamos entrada valida
            $opt = readline("selecicone un barco (1-4): ");
        } while ($opt != "1" && $opt != "2" && $opt != "3" && $opt != "4" || $opt == "");

        //Seleccionamos la orientación (Vertical y horizontal)
        echo "Selecciona orientación:\n";
        echo "1. Vertical\n";
        echo "2. Horizontal\n";

        do { //controlamos entrada valida
            $optOri = readline("Opción (1-2): ");
        } while ($optOri != "1" && $optOri != "2" || $optOri == "");

        //Seleccionamos una fila
        do {
            $optFil = readline("Dime una fila (A-H/a-h): ");
        } while (
            $optFil != "a" && $optFil != "b" && $optFil != "c" && $optFil != "d"
            && $optFil != "e" && $optFil != "f" && $optFil != "g" && $optFil != "h"
            && $optFil != "i" && $optFil != "A" && $optFil != "B" && $optFil != "C"
            && $optFil != "D" && $optFil != "E" && $optFil != "F" && $optFil != "G"
            && $optFil != "H" && $optFil != "I" && $optFil != "j" && $optFil != "J" || $optFil == ""
        );



        do {
            $optCol = readline("Dime una columna (1-10): ");
        } while (
            $optCol != "1" && $optCol != "2" && $optCol != "3" && $optCol != "4"
            && $optCol != "5" && $optCol != "6" && $optCol != "7" && $optCol != "8"
            && $optCol != "9" && $optCol != "10" || $optCol == ""
        );

        //Verificamos que no salga del tablero y que no pise ningún barco
        if ($optOri == 1) { //VERTICAL
            if ($opt == 1) {
                if ($barco1 != 0) {
                    if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0) {
                        $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                        $barco1--;
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 1");
                    readline("");
                }
            }
            if ($opt == 2) {
                if ($barco2 != 0) {
                    if ($optFil != "j" && $optFil != "J") {
                        if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil] + 1][$optCol - 1] == 0) {
                            $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil] + 1][$optCol - 1] = $opt;
                            $barco2--;
                        } else {
                            echo Console::red("No puedes colocar barcos en esa posición!");
                            readline("");
                        }
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 2");
                    readline("");
                }
            }
            if ($opt == 3) {
                if ($barco3 != 0) {
                    if ($optFil != "i" && $optFil != "I" && $optFil != "j" && $optFil != "J") {
                        if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil] + 1][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil] + 2][$optCol - 1] == 0) {
                            $barco3--;
                            $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil] + 1][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil] + 2][$optCol - 1] = $opt;
                        } else {
                            echo Console::red("No puedes colocar barcos en esa posición!");
                            readline("");
                        }
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 3");
                    readline("");
                }
            }
            if ($opt == 4) {
                if ($barco4 != 0) {
                    if ($optFil != "i" && $optFil != "I" && $optFil != "j" && $optFil != "J" && $optFil != "h" && $optFil != "H") {
                        if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil] + 1][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil] + 2][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil] + 3][$optCol - 1] == 0) {
                            $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil] + 1][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil] + 2][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil] + 3][$optCol - 1] = $opt;
                            $barco4--;
                        } else {
                            echo Console::red("No puedes colocar barcos en esa posición!");
                            readline("");
                        }
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 4");
                    readline("");
                }

                //================
                //================
                //HORIZONTAL
            }
        } else {
            if ($opt == 1) {
                if ($barco1 != 0) {
                    if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0) {
                        $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                        $barco1--;
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 1");
                    readline("");
                }
            }
            if ($opt == 2) {
                if ($barco2 != 0) {
                    if ($optCol != "10") {
                        if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil]][$optCol] == 0) {
                            $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil]][$optCol] = $opt;
                            $barco2--;
                        } else {
                            echo Console::red("No puedes colocar barcos en esa posición!");
                            readline("");
                        }
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 2");
                    readline("");
                }
            }
            if ($opt == 3) {
                if ($barco3 != 0) {
                    if ($optCol != "9" && $optCol != "10") {
                        if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil]][$optCol] == 0 && $tablero_pos[$letras[$optFil]][$optCol + 1] == 0) {
                            $barco3--;
                            $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil]][$optCol] = $opt;
                            $tablero_pos[$letras[$optFil]][$optCol + 1] = $opt;
                        } else {
                            echo Console::red("No puedes colocar barcos en esa posición!");
                            readline("");
                        }
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 3");
                    readline("");
                }
            }
            if ($opt == 4) {
                if ($barco4 != 0) {
                    if ($optCol != "10" && $optCol != "9" && $optCol != "8") {
                        readline("");
                        if ($tablero_pos[$letras[$optFil]][$optCol - 1] == 0 && $tablero_pos[$letras[$optFil]][$optCol] == 0 && $tablero_pos[$letras[$optFil]][$optCol + 1] == 0 && $tablero_pos[$letras[$optFil]][$optCol + 2] == 0) {
                            $tablero_pos[$letras[$optFil]][$optCol - 1] = $opt;
                            $tablero_pos[$letras[$optFil]][$optCol] = $opt;
                            $tablero_pos[$letras[$optFil]][$optCol + 1] = $opt;
                            $tablero_pos[$letras[$optFil]][$optCol + 2] = $opt;
                            $barco4--;
                        } else {
                            echo Console::red("No puedes colocar barcos en esa posición!");
                            readline("");
                        }
                    } else {
                        echo Console::red("No puedes colocar barcos en esa posición!");
                        readline("");
                    }
                } else {
                    echo Console::red("No quedan mas barcos del tipo 4");
                    readline("");
                }
            }
        }
        //
    } while (($barco1 != 0) || ($barco2 != 0) || ($barco3 != 0) || ($barco4 != 0));
    //Una vez acabado pasamos a otro jugador
    if ($jugador == 1) {
        echo Console::green("======================");
        echo Console::green(" Turno del jugador 2");
        echo Console::green("======================");
        readline("");
    } else {
        system("clear");
        echo Console::green("======================\n");
        echo Console::green("  HORA DE LA BATALLA\n");
        echo Console::blue("~") . " --> AGUA\n";
        echo "■ --> FALLO\n";
        echo Console::red("X") . " --> TOCADO\n";
        echo Console::green("======================");
        readline("");
    }
    return $tablero_pos;
}

function imprimir_tablero($tablero, $jugador)
{
    //system("clear");
    $num = 65;
    $x = 1;
    if ($jugador == 1) { //rojo
        for ($f = -1; $f < 10; $f++) {
            //echo Console::green($f);
            if ($f != -1) {
                $l = chr($num);
                echo $l;
                $num++;
            }
            for ($c = 0; $c < 10; $c++) {
                //$num++;
                //$a = chr(ord($a)+$num);
                //echo Console::green($a);
                //echo $a;

                if ($f == -1) {
                    if ($x <= 10) {
                        if ($c == 0) {
                            echo " ";
                        }
                        echo "|" . $x;
                        $x++;
                    }
                } else {
                    switch ($tablero[$f][$c]) {
                        case '0': //no barcos
                            echo "|" . Console::blue("~");
                            break;
                        case '1':
                            echo "|" . Console::light_cyan("1");
                            break;
                        case '2':
                            echo "|" . Console::light_cyan("2");
                            break;
                        case '3':
                            echo "|" . Console::light_cyan("3");
                            break;
                        case '4':
                            echo "|" . Console::light_cyan("4");
                            break;
                        case '5':
                            echo "|■";
                            break;
                        case '6':
                            echo "|" . Console::red("X");
                            break;
                        default:
                            # code...
                            break;
                    }
                }
            }
            echo "|\n";
        }
    } else {
        //jugador 2 - amarillo
        for ($f = -1; $f < 10; $f++) {
            //echo Console::green($f);
            if ($f != -1) {
                $l = chr($num);
                echo $l;
                $num++;
            }
            for ($c = 0; $c < 10; $c++) {
                //$num++;
                //$a = chr(ord($a)+$num);
                //echo Console::green($a);
                //echo $a;

                if ($f == -1) {
                    if ($x <= 10) {
                        if ($c == 0) {
                            echo " ";
                        }
                        echo "|" . $x;
                        $x++;
                    }
                } else {
                    switch ($tablero[$f][$c]) {
                        case '0': //no barcos
                            echo "|" . Console::blue("~");
                            break;
                        case '1':
                            echo "|" . Console::yellow("1");
                            break;
                        case '2':
                            echo "|" . Console::yellow("2");
                            break;
                        case '3':
                            echo "|" . Console::yellow("3");
                            break;
                        case '4':
                            echo "|" . Console::yellow("4");
                            break;
                        case '5':
                            echo "|■"; //FALLA
                            break;
                        case '6':
                            echo "|" . Console::red("X"); //ACIERTO
                            break;
                        default:
                            # code...
                            break;
                    }
                }
            }
            echo "|\n";
        }
    }
}

// Segona part
// Bucle fins que un dels jugadors guanya
//  - Demanem casella objectiu
//  - Verifiquem casella vàlida
//  - Marquem resultat mísil (en el taulell de batalla del jugador en curs i en el taulell 
//    de col·locació de l'altre jugador)
//  - Cambiem de jugador
// Fi bucle principal
function batalla($tablero_pos1, $tablero_pos2)
{
    global $tablero_batalla1, $tablero_batalla2, $letras, $noms_jugadors;

    $jugador = 1;

    $gana = false;

    $barcoTotalAcertado1 = 0;
    $barcoTotalAcertado2 = 0;

    do {
        if ($jugador == 1) {

            system("clear");
            readline("TURNO JUGADOR 1");
            //Mostramos tableros (posicion y batalla)
            echo " === TABLERO POSICIÓN ===\n";
            imprimir_tablero($tablero_pos1, $jugador);
            echo "\n";
            echo " === TABLERO BATALLA ===\n";
            imprimir_tablero_batalla($tablero_batalla1);
            echo "\n";
            //Seleccionamos una fila
            do {
                $optFil = readline("Dime una fila (A-H/a-h): ");
            } while (
                $optFil != "a" && $optFil != "b" && $optFil != "c" && $optFil != "d"
                && $optFil != "e" && $optFil != "f" && $optFil != "g" && $optFil != "h"
                && $optFil != "i" && $optFil != "A" && $optFil != "B" && $optFil != "C"
                && $optFil != "D" && $optFil != "E" && $optFil != "F" && $optFil != "G"
                && $optFil != "H" && $optFil != "I" && $optFil != "j" && $optFil != "J" || $optFil == ""
            );



            do {
                $optCol = readline("Dime una columna (1-10): ");
            } while (
                $optCol != "1" && $optCol != "2" && $optCol != "3" && $optCol != "4"
                && $optCol != "5" && $optCol != "6" && $optCol != "7" && $optCol != "8"
                && $optCol != "9" && $optCol != "10" || $optCol == ""
            );

            if ($tablero_batalla1[$letras[$optFil]][$optCol - 1] != 1 || $tablero_batalla1[$letras[$optFil]][$optCol - 1] != 2) {
                if ($tablero_pos2[$letras[$optFil]][$optCol - 1] == 0) { //CONTROLAR LA POSICIÓN DEL JUGADOR 2 (tablero pos)
                    $tablero_pos2[$letras[$optFil]][$optCol - 1] = 5; //Indicamos en el tablero de posicion del jugador 2 que ha tocado agua su contrincante
                    $tablero_batalla1[$letras[$optFil]][$optCol - 1] = 1; // Indicamos en el tablero de batalla del jugador 1 que hemos tocado agua
                    readline("AGUA!");
                } else {
                    $tablero_pos2[$letras[$optFil]][$optCol - 1] = 6;   //Indicamos en el tablero de posicion del jugador 2 que le han tocado un barco
                    $tablero_batalla1[$letras[$optFil]][$optCol - 1] = 2; //Indicamos en el tablero de batalla del jugador 1 que ha tocado un barco rival 
                    $barcoTotalAcertado1++; //Incrementamos acierto
                    readline("TOCADO!");
                    if ($barcoTotalAcertado1 == 20) {
                        $gana = true;
                        readline("HAS GANADO!" . $noms_jugadors[$jugador] . "!");
                    }
                }
            } else {
                echo Console::red("Posición ya seleccionada");
                readline("");
            }
            $jugador = 2;
        } else { //jugador 2
            system("clear");
            readline("TURNO JUGADOR 2");
            //Mostramos tableros (posicion y batalla)
            echo " === TABLERO POSICIÓN ===\n";
            imprimir_tablero($tablero_pos2, $jugador);
            echo "\n";
            echo " === TABLERO BATALLA ===\n";
            imprimir_tablero_batalla($tablero_batalla2);
            echo "\n";
            //Seleccionamos una fila
            do {
                $optFil = readline("Dime una fila (A-H/a-h): ");
            } while (
                $optFil != "a" && $optFil != "b" && $optFil != "c" && $optFil != "d"
                && $optFil != "e" && $optFil != "f" && $optFil != "g" && $optFil != "h"
                && $optFil != "i" && $optFil != "A" && $optFil != "B" && $optFil != "C"
                && $optFil != "D" && $optFil != "E" && $optFil != "F" && $optFil != "G"
                && $optFil != "H" && $optFil != "I" && $optFil != "j" && $optFil != "J" || $optFil == ""
            );



            do {
                $optCol = readline("Dime una columna (1-10): ");
            } while (
                $optCol != "1" && $optCol != "2" && $optCol != "3" && $optCol != "4"
                && $optCol != "5" && $optCol != "6" && $optCol != "7" && $optCol != "8"
                && $optCol != "9" && $optCol != "10" || $optCol == ""
            );

            if ($tablero_batalla2[$letras[$optFil]][$optCol - 1] != 1 || $tablero_batalla2[$letras[$optFil]][$optCol - 1] != 2) {
                if ($tablero_pos1[$letras[$optFil]][$optCol - 1] == 0) { //CONTROLAR LA POSICIÓN DEL JUGADOR 2 (tablero pos)
                    $tablero_pos1[$letras[$optFil]][$optCol - 1] = 5; //Indicamos en el tablero de posicion del jugador 2 que ha tocado agua su contrincante
                    $tablero_batalla2[$letras[$optFil]][$optCol - 1] = 1; // Indicamos en el tablero de batalla del jugador 1 que hemos tocado agua
                    readline("AGUA!");
                } else {
                    $tablero_pos1[$letras[$optFil]][$optCol - 1] = 6;   //Indicamos en el tablero de posicion del jugador 2 que le han tocado un barco
                    $tablero_batalla2[$letras[$optFil]][$optCol - 1] = 2; //Indicamos en el tablero de batalla del jugador 1 que ha tocado un barco rival 
                    $barcoTotalAcertado2++; //Incrementamos acierto
                    readline("TOCADO!");
                    if ($barcoTotalAcertado2 == 20) {
                        $gana = true;
                        readline("HAS GANADO!" . $noms_jugadors[$jugador] . "!");
                    }
                }
            } else {
                echo Console::red("Posición ya seleccionada");
                readline("");
            }
            $jugador = 1;
        }
    } while (!$gana);
}

function imprimir_tablero_batalla($tablero)
{
    //system("clear");
    $num = 65;
    $x = 1;
    //rojo
    for ($f = -1; $f < 10; $f++) {
        //echo Console::green($f);
        if ($f != -1) {
            $l = chr($num);
            echo $l;
            $num++;
        }
        for ($c = 0; $c < 10; $c++) {
            //$num++;
            //$a = chr(ord($a)+$num);
            //echo Console::green($a);
            //echo $a;

            if ($f == -1) {
                if ($x <= 10) {
                    if ($c == 0) {
                        echo " ";
                    }
                    echo "|" . $x;
                    $x++;
                }
            } else {
                switch ($tablero[$f][$c]) {
                    case '0': //no barcos
                        echo "|" . Console::blue("~"); //AGUA
                        break;
                    case '1':
                        echo "|■"; //FALLA
                        break;
                    case '2':
                        echo "|" . Console::green("X"); //ACIERTA
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
        echo "|\n";
    }
}

main();
