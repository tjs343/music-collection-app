<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // JB
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2015',
            'title' => 'Purpose',
            'artist_id' => 1,
        ]);
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2012',
            'title' => 'Believe',
            'artist_id' => 1,
        ]);
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2011',
            'title' => 'Under the Mistletoe',
            'artist_id' => 1,
        ]);
        // Taytay
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2014',
            'title' => '1989',
            'artist_id' => 4,
        ]);
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2012',
            'title' => 'Red',
            'artist_id' => 4,
        ]);
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2020',
            'title' => 'folklore',
            'artist_id' => 4,
        ]);
        // Britney
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2007',
            'title' => 'Blackout',
            'artist_id' => 9,
        ]);
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2011',
            'title' => 'Femme Fatale',
            'artist_id' => 9,
        ]);
        // JT
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2002',
            'title' => 'Justified',
            'artist_id' => 7,
        ]);
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2006',
            'title' => 'FutureSex/LoveSounds',
            'artist_id' => 7,
        ]);
        // Lil Wayne
        DB::table('albums')->insert([
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'release_year' => '2008',
            'title' => 'The Carter III',
            'artist_id' => 19,
        ]);
    }
}
