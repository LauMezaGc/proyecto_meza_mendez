<?php

namespace App\Models;
use CodeIgniter\Model;

class ventas_cabecera_model extends Model 
{
	protected $table = 'ventas_cabecera';
	protected $primaryKey = 'id_venta';
	protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];

	public function getBuilderVentas_cabecera() {
		// conecta a la base de datos usando el helper de configuración de CodeIgniter
		$db = \Config\Database::connect();
		// crea un query builder sobre la tabla ventas_cabecera, lo cual le permite construir consultas SQL
		$builder = $db->table('ventas_cabecera');
		$builder->select('*'); // se seleccionan todas las columnas
		// se realiza un JOIN con la tabla usuarios usando la relación entre usuarios.id y ventas_cabecera.usuario_id
		$builder->join('usuarios', 'usuarios.id = ventas_cabecera.usuario_id');
		// ejecuta la consulta y devuelve los resultados como un array asociativo
		$query = $builder->get();
		return $query->getResultArray();
	}

	// esta función devuelve las ventas según si se pasa o no un $id_usuario
	public function getVentas($id_usuario = null) {
		// si no se pasa una ID de usuario (es null)
		if ($id_usuario === null) {
			// la función getBuilderVentas_cabecera() devuelve el resultado de la consulta como array.
			return $this->getBuilderVentas_cabecera();
		} else {
			$db = \Config\Database::connect();
			$builder = $db->table('ventas_cabecera');
			$builder->select('*');
			$builder->join('usuarios', 'usuarios.id = ventas_cabecera.usuario_id');
			$builder->where('ventas_cabecera.usuario_id', $id_usuario);
			$query = $builder->get();
			return $query->getResultArray();
		}
	}
}
?>