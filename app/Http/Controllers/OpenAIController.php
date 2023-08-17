<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;




class OpenAIController extends Controller
{
    public function generateImage()
    {
        // Replace 'YOUR_OPENAI_API_KEY' with your actual OpenAI API key
        $apiKey = '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';

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $apiKey",
            ])->post('https://api.openai.com/v1/images/generations', [
                'prompt' => 'cidade capitalista',
                'n' => 2,
                'size' => '1024x1024',
            ]);

            $imageURLs = $response->json('data.*.url');

            return response()->json(['imageURLs' => $imageURLs]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao gerar a imagem'], 500);
        }


    }
}
