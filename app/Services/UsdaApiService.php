<?php

namespace App\Services;

use GuzzleHttp\Client;

class UsdaApiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.nal.usda.gov/fdc/v1/']);
        $this->apiKey = env('USDA_API_KEY');
    }

    public function searchFood($query)
    {
    $response = $this->client->request('GET', 'foods/search', [
        'query' => [
            'api_key' => $this->apiKey,
            'query' => $query,
            'pageSize' => 10, // Ambil maksimal 10 hasil
        ]
    ]);

    $data = json_decode($response->getBody()->getContents());

    $foods = collect($data->foods)->map(function ($food) {
        $kalori = "Tidak tersedia";
        $ingredients = "Tidak tersedia";

        // Ambil data kalori
        if (!empty($food->foodNutrients)) {
            foreach ($food->foodNutrients as $nutrient) {
                if (stripos($nutrient->nutrientName, "Energy") !== false) {
                    $kalori = $nutrient->value . " " . $nutrient->unitName;
                    break;
                }
            }
        }

        // Ambil ingredients sebagai teks langsung dari properti `ingredients`
        if (!empty($food->ingredients)) { // USDA API menyimpan teks bahan di sini
            $ingredients = $food->ingredients;
        }

        return [
            'nama' => $food->description,
            'kalori' => $kalori,
            'bahan' => $ingredients, // Langsung teks bahan-bahan
        ];
    });

    return $foods;
    }    
}
