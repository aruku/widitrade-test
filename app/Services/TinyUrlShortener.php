<?php

namespace App\Services;

use App\Services\Interfaces\UrlShortener;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TinyUrlShortener implements UrlShortener
{
    public function requestShortUrl(string $urlToShorten): PromiseInterface|Response
    {
        return Http::withHeaders([
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->get("https://tinyurl.com/api-create.php?url=$urlToShorten");
    }
}
