<?php

namespace App\Models;
use codeIgniter\Model;

class productos_model extends Model 
{
	protected $table = 'productos';
	protected $primaryKey = 'id';
	protected $allowedFields = ['nombre_prod', 'imagen', 'categora_id', 'precio', 'precio_venta', 'stock', 'stock_min', 'eliminado'];
}
?>