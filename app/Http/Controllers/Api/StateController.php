<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * @param Table $table
     * @param $record
     * @return string
     */
    public function tableState(Table $table, $record){
        return 'testing';
    }
}
