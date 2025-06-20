<?php

namespace App\Controllers;
use App\Models\productos_model;
use App\Models\usuarios_model;
use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
use App\Models\categorias_model;
use CodeIgniter\Controller;

class producto_controller extends Controller
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
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('front/footer');
    }

    public function creaproducto(){
        $categoriasModel = new categorias_model();
        $data['categorias'] = $categoriasModel->getCategorias(); //Traer las categorias desde la db

        $productoModel = new productos_model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Alta del producto';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('back/productos/alta_producto_view', $data);
        echo view('front/footer');
    }

    public function store() {
        //construye las reglas de validación
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'formato' => 'required',
            'imagen' => 'uploaded[imagen]'
        ]);

        $productoModel = new productos_model();

        if(!$input) {
            $categoria_model = new categorias_model();
            $data['categorias'] = $categoria_model->getCategorias();
            $data['validation'] = $this->validator;

            $dato['titulo'] = 'Alta';
            echo view('front/header', $dato);
            echo view('front/navbar');
            echo view('back/productos/alta_producto_view', $data);
            echo view('front/footer');
        } else {
            $img = $this->request->getFile('imagen');
            //genera un nombre aleatorio para el archivo
            $nombre_aleatorio = $img->getRandomName();
            //mueve el archivo de imagen a una ubicación específica usando el método move() en la carpeta assets/uploads
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                //se obtiene el nombre del archivo de imagen sin la ruta utilizando el método getName() del objeto $img
                'imagen' => $img->getName(),
                //completar con los demás campos
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'descripcion' => $this->request->getVar('descripcion'),
                'formato' => $this->request->getVar('formato'),
                'stock' => $this->request->getVar('stock')
                // 'eliminado' => NO
            ];

            $producto = new productos_model();
            $producto->insert($data);
            session()->setFlashData('success', 'Alta exitosa');
            return $this->response->redirect(site_url('/crear'));
        }
    }

    //mostrar un producto por id
    public function singleproducto($id = null) {
        $productoModel = new productos_model();
        $data['old'] = $productoModel->where('id', $id)->first();
        if (empty($data['old'])) {
            //lanzar error
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el producto seleccionado');
        }
        //se instancia el modelo de categorias
        $categoriasM = new categorias_model();
        $data['categorias'] = $categoriasM->getCategorias();

        $dato['titulo'] = 'Crud_productos';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('back/productos/edit', $data);
        echo view('front/footer');
    }

    public function modifica($id) {
        $productoModel = new productos_model();
        $id = $productoModel->where('id', $id)->first();
        $img = $this->request->getFile('imagen');
        //verifica si se cargó un archivo de imagen válido
        if ($img && $img->isValid()) {
            //se cargó una imagen válida correctamente
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img->getName(),
                //completar con los demás campos
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'stock' => $this->request->getVar('stock'),
                'descripcion' => $this->request->getVar('descripcion'),
                'formato' => $this->request->getVar('formato')
                // 'eliminado' => NO
            ];
        } else {
            $data = [
                'nombre_prod' => $this->request->getVar('nombre_prod'),
                'imagen' => $img->getName(),
                //completar con los demás campos
                'categoria_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'stock' => $this->request->getVar('stock'),
                'descripcion' => $this->request->getVar('descripcion'),
                'formato' => $this->request->getVar('formato')
                // 'eliminado' => NO
            ];
        }
        $productoModel->update($id, $data);
        session()->setFlashData('success', 'Modificación Exitosa');
        return $this->response->redirect(site_url('crear'));
    }

    public function borrarproducto($id) {
        $productoModel = new productos_model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'SI';
        $productoModel->update($id, $data);
        return $this->response->redirect(site_url('/crear'));
    }

    public function eliminados() {
        $productoModel = new productos_model();
        $data['producto'] = $productoModel->getProductoAll();
        //$data['producto'] = $productoModel->orderBy('id', 'DESC')->findAll();
        $dato['titulo'] = 'Crud_productos';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('back/productos/producto_eliminado', $data);
        echo view('front/footer');
    }

    public function activarproducto($id) {
        $productoModel = new productos_model();
        $data['eliminado'] = $productoModel->where('id', $id)->first();
        $data['eliminado'] = 'NO';
        $productoModel->update($id, $data);
        session()->setFlashData('success', 'Activación exitosa');
        return $this->response->redirect(site_url('/crear'));
        //return $this->response->redirect(site_url('crear')); ?
    }
}

?>