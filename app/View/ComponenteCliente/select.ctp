<? if($tipo==1){ ?>
	<?php echo $this->Form->input('ComponenteCliente.conf_departamento_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confDepartamentos,'onchange'=>"input_remoto('/ComponenteCliente/select/2','select_provincia',this.value);", 'style'=>'width:100px')); ?>
<?}else if($tipo==2){?>
	<?php echo $this->Form->input('ComponenteCliente.conf_provincia_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confProvincias,'onchange'=>"input_remoto('/ComponenteCliente/select/3','select_distrito',this.value);", 'style'=>'width:100px')); ?>
<?}else{?>
	<?php echo $this->Form->input('ComponenteCliente.conf_distrito_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confDistritos, 'style'=>'width:100px')); ?>
<?}?>
