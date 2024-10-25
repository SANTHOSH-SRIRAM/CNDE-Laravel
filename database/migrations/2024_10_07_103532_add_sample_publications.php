<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class AddSamplePublications extends Migration
{
    public function up()
    {
        DB::table('publications')->insert([
            ['title' => 'Sample Publication 1', 'citation_count' => 5, 'publication_year' => 2021],
            ['title' => 'Sample Publication 2', 'citation_count' => 10, 'publication_year' => 2020],
        ]);
    }

    public function down()
    {
        DB::table('publications')->where('title', 'Sample Publication 1')->delete();
        DB::table('publications')->where('title', 'Sample Publication 2')->delete();
    }
}

