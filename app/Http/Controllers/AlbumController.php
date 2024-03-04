<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AlbumController extends Controller
{
    private function getNameById($data, $id) {
        foreach ($data as $item) {

            if ($item[0]['id'] === $id) {

                return $item[0]['name'];
            }
        }

        return null;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->get();

        $client = new Client();

        $headers = [
            'Authorization' => 'Basic ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
        ];

        $endpoint = 'https://europe-west1-madesimplegroup-151616.cloudfunctions.net/artists-api-controller';

        $response = $client->request('GET', $endpoint, [
            'headers' => $headers
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        $albumsWithCustomField = $albums->map(function ($album) use ($data) {

            $album['artist_name'] = $this->getNameById($data['json'], $album['artist_id']);

            return $album;
        });

        return $albumsWithCustomField;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1900|max:'.(date('Y')),
            'artist_id' => 'required|integer',
        ]);

        // Create the resource
        $album = Album::create($validatedData);

        return response()->json($album, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Album::findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $album = Album::findOrFail($id);
        $album->update($request->all());
        return response()->json($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
    
        return response()->json(['message' => 'Album deleted successfully']);
    }
}
