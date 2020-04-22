<?php

ini_set('allow_url_fopen', 'On');

require_once $_SERVER['DOCUMENT_ROOT'].'/composer/vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

function getWeatherData()
{
    $client = new Client();

    $response = $client->request(
        'GET',
        'https://sinoptik.ua/%D0%BF%D0%BE%D0%B3%D0%BE%D0%B4%D0%B0-%D0%B7%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5'
    );
    $body = strval($response->getBody());

    //var_dump($body);
    $crawler = new Crawler($body);

    $weather_data = $crawler
        ->filter('.lSide > .imgBlock > p')
        ->each(function (Crawler $node) {
            return $node->html();
        });


    $today_data = $crawler
        ->filter('.tabs > .main > p')
        ->each(function (Crawler $node) {
            return $node->html();
        });

    $next_days_names = $crawler
        ->filter('.tabs > .main > p > a')
        ->each(function (Crawler $node) {
            return $node->html();
        });

    $next_days_max_temp = $crawler
        ->filter('.max > span ')
        ->each(function (Crawler $node) {
            return $node->html();
        });

    $next_days_min_temp = $crawler
        ->filter('.min > span ')
        ->each(function (Crawler $node) {
            return $node->html();
        });

    $next_days_data = [];

    foreach ($next_days_names as $index=>$name) {
        $next_days_data[$index] = [
            'name'=> $name,
            'max' => $next_days_max_temp[$index],
            'min' => $next_days_min_temp[$index], ];
    }

    return [
        'time'          => $weather_data[0],
        'temperature'   => $weather_data[1],
        'main_day'      => $today_data[0],
        'today'         => $today_data[1].' '.$today_data[2],
        'next_days_data'=> $next_days_data,
    ];
}
