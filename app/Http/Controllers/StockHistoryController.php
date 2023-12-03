<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;

class StockHistoryController extends Controller
{
    public function getItemYearlysStatistic()
    {
        $monthlyData = [];
        for ($i = 0; $i < 12; $i++) {

            $data = StockHistory::whereMonth('created_at', $i + 1)->get();

            $totalIn = $data->where('transaction_type', 'insert')->sum('transaction_value');
            $totalOut = $data->where('transaction_type', 'retreive')->sum('transaction_value');

            $monthlyData[] = [
                'month' => $i + 1,
                'total_in' => $totalIn,
                'total_out' => $totalOut,
            ];
        }

        return $monthlyData;

    }

    public function getAllHistory()
    {
        $stockHistory = StockHistory::All();

        return $stockHistory;
    }
}
