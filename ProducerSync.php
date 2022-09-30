<?php

require "vendor/autoload.php";
$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList("127.0.0.1:9092");
$config->setBrokerVersion("1.0.0");
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);
$producer = new \Kafka\Producer();
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
    "politico",
    "comunismo",
    "fascismo",
    "pilantra",
    "ladrao",
    "corrupto",
    "fake"
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
$contaPositivos = $somaPositivos . " Tweets Positivos";
$contaNegativos = $somaNegativos . " Tweets Negativos";
$contaNeutros   = $somaNeutros   . " Tweets Neutros";

array_push($consulta, $contaPositivos, $contaNegativos, $contaNeutros);

for($i = 0; $i < count($consulta); $i++) {
    $producer->send([
        [
            "topic" => "tweet",
            "value" => $consulta[$i],
            "key" => "",
        ],
]   );
}