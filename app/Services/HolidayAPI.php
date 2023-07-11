<?php

namespace App\Services;

use GuzzleHttp\Client;

class HolidayAPI
{
    protected $client;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'https://date.nager.at/api/v3/NextPublicHolidays/ID';
    }

    public function getHolidays($year)
    {
        $url = $this->apiUrl . '/' . $year;

        try {
            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return $data ?? [];
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat mengambil data dari API
            return [];
        }
    }
}
