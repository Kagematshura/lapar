<?php

namespace App\Http\Controllers;
use App\Models\Planning;
use App\Models\BB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getWeeklyData()
    {
        $startOfWeek = Carbon::now('Asia/Jakarta')->startOfWeek();
        $endOfWeek = Carbon::now('Asia/Jakarta')->endOfWeek();
        
        $weekData = Planning::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at')
            ->get();
    
        return response()->json($weekData->map(function ($entry) {
            return [
                'date' => Carbon::parse($entry->created_at)->format('Y-m-d'),
                'nominal' => $entry->kcal_intake,
            ];
        }));
    }
    public function indexPlanning(){
        $planning = Planning::where('user_id', auth()->id())->get();
        $berat = BB::where('user_id', auth()->id())->get();

        return view('plan.planning', compact('planning', 'berat'));
    }

    public function storePlanning(Request $request) {    
        $request->validate([
            'kcal_intake' => 'required|numeric',
        ]);

        $planning = new Planning;
        $planning->kcal_intake = $request->kcal_intake;
        $planning->user_id = Auth::id();

        $planning->save();

    return redirect()->route('plan.planning')->with('success', 'Plans assigned.');
    }
    public function storeBB(Request $request) {    
        $request->validate([
            'body_weight' => 'required|numeric',
        ]);

        $bb = new BB;
        $bb->body_weight = $request->body_weight;
        $bb->user_id = Auth::id();

        $bb->save();

    return redirect()->route('plan.planning')->with('success', 'BB assigned.');
    }
}
