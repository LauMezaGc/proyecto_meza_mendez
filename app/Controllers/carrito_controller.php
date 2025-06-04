<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class carrito_controller extends Controller {

	public function_construct()
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

	//actualizar el carrito
	public function actualizar_carrito() {
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