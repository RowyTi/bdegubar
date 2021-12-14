<?php

use App\Models\Comment;

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
