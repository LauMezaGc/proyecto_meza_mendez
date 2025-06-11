<?php

namespace App\Models;
use codeIgniter\Model;

class productos_model extends Model 
{
	protected $table = 'productos';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nombre', 'descripcion', 'formato', 'plataforma', 'precio', 'stock'];
}
?>