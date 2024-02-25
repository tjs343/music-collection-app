<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ArtistController extends Controller
{

    public function index()
    {
        $client = new Client();

        $headers = [
            'Authorization' => 'Basic ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
        ];

        $endpoint = 'https://europe-west1-madesimplegroup-151616.cloudfunctions.net/artists-api-controller';

        $response = $client->request('GET', $endpoint, [
            'headers' => $headers
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['json'];
    }

}
