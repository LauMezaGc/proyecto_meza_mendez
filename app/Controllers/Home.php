<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function armarPagina($nombre) {
        
        $data = ['titulo' => $nombre];
        echo view("front/header", $data);
        echo view("front/navbar");

        switch ($nombre) {
            case "inicio":
            case "comercializacion":
            case "contacto":
            case "terminos":
                echo view("front/".$nombre);
                break;
            case "tienda":
            case "juegos":
            case "reembolso":
            case "soporte":
            case "politica":
                echo view("front/construccion");
                break;
            default:
                echo view("front/404");
                break;
        }
        echo view("front/footer.php");
    }
}
?>