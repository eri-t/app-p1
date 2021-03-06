<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Work;
use App\Models\Activity;
use App\Models\Project;
use App\Models\Responsibility;
use App\Models\Testimonial;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {      
        User::factory(5)->create()->each(
            function ($user) {
                $user->initialize();
            }
        );
        
        Skill::factory(40)->create();
        Education::factory(15)->create();
        Work::factory(15)->create();
        Activity::factory(30)->create();
        Project::factory(20)->create();
        Testimonial::factory(100)->create();
        Responsibility::factory(60)->create();
        Post::factory(30)->create();
    }
}
