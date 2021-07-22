<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class AlbumsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function test_ok()
    {

        $this->json('GET', '/api/v1/albums?q=coldplay')
            ->assertStatus(JsonResponse::HTTP_OK);
    }

    /**
     * @test
     */
    public function test_validation()
    {

        $this->json('GET', '/api/v1/albums?q=')
            ->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->assertExactJson([
                "error" => [
                    "code" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    "message" => 'Los datos proporcionados no son válidos.',
                    "validations" => [
                        "q" => ["El nombre de la banda o artista es un parametro requerido"]
                    ],
                ]
            ]);
    }
}
