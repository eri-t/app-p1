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
            $table->string('email')->unique();
            $table->string('slug')->unique()->nullable();
            
            // Home Section
            $table->string('image')->nullable();
            $table->string('job_title')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('introduction')->nullable();
            
            // About Section
            $table->string('about_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('about_subtitle')->nullable();
            $table->string('about_img')->nullable();

            // Skills Section
            $table->string('skills_title_1')->nullable();
            $table->string('skills_title_2')->nullable();

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
