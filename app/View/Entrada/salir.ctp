<?php
if(Configure::read('desarrollo')==1){
	$url = "";
}else{
	$url = "/db";
}
?><script language="JavaScript" type="text/javascript">
   window.location = "<?= $url ?>/entrada/index/cerrar_session";
</script>
