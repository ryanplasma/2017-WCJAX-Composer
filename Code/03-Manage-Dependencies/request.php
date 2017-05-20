<?php

use GuzzleHttp\Client;

require __DIR__ . '/vendor/autoload.php';

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/');
echo($response->getBody());