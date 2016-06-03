<script>
$("OrdencompraRazonSocial").value      ='<?=$proveedores["Proveedore"]["razon_social"]?>';
$("OrdencompraProveedoreId").value      ='<?=$proveedores["Proveedore"]["id"]?>';
$("OrdencompraRuc").value      ='<?=$proveedores["Proveedore"]["ruc"]?>';
$("OrdencompraDireccion").value='<?=$proveedores["Proveedore"]["direccion"].", ".$proveedores["ConfDepartamento"]["denominacion"].", ".$proveedores["ConfProvincia"]["denominacion"].", ".$proveedores["ConfDistrito"]["denominacion"]?>';
</script>
<table>
	<tr>
		<td>Contacto</td>
		<td>Celulares</td>
		<td>Correos Electronicos</td>
	</tr>
	<tr>
		<td><?php echo $this->Form->input('Ordencompra.proveedoresvendedore_id', array('label'=>false, 'style'=>'width:200px','empty'=>'- - SELECCIONE - -','onchange'=>"input_remoto('/Ordencompras/select_contacto','actualiza_contacto',this.value);"));?></td>
		<td><?php echo $this->Form->input('Ordencompra.celular',  array('label'=>false, 'cols'=>'23', 'rows'=>'2', 'readonly'=>true));?></td>
		<td><?php echo $this->Form->input('Ordencompra.email',    array('label'=>false, 'cols'=>'46', 'rows'=>'2', 'readonly'=>true));?></td>
	</tr>
</table>
<table>
 	<tr><td>banco</td></tr>
	<tr><td><?php echo $this->Form->input('Ordencompra.proveedoresbanco_id', array('label'=>false, 'style'=>'width:500px','empty'=>'- - SELECCIONE - -'));?></td></tr>
</table>
<div id="actualiza_contacto"></div>