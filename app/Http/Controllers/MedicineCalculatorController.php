<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineCalculatorController extends Controller
{
    public function index()
    {
        return view('medicine_calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric|min:1',
            'category' => 'required|string',
            'dose_per_kg' => 'required|numeric|min:0.1',
            'frequency' => 'required|integer|min:1',
            'duration' => 'required|integer|min:1',
            'route' => 'required|string',
            'dose_time' => 'required|string',
            'type' => 'required|string',
        ]);

        $weight = $request->input('weight');
        $dosePerKg = $request->input('dose_per_kg');
        $category = $request->input('category');
        $frequency = $request->input('frequency');
        $duration = $request->input('duration');
        $route = $request->input('route');
        $doseTime = $request->input('dose_time');
        $type = $request->input('type');

        $totalDailyDose = $weight * $dosePerKg * $frequency;
        $totalDose = $totalDailyDose * $duration;

        return view('medicine_calculator', [
            'totalDailyDose' => $totalDailyDose,
            'totalDose' => $totalDose,
            'weight' => $weight,
            'dosePerKg' => $dosePerKg,
            'frequency' => $frequency,
            'duration' => $duration,
            'category' => $category,
            'route' => $route,
            'doseTime' => $doseTime,
            'type' => $type,
        ]);
    }
}
