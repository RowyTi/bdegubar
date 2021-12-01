<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;

class StateController extends Controller
{

    public function tableState(Table $table, Request $request){
                      // "data" => [
                //     "type"  => "tables",
                //     "id"    => $table->getRouteKey(),
                //     "attributes" => [
                //         "name"  => $table->name,
                //         "qr"    => $table->qr,
                //         "state" => $table->state,
                //         "branch_id"=> $table->branch_id
                //     ],
                // ]
        // $mesa = Table::whre('slug', $id)->findOrFail();
        // dd($table);
        
        try {
            $data = $request->json('data');
            $table->update([
                "state" => $data['state']
            ]);
            $table->save();
            return response()->json([
                 "message" => "Estado Actualizado"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" =>  "Ocurrión un error al actualizar."
           ]);
        }
       
    }
}
