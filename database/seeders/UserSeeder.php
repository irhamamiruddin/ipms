<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Bouncer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => 'admin@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);

        $manager = DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);
        
        $project_officer = DB::table('users')->insert([
            'name' => 'Project Officer',
            'email' => 'po@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);

        $land_officer = DB::table('users')->insert([
            'name' => 'Land Officer',
            'email' => 'lo@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);

        $consultant_partner = DB::table('users')->insert([
            'name' => 'Consultant Partner',
            'email' => 'cp@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);

        $beneficiary_partner = DB::table('users')->insert([
            'name' => 'Beneficiary Partner',
            'email' => 'bp@ipms.com',
            'password' => '$2y$10$xZJ1fNLbeOoyijlPXPxxeu.Q0WpSpwn6Qidp6JVhElV/3Uws6chlq',
        ]);

        Bouncer::assign('superadmin')->to(1);
        Bouncer::assign('manager')->to(2);
        Bouncer::assign('project_officer')->to(3);
        Bouncer::assign('land_officer')->to(4);
        Bouncer::assign('consultant_partner')->to(5);
        Bouncer::assign('beneficiary_partner')->to(6);
    }
}
