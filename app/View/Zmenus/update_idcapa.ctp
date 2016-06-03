<?php
/*
 * Created on 02/10/2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php echo $this->Form->input('idcapa',array('label'=>false,'options'=>array('principal'=>'PRINCIPAL','no_ajax'=>'NO AJAX','NULL'=>'NULL'),'value'=>$capa)); ?>

<?if(isset($url)){?>
<script language="JavaScript" type="text/javascript">
  $('ZmenuUrl').value = '<?=$url?>';
</script>
<?}?>