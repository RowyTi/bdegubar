<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class StateController extends Controller
{
    /**
     * @param Table $table
     * @param Request $request
     * @return JsonResponse
     */
    public function tableState(Table $table, Request $request): JsonResponse
    {
//        dd($request->user('sanctum'));
        if ($request->user('sanctum')->cannot('update', $table)) {
            abort(403);
        }
        try {
            $table->update([
                "state" => $request->state
            ]);
            $table->save();
            return response()->json([
                 "message" => "Estado Actualizado"
            ]);
        } catch (Throwable $th) {
//            dd($th);
            return response()->json([
                "message" =>  "Ocurrió un error al actualizar."
           ], 500);
        }
    }

    public function orderState(Order $order, Request $request): JsonResponse
    {
//        dd($request->user('sanctum'));
//        if ($request->user('sanctum')->cannot('update', $order)) {
//            abort(403);
//        }
        try {
            $order->update([
                "state" => $request->state
            ]);
            $order->save();
            return response()->json([
                "message" => "Estado Actualizado"
            ]);
        } catch (Throwable $th) {
//            dd($th);
            return response()->json([
                "message" =>  "Ocurrió un error al actualizar."
            ], 500);
        }
    }
}
