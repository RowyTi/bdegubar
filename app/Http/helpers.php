<?php

use App\Models\Comment;
use App\Models\Order;

function getB64Image($base64_image){
    // Obtener el String base-64 de los datos
    $image_service_str = substr($base64_image, strpos($base64_image, ",")+1);
    // Decodificar ese string y devolver los datos de la imagen
    $image = base64_decode($image_service_str);
    // Retornamos el string decodificado
    return $image;
}

function getB64Extension($base64_image, $full=null){
    // Obtener mediante una expresión regular la extensión imagen y guardarla
    // en la variable "img_extension"
    preg_match("/^data:image\/(.*);base64/i",$base64_image, $img_extension);
    // Dependiendo si se pide la extensión completa o no retornar el arreglo con
    // los datos de la extensión en la posición 0 - 1
    return ($full) ?  $img_extension[0] : $img_extension[1];
}

function obtenerRating($id){
    // verifica cantidad total de comentarios correspondientes a un branch
    $total = Comment::where('branch_id', $id)->count();
    if($total > 0){
        $comments = Comment::where('branch_id', $id)->get();
        //        se inicializa r [rating] en 0
        $r = 0;
        //        se suma la valoracion correspondiente de cada comentario perteneciente al branch
        foreach ($comments as $c){
            $r = $r+$c->rating;
        }
        //        se divide por el total de comentarios
        $r = $r/$total;

        return round($r, 1);
    }else {
        return $total;
    }
}

function obtenerOrdenesTotales($id){
    $ordenes = Order::where('branch_id', $id)
        ->where('state', 'entregado')
        ->get()->toArray();
    $cantidad = count($ordenes);
    return $cantidad;
}

function obtenerOrdenesMensuales($id, $mes){
    $ordenes = Order::where('branch_id', $id)
        ->where('state', 'entregado')
        ->whereMonth('updated_at', '=', $mes)
        ->get()->toArray();
    $cantidad = count($ordenes);
    return $cantidad;
}

function obtenerOrdenesAnuladas($id, $mes){
    $ordenes = Order::where('branch_id', $id)
        ->where('state', 'anulado')
        ->whereMonth('updated_at', '=', $mes)
        ->get()->toArray();
    $cantidad = count($ordenes);
    return $cantidad;
}

function obtenerVentasTotalesMensuales($id, $mes){
    $ordenes = Order::where('branch_id', $id)
        ->where('state', 'entregado')
        ->whereMonth('created_at', '=', $mes)
        ->get()->toArray();

    $total=0;
    for($i=0; $i< obtenerOrdenesMensuales($id, $mes); $i++){
        $total += $ordenes[$i]['total'];
    }
    return $total;
}

function obtenerTake($id, $take){
    $ordenes = Order::where('branch_id', $id)
        ->where('take_away', $take)
        ->get()->toArray();
    $cantidad = count($ordenes);
    return $cantidad;
}

function obtenerMethod($id, $payment){
    $ordenes = Order::where('branch_id', $id)
        ->where('payment_method', $payment)
        ->get()->toArray();
    $cantidad = count($ordenes);
    return $cantidad;
}
