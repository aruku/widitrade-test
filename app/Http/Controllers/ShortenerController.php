<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\UrlShortener;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShortenerController extends Controller {

    public function __construct(private readonly UrlShortener $shortener) {}

    public function shorten(Request $request): JsonResponse
    {
        $urlToShorten = $request->post('url');
        if (empty($urlToShorten)) {
            return response()->json(['message' => 'Missing URL to redirect'], 500);
        }

        $response = $this->shortener->requestShortUrl($urlToShorten);

        return response()->json(['url' => $response->body()]);
    }
}
