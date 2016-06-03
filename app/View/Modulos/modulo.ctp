<?php
if(Configure::read('desarrollo')==1){
	$url = "";
}else{
	$url = "/db";
}
?>
<script language="JavaScript">
<!--
//	[null,'Inicio','principal.php','principal','Inicio'],
var MenuPrincipal = [
['<img src="<?= $url ?>/img/gnome-system.png" border="0" width="24" height="24">','',null,null,'',
<?php
if(isset($NIVEL1)){

	foreach($NIVEL1 as $n1){
		$n1['Zmenu']['url']=$n1['Zmenu']['url']=='NULL'?'null':"'".$n1['Zmenu']['url']."'";
		$n1['Zmenu']['idcapa']=$n1['Zmenu']['idcapa']=='NULL'?'null':"'".$n1['Zmenu']['idcapa']."'";
		if($n1['Zmenu']['url']=='null'){$z1=",";}else{$z1="";}
		echo "\n\t[null,'".$n1['Zmenu']['deno_menu']."',".$n1['Zmenu']['url'].",".$n1['Zmenu']['idcapa'].",''".$z1;
		foreach($NIVEL2[$n1['Zmenu']['id']] as $n2){
			$n2['Zmenu']['url']=$n2['Zmenu']['url']=='NULL'?'null':"'".$n2['Zmenu']['url']."'";
			$n2['Zmenu']['idcapa']=$n2['Zmenu']['idcapa']=='NULL'?'null':"'".$n2['Zmenu']['idcapa']."'";
			if($n2['Zmenu']['url']=='null'){$z2=",";}else{$z2="";}
			echo "\n\t\t[null,'".$n2['Zmenu']['deno_menu']."',".$n2['Zmenu']['url'].",".$n2['Zmenu']['idcapa'].",''".$z2;
			foreach($NIVEL3[$n2['Zmenu']['id']] as $n3){
				$n3['Zmenu']['url']=$n3['Zmenu']['url']=='NULL'?'null':"'".$n3['Zmenu']['url']."'";
				$n3['Zmenu']['idcapa']=$n3['Zmenu']['idcapa']=='NULL'?'null':"'".$n3['Zmenu']['idcapa']."'";
				if($n3['Zmenu']['url']=='null'){$z3=",";}else{$z3="";}
				echo "\n\t\t[null,'".$n3['Zmenu']['deno_menu']."',".$n3['Zmenu']['url'].",".$n3['Zmenu']['idcapa'].",''".$z3;
				foreach($NIVEL4[$n3['Zmenu']['id']] as $n4){
					$n4['Zmenu']['url']=$n4['Zmenu']['url']=='NULL'?'null':"'".$n4['Zmenu']['url']."'";
					$n4['Zmenu']['idcapa']=$n4['Zmenu']['idcapa']=='NULL'?'null':"'".$n4['Zmenu']['idcapa']."'";
					if($n4['Zmenu']['url']=='null'){$z4=",";}else{$z4="";}
					echo "\n\t\t[null,'".$n4['Zmenu']['deno_menu']."',".$n4['Zmenu']['url'].",".$n4['Zmenu']['idcapa'].",''".$z4;
                    foreach($NIVEL5[$n4['Zmenu']['id']] as $n5){
						$n5['Zmenu']['url']=$n5['Zmenu']['url']=='NULL'?'null':"'".$n5['Zmenu']['url']."'";
						$n5['Zmenu']['idcapa']=$n5['Zmenu']['idcapa']=='NULL'?'null':"'".$n5['Zmenu']['idcapa']."'";
						if($n5['Zmenu']['url']=='null'){$z5=",";}else{$z5="";}
						echo "\n\t\t[null,'".$n5['Zmenu']['deno_menu']."',".$n5['Zmenu']['url'].",".$n5['Zmenu']['idcapa'].",''".$z5;
	                    foreach($NIVEL6[$n5['Zmenu']['id']] as $n6){
							$n6['Zmenu']['url']=$n6['Zmenu']['url']=='NULL'?'null':"'".$n6['Zmenu']['url']."'";
							$n6['Zmenu']['idcapa']=$n6['Zmenu']['idcapa']=='NULL'?'null':"'".$n6['Zmenu']['idcapa']."'";
							if($n6['Zmenu']['url']=='null'){$z6=",";}else{$z6="";}
							echo "\n\t\t[null,'".$n6['Zmenu']['deno_menu']."',".$n6['Zmenu']['url'].",".$n6['Zmenu']['idcapa'].",''".$z6;
		                    foreach($NIVEL7[$n6['Zmenu']['id']] as $n7){
								$n7['Zmenu']['url']=$n7['Zmenu']['url']=='NULL'?'null':"'".$n7['Zmenu']['url']."'";
								$n7['Zmenu']['idcapa']=$n7['Zmenu']['idcapa']=='NULL'?'null':"'".$n7['Zmenu']['idcapa']."'";
								if($n7['Zmenu']['url']=='null'){$z7=",";}else{$z7="";}
								echo "\n\t\t[null,'".$n7['Zmenu']['deno_menu']."',".$n7['Zmenu']['url'].",".$n7['Zmenu']['idcapa'].",''".$z7;
			                    foreach($NIVEL8[$n7['Zmenu']['id']] as $n8){
									$n8['Zmenu']['url']=$n8['Zmenu']['url']=='NULL'?'null':"'".$n8['Zmenu']['url']."'";
									$n8['Zmenu']['idcapa']=$n8['Zmenu']['idcapa']=='NULL'?'null':"'".$n8['Zmenu']['idcapa']."'";
									if($n8['Zmenu']['url']=='null'){$z8=",";}else{$z8="";}
									echo "\n\t\t[null,'".$n8['Zmenu']['deno_menu']."',".$n8['Zmenu']['url'].",".$n8['Zmenu']['idcapa'].",''".$z8;
				                    /*foreach($NIVEL9[$n7['Zmenu']['id']] as $n9){

				                    }//nivel9*/
									echo "],\n";
			                    }//nivel8
								echo "],\n";
		                    }//nivel7
							echo "],\n";
	                    }//nivel6
						echo "],\n";
                    }//nivel5
					echo "],\n";
				}//nivel4
				echo "],\n";
			}//nivel3
			echo "],\n";
		}//nivel2
		echo "],\n";
    }//nivel1
    }//fin isset
?>



],
	////['<img src="<?= $url ?>/img/regresar_modulo.png" border="0" title="Regresar a Modulos" width="24" height="24">','', '<?= $this->webroot ?>modulos/view_link/','no_ajax',''],
	['<img src="<?= $url ?>/img/iconos/modulos3.png" border="0" title="ir a Modulos" width="24" height="24">','', null,null,'',
	<?php
	if(isset($modulos)){$i=1;
	    foreach($modulos as $mod){
	    	extract($mod['Modulo']);
	    	echo "\n\t\t[null,'".mascara($i,2)." - ".$denominacion."','".$this->webroot."modulos/modulo/$id/msj','no_ajax',''],";
	     $i++;
	     }//fin foreach
	}//fin if
	?>
	['<img src="<?= $url ?>/img/input_pass.png" border="0" title="Cambiar Clave" width="18" height="16">','Cambiar Clave', '/conf_usuarios/cambiar_clave','principal',''],
	['','Regresar a Módulos', '/modulos/view_link/','no_ajax','']
    ],
	['<img src="<?= $url ?>/img/stock_exit.png" border="0" title="Cerrar Session" width="24" height="24">','', '<?= $this->webroot ?>entrada/salir','no_ajax','']
];

--></script>


<script language="JavaScript">
	<!--
		cmDraw ('menu_menu_1', MenuPrincipal, 'hbr', cmThemeOffice, 'ThemeOffice');
	-->
</script>

<?php


if(isset($msj) && $msj!=null){
    	msj('Módulo - '.$msj,'info');
}

?>

<?php
/**
<div style="width:400px; background-color:#f5f5f5">
<ul id="browser" class="filetree">
		<li class="closed"><span class="folder">Folder 1</span>
			<ul>

				<li class="closed"><span class="folder">Configuracion</span>
					<ul id="folder21">
						<li class="closed"><span class="folder">Dependencias</span>
						<ul>
							<li class="closed"><span class="folder">Registro</span>
								<ul id="folder212">
									<li><span class="file">Dependencias</span></li>
								</ul>
							</li>
							</ul>
						</li>
						<li class="closed"><span class="folder">Usuarios</span>
						<ul>
							<li class="closed"><span class="folder">Registro</span>
								<ul id="folder212">
									<li><span class="file">Usuarios Principales</span></li>
									<li><span class="file">Usuarios Modulos</span></li>
								</ul>
							</li>
							</ul>
						</li>
						<li class="closed"><span class="folder">Paramentros</span>
								<ul>
									<li><span class="file">tabla de retención I.S.L.R</span></li>
									<li><span class="file">unidades de medidas	</span></li>
									<li><span class="file">CATÁLOGO DE CLASIFICACIÓN DE COMPRAS DEL ESTADO	</span></li>
									<li><span class="file">TIPOS DE COMPROMISOS</span></li>
									<li><span class="file">TIPOS DE PAGOS</span></li>
									<li><span class="file">TIPOS DE DOCUMENTOS</span></li>
								</ul>
						</li>
						<li><span class="file" onClick="alert('hola')">Usuarios</span></li>
						<li><span class="file">Ubicaciones</span></li>
						<li><span class="file">Restricciones</span></li>
					</ul>
				</li>
			</ul>
		</li>

	</ul>
</div>



*/
?>