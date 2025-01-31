<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    // Display the form
    public function index()
    {
        return view('plan.calculator');
    }

    // Handle BMI and BMR calculation
    public function calculate(Request $request)
    {
        $request->validate([
            'berat' => 'required|numeric|min:1',
            'tinggi' => 'required|numeric|min:1',
            'umur'   => 'required|integer|min:1',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ]);

        $berat = $request->input('berat');
        $tinggi = $request->input('tinggi');
        $umur = $request->input('umur');
        $gender = $request->input('gender');
        $tinggi_m = $tinggi / 100;

        // BMI Calculation
        $bmi = $berat / ($tinggi_m * $tinggi_m);

        if ($umur < 12) {
            $bbi = $gender === 'Laki-laki' ? $tinggi - 100 - (0.1 * ($tinggi - 100)) : $tinggi - 100 - (0.15 * ($tinggi - 100));
        } elseif ($umur >= 12 && $umur <= 24) {
            $bbi = $gender === 'Laki-laki' ? $tinggi - 100 - (0.1 * ($tinggi - 100)) : $tinggi - 100 - (0.15 * ($tinggi - 100));
        } elseif ($umur >= 25 && $umur <= 45) {
            $bbi = $gender === 'Laki-laki' ? $tinggi - 100 - (0.075 * ($tinggi - 100)) : $tinggi - 100 - (0.125 * ($tinggi - 100));
        } else {
            $bbi = $tinggi - 100 - (0.06 * ($tinggi - 100));
        }

        // BMI Category
        $kategori = $gender === 'Laki-laki' ?
            ($bmi < 18.5 ? 'Kurus' : ($bmi < 24.9 ? 'Normal' : ($bmi < 29.9 ? 'Overweight' : 'Obesitas'))) :
            ($bmi < 17 ? 'Kurus' : ($bmi < 24 ? 'Normal' : ($bmi < 27 ? 'Overweight' : 'Obesitas')));

        // BMR Calculation
        if ($gender === 'Laki-laki') {
            $bmr = 88.36 + (13.4 * $berat) + (4.8 * $tinggi) - (5.7 * $umur);
        } else {
            $bmr = 447.6 + (9.2 * $berat) + (3.1 * $tinggi) - (4.3 * $umur);
        }

        return view('plan.calculator', compact('bmi', 'bbi', 'kategori', 'bmr', 'gender', 'umur'));
    }

    public function makePlanning()
    {
        return view('plan.planning');
    }
}
