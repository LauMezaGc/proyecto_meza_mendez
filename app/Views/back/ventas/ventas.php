<?php 
$session = session();
?>

<div class="container">
    <?php if (empty($venta)) : ?>
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No posee ventas registradas</h4>
            <hr>
            <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('catalogo') ?>">Catálogo</a>
        </div>
    <?php else: ?>
        <div class="row container-fluid">
            <div class="table-responsive-sm text-center">
                <h1 class="text-center">DETALLE DE VENTAS</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>N° ORDEN</th>
                            <th>USUARIO</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>IMAGEN</th>
                            <th>CANTIDAD</th>
                            <th>COSTO</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 0; 
                        $total = 0; 
                        foreach ($venta as $row): 
                            $i++;
                            $imagen = $row['imagen'];
                            $subtotal = $row['precio'] * $row['cantidad'];
                            $total += $subtotal;
                        ?>
                        <tr class="text-center">
                            <td><?php echo $i ?></td>
                            <td><?php echo esc($row['nombre']) ?></td>
                            <td><?php echo esc($row['nombre_prod']) ?></td>
                            <td><img src="<?php echo base_url('assets/uploads/' . $imagen) ?>" width="100" height="75"></td>
                            <td><?php echo number_format($row['cantidad']) ?></td>
                            <td><?php echo number_format($row['precio'], 2) ?></td>
                            <td><?php echo number_format($subtotal, 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-right">
                                <h4>Total de ventas</h4>
                            </td>
                            <td class="text-right">
                                <h4><?php echo number_format($total, 2) ?></h4>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
<script>
	$(document).ready( function() {
		$('#users-list').Datatable();
	} );
</script>