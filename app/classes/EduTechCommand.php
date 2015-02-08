<?php namespace Classes;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EduTechCommand extends Command {

	protected $name = 'command:name';

	protected $description = 'Command description.';

	public function __construct()
	{
		parent::__construct();
	}

	public function fire()
	{
		//
	}

	protected function getArguments()
	{
		return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
