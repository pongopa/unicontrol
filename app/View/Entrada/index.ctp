<div id="entrada_index_login2" class="entrada_index_login2">
<form action="<?php echo $this->Html->url('/entrada/index/login'); ?>" method="post">
  <table width="100%" height="0" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="center"><table width="390" height="230" border="0" align="center" cellpadding="0" cellspacing="0"  class="entrada_index_login_logo">
          <tr>
            <td rowspan="2" ><img src="<?= $this->webroot ?>img/blank.gif" width="1" height="50"></td>
            <td height="50" align="center" valign="top"><?= $this->Html->image ('blank.gif ', array ('width'=>'360', 'height'=>'50')) ?><br>
              &nbsp;&nbsp;
           <div id="error"><?if(isset($msg)){echo $msg;}?></div>
            </td>
          </tr>
<?php
       $count_firefox=substr_count (strtoupper($_SERVER['HTTP_USER_AGENT']), 'FIREFOX');
       $count_Chrome=substr_count (strtoupper($_SERVER['HTTP_USER_AGENT']), 'CHROME');

       $count_firefox=1;
 if($count_firefox==0 && $count_Chrome==0){
?>
<tr><td align="left" valign="top" style="color:#FFF;padding-left:100px;">
<b>Se requiere de alguno de los siguientes navegadores Web:</b>
<ul style="text-align:left;">
<li><a href="http://www.mozilla.org/products/firefox" target="_new"><?php echo $this->Html->image('firefox.png', array('alt'=>"Navegador web Mozilla Firefox", 'border'=>"0"));?></a>&nbsp;&nbsp;Mozilla Firefox - versi&oacute;n 3.0+ </li>
<li><a href="http://www.google.com/chrome/index.html?hl=es" target="_new"><?php echo $this->Html->image('google_chrome.jpg', array('alt'=>"Navegador web Google Chrome", 'border'=>"0"));?></a>&nbsp;&nbsp;Google Chrome </li>
</ul>
</td></tr>
<?
 }else{
?>
         <? if(Configure::read('sistema_cerrado')==true){?>
             <tr><td align="center" valign="top" style="color:red"><input value="     RECARGAR    " onClick="javascript:window.location='./'" type="button" class="bt_ingresar"></td></tr>
	      <?}else{?>
         <tr>
            <td valign="top" align="center">
                <label for="username">Usuario:</label><br>
                <?php echo $this->Form->input('usuario', array('class'=>'input_user','label'=>false)); ?><br>
                <label for="password">Contrase&ntilde;a:</label><br>
                <?php echo $this->Form->password('clave', array('class'=>'input_pass')); ?><div style="margin-top:8px;">
               <input type="submit" name="data[Usuario][Login]" value="INGRESAR" class="bt_ingresar"/>
              </div>
              </td>
          </tr>
         <?}?>
<?php
 }
?>

        </table></td>
    </tr>
  </table>
</form>
</div><table width="100%" height="0" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td align="center"><table width="390px" ><div style="
	z-index:2;
	position: absolute;
    left: 46%;
    top: 107%;
    height: 240px;
    width: auto;
    margin:auto auto auto auto;
    /**/
    margin-top: -120px;    /*200px/2*/
    margin-left: -200px;    /*300px/2 */
    /**/
text-shadow: 1px 1px 1px #d8d8d8;">

<img src="<?= $this->webroot ?>img/apache.png">
<img src="<?= $this->webroot ?>img/php.png">
<img src="<?= $this->webroot ?>img/button-css.png">
<img src="<?= $this->webroot ?>img/ajax2.png">
<img src="<?= $this->webroot ?>img/cake.power.PNG">
<img src="<?= $this->webroot ?>img/ubuntu.png">


</br>Sistema Integral para el Control de Ordenes de Compras en UNICONTROL.<br />
Software Dise&ntilde;ado por Ing. Juan.Pacheco. & Asoc. &copy; 2016.<br />
San Juan de los Morros - Estado Gu&aacute;rico - Venezuela.</div>
</table></td></tr></table>

 <!--<object style="visibility: visible;" id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="151" width="112">
    <param name="movie" value="flash/logo_cicpc.swf">
    <param name="quality" value="high">
    <param name="wmode" value="transparent">
    <param name="swfversion" value="8.0.35.0">
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&#8217;t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf">
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
   <!--  <object type="application/x-shockwave-flash" data="<?= $this->webroot ?>img/logo_cicpc.swf" style="position:absolute;bottom:37%; right:35%;"  height="151" width="112">-->

<div style="position:fixed;bottom:3%;right:2%;">
<!-- webim button --><a href="http://localhost:8080/Support/client.php?locale=sp&amp;style=original" target="_blank" onclick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open('http://localhost:8080/Support/client.php?locale=sp&amp;style=original&amp;url='+escape(document.location.href.replace('http://','').replace('https://',''))+'&amp;referrer='+escape(document.referrer.replace('http://','').replace('https://','')), 'webim', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;"><img src="http://localhost:8080/Support/b.php?i=mblue&amp;lang=sp" border="0" width="177" height="61" alt=""/></a><!-- / webim button --></div>
