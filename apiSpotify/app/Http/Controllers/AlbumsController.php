<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Cover;
use App\Services\CommunicatorService;
use Illuminate\Http\JsonResponse;

class AlbumsController extends Controller
{
    /**
     * @param AlbumRequest $request
     * @param CommunicatorService $communicatorService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAlbums(AlbumRequest $request, CommunicatorService $communicatorService)
    {
        try {
            $communicatorService->authorize();

            $bandName = $request->get('q');

            $artist = $communicatorService->getArtist($bandName);
            $albumsCollection = collect();

            foreach ($artist->artists->items as $itemA) {
                $albums = $communicatorService->getAlbum($itemA->id);
                foreach ($albums->items as $item) {
                    $albumsCollection->add(new Album(
                        $item->name,
                        date('d-m-Y', strtotime($item->release_date)),
                        $item->total_tracks,
                        new Cover(
                            $item->images[0]->height,
                            $item->images[0]->width,
                            $item->images[0]->url)
                    ));
                }
            }

            return response()->json($albumsCollection, 200);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "error" => [
                        "code" => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                        "message" => "Error al procesar su petición",
                        "exception" => $exception->getMessage()
                    ]
                ], 500);
        }

    }


}
