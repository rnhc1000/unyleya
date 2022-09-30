<?php
// $palavrasPositivas = array(
//     "bela",
//     "otima",
//     "excelente",
//     "bom",
//     "alegria",
//     "sucesso",
//     "vitoria",
//     "harmonia",
//     "paz",
//     "felicidade",
//     "amor"
// );
// $palavrasNegativas = array(
//     "aborto",
//     "crime",
//     "infeliz",
//     "invejoso",
//     "feia",
//     "horrivel",
//     "odio",
//     "ruim",
//     "tristeza",
//     "raiva",
//     "lula"
// );

// // $palavrasNeutras = array();

// $palavrasChave=array_merge($palavrasNegativas, $palavrasPositivas);
// //var_dump($palavrasChave);
// //echo "<hr>";
// sort($palavrasChave);


// $k=count($palavrasChave);
// for ($j=0; $j < $k; $j++) {
// 	// $c = rand(0,$k);
// 	// for ($i=0; $i < $k; $i++) {
// 	$tweets= array(
// 		"frase ".$j => "Atividade 6 UnyLeya Desenvolvimento FullStack " . $palavrasChave[$j]
// 	);
//     //var_dump($tweets);
// 	// }
// 	//echo $tweets[$j] . "<br>";
// }

// $k= count($palavrasChave);
// $l = count($palavrasPositivas);
// $m = count($palavrasNegativas);

// $somaPositivo=0;
// $somaNegativo=0;

// foreach ($tweets as $palavrasChaves) {
//     $bit=false;
//     // var_dump($palavrasChaves);
//     for ($p = 0; $p < $l; $p++) {
//         if (str_contains( $palavrasChaves,$palavrasPositivas[$p] ) ) {
//             echo $palavrasChaves . " -> Tweet Positivo" . "<br>";
//             $somaPositivo+=1;
//         }
//     $somaPositivo >=1 ? $bitP=true : $bitP=false;
 
//     } 
//     for ($q=0; $q < $m; $q++) {
//         if (str_contains( $palavrasChaves,$palavrasNegativas[$q] ) ) {
//             echo $palavrasChaves . " -> Tweet Negativo" . "<br>";
//             $somaNegativo+=1;
//         }
//     $somaNegativo >=1 ? $bitN=true : $bitN=false;
//     }
    
//     if ($bitP) {
//         echo $somaPositivo ."<br>";
//         // echo $somaNegativo ."<br>";
//     } elseif ($bitN) {
//         echo $somaNegativo ."<br>";
//         // echo "Tem tweet neutro..."; 
//     } else {
//         echo "Tem Tweet Neutro....";
//     }
// }


//     die();
//     if (str_contains( $palavraChaves,$palavrasNegativas[$l] ) ) {
//             echo "Tweet Negativo" . "<br>";
//         } else {
//             echo "Tweet Neutro" . "<br>";
//         }
    

// for ($w=0; $w < $k; $w++) {

// }


$palavrasPositivas = array(
    "bela",
    "otima",
    "excelente",
    "bom",
    "alegria",
    "sucesso",
    "vitoria",
    "harmonia",
    "paz",
    "felicidade",
    "amor",
    "esplendor",
    "vigoroso",
    "familia",
    "mae",
    "pai"
);
$palavrasNegativas = array(
    "aborto",
    "crime",
    "infeliz",
    "invejoso",
    "feia",
    "horrivel",
    "odio",
    "ruim",
    "tristeza",
    "raiva",
    "lula",
    "comunismo",
    "fascismo",
    "pilantra",
    "ladrao"
);

$palavrasNeutras = array(
    "novo",
    "velho",
    "roxo",
    "lilás",
    "casa",
    "apartamento",
    "predio",
    "novidade",
    "argentino",
    "homem",
    "mulher",
    "criança",
    "adulto",
    "jovem"

);

$tweets=array();
$palavrasChave=array_merge($palavrasNegativas, $palavrasPositivas, $palavrasNeutras);
sort($palavrasChave);
$k=count($palavrasChave);
$l=count($palavrasPositivas);
$m=count($palavrasNegativas);
$n=count($palavrasNeutras);
for ($j=0; $j < $k; $j++) {
	$tweets[$j]= "Tweet UnyLeya Desenvolvimento FullStack numero " . $j .  " --- " . $palavrasChave[$j] . " --- ";
}
$somaPositivos=0;
$somaNegativos=0;
$somaNeutros=0;
foreach($tweets as $consultas) {
    for ($p = 0; $p < $l; $p++) {
        if (str_contains( $consultas,$palavrasPositivas[$p] ) ) {
            $consulta[] = $consultas . " -> Tweet Positivo";
            $somaPositivos+=1;    
        }
    }

    for ($q=0; $q < $m; $q++) {
        if (str_contains( $consultas,$palavrasNegativas[$q] ) ) {
            $consulta[] = $consultas . " -> Tweet Negativo";
            $somaNegativos+=1;    

        }
    }

    for ($r=0; $r < $n; $r++) {
        if (str_contains( $consultas,$palavrasNeutras[$r] ) ) {
            $consulta[] = $consultas . " -> Tweet Neutro";
            $somaNeutros+=1;
        }
    }
    
}


// $j=count($consulta);
// echo $j;
// // var_dump($consulta);
// $consulta[++$j] = $somaPositivos . " Tweets Positivos";
// $consulta[++$j] = $somaNegativos . " Tweets Negativos";
// $consulta[++$j] = $somaNeutros . " Tweets Neutros";

$contaPositivos = $somaPositivos . " Tweets Positivos";
$contaNegativos = $somaNegativos . " Tweets Negativos";
$contaNeutros   = $somaNeutros   . " Tweets Neutros";

array_push($consulta, $contaPositivos, $contaNegativos, $contaNeutros);
print_r($consulta);


 