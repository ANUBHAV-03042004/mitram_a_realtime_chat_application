<?php
// app/Services/SimpleGemini.php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class SimpleGemini
{
    private $apiKey;
    private $baseUrl = 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent';

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function chat($message)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $message
                            ]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return [
                    'success' => true,
                    'response' => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'No response'
                ];
            }

            return [
                'success' => false,
                'error' => $response->json()['error']['message'] ?? 'API Error'
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
