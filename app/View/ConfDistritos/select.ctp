<? if($tipo==1){ ?>
	<?php echo $this->Form->input('ConfDistrito.conf_departamento_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confDepartamentos,'onchange'=>"input_remoto('/confDistritos/select/2','select_provincia',this.value);")); ?>
<?}else{?>
	<?php echo $this->Form->input('ConfDistrito.conf_provincia_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','options'=>$confProvincias)); ?>
<?}?>
