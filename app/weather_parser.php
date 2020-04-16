<?php

ini_set('display_errors', 'On');
ini_set('allow_url_fopen', 'On');

require_once '/Users/vrntsv/PhpstormProjects/bwt_test/composer/vendor/autoload.php';


use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;


$client = new Client();

$response = $client->request(
    'GET',
    'https://sinoptik.ua/%D0%BF%D0%BE%D0%B3%D0%BE%D0%B4%D0%B0-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5');
$body = strval($response->getBody());

var_dump($body);
$crawler = new Crawler($body);

$catsHTML = $crawler
    ->filter('.lSide')
    ->each(function (Crawler $node) {
        return $node->html();
    });
var_dump($catsHTML);


