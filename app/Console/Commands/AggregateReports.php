<?php
	
	namespace App\Console\Commands;
	
	use Illuminate\Console\Command;
	
	class AggregateReports extends Command
	{
		/**
			* The name and signature of the console command.
			*
			* @var string
		*/
		protected $signature = 'app:aggregate-reports';
		
		/**
			* The console command description.
			*
			* @var string
		*/
		protected $description = 'Aggregate reports and save them to the database.';
		
		public function __construct()
		{
			parent::__construct();
		}
		
		/**
			* Execute the console command.
		*/
		// Execute the console command
		public function handle()
		{
			$controller = new ReportsController();
			$controller->aggregateReports();
			
			$this->info('Reports successfully aggregated!');
		}
	}
