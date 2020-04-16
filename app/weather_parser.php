<?php
ini_set('display_errors', 'On');
ini_set('allow_url_fopen', 'On');
require_once '/Users/vrntsv/PhpstormProjects/bwt_test/composer/vendor/autoload.php';
$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

echo $response->getStatusCode();