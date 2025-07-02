<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use App\Models\productos_model;
use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
use CodeIgniter\Controller;

class ventas_controller extends Controller {
	public function registrar_venta()
	{
		$session = session();
		require(APPPATH . 'Controllers/carrito_controller.php');
		$cartController = new carrito_controller();
		$carrito_contents = $cartController->devolver_carrito();

		$productoModel = new productos_model();
		$ventasModel = new ventas_cabecera_model();
		$detallesModel = new ventas_detalle_model();

		$productos_validos = [];
		$productos_sin_stock = [];
		$total = 0;

		// validar stock y filtrar productos válidos
		foreach ($carrito_contents as $item) {
			$producto = $productoModel->getProducto($item['id']);

			if ($producto && $producto['stock'] >= $item['qty']) {
				$productos_validos[] = $item;
				$total += $item['subtotal'];
			} else {
				$productos_sin_stock[] = $item['name'];
				// eliminar del carrito el producto sin stock
				$cartController->eliminar_item($item['rowid']);
			}
		}

		// si hay productos sin stock, avisar y volver al carrito
		if (!empty($productos_sin_stock)) {
			$mensaje = 'Los siguientes productos no tienen stock suficiente y fueron eliminados del carrito: <br>' . implode(', ', $productos_sin_stock);
			$session->setFlashData('mensaje', $mensaje);
			return redirect()->to(base_url('muestro'));
		}

		// si no hay productos válidos, no se registra la venta
		if (empty($productos_validos)) {
			$session->setFlashData('mensaje', 'No hay productos validos para registrar la venta.');
			return redirect()->to(base_url('muestro'));
		}

		// registrar venta de la cabecera 
		$nueva_venta = [
			'usuario_id' => $session->get('id'),
			'total_venta' => $total
		];
		$venta_id = $ventasModel->insert($nueva_venta);

		// registrar detalle y actualizar stock
		foreach ($productos_validos as $item) {
			$detalle = [
				'venta_id' => $venta_id,
				'producto_id' => $item['id'],
				'cantidad' => $item['qty'],
				'precio' => $item['subtotal']
			];
			$detalleModel->$insert($detalle);

			$producto = $productoModel->getProducto($item['id']);
			$productoModel->updateStock($item['id'], $producto['stock'] - $item['qty']);
		}

		// vaciar carrito y mostrar confirmación
		$cartController->borrar_carrito();
		$session->setFlashData('mensaje', 'Venta registrada exitosamente.');
		return redirect()->to(base_url('vista_compras/' . $venta_id));
	}

	public function ver_factura($venta_id) {
		// echo $venta_id;
		$detalle_ventas = new ventas_detalle_model();

		$data['venta'] = $detalle_ventas->getDetalles($venta_id);

		$dato['titulo'] = "Ultima Compra";
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/compras/vista_compras', $data);
		echo view('front/footer');
	}
}

?>