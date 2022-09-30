<?php
namespace Rferreira\Kafka;
require "vendor/autoload.php";

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList("127.0.0.1:9092");
$config->setGroupId("tweets");
$config->setBrokerVersion("1.0.0");
$config->setTopics(["tweet"]);
$consumer = new \Kafka\Consumer();

$consumer->start(function($topic, $part, $message) {
var_dump($message);
});
