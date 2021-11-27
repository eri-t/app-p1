<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('image')->nullable();
            $table->string('job_title')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->text('excerpt')->nullable();

            $table->string('facebook_slug')->nullable();
            $table->string('twitter_slug')->nullable();
            $table->string('github_slug')->nullable();
            $table->string('dribble_slug')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
