<?php


namespace App\Services;


use GuzzleHttp\Client;

class CommunicatorService
{
    /**
     * @var string
     */
    public $token;

    public function authorize()
    {
        $client = new Client();
        $responseToken = $client->request('POST', 'https://accounts.spotify.com/api/token', [
                'form_params' => ["grant_type" => "client_credentials"],
                'headers' => ['Authorization' => 'Basic ' . base64_encode(env('SP_CLIENT_ID') . ':' . env('SP_CLIENT_SECRET'))]
            ]
        );
        $responseToken = json_decode($responseToken->getBody());

        $this->token = $responseToken->access_token;

        return $this->token;
    }

    public function getArtist($name)
    {
        $client = new Client;
        $response = $client->request(
            'GET', env('SP_URL_API') . '/v1/search?q=' . $name . '&type=artist',
            [
                'headers' => ['Authorization' => 'Bearer  ' . $this->token]
            ]
        );
        return json_decode($response->getBody());
    }

    public function getAlbum($artistId)
    {
        $client = new Client;
        $response = $client->request(
            'GET', env('SP_URL_API') . '/v1/artists/' . $artistId . '/albums',
            [
                'headers' => ['Authorization' => 'Bearer  ' . $this->token]
            ]
        );
        return json_decode($response->getBody());
    }
}
