<?php

class DatabaseSeeder extends Seeder {
    public function run()
    {
        /**
         * ****::Very first time you have to have run this query manually::****
         * INSERT INTO `user` (`id`, `username`, `password`, `email`, `role_id`, `department_id`, `join_date`, `last_visit`,
         * `ip_address`, `status`,  `verified_code`, `csrf_token`, `applicant_id`, `waiver_id`, `created_by`, `updated_by`,
         * `created_at`, `updated_at`) VALUES (1, 'admin', '$2y$10$mOBK0OXL5WpeXmjOSAqHJOJU.Xe5o8/4aHOBiP39McKhjBU4Zgv6G',
         * 'admin@admin.com', NULL, NULL, '2000-12-12', '2000-12-12 00:00:00', '192.168.1.1', 1, '9875656457890867869778',
         * 'fioyugpuiesiorgjhprauehrigpi', NULL, NULL, 1, 1, '2015-03-04 05:38:35', '2015-03-04 05:38:35')
         *          *
         * It needs to maintain the dependency to other table. Non dependent table seed must be before dependant table.
         */
        $credentials = array(
            'username'=> 'admin',
            'password'=>'admin'
        );

        if(!Auth::user()->check($credentials)){
            if (Auth::user()->attempt($credentials)) {
                $this->command->info('Logged!!!!!!!!!!');
            } else {
                $this->command->info('Admin user is not logged in. Please insert admin user manually by running query at phpmyadmin.');
                $this->command->info('Insert query is given at comments section in app/database/seeder.DatabaseSeeder.php file.');
                $this->command->info('It\'s Exiting for now.......');
                exit(0);
            }
        }

        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded!');

        $this->call('DepartmentTable');
        $this->command->info('Department table seeded!');

        $this->call('UserTable');
        $this->command->info('User table seeded!');

        $this->call('WaiverTable');
        $this->command->info('Waiver table seeded!');

        $this->call('YearTable');
        $this->command->info('Year table seeded!');

        $this->call('SemesterTable');
        $this->command->info('Semester table seeded!');

        $this->call('CourseTypeTable');
        $this->command->info('Course Type table seeded!');

        $this->call('SubjectTable');
        $this->command->info('Subject table seeded!');

        $this->call('CourseTable');
        $this->command->info('Course table seeded!');

        $this->call('ApplicantsSeeder');
        $this->command->info('Applicant table seeded!');

        $this->call('AcmMarksDistItemTable');
        $this->command->info('Academic Marks Distribution Item table seeded!');

        $this->call('DegreeProgramTable');
        $this->command->info('Degree Program table seeded!');

        $this->call('BillingItemTable');
        $this->command->info('Billing Item table seeded!');

        $this->call('BillingScheduleTable');
        $this->command->info('Billing Schedule table seeded!');

        $this->call('ClassTimeTable');
        $this->command->info('Class Time table seeded!');

        $this->call('ClassRoomTable');
        $this->command->info('Class Room table seeded!');
	}

}



