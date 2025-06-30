<?php

namespace App\Models;
use CodeIgniter\Model;

class contacto_model extends Model 
{
	protected $table = 'contacto';
	protected $primaryKey = 'id';
	protected $allowedFields = ['usuario_id', 'asunto', 'mensaje', 'respuesta'];

	public function getBuilderProductos() {
		//método de la clase Database que permite conectarse a la base de datos
		$db = \Config\Database::connect();
		//$builder es una instancia de la clase QueryBuilder de CodeIgniter
		$builder = $db->table('contacto');
		//hace una consulta a la base de datos
		$builder->select('*');
		//hace el join de la tabla categoría
		$builder->join('categorias', 'categorias.id = productos.categoria_id');
		//retorna el builder
		return $builder;
	}

	public function getProducto($id = null) {
		$builder = $this->getBuilderProductos();
		$builder->where('productos.id',$id);
		$query = $builder->get();
		return $query->getRowArray();
	}

	public function updateStock($id = null, $stock_actual = null) {
		$builder = $this->getBuilderProductos();
		$builder->where('productos.id', $id);
		$builder->set('productos.stock', $stock_actual);
		$builder->update();
	}

	public function getProductoAll() {
		return $this->findAll();
	}
}
?>