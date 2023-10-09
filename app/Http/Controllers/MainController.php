<?php

    namespace App\Http\Controllers;

    use GuzzleHttp\Client;

    class MainController extends Controller
    {
        function index()
        {
            $client = new Client();
            $apiKey = '691ba4a3118340929def144af253526e';
            $newsCount = 4;
            $newsApiUrl = 'https://newsapi.org/v2';
            $mainNewsToSend = [];

            $mainNews = json_decode($client->get("$newsApiUrl/everything?q=Ukraine&apiKey=$apiKey")->getBody(), true);
            $sideNews = json_decode($client->get("$newsApiUrl/top-headlines?country=ua&apiKey=$apiKey")->getBody(), true);

            for($i = 0; $i < $newsCount; $i++)
            {
                $mainNewsToSend[] = $mainNews['articles'][rand(0, (count($mainNews['articles']) - 1))];
            } 

            return view('index', compact('mainNewsToSend', 'sideNews'));
        }

        function contacts()
        {
            return view('contacts');
        }
    }