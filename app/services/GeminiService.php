<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function getSuggestions($depenses, $depensesRecurrentes, $budget)
{
    $prompt = "J'ai un budget mensuel de {$budget} MAD. 
               Voici mes dépenses ponctuelles : " . json_encode($depenses) . ". 
               Et voici mes dépenses récurrentes : " . json_encode($depensesRecurrentes) . ". 
               Donne-moi 3 conseils concrets pour réduire mes dépenses inutiles et optimiser ma gestion financière ,donne des avis quoi ne pas acheter la prochaine fois , et tout ca , pour optimiser
                , tout ca dans 5  à 6 lignes, et en anglais.";

    try {
        $response = $this->client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $this->apiKey, [
            'json' => [
                'contents' => [
                    ['parts' => [['text' => $prompt]]],
                ],
            ],
            'headers' => ['Content-Type' => 'application/json'],
            'verify' => false, 
        ]);
        
        
        Log::info('Gemini API Response:', ['response' => $response->getBody()->getContents()]);

        $data = json_decode($response->getBody(), true);

       
        return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Pas de suggestion disponible.';
    } catch (\Exception $e) {
        // Log the error message for debugging
        Log::error('Error Gemini API : ' . $e->getMessage());
        return 'Error generating insights';
    }
}

}