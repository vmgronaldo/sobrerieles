<?php

namespace App\Abstracts\Http;

use App\Traits\Jobs;
use App\Traits\Relationships;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


abstract class Controller extends BaseController
{
    use AuthorizesRequests, Jobs, ValidatesRequests;
}
