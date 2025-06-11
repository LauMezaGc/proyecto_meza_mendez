<?php

namespace App\Models;
use codeIgniter\Model;

class categorias_model extends Model 
{
	protected $table = 'categorias';
	protected $primaryKey = 'id';
	protected $allowedFields = ['descripcion', 'activo'];
}
?>