<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use App\Models\Report;
	use App\Models\Booking;
	
	class ReportsController extends Controller
	{
		/**
			* Aggregate the reports data and save to the database.
		*/
	public function aggregateReports()
{
    echo "Aggregation started\n";

    try {
        // Aggregate data by accommodation
        $aggregatedByAccommodation = DB::table('bookings')
            ->select(
                'accommodation',
                DB::raw('SUM(foreigners) as total_foreigners'),
                DB::raw('SUM(filipinos) as total_filipinos'),
                DB::raw('SUM(maubanins) as total_maubanins'),
                DB::raw('SUM(totalmale) as total_male'),
                DB::raw('SUM(totalfemale) as total_female'),
                DB::raw('SUM(totalvisitors) as total_visitors'),
                DB::raw('SUM(specialneeds) as total_specialneeds'),
                DB::raw('SUM(zeroto7yold) as total_zero_to_7'),
                DB::raw('SUM(thirteento50yold) as total_13_to_50'),
                DB::raw('SUM(above60yold) as total_above_60'),
                DB::raw('SUM(amount) as total_amount'),
                DB::raw('SUM(discount) as total_discount'),
                DB::raw('SUM(namount) as total_namount'),
                DB::raw('SUM(travelmeans) as total_travelmeans'),
                DB::raw('SUM(parking) as total_parking'),
                DB::raw('SUM(boating) as total_boating'),
                DB::raw('COUNT(*) as total_bookings')  // Use COUNT(*) to count the total bookings
            )
            ->groupBy('accommodation')
            ->get();

        echo "Aggregated by accommodation: \n";
        print_r($aggregatedByAccommodation);

        // Save the aggregated data for accommodation
        foreach ($aggregatedByAccommodation as $aggAcc) {
            try {
                // Log data before saving
                echo "Saving report for accommodation: {$aggAcc->accommodation}\n";

                Report::create([
                    'report_date' => now(),
                    'report_type' => $aggAcc->accommodation,
                    'accommodation' => $aggAcc->accommodation, 
                    'total_foreigners' => $aggAcc->total_foreigners,
                    'total_filipinos' => $aggAcc->total_filipinos,
                    'total_maubanins' => $aggAcc->total_maubanins,
                    'total_male' => $aggAcc->total_male,
                    'total_female' => $aggAcc->total_female,
                    'total_visitors' => $aggAcc->total_visitors,
                    'total_specialneeds' => $aggAcc->total_specialneeds,
                    'total_zero_to_7' => $aggAcc->total_zero_to_7,
                    'total_13_to_50' => $aggAcc->total_13_to_50,
                    'total_above_60' => $aggAcc->total_above_60,
                    'total_amount' => $aggAcc->total_amount,
                    'total_discount' => $aggAcc->total_discount,
                    'total_namount' => $aggAcc->total_namount,
                    'total_travelmeans' => $aggAcc->total_travelmeans,
                    'total_parking' => $aggAcc->total_parking,
                    'total_boating' => $aggAcc->total_boating,
                    'total_bookings' => $aggAcc->total_bookings,
                ]);
            } catch (\Exception $e) {
                echo "Error saving report for accommodation {$aggAcc->accommodation}: " . $e->getMessage() . "\n";
            }
        }

        // Aggregate data by arrival date
        $aggregatedByDate = DB::table('bookings')
            ->select(
                'arrival',
                DB::raw('SUM(foreigners) as total_foreigners'),
                DB::raw('SUM(filipinos) as total_filipinos'),
                DB::raw('SUM(maubanins) as total_maubanins'),
                DB::raw('SUM(totalmale) as total_male'),
                DB::raw('SUM(totalfemale) as total_female'),
                DB::raw('SUM(totalvisitors) as total_visitors'),
                DB::raw('SUM(specialneeds) as total_specialneeds'),
                DB::raw('SUM(zeroto7yold) as total_zero_to_7'),
                DB::raw('SUM(thirteento50yold) as total_13_to_50'),
                DB::raw('SUM(above60yold) as total_above_60'),
                DB::raw('SUM(amount) as total_amount'),
                DB::raw('SUM(discount) as total_discount'),
                DB::raw('SUM(namount) as total_namount'),
                DB::raw('SUM(travelmeans) as total_travelmeans'),
                DB::raw('SUM(parking) as total_parking'),
                DB::raw('SUM(boating) as total_boating'),
                DB::raw('COUNT(*) as total_bookings')  // Use COUNT(*) to count the total bookings
            )
            ->groupBy('arrival')
            ->get();

        echo "Aggregated by arrival: \n";
        print_r($aggregatedByDate);

        // Save the aggregated data for arrival dates
        foreach ($aggregatedByDate as $aggDate) {
            try {
                echo "Saving report for arrival date: {$aggDate->arrival}\n";

                Report::create([
                    'report_date' => $aggDate->arrival,
                    'report_type' => 'daily',
                    'total_foreigners' => $aggDate->total_foreigners,
                    'total_filipinos' => $aggDate->total_filipinos,
                    'total_maubanins' => $aggDate->total_maubanins,
                    'total_male' => $aggDate->total_male,
                    'total_female' => $aggDate->total_female,
                    'total_visitors' => $aggDate->total_visitors,
                    'total_specialneeds' => $aggDate->total_specialneeds,
                    'total_zero_to_7' => $aggDate->total_zero_to_7,
                    'total_13_to_50' => $aggDate->total_13_to_50,
                    'total_above_60' => $aggDate->total_above_60,
                    'total_amount' => $aggDate->total_amount,
                    'total_discount' => $aggDate->total_discount,
                    'total_namount' => $aggDate->total_namount,
                    'total_travelmeans' => $aggDate->total_travelmeans,
                    'total_parking' => $aggDate->total_parking,
                    'total_boating' => $aggDate->total_boating,
                    'total_bookings' => $aggDate->total_bookings,
                ]);
            } catch (\Exception $e) {
                echo "Error saving report for arrival date {$aggDate->arrival}: " . $e->getMessage() . "\n";
            }
        }

        // Aggregate data by status
        foreach ($aggregatedByStatus as $aggStatus) {
            try {
                echo "Saving status report for status: {$aggStatus->status}\n";

                Report::create([
                    'report_date' => now(),
                    'report_type' => 'status',
                    'status' => $aggStatus->status,
                    'total_bookings' => $aggStatus->count,
                    'total_amount' => 0.00,
                    'total_discount' => 0.00,
                    'total_namount' => 0.00,
                    'total_travelmeans' => 0,
                    'total_parking' => 0,
                    'total_boating' => 0,
                    'total_foreigners' => 0,
                    'total_filipinos' => 0,
                    'total_maubanins' => 0,
                    'total_male' => 0,
                    'total_female' => 0,
                    'total_visitors' => 0,
                    'total_specialneeds' => 0,
                    'total_zero_to_7' => 0,
                    'total_13_to_50' => 0,
                    'total_above_60' => 0,
                ]);
            } catch (\Exception $e) {
                echo "Error saving status report for status {$aggStatus->status}: " . $e->getMessage() . "\n";
            }
        }

        echo "Aggregation completed\n";

        return response()->json([
            'message' => 'Reports successfully aggregated and saved.',
        ]);
    } catch (\Exception $e) {
        echo "Error during aggregation: " . $e->getMessage() . "\n";
        return response()->json([
            'message' => 'Error during aggregation.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

		
	}
