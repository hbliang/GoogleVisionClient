<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2017/4/30
 * Time: 上午1:16
 */


require __DIR__ . '/vendor/autoload.php';

$client = new \Ben\GoogleVisionClient\Client([
    'visionClientConfig' => [
        'projectId' => 'image-analysis-166204',
    ],
    'filename' => '/Users/Ben/Downloads/123.jpg',
]);

$filename = '/Users/Ben/Downloads/123.jpg';

$labels = $client->detectLabel()->analyze();



