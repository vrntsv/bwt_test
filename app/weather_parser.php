<?php

ini_set('display_errors', 'On');
ini_set('allow_url_fopen', 'On');

require_once '/Users/vrntsv/PhpstormProjects/bwt_test/composer/vendor/autoload.php';


use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

function getWeatherData()
{
    $client = new Client();

    $response = $client->request(
        'GET',
        'https://sinoptik.ua/%D0%BF%D0%BE%D0%B3%D0%BE%D0%B4%D0%B0-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5');
    $body = strval($response->getBody());

    #var_dump($body);
    $crawler = new Crawler($body);

    $weather_data = $crawler
        ->filter('.lSide > .imgBlock > p')
        ->each(function (Crawler $node) {
            return $node->html();
        });

    return array('time'=>$weather_data[0], 'temperature'=>$weather_data[1]);
}
