<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover
{
    use HasFactory;

    /** @var int */
    public $height;

    /** @var int */
    public $with;

    /** @var string */
    public $url;

    public  function __construct(int $height, int $with, string $url)
    {
        $this->height = $height;
        $this->with = $with;
        $this->url = $url;
    }
}
