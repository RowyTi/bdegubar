<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dashboardReport($request){
//        dd($request);
       $ordenes = Order::where('branch_id', $request)
            ->where('state', 'entregado')
            ->get()->toArray();
       $cantidad = count($ordenes);
       $total=0;
       for($i=0; $i< $cantidad; $i++){
            $total += $ordenes[$i]['total'];
       }
       $mesas_ocupadas = Table::where('branch_id', $request)
                        ->where('state', 'ocupado')->count();
        $mesas_libres = Table::where('branch_id', $request)
        ->where('state', 'libre')->count();

        return response()->json([
            'total' => $total,
            'ordenes' => $cantidad,
            'mesal' => $mesas_libres,
            'mesao' => $mesas_ocupadas
        ]);
    }
}
