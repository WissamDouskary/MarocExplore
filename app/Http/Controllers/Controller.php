<?php

namespace App\Http\Controllers;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use HasApiTokens, AuthorizesRequests, ValidatesRequests;
}
