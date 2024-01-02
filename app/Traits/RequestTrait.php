<?php 

namespace App\Traits;

use Exception;
use GuzzleHttp\Client;

trait RequestTrait {
    
    //For emitting Socket IO Messages
    public function sendSocketIONotification($channel, $message) {
        try {
            $endpoint = 'http://127.0.0.1:8000/broadcast';
            $endpoint .= '?channel='.$channel.'&message='.$message;
            $headers = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];
            $client = new Client();
            $response = $client->request('GET', $endpoint, ['headers' => $headers]);
            return [
                'statusCode' => $response->getStatusCode(),
                'body' => json_decode($response->getBody(), true),
            ];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}