<?php
namespace App\Controllers;
use App\Models\productos_model;
use CodeIgniter\Controller;

class carrito_controller extends Controller {

	public function __construct()
	{
		helper(['form','url','cart']);
		$cart = \Config\Services::cart();
		$session = session();
	}

	//agregar items al carrito
	public function add() {
		$cart = \Config\Services::cart();
		$request = \Config\Services::request();

		$cart->insert(array(
			'id' => $request->getPost('id'),
			'qty' => 1,
			'name' => $request->getPost('nombre_prod'),
			'price' => $request->getPost('precio_vta'),
			'image' => $request->getPost('imagen'),
		));
		return redirect()->back()->withInput();
	}

	public function catalogo() {
		$productoModel = new productos_model();
		$data['producto'] = $productoModel->orderBy('id', 'DESC')->findAll();

		$dato = ['titulo' => 'Todos los productos'];
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/carrito/catalogo_view', $data);
		echo view('front/footer');
	}

	public function muestra() { // muestra el carrito
		$cart = \Config\Services::cart();
		$cart = $cart->contents();
		$data['cart'] = $cart;

		$dato['titulo'] = 'Confirmar compra';
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/carrito/carrito_view', $data);
		echo view('front/footer');
	}

	//actualizar el carrito
	public function actualiza_carrito() {
		$cart = \Config\Services::cart();
		$request = \Config\Services::request();

		$cart->update(array(

			'id' => $request->getPost('id'),
			'qty' => 1,
			'price' => $request->getPost('precio_vta'),
			'name' => $request->getPost('nombre_prod'),
			'imagen' => $request->getPost('imagen'),

		));
		return redirect()->back()->withInput();
	}
	
}
?>