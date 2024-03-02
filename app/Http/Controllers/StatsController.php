<?php

namespace App\Http\Controllers;
use App\Models\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    //
    public function appStats(){

        $stats = new \stdClass();

        $stats->totalAlbums = Album::count();
        $stats->lastAddedAlbum = Album::latest()->first();
        
        return $stats;
    }
}
