<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;

class Album
{
    /** @var string */
    public $name;

    /** @var string */
    public $released;

    /** @var int */
    public $tracks;

    /** @var Cover */
    public $cover;

    /**
     * Album constructor.
     * @param string $name
     * @param string $released
     * @param int $tracks
     * @param Cover $cover
     */
    public function __construct(string $name, string $released, int $tracks, Cover $cover){

        $this->name = $name;
        $this->released = $released;
        $this->tracks = $tracks;
        $this->cover = $cover;
    }

}
