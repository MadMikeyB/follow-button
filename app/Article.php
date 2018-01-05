<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use JamesMills\Watchable\Traits\Watchable;

class Article extends Model
{
    use Watchable;

    public $guarded = [];
}
