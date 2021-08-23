<?php

namespace Database\Seeders;

use Bouncer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);

        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        
        $land_staff = Bouncer::role()->firstOrCreate([
            'name' => 'land_staff',
            'title' => 'Land Staff',
        ]);
        
        $project_staff = Bouncer::role()->firstOrCreate([
            'name' => 'project_staff',
            'title' => 'Project Staff',
        ]);
        
        Bouncer::allow($admin)->everything();
        Bouncer::allow($land_staff)->everything();
        Bouncer::allow($project_staff)->everything();

        Bouncer::assign('admin')->to($user);
    }
}
