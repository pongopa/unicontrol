<?php
echo '
<table cellpadding="0" cellspacing="0" class="grilla" border="0">
		<tr>
		    <td width="15%">Código</td>
		    <td width="15%" >M.</td>
		    <td width="45%">Descripción</td>
		    <td width="10%">Cantidad</td>
		    <td width="10%">Precio Unitario</td>
		    <td width="10%">Total</td>
		    <td>&nbsp;</td>
		</tr>
		<tr>
		    <td valign="top">';echo $this->Form->input('ComponenteProducto.codigo',       array('value'=>$CatalogoProductos['Producto']['id'],                   'id'=>'producto',      'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>5,'after'=> $this->Html->image('acciones/buscar.png',array('border'=>0, 'id'=>'buscar_ventana_producto')),'before'=>''));echo '</td>';
	   echo'<td valign="top">';echo $this->Form->input('ComponenteProducto.unidad_medida',array('value'=>$CatalogoProductos['Productosmedida']['denominacion'],  'id'=>'unidad_medida', 'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>10));echo'</td>';
	   echo'<td valign="top">';echo $this->Form->input('ComponenteProducto.denominacion', array('value'=>$CatalogoProductos['Producto']['denominacion'],         'id'=>'denominacion',  'label'=>false, 'readonly'=>true,'style'=>"text-align: left;",    'size'=>30));echo'</td>';
	   echo'<td valign="top">';
	     echo $this->Form->input('ComponenteProducto.cantidad',        array('id'=>'cantidad',        'label'=>false, 'readonly'=>false,'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);', 'onBlur'=>" calcular_precio_unitario();"));
	   echo'</td>';
	   echo'<td valign="top">';echo $this->Form->input('ComponenteProducto.precio_unitario', array('id'=>'precio_unitario', 'label'=>false, 'readonly'=>false,'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);', 'onBlur'=>"formato_decimales_3(this.id); calcular_precio_unitario();"));echo'</td>';
	   echo'<td valign="top">';echo $this->Form->input('ComponenteProducto.total',           array('id'=>'total',           'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);'));echo'</td>';
	   echo'<td valign="top" align="center"><div class="submit"><input class="bt_plus" value="" type="submit" id="bt_plus"></div><div id="funcion"></div></td>';
	echo '</tr>
</table>';

echo '
<script language="JavaScript" type="text/javascript">
  jQuery(function ($) {
	$("#buscar_ventana_producto").click(function (e) {
		$("#ventana_producto").modal({
			zIndex:1000000
		});
		  return false;
	});
});
</script>';




?>