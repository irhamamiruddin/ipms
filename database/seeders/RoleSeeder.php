<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Bouncer;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::role()->firstOrCreate([ 'name' => 'superadmin', 'title' => 'Super Administrator', ]);
    	Bouncer::role()->firstOrCreate([ 'name' => 'manager', 'title' => 'Manager', ]);
    	Bouncer::role()->firstOrCreate([ 'name' => 'project_officer', 'title' => 'Project Officer', ]);
    	Bouncer::role()->firstOrCreate([ 'name' => 'land_officer', 'title' => 'Land Officer', ]);
        Bouncer::role()->firstOrCreate([ 'name' => 'consultant_partner', 'title' => 'Consultant Partner', ]);
    	Bouncer::role()->firstOrCreate([ 'name' => 'beneficiary_partner', 'title' => 'Beneficiary Partner', ]);
        
        // Bouncer::allow('superadmin')->to('report-system_log');
        // Bouncer::allow('superadmin')->to('setting-user');
        Bouncer::allow('superadmin')->everything();

        Bouncer::allow('manager')->to('company-export');
        Bouncer::allow('manager')->to('contact-export');
        Bouncer::allow('manager')->to('land-export');
        Bouncer::allow('manager')->to('project-export');
        Bouncer::allow('manager')->to('report-land_log_export');
        Bouncer::allow('manager')->to('report-project_log_export');
        Bouncer::allow('manager')->to('report-land_ownerships_export');
        Bouncer::allow('manager')->to('user-update');
        Bouncer::allow('manager')->to('contact-index');
        Bouncer::allow('manager')->to('contact-create');
        Bouncer::allow('manager')->to('contact-edit');
        Bouncer::allow('manager')->to('contact-destroy');
        Bouncer::allow('manager')->to('company-index');
        Bouncer::allow('manager')->to('company-create');
        Bouncer::allow('manager')->to('company-edit');
        Bouncer::allow('manager')->to('company-destroy');
        Bouncer::allow('manager')->to('land-index');
        Bouncer::allow('manager')->to('land-create');
        Bouncer::allow('manager')->to('land-edit');
        Bouncer::allow('manager')->to('land-destroy');
        Bouncer::allow('manager')->to('land-download');
        Bouncer::allow('manager')->to('project-index');
        Bouncer::allow('manager')->to('project-create');
        Bouncer::allow('manager')->to('project-edit');
        Bouncer::allow('manager')->to('project-destroy');
        Bouncer::allow('manager')->to('report-land_log');
        Bouncer::allow('manager')->to('report-project_log');
        Bouncer::allow('manager')->to('report-land_ownerships');
        Bouncer::allow('manager')->to('report-system_log');
        Bouncer::allow('manager')->to('library');
        Bouncer::allow('manager')->to('setting-development');
        Bouncer::allow('manager')->to('setting-log');
        Bouncer::allow('manager')->to('setting-other');
        Bouncer::allow('manager')->to('assign-oic');
        Bouncer::allow('manager')->to('add-beneficiary');

        Bouncer::allow('project_officer')->to('user-update');
        Bouncer::allow('project_officer')->to('contact-index');
        Bouncer::allow('project_officer')->to('contact-create');
        Bouncer::allow('project_officer')->to('contact-edit');
        Bouncer::allow('project_officer')->to('contact-destroy');
        Bouncer::allow('project_officer')->to('company-index');
        Bouncer::allow('project_officer')->to('company-create');
        Bouncer::allow('project_officer')->to('company-edit');
        Bouncer::allow('project_officer')->to('company-destroy');
        Bouncer::allow('project_officer')->to('land-index');
        Bouncer::allow('project_officer')->to('land-create');
        Bouncer::allow('project_officer')->to('land-edit');
        Bouncer::allow('project_officer')->to('land-destroy');
        Bouncer::allow('project_officer')->to('land-download');
        Bouncer::allow('project_officer')->to('project-index');
        Bouncer::allow('project_officer')->to('project-create');
        Bouncer::allow('project_officer')->to('project-edit');
        Bouncer::allow('project_officer')->to('project-destroy');
        Bouncer::allow('project_officer')->to('report-land_log');
        Bouncer::allow('project_officer')->to('report-project_log');
        Bouncer::allow('project_officer')->to('library');
        Bouncer::allow('project_officer')->to('setting-development');
        Bouncer::allow('project_officer')->to('setting-log');
        Bouncer::allow('project_officer')->to('setting-other');

        Bouncer::allow('land_officer')->to('user-update');
        Bouncer::allow('land_officer')->to('contact-index');
        Bouncer::allow('land_officer')->to('contact-create');
        Bouncer::allow('land_officer')->to('contact-edit');
        Bouncer::allow('land_officer')->to('contact-destroy');
        Bouncer::allow('land_officer')->to('company-index');
        Bouncer::allow('land_officer')->to('company-create');
        Bouncer::allow('land_officer')->to('company-edit');
        Bouncer::allow('land_officer')->to('company-destroy');
        Bouncer::allow('land_officer')->to('land-index');
        Bouncer::allow('land_officer')->to('land-create');
        Bouncer::allow('land_officer')->to('land-edit');
        Bouncer::allow('land_officer')->to('land-destroy');
        Bouncer::allow('land_officer')->to('land-download');
        Bouncer::allow('land_officer')->to('report-land_log');
        Bouncer::allow('land_officer')->to('library');
        Bouncer::allow('land_officer')->to('setting-development');
        Bouncer::allow('land_officer')->to('setting-log');
        Bouncer::allow('land_officer')->to('setting-other');

        Bouncer::allow('consultant_partner')->to('user-update');
        Bouncer::allow('consultant_partner')->to('project-index');

        Bouncer::allow('beneficiary_partner')->to('user-update');
        Bouncer::allow('beneficiary_partner')->to('land-index');
        Bouncer::allow('beneficiary_partner')->to('project-index');
    }
}