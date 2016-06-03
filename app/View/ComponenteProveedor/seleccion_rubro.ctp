<?php
echo '
<table cellpadding="0" cellspacing="0" class="grilla" border="0">
		<tr>
		    <td width="90%">Rubro</td>
		    <td>&nbsp;</td>
		</tr>
		<tr>';
		echo'<td valign="top">';echo $this->Form->input('denorubro',array('value'=>$Rubros["Rubro"]["denominacion"], 'id'=>'denorubro', 'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>20,'after'=> $this->Html->image('acciones/buscar.png',array('border'=>0, 'id'=>'buscar_ventana_rubro')),'before'=>''));echo '</td>';
		echo'<input type="hidden" name="data[ComponenteProveedor][rubro]" value="'.$Rubros["Rubro"]["id"].'" id="rubro" />';
	    echo'<td valign="top" align="center"><div class="submit"><input class="bt_plus" value="" type="submit" id="bt_plus"></div><div id="funcion"></div></td>';
	echo '</tr>
</table>';

echo '
<script language="JavaScript" type="text/javascript">
  jQuery(function ($) {
	$("#buscar_ventana_rubro").click(function (e) {
		$("#ventana_rubro").modal({
			zIndex:1000000
		});
		  return false;
	});
});
</script>';




?>