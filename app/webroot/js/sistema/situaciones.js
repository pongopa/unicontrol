function radio_condicion(){
	if(document.getElementById('Condicion2').checked==true){
		document.getElementById('Tipotransaccion1').disabled="";
		document.getElementById('Tipotransaccion2').disabled="";
		document.getElementById('transaccion2').disabled="disabled";
	}else{
		document.getElementById('Tipotransaccion1').disabled="disabled";
		document.getElementById('Tipotransaccion2').disabled="disabled";
		document.getElementById('Tipotransaccion1').checked=false;
		document.getElementById('Tipotransaccion2').checked=false;
		document.getElementById('transaccion2').innerHTML="<option>- - SELECCIONE - -</option>";
		document.getElementById('transaccion2').disabled="disabled";
	}
}

function radios_escenario_ver(){
	if(document.getElementById('Frecuencia2').checked==true){
		document.getElementById('Escenario1').disabled="";
		document.getElementById('Escenario2').disabled="";
		document.getElementById('Escenario1').checked=true;
	}else{
		document.getElementById('Escenario1').disabled="disabled";
		document.getElementById('Escenario2').disabled="disabled";
		document.getElementById('Escenario2').checked=true;
	}
}