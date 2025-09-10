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
	public function catalogo() {
		$productoModel = new productos_model();
		$data['producto'] = $productoModel->orderBy('id', 'DESC')->findAll();

		$dato = ['titulo' => 'Todos los productos'];
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/carrito/catalogo_view', $data);
		echo view('front/footer');
	}

	public function catalogo_filtrado() {
		$productoModel = new productos_model();
		$formato = $this->request->getGet('formato');

		if($formato == 1 || $formato == 2) {
			$productos = $productoModel->getProductosPorFormato($formato);
		} else {
			$productos = $productoModel->getProductoAll();
		}

		$data['producto'] = $productos;
		
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
			'price' => $request->getPost('precio'),
			'name' => $request->getPost('nombre_prod'),
			'image' => $request->getPost('imagen'),

		));
		return redirect()->back()->withInput();
	}

	public function add() {
		$cart = \Config\Services::cart();
		$request = \Config\Services::request();

		$cart->insert([
			'id' => $request->getPost('id'),
			'qty' => 1,
			'name' => $request->getPost('nombre_prod'),
			'price' => $request->getPost('precio'),
			'options' => array('imagen' => $request->getPost('imagen'))
		]);

		return redirect()->to(base_url('todos_p'))->withInput();
	}

	public function eliminar_item($rowid) {
		$cart = \Config\Services::cart();
		$cart->remove($rowid);
		return redirect()->to(base_url('muestro'));
	}

	public function remove($rowid) {
		$cart = \Config\Services::cart();
		if($rowid === "all") {
			$cart->destroy(); // vacia el carrito
		} else {
			$cart->remove($rowid);
		}
		return redirect()->to(base_url('muestro'))->withInput();
	}

	public function borrar_carrito() {
		$cart = \Config\Services::cart();
		$cart->destroy();
		return redirect()->to(base_url('muestro'));
	}

	public function devolver_carrito() {
		$cart = \Config\Services::cart();
		return $cart->contents();
	}

	public function suma($rowid) {
		// suma 1 a la cantidad del producto
		$cart = \Config\Services::cart();
		$item = $cart->getItem($rowid);
		if($item) {
			$cart->update([
				'rowid' =>$rowid,
				'qty' => $item['qty'] + 1 
			]);
		}
		return redirect()->to('muestro');
	}

	public function resta($rowid) {
		// resta 1 a la cantidad del producto
		$cart = \Config\Services::cart();
		$item = $cart->getItem($rowid);
		if ($item) {
			if ($item['qty'] > 1) {
				$cart->update([
					'rowid' => $rowid,
					'qty' => $item['qty'] - 1
				]);
			} else {
				$cart->remove($rowid);
			}
		}
		return redirect()->to('muestro');
	}
	
}
?>