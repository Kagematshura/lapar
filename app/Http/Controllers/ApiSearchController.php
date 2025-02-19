<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsdaApiService;

class ApiSearchController extends Controller
{
    protected $usdaApiService;

    public function __construct(UsdaApiService $usdaApiService)
    {
        $this->usdaApiService = $usdaApiService;
    }

    public function searchFood(Request $request)
    {
    $query = $request->input('query');
    $foods = $this->usdaApiService->searchFood($query);

    return view('API.search', compact('foods', 'query'));
    }
    public function Search(){
        return view("API.search");
    }
}
