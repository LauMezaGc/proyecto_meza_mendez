<?php

namespace App\Controllers;
use App\Models\productos_model;
use App\Models\usuarios_model;
use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
use App\Models\categorias_model;
use CodeIgniter\Controller;

class Productocontroller extends Controller
{
    public function __construct(){
        helper(['url','form']);
        $session=session();
    }

    // mostrar los productos en lista
    public function index(){
        $productoModel = new productos_model();
        //realiza la consulta para mostrar todos los productos
        $data['producto'] = $productoModel->getProductoAll(); //funcion en el modelo

        $data['titulo'] = "Crud_productos";
        echo view('front/head_view', $data);
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasModel = new categorias_model();
        $data['categorias'] = $categoriasModel->getCategorias(); //Traer las categorias desde la db

        $productoModel = new productos_model();
        $data['producto'] = $productoModel->getProductoAll();
    }
}