<?php
	
	use Illuminate\Foundation\Inspiring;
	use Illuminate\Support\Facades\Artisan;
	use Illuminate\Support\Facades\Schedule;
	use App\Http\Controllers\ReportsController;
	
	Artisan::command('inspire', function () {
		$this->comment(Inspiring::quote());
	})->purpose('Display an inspiring quote')->hourly();
	
	Schedule::call(function () {
    $controller = new ReportsController();
    $controller->aggregateReports();
    echo "Reports Aggregation Completed!\n";
    
    })->daily();