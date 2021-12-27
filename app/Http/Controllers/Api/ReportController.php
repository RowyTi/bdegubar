<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dashboardReport($request){

        $fecha_actual = Carbon::parse(now());
        $mes_actual = $fecha_actual->format('n');
        $mes_anterior = $mes_actual - 1;
        $ordenes_totales = obtenerOrdenesTotales($request);

        // obtener variacion de crecimiento de ordenes concretadas respecto mes actual y el anterior
        $ordenes_actual = obtenerOrdenesMensuales($request, $mes_actual);
        $ordenes_anterior = obtenerOrdenesMensuales($request, $mes_anterior);
        if ($ordenes_anterior > 0) {
            $variacion_ordenes = ($ordenes_actual - $ordenes_anterior)/$ordenes_anterior;
        }else{
            $variacion_ordenes = 0;
        }
 

        // obtener variacion de crecimiento de ventas respecto mes actual y el anterior
        $ventas_actual = obtenerVentasTotalesMensuales($request, $mes_actual);
        $ventas_anterior = obtenerVentasTotalesMensuales($request, $mes_anterior);
        if ($ventas_anterior > 0) {
            $variacion_ventas = ($ventas_actual - $ventas_anterior)/$ventas_anterior;
        }else{
            $variacion_ventas = 0;
        }

        $ordenes = Order::where('branch_id', $request)
            ->where('state', 'entregado')
            ->get()->toArray();
        $total=0;
        for($i=0; $i< $ordenes_totales; $i++){
            $total += $ordenes[$i]['total'];
        }
        $rating = obtenerRating($request);
        return response()->json([
            'ventas_anuales' => $total,
            'ventas' => $ventas_actual,
            'variacion_ventas' => round($variacion_ventas,3),
            'ordenes' => $ordenes_actual,
            'variacion_ordenes' => round( $variacion_ordenes,3),
            'rating'=> $rating
        ]);
    }

    public function ordersMonths($request){
        $entregados= [];
        $anulados=[];
        for($i=1; $i < 13 ; $i++){
            array_push($entregados, obtenerOrdenesMensuales($request, $i)) ;
        }
        for($i=1; $i < 13 ; $i++){
            array_push($anulados, obtenerOrdenesAnuladas($request, $i)) ;
        }
        return response()->json([
            "labels" => [
                '2021-01',
                '2021-02',
                '2021-03',
                '2021-04',
                '2021-05',
                '2021-06',
                '2021-07',
                '2021-08',
                '2021-09',
                '2021-10',
                '2021-11',
                '2021-12',
            ],
            "datasets"=> [
                [
                    "label"=> 'Ordenes completadas',
                    "data" => $entregados,
                    "borderColor"=> 'rgba(75,181,67, 1)',
                    "backgroundColor" => 'rgba(75,181,67, .5)',
                    "borderWidth" => 2
                ],
                [
                    "label"=> 'Ordenes Anuladas',
                    "data" => $anulados,
                    "borderColor"=> '#EF5350',
                    "backgroundColor" => '#EF5350',
                    "borderWidth" => 2
                ]
            ],
        ]);
    }

    public function salesMonths($request){
        $meses = [];
        for($i=1; $i < 13 ; $i++){
            array_push($meses, obtenerVentasTotalesMensuales($request, $i)) ;
        }
        return response()->json([
            "labels" => [
                '2021-01',
                '2021-02',
                '2021-03',
                '2021-04',
                '2021-05',
                '2021-06',
                '2021-07',
                '2021-08',
                '2021-09',
                '2021-10',
                '2021-11',
                '2021-12',
            ],
            "datasets"=> [
                [
                    "label"=> 'Ventas mensuales',
                    "data" => $meses,
                    "borderColor"=> 'rgba(75,181,67, 1)',
                    "backgroundColor" => 'rgba(75,181,67, .5)',
                    "borderWidth" => 2
                ]
            ],
        ]);
    }

    public function paymentMethod($request){
        $mp = obtenerMethod($request, 1);
        $efectivo = obtenerMethod($request, 2);

        return response()->json([
            "labels" => [
                "Mercado Pago",
                "Efectivo"
            ],
            "datasets"=> [
                [
                    "data" => [$mp, $efectivo],
                    "backgroundColor" => ['#82B1FF','#B9F6CA'],
                    "borderWidth" => 2
                ]
            ],
        ]);
    }

    public function orderTake($request){
        $take = obtenerTake($request, 1);
        $mesa = obtenerTake($request, 0);

        return response()->json([
            "labels" => [
                "Take Away",
                "En el Local"
            ],
            "datasets"=> [
                [
                    "label"=> 'Ventas mensuales',
                    "data" => [$take, $mesa],
                    "backgroundColor" => ['#FF8A80','#B9F6CA'],
                    "borderWidth" => 2
                ]
            ],
        ]);
    }
}
