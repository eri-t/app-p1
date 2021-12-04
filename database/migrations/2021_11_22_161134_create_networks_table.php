<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });

        DB::table('networks')->insert([
            [
                'name' => 'facebook',
                'url' => 'facebook.com',
            ],
            [
                'name' => 'twitter',
                'url' => 'twitter.com',
            ],
            [
                'name' => 'github',
                'url' => 'github.com',
            ],
            [
                'name' => 'dribbble',
                'url' => 'dribbble.com',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('networks');
    }
}
