<?php

namespace App\Models;
use CodeIgniter\Model;

class productos_model extends Model 
{
	protected $table = 'productos';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nombre_prod', 'categoria_id', 'precio', 'descripcion', 'formato', 'stock', 'imagen', 'eliminado'];

	public function getBuilderProductos() {
		//método de la clase Database que permite conectarse a la base de datos
		$db = \Config\Database::connect();
		//$builder es una instancia de la clase QueryBuilder de CodeIgniter
		$builder = $db->table('productos');
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

	//protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'stock',        
	// 'descripcion','formato', 'plataforma'];
}
?>