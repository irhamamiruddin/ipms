<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_r1 = [
            ['type_r1' => 'Super Low Cost'],
            ['type_r1' => 'Low Cost'],
        ];

        $type_r2 = [
            ['type_r2' => 'Medium Cost'],
            ['type_r2' => 'Medium High Cost'],
        ];

        $type_r3 = [
            ['type_r3' => 'High Cost'],
            ['type_r3' => 'Super High Cost'],
        ];

        $type_a1 = [
            ['type_a1' => 'Pool'],
            ['type_a1' => 'Gym'],
        ];

        $type_c1 = [
            ['type_c1' => 'Store'],
            ['type_c1' => 'Mart'],
        ];

        $type_o1 = [
            ['type_o1' => 'Bus'],
            ['type_o1' => 'Car'],
        ];

        $log_natures = [
            ['nature' => 'Approval'],
            ['nature' => 'Submission'],
        ];

        $level_1 = [
            ['level_1' => 'Map'],
            ['level_1' => 'Plan'],
        ];

        $level_2 = [
            ['level_2' => 'Test Map', 'level_1' => 'Map'],
            ['level_2' => 'Test Plan', 'level_1' => 'Plan'],
        ];

        $level_3 = [
            ['level_3' => 'Google Map', 'level_2' => 'Test Map'],
            ['level_3' => 'Plan A', 'level_2' => 'Test Plan'],
        ];

        $business_natures = [
            ['type' => 'Subsidiary'],
            ['type' => 'Business'],
        ];

        $categories_of_land = [
            ['category' => 'Big'],
            ['category' => 'Small'],
        ];

        $consent = [
            ['consent' => 'Yes'],
            ['consent' => 'No'],
        ];

        $consultant_roles = [
            ['type' => 'Partner'],
            ['type' => 'Beneficiary'],
        ];

        $land_acquisition_status = [
            ['status' => 'Approved'],
            ['status' => 'Rejected'],
        ];

        $land_classifications = [
            ['classification' => 'Large'],
            ['classification' => 'Medium'],
        ];

        $library_types = [
            ['type' => 'Tiny'],
            ['type' => 'Normal'],
        ];

        $project_status = [
            ['project_status' => 'Ongoing'],
            ['project_status' => 'Done'],
        ];

        $registered_proprietor_natures = [
            ['nature' => 'Agree'],
            ['nature' => 'Disagree'],
        ];

        DB::table('residential_type_r1')->insert($type_r1);
        DB::table('residential_type_r2')->insert($type_r2);
        DB::table('residential_type_r3')->insert($type_r3);
        DB::table('amenities_type_a1')->insert($type_a1);
        DB::table('commercial_type_c1')->insert($type_c1);
        DB::table('others_type_o1')->insert($type_o1);

        DB::table('log_natures')->insert($log_natures);
        DB::table('log_level_1')->insert($level_1);
        DB::table('log_level_2')->insert($level_2);
        DB::table('log_level_3')->insert($level_3);

        DB::table('business_natures')->insert($business_natures);
        DB::table('categories_of_land')->insert($categories_of_land);
        DB::table('consents')->insert($consent);
        DB::table('consultant_roles')->insert($consultant_roles);
        DB::table('land_acquisition_status')->insert($land_acquisition_status);
        DB::table('land_classifications')->insert($land_classifications);
        DB::table('library_types')->insert($library_types);
        DB::table('project_status_tb')->insert($project_status);
        DB::table('registered_proprietor_natures')->insert($registered_proprietor_natures);
    }
}
