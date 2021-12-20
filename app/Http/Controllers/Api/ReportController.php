<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dashboardReport($request){

       $ordenes = Order::where('branch_id', $request)
            ->where('state', 'entregado')
            ->get()->toArray();
       $cantidad = count($ordenes);
       $total=0;
       for($i=0; $i< $cantidad; $i++){
            $total += $ordenes[$i]['total'];
       }
       $rating = obtenerRating($request);

        return response()->json([
            'total' => $total,
            'ordenes' => $cantidad,
            'rating'=> $rating
        ]);
    }
}
