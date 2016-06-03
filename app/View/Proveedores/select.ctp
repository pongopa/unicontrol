<? if($tipo==1){ ?>
	<?php echo $this->Form->input('Proveedore.conf_departamento_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confDepartamentos,'onchange'=>"input_remoto('/Proveedores/select/2','select_provincia',this.value);", 'style'=>'width:150px')); ?>
<?}else if($tipo==2){?>
	<?php echo $this->Form->input('Proveedore.conf_provincia_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confProvincias,'onchange'=>"input_remoto('/Proveedores/select/3','select_distrito',this.value);", 'style'=>'width:150px')); ?>
<?}else{?>
	<?php echo $this->Form->input('Proveedore.conf_distrito_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confDistritos, 'style'=>'width:150px')); ?>
<?}?>
