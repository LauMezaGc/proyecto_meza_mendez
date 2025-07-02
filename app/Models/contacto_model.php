<?php

namespace App\Models;
use CodeIgniter\Model;

class contacto_model extends Model 
{
	protected $table = 'contacto';
	protected $primaryKey = 'id';
	protected $allowedFields = ['usuario_id', 'asunto', 'mensaje', 'respuesta'];

	public function getMensajes() {
		//método de la clase Database que permite conectarse a la base de datos
		$db = \Config\Database::connect();
		//$builder es una instancia de la clase QueryBuilder de CodeIgniter
		$builder = $db->table('contacto');
		//hace una consulta a la base de datos
		$builder->select('*');
		//hace el join de la tabla usuarios
		$builder->join('usuarios', 'usuarios.id = contacto.usuario_id');
		//retorna el builder
		return $builder;
	}

	public function getMensaje($id = null) {
		$builder = $this->getMensajes();
		$builder->where('contacto.id',$id);
		$query = $builder->get();
		return $query->getRowArray();
	}

	public function getMensajesUser($id = null) {
		$builder = $this->getMensajes();
		$builder->where('contacto.usuario_id',$id);
		return $builder->get()->getRowArray();
	}

	public function getMensajeAll() {
		return $this->findAll();
	}
}
?>