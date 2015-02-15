<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded!');

        $this->call('DepartmentTable');
        $this->command->info('Department table seeded!');

        $this->call('WaiverTable');
        $this->command->info('Waiver table seeded!');

        $this->call('UserTable');
        $this->command->info('User table seeded!');

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
	}

}



