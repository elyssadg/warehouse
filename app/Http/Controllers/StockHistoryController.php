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

            $totalIn = $data
                ->where('transaction_type', 'insert')
                ->sum('transaction_value');
            $totalOut = $data
                ->where('transaction_type', 'retreive')
                ->sum('transaction_value');

            $monthlyData[] = [
                'month' => $i + 1,
                'total_in' => $totalIn,
                'total_out' => $totalOut,
            ];
        }

        return $monthlyData;
    }

    public function getTopWarehousesPerformanceAndTransactions()
    {
        $topWarehouses = $this->getTop5Warehouses();
        $result = [];

        foreach ($topWarehouses as $warehouse) {
            $warehouseId = $warehouse->warehouse_id;

            $monthlyData = [];
            $transactionPerMonth = 0;

            for ($i = 1; $i <= 12; $i++) {
                $data = StockHistory::whereMonth('created_at', $i)
                    ->where('warehouse_id', $warehouseId)
                    ->get();

                $totalTransactions = $data->count();

                $monthlyData[] = $totalTransactions;

                $transactionPerMonth += $totalTransactions;
            }

            $result[] = [
                'warehouseDetail' => $warehouse,
                'monthly_data' => $monthlyData,
                'transaction_per_year' => $transactionPerMonth

            ];
        }

        return $result;
    }

    public function getTop5Warehouses()
    {
        $topWarehouses = StockHistory::select('warehouse_id')
            ->selectRaw('COUNT(*) as appearance_count')
            ->groupBy('warehouse_id')
            ->orderByDesc('appearance_count')
            ->take(5)
            ->get();

        return $topWarehouses;
    }

    public function getAllHistory()
    {
        $stockHistory = StockHistory::All();

        return $stockHistory;
    }
}
