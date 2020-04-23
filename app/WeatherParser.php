<?php


namespace \WeatherParser::class;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

ini_set('allow_url_fopen', 'On');

class WeatherParser
{
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

        $weatherData = $crawler
                ->filter('.lSide > .imgBlock > p')
                ->each(function (Crawler $node) {
                    return $node->html();
                });


        $todayData = $crawler
                ->filter('.tabs > .main > p')
                ->each(function (Crawler $node) {
                    return $node->html();
                });

        $nextDaysNames = $crawler
                ->filter('.tabs > .main > p > a')
                ->each(function (Crawler $node) {
                    return $node->html();
                });

        $nextDaysMaxTemp = $crawler
                ->filter('.max > span ')
                ->each(function (Crawler $node) {
                    return $node->html();
                });

        $nextDaysMinTemp = $crawler
                ->filter('.min > span ')
                ->each(function (Crawler $node) {
                    return $node->html();
                });

        $nextDaysData = [];

        foreach ($nextDaysNames as $index => $name) {
            $nextDaysData[$index] = [
                    'name' => $name,
                    'max' => $nextDaysMaxTemp[$index],
                    'min' => $nextDaysMinTemp[$index],
            ];
        }

        return [
                'time' => $weatherData[0],
                'temperature' => $weatherData[1],
                'main_day' => $todayData[0],
                'today' => $todayData[1] . ' ' . $todayData[2],
                'next_days_data' => $nextDaysData,
        ];
    }
}