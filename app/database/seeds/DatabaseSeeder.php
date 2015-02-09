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


	}

}



