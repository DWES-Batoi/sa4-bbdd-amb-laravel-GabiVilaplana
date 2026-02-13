<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LLMService
{
    public static function getResponse(string $prompt): string
    {
        try {
            $base = rtrim(config('services.llm.base_url'), '/');
            $model = config('services.llm.model');

            $res = Http::timeout(60)->post($base.'/api/generate', [
                'model' => $model,
                'prompt' => $prompt,
                'stream' => false,
                'options' => [
                    'num_predict' => 150, // Límite de palabras para que no tarde demasiado
                ],
            ]);

            if (!$res->successful()) {
                return '';
            }

            return $res->json('response') ?? '';
        } catch (\Throwable $e) {
            Log::error('LLM error: '.$e->getMessage());
            return '';
        }
    }
}