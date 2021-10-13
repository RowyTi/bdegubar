<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Illuminate\Http\Request;

class BranchController extends JsonApiController
{
    public function index()
    {
        return $this->reply()->meta([
            'acceptedAt' => Carbon\Carbon::now(),
        ], 202);
    }
}
