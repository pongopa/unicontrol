function ver_documento(url_busqueda,ID){
	new Ajax.Updater(ID ,'/db'+url_busqueda, {asynchronous:true, evalScripts:true, onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', ID]})
//	new Ajax.Updater(ID ,'/sica'+url_busqueda, {asynchronous:true, evalScripts:true, onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', ID]})
}


function ver_documento2(url_busqueda,ID){
	new Ajax.Updater2(ID ,'/db'+url_busqueda, {asynchronous:true, evalScripts:true, onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', ID]})
//	new Ajax.Updater2(ID ,'/sica'+url_busqueda, {asynchronous:true, evalScripts:true, onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', ID]})
}

function menu_inactivo(){
    $('menu_menu_inactivo').className="menu_menu_inactive";
}


function menu_activo(){
    $('menu_menu_inactivo').className="menu_menu_inactivo0";
}

function _salir_programa(){
    $('principal').innerHTML = "<br/>";
    menu_activo();
}

function cargar_contenido(url_cargar,id_cargar){
     new Ajax.Updater(id_cargar,'/db'+url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
//   new Ajax.Updater(id_cargar,'/sica'+url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
}//end cargar_contenido

function cargar_contenido_pregunta(url_cargar,id_cargar,pregunta,elimina_fila){
	if (confirm(pregunta)) {
	   if(elimina_fila!=0){
	   	//new Effect.DropOut(elimina_fila);
	   }
	   new Ajax.Updater(id_cargar,'/db'+url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
//	   new Ajax.Updater(id_cargar,'/sica'+url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
	}
}

function input_remoto(url_cargar,id_cargar,parametro_extra){
   //url_cargar = '/sica'+url_cargar+'/'+parametro_extra;
   url_cargar = '/db'+url_cargar+'/'+parametro_extra;
   new Ajax.Updater(id_cargar,url_cargar, {asynchronous:true, evalScripts:true,onLoading:function(request){Element.show('mini_loading');}, onComplete:function(request){Element.hide('mini_loading')}, requestHeaders:['X-Update', id_cargar]});
}//end input_remoto


function limpiar_msj(v){
    if(v==2){
       id='msj_internal_exito';
    }else{
       id='msj_internal_error';
    }
      new Effect.Fade(id);
}

 function c_msj2(){
 	if($('c_usuarios').style.display=="block"){
 	   $('c_usuarios').style.display="none";
 	}
 }//fin c_msj

function error(MSJ){
	$("bloque_mensajes").innerHTML='<div id="msj_internal_error" class="error_msj">'+MSJ+'<div>';
	nMiliSegundos=9000;
	window.setTimeout("limpiar_msj(1)", nMiliSegundos);
}

function exito(MSJ){
	$("bloque_mensajes").innerHTML='<div id="msj_internal_exito" class="exito">'+MSJ+'<div>';
	nMiliSegundos=9000;
	window.setTimeout("limpiar_msj(2)", nMiliSegundos);
}


function exito2(MSJ){
	$("bloque_mensajes2").innerHTML='<div id="msj_internal_exito" class="exito">'+MSJ+'<div>';
	nMiliSegundos=9000;
	window.setTimeout("limpiar_msj(2)", nMiliSegundos);
}

function info(MSJ){
	$("bloque_mensajes").innerHTML='<div id="msj_internal_exito" class="info">'+MSJ+'<div>';
	nMiliSegundos=9000;
	window.setTimeout("limpiar_msj(2)", nMiliSegundos);
}

function alerta(MSJ){
	$("bloque_mensajes").innerHTML='<div id="msj_internal_exito" class="alerta">'+MSJ+'<div>';
	nMiliSegundos=9000;
	window.setTimeout("limpiar_msj(2)", nMiliSegundos);
}


function ventanaGoogleMap(){
  //var ventana = window.open('/sica'+'/adm_mapas/buscar_puntos',"GOOGLE_MAPA_FIND2","width=590,height=420,fullscreen=0,scrollbars=no,resizable=no,location=no,status=no,menubar=no,toolbar=no,titlebar=no");
  var ventana = window.open('/db'+'/adm_mapas/buscar_puntos',"GOOGLE_MAPA_FIND2","width=590,height=420,fullscreen=0,scrollbars=no,resizable=no,location=no,status=no,menubar=no,toolbar=no,titlebar=no");
}

function numeros_con_punto(e){
   ncomas = new Array(0,0);
   tecla_codigo = (document.all) ? e.keyCode : e.which;
   //alert(tecla_codigo);
   if(tecla_codigo==8 || tecla_codigo==0 || tecla_codigo==13 || tecla_codigo==46 || tecla_codigo==45){
     if(tecla_codigo==46){
          if(document.getElementById(e.target.id).value.length==0){
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'0,';
          }else{
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+',';
          }
               document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace(",,",",");
               for (i=0; i < document.getElementById(e.target.id).value.length; i++){
                 letra = document.getElementById(e.target.id).value.charAt(i);
                 ncomas[0] = (letra==",")? ncomas[0] + 1: ncomas[0];
               }
               for(i=1;i<=ncomas[0]-1;i++){
                  document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace(",","");
               }

               return false;
      }
      if(tecla_codigo==45){
         if(document.getElementById(e.target.id).value.length==0){
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'-';
          }else{
              document.getElementById(e.target.id).value=document.getElementById(e.target.id).value+'-';
          }
               document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace("--","-");
               for (i=0; i < document.getElementById(e.target.id).value.length; i++){
                 letra = document.getElementById(e.target.id).value.charAt(i);
                 ncomas[1] = (letra=="-")? ncomas[1] + 1: ncomas[1];
               }
               for(i=1;i<=ncomas[1];i++){
                  document.getElementById(e.target.id).value=document.getElementById(e.target.id).value.replace("-","");
               }
               document.getElementById(e.target.id).value="-"+document.getElementById(e.target.id).value;
         return false;
     }
      return true;
   }
   patron =/[0-9]/;
   tecla_valor = String.fromCharCode(tecla_codigo);
   return patron.test(tecla_valor);

}//fin solo numeros con punto


function solonumeros(e){

tecla_codigo = (document.all) ? e.keyCode : e.which;
if(tecla_codigo==8 || tecla_codigo==0 || tecla_codigo==13)return true;
patron =/[0-9\-]/;
tecla_valor = String.fromCharCode(tecla_codigo);
return patron.test(tecla_valor);

}


function formato(id){
    num = document.getElementById(id).value;
    //num = num.replace(/./g, '');
    num = num.toString().replace(/\./g,'');
    num = num.replace(",", '.');
	num = num.toString().replace(/\$|\,/g,'');
	if (isNaN(num))
	num = 0;
	var signo = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	centavos = num % 100;
	num = Math.floor(num / 100).toString();
	if (centavos < 10)
	centavos = '0' + centavos;
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	document.getElementById(id).value = (((signo) ? '' : '-') + '' + num + ',' + centavos);
}

function formato_return(valor)
{
    num = valor;
    //num = num.replace(/./g, '');
    num = num.toString().replace(/\./g,'');
    num = num.replace(",", '.');
	num = num.toString().replace(/\$|\,/g,'');
	if (isNaN(num))
	num = 0;
	var signo = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	centavos = num % 100;
	num = Math.floor(num / 100).toString();
	if (centavos < 10)
	centavos = '0' + centavos;
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	return (((signo) ? '' : '-') + '' + num + ',' + centavos);
}



function formato_mostrar_return(valor)
{
    var str = valor;
        str = str+'';
      valor = str.replace('.',',');
    num = valor;
    //num = num.replace(/./g, '');
    num = num.toString().replace(/\./g,'');
    num = num.replace(",", '.');
	num = num.toString().replace(/\$|\,/g,'');
	if (isNaN(num))
	num = 0;
	var signo = (num == (num = Math.abs(num)));
	num = Math.floor(num * 100 + 0.50000000001);
	centavos = num % 100;
	num = Math.floor(num / 100).toString();
	if (centavos < 10)
	centavos = '0' + centavos;
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	return (((signo) ? '' : '-') + '' + num + ',' + centavos);
}


function formato_decimales_3(id){
    num = document.getElementById(id).value;
    num = num.toString().replace(/\./g,'');
    num = num.replace(",", '.');
	num = num.toString().replace(/\$|\,/g,'');
	if (isNaN(num))
	num = 0;
	var signo = (num == (num = Math.abs(num)));
	num = Math.floor(num * 1000 + 0.50000000001);
	centavos = num % 1000;
	num = Math.floor(num / 1000).toString();
	      if(centavos < 10){
	   centavos = '00' + centavos;
	}else if(centavos < 100){
	   centavos = '0' + centavos;
	}
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	document.getElementById(id).value = (((signo) ? '' : '-') + '' + num + ',' + centavos);
}



function formato_decimales_3_return(valor){
    num = valor;
    num = num.toString().replace(/\./g,'');
    num = num.replace(",", '.');
	num = num.toString().replace(/\$|\,/g,'');
	if (isNaN(num))
	num = 0;
	var signo = (num == (num = Math.abs(num)));
	num = Math.floor(num * 1000 + 0.50000000001);
	centavos = num % 1000;
	num = Math.floor(num / 1000).toString();
	      if(centavos < 10){
	   centavos = '00' + centavos;
	}else if(centavos < 100){
	   centavos = '0' + centavos;
	}
	for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
	num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
	return (((signo) ? '' : '-') + '' + num + ',' + centavos);
}





function limpia_campo(ID,valor,opcion){
   if(opcion==1){
     if($(ID).value==valor){
        $(ID).value = '';
     }
   }else if(opcion==2){
        if($(ID).value==''){
        	$(ID).value = valor;
     	}
   }
}

function isminlength(obj, i){
	var valor    = $('defa_'+i).value;
	if (obj.value.length<$('defa_'+i).value.length){obj.value=valor;}
}


function formatear(ID,valor){
    if($(ID)){
    	$(ID).value=reemplazarCP(valor);
    	formato(ID);
    }
}

function formatear2(ID,valor){
    if($(ID)){
    	$(ID).value=valor;
    	formato(ID);
    }
}

function redondear(cantidad, decimales){
	    var   cantidad  = parseFloat(cantidad);
		var decimales2  = 6;
		var    formato  = '%01.'+decimales2+'f';
		var   cantidad  = eval(sprintf(formato, cantidad));
			     str =  cantidad+'';
				 for(x=0; x<str.length; x++){if(str.charAt(x)=="."){
				    if(str.charAt(eval(x)+eval(3))=="5"){ cantidad = eval(cantidad) + eval(0.001);}
				    break;
				      }//fin if
				   }//fin for
		var cantidad = parseFloat(cantidad);
		  decimales = (!decimales ? 2 : parseInt(decimales));
		var formato = '%01.'+decimales+'f';
		      valor = sprintf(formato,cantidad);
		return eval(valor);

}//fin redondear


function str_repeat(i, m) { for (var o = []; m > 0; o[--m] = i); return(o.join('')); }

function sprintf () {
  var i = 0, a, f = arguments[i++], o = [], m, p, c, x;
  while (f) {
    if (m = /^[^\x25]+/.exec(f)) o.push(m[0]);
    else if (m = /^\x25{2}/.exec(f)) o.push('%');
    else if (m = /^\x25(?:(\d+)\$)?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-fosuxX])/.exec(f)) {
      if (((a = arguments[m[1] || i++]) == null) || (a == undefined)) throw("Too few arguments.");
      if (/[^s]/.test(m[7]) && (typeof(a) != 'number'))
        throw("Expecting number but found " + typeof(a));
      switch (m[7]) {
        case 'b': a = a.toString(2); break;
        case 'c': a = String.fromCharCode(a); break;
        case 'd': a = parseInt(a); break;
        case 'e': a = m[6] ? a.toExponential(m[6]) : a.toExponential(); break;
        case 'f': a = m[6] ? parseFloat(a).toFixed(m[6]) : parseFloat(a); break;
        case 'o': a = a.toString(8); break;
        case 's': a = ((a = String(a)) && m[6] ? a.substring(0, m[6]) : a); break;
        case 'u': a = Math.abs(a); break;
        case 'x': a = a.toString(16); break;
        case 'X': a = a.toString(16).toUpperCase(); break;
      }
      a = (/[def]/.test(m[7]) && m[2] && a > 0 ? '+' + a : a);
      c = m[3] ? m[3] == '0' ? '0' : m[3].charAt(1) : ' ';
      x = m[5] - String(a).length;
      p = m[5] ? str_repeat(c, x) : '';
      o.push(m[4] ? a + p : p + a);
    }
    else throw ("Huh ?!");
    f = f.substring(m[0].length);
  }
  return o.join('');
}//fin sprintf


function reemplazarPC(a){
	var str = a;
	for(i=0; i<a.length; i++){
	    str = str.replace('.','');
	}
	var b=str;
	var str = b;
	for(i=0; i<b.length; i++){
	    str = str.replace(',','.');
	}
	return str;
}//reemplazarPC

function reemplazarCP(a){
	var str = a;
	    //str = str.replace(".",',');
	     num = str.toString().replace(/\./g,',');
         num = num.replace(".", ',');
	     //num = num.toString().replace(/\$|\,/g,'');


	return num;
}//reemplazarCP



function calcular_precio_unitario(){
		  cantidad = document.getElementById('cantidad').value;
		  precio   = document.getElementById('precio_unitario').value;
		////////CANTIDAD///////////////
			var str = cantidad;
			for(i=0; i<cantidad.length; i++){str = str.replace('.','');}
			str = str.replace(',','.');
			var cantidad = redondear(str,2);
		////////////////////////////////
		////////////PRECIO//////////////
			var str = precio;
			for(i=0; i<precio.length; i++){str = str.replace('.','');}
			str = str.replace(',','.');
			var precio = redondear(str,2);
		///////////////////////////////
		total       = eval(cantidad)*eval(precio);
		total       = redondear(total,2);
		var str     = total;
            str     = str+'';
        total       = str.replace('.',',');
		document.getElementById('total').value = formato_return(total);
}


function calcular_total_compra(){
		subtotal2       = document.getElementById('ComponenteProductoSubTotal2').value;
		porcentaje_igv  = document.getElementById('OrdencompraPorcentajeIgv').value;
		////////subtotal2///////////////
			var str = subtotal2;
			for(i=0; i<subtotal2.length; i++){str = str.replace('.','');}
			str = str.replace(',','.');
			var subtotal2 = redondear(str,2);;
		////////////////////////////////
		////////////porcentaje_igv//////////////
			var str = porcentaje_igv;
			for(i=0; i<porcentaje_igv.length; i++){str = str.replace('.','');}
			str = str.replace(',','.');
			var porcentaje_igv = redondear(str,2);
		///////////////////////////////
		igv   = eval(subtotal2)*(eval(porcentaje_igv)/eval(100));
		igv   = redondear(igv,2);
		total = eval(subtotal2) + eval(igv);
		total = redondear(total,2);
		var str     = subtotal2;
            str     = str+'';
        subtotal2   = str.replace('.',',');
		document.getElementById('ComponenteProductoSubTotal1').value = formato_return(subtotal2);
		var str     = igv;
            str     = str+'';
            igv     = str.replace('.',',');
		document.getElementById('ComponenteProductoIgv1').value      = formato_return(igv);
		var str     = total;
            str     = str+'';
            total   = str.replace('.',',');
		document.getElementById('ComponenteProductoTotal1').value    = formato_return(total);

}




function calcular_cotizacion_grilla(id){
	cantidad    = document.getElementById('cantidad_'+id).value;
	precio      = document.getElementById('precio_unitario_'+id).value;
	n_filas     = document.getElementById('total_filas').value;
	n_iva       = eval(n_filas) - eval(1);
	total_final = 0;
	total_iva   = 0;
	////////CANTIDAD///////////////
		var str = cantidad;
		for(i=0; i<cantidad.length; i++){str = str.replace('.','');}
		str = str.replace(',','.');
		var cantidad = redondear(str,6);
	////////////////////////////////
	////////////PRECIO//////////////
		var str = precio;
		for(i=0; i<precio.length; i++){str = str.replace('.','');}
		str = str.replace(',','.');
		var precio = str;
	///////////////////////////////
var str         = eval(cantidad)*eval(precio);
    tota_aux    = eval(cantidad)*eval(precio);
    tota_aux    = redondear(tota_aux,2);
    str         = redondear(str,2);
    total_final = eval(tota_aux);
    str         = str+'';
	total       = str.replace('.',',');
	total       = formato_return(total);
	if(document.getElementById('exento_iva_'+id)){
		exento_iva  = document.getElementById('exento_iva_'+id).value;
		alicota_iva = document.getElementById('alicota_iva_'+id).value;
		if(exento_iva=="2"){
                total_iva = eval(tota_aux) * (eval(alicota_iva) / eval(100));
		}//fin if
	}//fin if
	document.getElementById('total_'+id).innerHTML = total;
    for (ii=0; ii<n_filas; ii++){
        if(document.getElementById('cantidad_'+ii) && eval(ii)!=eval(id) && document.getElementById('condicion_'+ii).value=='1'){
           if(document.getElementById('exento_iva_'+ii)){
			      cantidad = document.getElementById('cantidad_'+ii).value;
				  precio   = document.getElementById('precio_unitario_'+ii).value;
				////////CANTIDAD///////////////
					var str = cantidad;
					for(i=0; i<cantidad.length; i++){str = str.replace('.','');}
					str = str.replace(',','.');
					var cantidad = redondear(str,6);
				////////////////////////////////
				////////////PRECIO//////////////
					var str = precio;
					for(i=0; i<precio.length; i++){str = str.replace('.','');}
					str = str.replace(',','.');
					var precio = str;
				///////////////////////////////
				total       = eval(cantidad)*eval(precio);
				total       = redondear(total,2);
				total_final = eval(total) + eval(total_final);
				if(document.getElementById('exento_iva_'+ii)){
					exento_iva  = document.getElementById('exento_iva_'+ii).value;
					alicota_iva = document.getElementById('alicota_iva_'+ii).value;
					if(exento_iva=="2"){
	                  total_iva = eval(total_iva) + ( eval(total) * (eval(alicota_iva) / eval(100)) );
					}//fin if
				}//fin if
		   }else{
                  cantidad = document.getElementById('cantidad_'+ii).value;
				  precio   = redondear(total_iva,3);
			    var str         = total_iva;
				    str         = str+'';
					total_iva   = str.replace('.',',');
					total_iva   = formato_decimales_3_return(total_iva);
				  document.getElementById('precio_unitario_'+ii).value = total_iva;
				////////CANTIDAD///////////////
					var str = cantidad;
					for(i=0; i<cantidad.length; i++){str = str.replace('.','');}
					str = str.replace(',','.');
					var cantidad = redondear(str,6);
				////////////////////////////////
				total           = eval(cantidad)*eval(precio);
				total           = redondear(total,2);
				total_final     = eval(total) + eval(total_final);
				var str         = total;
				    str         = str+'';
					total       = str.replace('.',',');
					total       = formato_return(total);
					document.getElementById('total_'+ii).innerHTML = total;
		   }//fin else
	     }//fin if
    }//fin for
                                         var str = total_final;
                                             str = str+'';
                                     total_final = str.replace('.',',');
document.getElementById('total_final').innerHTML = formato_return(total_final);
}//fin function







function calcular_cotizacion_grilla_delete(id){
    document.getElementById('condicion_'+id).value='2';
	n_filas     = document.getElementById('total_filas').value;
	n_iva       = eval(n_filas) - eval(1);
	total_final = 0;
	total_iva   = 0;
    for (ii=0; ii<n_filas; ii++){
        if(document.getElementById('cantidad_'+ii) && eval(ii)!=eval(id)){
           if(document.getElementById('exento_iva_'+ii)){
			      cantidad = document.getElementById('cantidad_'+ii).value;
				  precio   = document.getElementById('precio_unitario_'+ii).value;
				////////CANTIDAD///////////////
					var str = cantidad;
					for(i=0; i<cantidad.length; i++){str = str.replace('.','');}
					str = str.replace(',','.');
					var cantidad = redondear(str,6);
				////////////////////////////////
				////////////PRECIO//////////////
					var str = precio;
					for(i=0; i<precio.length; i++){str = str.replace('.','');}
					str = str.replace(',','.');
					var precio = str;
				///////////////////////////////
				total       = eval(cantidad)*eval(precio);
				total       = redondear(total,2);
				total_final = eval(total) + eval(total_final);
				if(document.getElementById('exento_iva_'+ii)){
					exento_iva  = document.getElementById('exento_iva_'+ii).value;
					alicota_iva = document.getElementById('alicota_iva_'+ii).value;
					if(exento_iva=="2"){
	                  total_iva = eval(total_iva) + ( eval(total) * (eval(alicota_iva) / eval(100)) );
					}//fin if
				}//fin if
		   }else{
                  cantidad = document.getElementById('cantidad_'+ii).value;
				  precio   = redondear(total_iva,3);
			    var str         = total_iva;
				    str         = str+'';
					total_iva   = str.replace('.',',');
					total_iva   = formato_decimales_3_return(total_iva);
				  document.getElementById('precio_unitario_'+ii).value = total_iva;
				////////CANTIDAD///////////////
					var str = cantidad;
					for(i=0; i<cantidad.length; i++){str = str.replace('.','');}
					str = str.replace(',','.');
					var cantidad = redondear(str,6);
				////////////////////////////////
				total           = eval(cantidad)*eval(precio);
				total           = redondear(total,2);
				total_final     = eval(total) + eval(total_final);
				var str         = total;
				    str         = str+'';
					total       = str.replace('.',',');
					total       = formato_return(total);
					document.getElementById('total_'+ii).innerHTML = total;
		   }//fin else
	     }//fin if
    }//fin for
                                         var str = total_final;
                                             str = str+'';
                                     total_final = str.replace('.',',');
document.getElementById('total_final').innerHTML = formato_return(total_final);
}//fin function




function calcular_modificacion_grilla(id){

total_final = 0;
n_filas     = document.getElementById('total_filas').value;

		for (ii=0; ii<n_filas; ii++){
						  monto   = document.getElementById('monto_'+ii).value;
						////////////PRECIO//////////////
							var str = monto;
							for(i=0; i<monto.length; i++){str = str.replace('.','');}
							str = str.replace(',','.');
							var monto = str;
						///////////////////////////////
						total_final = eval(total_final) + eval(monto);
		}
		                                 var str = total_final;
                                             str = str+'';
                                     total_final = str.replace('.',',');
document.getElementById('EjeModificacioneMontoModificacion').value = formato_return(total_final);
}

function valida_fechas_menores_documentos(op){

//las opcion son
  //  1) RC
  //  2) OC
  //  3) OP
  //  4) cheque

opcion = 1;


              if(op==1){

                 if(diferenciaFecha($('fecha_documento').value, $('fecha_documento_anterior').value)){
		            documento_anterior  = $('numero_documento_anterior').value;
		            fecha_anterior      = $('fecha_documento_anterior').value;
		            numero_documento    = $('numero_compromiso').value;
		            fun_msj('Fecha compromiso '+numero_documento+' menor a fecha '+fecha_anterior+' de compromiso '+documento_anterior);
		            opcion = 2;
		           }//fin if

		}else if(op==2){

				 if(diferenciaFecha($('fechacompra').value, $('fecha_orden_compra_anterior').value)){
		            documento_anterior  = $('numero_documento_anterior').value;
		            fecha_anterior      = $('fecha_orden_compra_anterior').value;
		            numero_documento    = $('num_ordencompra').value;
		            fun_msj('Fecha orden '+numero_documento+' menor a fecha '+fecha_anterior+' de orden '+documento_anterior);
                    opcion = 2;
                   }//fin if

		}else if(op==3){

                  if(diferenciaFecha($('fecha_documento_orden').value, $('fecha_documento_anterior').value)){
		            documento_anterior  = $('numero_documento_anterior').value;
		            fecha_anterior      = $('fecha_documento_anterior').value;
		            numero_documento    = $('numero_orden_pago').value;
		            fun_msj('Fecha orden '+numero_documento+' menor a fecha '+fecha_anterior+' de orden '+documento_anterior);
		            opcion = 2;
		           }//fin if
		}else if(op==4){

		         if(diferenciaFecha($('fecha').value, $('fecha_documento_anterior').value)){
		            documento_anterior  = $('numero_documento_anterior').value;
		            fecha_anterior      = $('fecha_documento_anterior').value;
		            numero_documento    = $('numero_cheque').value;
		            fun_msj('Fecha cheque '+numero_documento+' menor a fecha '+fecha_anterior+' de cheque '+documento_anterior);
		            opcion = 2;
		          }//fin if
		}//fin else


return opcion;

}//fin funtion


function diferenciaFecha(CfechaNew, CFechaOrig){
	var fecha1 = new fecha( CfechaNew );
	var fecha2 = new fecha( CFechaOrig );

	var miFecha1 = new Date( fecha1.anio, fecha1.mes, fecha1.dia );
	var miFecha2 = new Date( fecha2.anio, fecha2.mes, fecha2.dia );

	var diferencia = miFecha1.getTime() - miFecha2.getTime();

	if(diferencia < 0){
		return true;
	}else{
		return false;
	}


}

function fecha(cadena){
	var separador= "/";

	if(cadena.indexOf(separador) != -1){
		var posi1 = 0;
		var posi2 = cadena.indexOf(separador, posi1 + 1);
		var posi3 = cadena.indexOf(separador, posi2 + 1);
		this.dia = cadena.substring(posi1, posi2);
		this.mes = cadena.substring(posi2 + 1, posi3);
		this.anio = cadena.substring(posi3 + 1, cadena.length);
	}else{
		this.dia = 0;
		this.mes = 0;
		this.anio = 0;
	}
}



function calcular_valuacion(id){

var valor_partidas   = new Array();
var documento_titulo = new Array();

documento_titulo[1]  = "AUTORIZACI&oacute;N";
documento_titulo[2]  = "VALUACI&oacute;N";
documento_titulo[3]  = "VALUACI&oacute;N";


total_final        = 0;
monto_iva          = 0;


n_filas            = document.getElementById('total_filas').value;
monto_p_valuacion  = document.getElementById('monto_p_valuacion').value;
saldo_documento    = document.getElementById('EjeValuacioneSaldoDocumento').value;
saldo_anticipo     = document.getElementById('EjeValuacioneSaldoAnticipo').value;
tipo_documento     = document.getElementById('EjeValuacioneTipoDocumento').value;
monto_valuacion    = document.getElementById('EjeValuacioneMontoValuacion').value;

////////////MONTO VALUACIÓN//////////////////
		var str = monto_valuacion;
		for(i=0; i<monto_valuacion.length; i++){str = str.replace('.','');}
		str = str.replace(',','.');
		var monto_valuacion = str;
////////////////////////////////////////////

saldo_documento_actual = redondear(eval(saldo_documento) - eval(monto_valuacion), 2);

		for (ii=0; ii<n_filas; ii++){

		  monto_partida      =  document.getElementById('monto_partida_'+ii).value;
          monto_parcial      = ((eval(monto_valuacion) * eval(monto_partida)) / eval(monto_p_valuacion));
          valor_partidas[ii] = redondear(monto_parcial, 2);
          total_final        = eval(total_final) + eval(redondear(monto_parcial, 2));

		}

		total_final = redondear(total_final,2);

if(eval(saldo_documento)>=eval(monto_valuacion)){

		if(eval(monto_valuacion)!=eval(total_final)){

				for (ii=0; ii<n_filas; ii++){

				  monto_actual     =  document.getElementById('monto_actual_'+ii).value;
				  monto_partida    =  document.getElementById('monto_partida_'+ii).value;
				  diferencia       =  0;

				  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])>eval(monto_actual)){
				       diferencia         = eval(valor_partidas[ii]) - eval(monto_actual);
				       valor_partidas[ii] = eval(valor_partidas[ii]) - eval(diferencia);
				       total_final        = eval(total_final) - eval(diferencia);
				  }//fin fin
                  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])<eval(monto_actual)){
                       diferencia         = eval(monto_actual)       - eval(valor_partidas[ii]);
                       valor_partidas[ii] = eval(valor_partidas[ii]) + eval(diferencia);
                       total_final        = eval(total_final) + eval(diferencia);
                 }//fin fin


		                        if(eval(monto_valuacion)<eval(total_final)  && eval(diferencia)==eval(0)){

		                          total_final        = eval(total_final)  - eval(0.01);
                                  valor_partidas[ii] = valor_partidas[ii] - eval(0.01);

		                  }else if(eval(monto_valuacion)>eval(total_final) && eval(diferencia)==eval(0)){

		                          total_final        = eval(total_final)  + eval(0.01);
                                  valor_partidas[ii] = valor_partidas[ii] + eval(0.01);

		                  }

		                  document.getElementById("monto_"+ii).value   = formato_mostrar_return(valor_partidas[ii]);
				 }

		}else{
				for (ii=0; ii<n_filas; ii++){

				  monto_actual     =  document.getElementById('monto_actual_'+ii).value;
				  monto_partida    =  document.getElementById('monto_partida_'+ii).value;

				  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])>eval(monto_actual)){ diferencia = eval(valor_partidas[ii]) - eval(monto_actual);        valor_partidas[ii] = eval(valor_partidas[ii]) - eval(diferencia);  total_final = eval(total_final) - eval(diferencia);}//fin fin
                  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])<eval(monto_actual)){ diferencia = eval(monto_actual)       - eval(valor_partidas[ii]);  valor_partidas[ii] = eval(valor_partidas[ii]) + eval(diferencia);  total_final = eval(total_final) + eval(diferencia);}//fin fin

		                  document.getElementById("monto_"+ii).value   = formato_mostrar_return(valor_partidas[ii]);
				 }
		}

		document.getElementById("total_final").innerHTML   = '<b>'+formato_mostrar_return(total_final)+'</b>';

		m_partida_403180100 = 0; //monto partida del iva
		m_partida_401       = 0; //monto partida 401
		m_partida_411       = 0; //monto partida 411
		m_iva               = 0; //monto del iva de la valuación
		m_sustraendo        = 0; //inicializando monto sustraendo
		MRetencionFiel      = 0; //Monto del fiel cumplimiento
		MRetencionLaboral   = 0; //Monto de laboral

		for (ii=0; ii<n_filas; ii++){
                if(document.getElementById('tipo_partida_'+ii).value=="403180100"){

            m_partida_403180100 = eval(m_partida_403180100) + eval(valor_partidas[ii]);

          }else if(document.getElementById('tipo_partida_'+ii).value=="401"){

            m_partida_401     = eval(m_partida_401) + eval(valor_partidas[ii]);

          }else if(document.getElementById('tipo_partida_'+ii).value=="411"){

            m_partida_411     = eval(m_partida_411) + eval(valor_partidas[ii]);

          }
		}
		m_partida_403180100 = redondear(m_partida_403180100,2);
		m_partida_401       = redondear(m_partida_401,2);
		m_partida_411       = redondear(m_partida_411,2);

		PMontoIva    = retornar_valor_calculo($('EjeValuacionePMontoIva').value);
		PMontoIva    = eval(PMontoIva) / eval(100); ///PORCENTAJE IVA

		PRetencionTf = retornar_valor_calculo($('EjeValuacionePRetencionTf').value);
		PRetencionTf = eval(PRetencionTf) / eval(100);///PORCENTAJE TIMBRE FISCAL

		PRetencionIslr = retornar_valor_calculo($('EjeValuacionePRetencionIslr').value);
		PRetencionIslr = eval(PRetencionIslr) / eval(100);///PORCENTAJE IMPUESTO SOBRE LA RENTA

		PRetencionIm = retornar_valor_calculo($('EjeValuacionePRetencionIm').value);
		PRetencionIm = eval(PRetencionIm) / eval(100);///PORCENTAJE IMPUESTO MUNICIPAL

		PAmortizacion = retornar_valor_calculo($('EjeValuacionePAmortizacion').value);
		PAmortizacion = eval(PAmortizacion) / eval(100);///PORCENTAJE DE AMORTIZACIÓN

		if($('EjeValuacionePRetencionLaboral')){
		  PRetencionLaboral = retornar_valor_calculo($('EjeValuacionePRetencionLaboral').value);
		  PRetencionLaboral = eval(PRetencionLaboral) / eval(100);///PORCENTAJE DE RETENCION LABORAL
		}else{
		  PRetencionLaboral = 0;
		}

		if($('EjeValuacionePRetencionFiel')){
		  PRetencionFiel = retornar_valor_calculo($('EjeValuacionePRetencionFiel').value);
		  PRetencionFiel = eval(PRetencionFiel) / eval(100);///PORCENTAJE DE RETENCION FIEL CUMPLIMIENTO
		}else{
		  PRetencionFiel = 0;
		}


		      if($('EjeValuacionePRetencionIva0').checked == true){
             PRetencionIva  = 0;
		}else if($('EjeValuacionePRetencionIva75').checked == true){
             PRetencionIva  = 75;
        }else if($('EjeValuacionePRetencionIva100').checked == true){
             PRetencionIva  = 100;
		}
		PRetencionIva = eval(PRetencionIva) / eval(100); //PORCENTAJE DE LA RETENCION DEL IVA

		MSustraendoNeto = retornar_valor_calculo($('EjeValuacioneMSustraendoNeto').value);///MONTO DEL SUSTRAENDO NETO

		AnticipoConIva      = $('EjeValuacioneAnticipoConIva').value;///SI EL ANTICIPO INCLUYE IVA
		RetencionIncluyeIva = $('EjeValuacioneRetencionIncluyeIva').value;///SI LAS RETENCIONES INCLUYEN IVA
		ObjetoRif           = $('EjeValuacioneObjetoRif').value;///OBJETO DEL RIF


		///////////INICIO DE CALCULOS////////////////
		if(tipo_documento=="1"){

		        m_iva = m_partida_403180100;

				factor_reversion = redondear(eval(1) + eval(PMontoIva),2);
			  	base             = redondear(eval(m_partida_411) / eval(factor_reversion),2);
				m_partida_411    = eval(m_partida_411) - eval(base);
				m_iva            = eval(m_iva) +  eval(m_partida_411);
				m_iva            = redondear(m_iva, 2);

				MontoValuacionSinIva401 = redondear( (eval(monto_valuacion)  -  eval(m_iva))  -  eval(m_partida_401)    , 2);
		        MontoValuacionSinIva    = redondear( (eval(monto_valuacion)  -  eval(m_iva)), 2);

		        if(eval(m_iva)==eval(0)){
			        $('EjeValuacionePRetencionIva0').checked      = true;
			        $('EjeValuacionePRetencionIva75').checked     = false;
			        $('EjeValuacionePRetencionIva100').checked    = false;
			        $('EjeValuacionePMontoIva').value             = "0,00";
			        PMontoIva                                     = 0;
		        }

               //INCIO - CALCULANDO MONTO DE LA RETENCION DEL IVA//
                 MRetencionIva = eval(m_iva) *  eval(PRetencionIva) ;
               //FIN- CALCULANDO MONTO DE LA RETENCION DEL IVA//


               //INCIO - CALCULANDO MONTO DEL ISLR//
			        if(ObjetoRif=="4"){
						m_sustraendo  = eval(MSustraendoNeto) * eval(PRetencionIslr);
					}//fin else

					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(38.33)){m_sustraendo=115;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(45.83)){m_sustraendo=137.50;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(54.16)){m_sustraendo=162.50;}

					MRetencionIslr = ((eval(MontoValuacionSinIva401) *  eval(PRetencionIslr))  -  eval(m_sustraendo));
			   //FIN - CALCULANDO MONTO DEL ISLR//

			   //INCIO - CALCULANDO MONTO DEL TIMBRE FISCAL//
                 MRetencionTf = (eval(MontoValuacionSinIva401) / eval(1000)) *  eval(PRetencionTf) ;
               //FIN- CALCULANDO MONTO DEL TIMBRE FISCAL//

               //INCIO - CALCULANDO MONTO DEL IMPUESTO MUNICIPAL/
                 MRetencionIm = eval(MontoValuacionSinIva401) *  eval(PRetencionIm) ;
               //FIN- CALCULANDO MONTO DEL IMPUESTO MUNICIPAL//

               //INCIO - CALCULANDO MONTO DE LA AMORTIZACION//
               if(eval(saldo_documento_actual) == eval(0)){
                       MAmortizacion = saldo_anticipo;
               }else{
                   if(AnticipoConIva == '1'){
                       MAmortizacion = eval(monto_valuacion) *  eval(PAmortizacion) ;
                   }else{
                       MAmortizacion = eval(MontoValuacionSinIva401) *  eval(PAmortizacion) ;
                   }
               }
               //FIN- CALCULANDO MONTO DE LA AMORTIZACION//

               //////INICIO - SUMATORIA RETENCIONES////
               MOrdenPago  = eval(monto_valuacion) - eval(MAmortizacion) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               MReteciones = eval(MRetencionIva) + eval(MRetencionIslr) + eval(MRetencionTf) + eval(MRetencionIm) + eval(MAmortizacion);
               MCheque     = eval(monto_valuacion) - eval(MReteciones) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               //////FIN - SUMATORIA RETENCIONES////

               /////INICIO - MONTAR CALCULOS/////
	                $('EjeValuacioneMTotalCancelar').value      = formato_mostrar_return(monto_valuacion);
					$('EjeValuacioneMMontoIva').value           = formato_mostrar_return(m_iva);
					$('EjeValuacioneMDescontarImpuesto').value  = formato_mostrar_return(MontoValuacionSinIva401);
					$('EjeValuacioneMAmortizacion').value       = formato_mostrar_return(MAmortizacion);
					$('EjeValuacioneMOrdenPago').value          = formato_mostrar_return(MOrdenPago);
					$('EjeValuacioneMRetencionIva').value       = formato_mostrar_return(MRetencionIva);
					$('EjeValuacioneMRetencionIslr').value      = formato_mostrar_return(MRetencionIslr);
					$('EjeValuacioneMSustraendo').value         = formato_mostrar_return(m_sustraendo);
					$('EjeValuacioneMRetencionTf').value        = formato_mostrar_return(MRetencionTf);
					$('EjeValuacioneMRetencionIm').value        = formato_mostrar_return(MRetencionIm);
					$('EjeValuacioneMRetenciones').value        = formato_mostrar_return(MReteciones);
					$('EjeValuacioneMCheque').value             = formato_mostrar_return(MCheque);
               /////FIN - MONTAR CALCULOS///////


        }else if(tipo_documento=="2"){


                MontoManoObra = retornar_valor_calculo($('EjeValuacioneMontoManoObra').value);

                if(eval(MontoManoObra)>eval(monto_valuacion)){
					error('MONTO DE LA MANO DE OBRA NO PUEDE SER MAYOR AL MONTO DE LA VALUACI&oacute;N');
					$('EjeValuacioneMontoManoObra').value = "0,00";
					                        MontoManoObra = 0;
				}

				if(MontoManoObra==0){PRetencionLaboral = 0;}
				if(RetencionIncluyeIva=="1"){
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2 );
				}else{
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2);
				}

				if(RetencionIncluyeIva=="1"){
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2 );
				}else{
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2);
				}

                m_iva           = m_partida_403180100;
                TotalRetencion  = 0;

				if(RetencionIncluyeIva=="1"  && (PRetencionFiel!=0 || PRetencionLaboral!=0)){
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);

				}else{
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);
				}

                MDescontarImpuesto   = eval(monto_valuacion) - eval(m_iva) - eval(MRetencionFiel) - eval(MRetencionLaboral);
		        MDescontarImpuesto   = redondear(MDescontarImpuesto, 2);

		        if(eval(m_iva)==eval(0)){
			        $('EjeValuacionePRetencionIva0').checked      = true;
			        $('EjeValuacionePRetencionIva75').checked     = false;
			        $('EjeValuacionePRetencionIva100').checked    = false;
			        $('EjeValuacionePMontoIva').value             = "0,00";
			        PMontoIva                                     = 0;
		        }

               //INCIO - CALCULANDO MONTO DE LA RETENCION DEL IVA//
                 MRetencionIva = eval(m_iva) *  eval(PRetencionIva) ;
               //FIN- CALCULANDO MONTO DE LA RETENCION DEL IVA//


               //INCIO - CALCULANDO MONTO DEL ISLR//
			        if(ObjetoRif=="4"){
						m_sustraendo  = eval(MSustraendoNeto) * eval(PRetencionIslr);
					}//fin else

					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(38.33)){m_sustraendo=115;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(45.83)){m_sustraendo=137.50;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(54.16)){m_sustraendo=162.50;}

					MRetencionIslr = ((eval(MDescontarImpuesto) *  eval(PRetencionIslr))  -  eval(m_sustraendo));
			   //FIN - CALCULANDO MONTO DEL ISLR//

			   //INCIO - CALCULANDO MONTO DEL TIMBRE FISCAL//
                 MRetencionTf = (eval(MDescontarImpuesto) / eval(1000)) *  eval(PRetencionTf) ;
               //FIN- CALCULANDO MONTO DEL TIMBRE FISCAL//

               //INCIO - CALCULANDO MONTO DEL IMPUESTO MUNICIPAL/
                 MRetencionIm = eval(MDescontarImpuesto) *  eval(PRetencionIm) ;
               //FIN- CALCULANDO MONTO DEL IMPUESTO MUNICIPAL//

               //INCIO - CALCULANDO MONTO DE LA AMORTIZACION//
               if(eval(saldo_documento_actual) == eval(0)){
                       MAmortizacion = saldo_anticipo;
               }else{
                   if(AnticipoConIva == '1'){
                       MAmortizacion = eval(monto_valuacion) *  eval(PAmortizacion) ;
                   }else{
					   iva_aux_ccc2         = redondear(eval(monto_valuacion)  / (eval(1) + eval(PMontoIva)),2);
					   iva_aux_ccc3         = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc2),2);
					   MontoValuacionSinIva = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc3),2);
                       MAmortizacion        = eval(MontoValuacionSinIva) *  eval(PAmortizacion) ;
                   }
               }
               //FIN- CALCULANDO MONTO DE LA AMORTIZACION//

               //////INICIO - SUMATORIA RETENCIONES////
               MOrdenPago  = eval(monto_valuacion) - eval(MAmortizacion) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               MReteciones = eval(MRetencionIva) + eval(MRetencionIslr) + eval(MRetencionTf) + eval(MRetencionIm) + eval(MAmortizacion);
               MCheque     = eval(monto_valuacion) - eval(MReteciones) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               //////FIN - SUMATORIA RETENCIONES////

               /////INICIO - MONTAR CALCULOS/////
	                $('EjeValuacioneMTotalCancelar').value      = formato_mostrar_return(monto_valuacion);
					$('EjeValuacioneMMontoIva').value           = formato_mostrar_return(m_iva);
					$('EjeValuacioneMDescontarImpuesto').value  = formato_mostrar_return(MDescontarImpuesto);
					$('EjeValuacioneMAmortizacion').value       = formato_mostrar_return(MAmortizacion);
					$('EjeValuacioneMOrdenPago').value          = formato_mostrar_return(MOrdenPago);
					$('EjeValuacioneMRetencionIva').value       = formato_mostrar_return(MRetencionIva);
					$('EjeValuacioneMRetencionIslr').value      = formato_mostrar_return(MRetencionIslr);
					$('EjeValuacioneMSustraendo').value         = formato_mostrar_return(m_sustraendo);
					$('EjeValuacioneMRetencionTf').value        = formato_mostrar_return(MRetencionTf);
					$('EjeValuacioneMRetencionIm').value        = formato_mostrar_return(MRetencionIm);
					$('EjeValuacioneMRetenciones').value        = formato_mostrar_return(MReteciones);
					$('EjeValuacioneMCheque').value             = formato_mostrar_return(MCheque);
					$('EjeValuacioneMRetencionLaboral').value   = formato_mostrar_return(MRetencionLaboral);
					$('EjeValuacioneMRetencionFiel').value      = formato_mostrar_return(MRetencionFiel);
               /////FIN - MONTAR CALCULOS///////




		}else if(tipo_documento=="3"){


		        MontoManoObra = retornar_valor_calculo($('EjeValuacioneMontoManoObra').value);

                if(eval(MontoManoObra)>eval(monto_valuacion)){
					error('MONTO DE LA MANO DE OBRA NO PUEDE SER MAYOR AL MONTO DE LA VALUACI&oacute;N');
					$('EjeValuacioneMontoManoObra').value = "0,00";
					                        MontoManoObra = 0;
				}

				if(MontoManoObra==0){PRetencionLaboral = 0;}
				if(RetencionIncluyeIva=="1"){
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2 );
				}else{
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2);
				}

				if(RetencionIncluyeIva=="1"){
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2 );
				}else{
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2);
				}

                m_iva           = m_partida_403180100;
                TotalRetencion  = 0;

				if(RetencionIncluyeIva=="1"  && (PRetencionFiel!=0 || PRetencionLaboral!=0)){
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral) + eval(m_partida_401);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);

				}else{
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral) + eval(m_partida_401);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);
				}

                MDescontarImpuesto   = eval(monto_valuacion) - eval(m_iva) - eval(MRetencionFiel) - eval(MRetencionLaboral);
		        MDescontarImpuesto   = redondear(MDescontarImpuesto, 2);

		        if(eval(m_iva)==eval(0)){
			        $('EjeValuacionePRetencionIva0').checked      = true;
			        $('EjeValuacionePRetencionIva75').checked     = false;
			        $('EjeValuacionePRetencionIva100').checked    = false;
			        $('EjeValuacionePMontoIva').value             = "0,00";
			        PMontoIva                                     = 0;
		        }

               //INCIO - CALCULANDO MONTO DE LA RETENCION DEL IVA//
                 MRetencionIva = eval(m_iva) *  eval(PRetencionIva) ;
               //FIN- CALCULANDO MONTO DE LA RETENCION DEL IVA//


               //INCIO - CALCULANDO MONTO DEL ISLR//
			        if(ObjetoRif=="4"){
						m_sustraendo  = eval(MSustraendoNeto) * eval(PRetencionIslr);
					}//fin else

					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(38.33)){m_sustraendo=115;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(45.83)){m_sustraendo=137.50;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(54.16)){m_sustraendo=162.50;}

					MRetencionIslr = ((eval(MDescontarImpuesto) *  eval(PRetencionIslr))  -  eval(m_sustraendo));
			   //FIN - CALCULANDO MONTO DEL ISLR//

			   //INCIO - CALCULANDO MONTO DEL TIMBRE FISCAL//
                 MRetencionTf = (eval(MDescontarImpuesto) / eval(1000)) *  eval(PRetencionTf) ;
               //FIN- CALCULANDO MONTO DEL TIMBRE FISCAL//

               //INCIO - CALCULANDO MONTO DEL IMPUESTO MUNICIPAL/
                 MRetencionIm = eval(MDescontarImpuesto) *  eval(PRetencionIm) ;
               //FIN- CALCULANDO MONTO DEL IMPUESTO MUNICIPAL//

               //INCIO - CALCULANDO MONTO DE LA AMORTIZACION//
               if(eval(saldo_documento_actual) == eval(0)){
                       MAmortizacion = saldo_anticipo;
               }else{
                   if(AnticipoConIva == '1'){
                       MAmortizacion = eval(monto_valuacion) *  eval(PAmortizacion) ;
                   }else{
					   iva_aux_ccc2         = redondear(eval(monto_valuacion)  / (eval(1) + eval(PMontoIva)),2);
					   iva_aux_ccc3         = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc2),2);
					   MontoValuacionSinIva = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc3),2);
                       MAmortizacion        = eval(MontoValuacionSinIva) *  eval(PAmortizacion) ;
                   }
               }
               //FIN- CALCULANDO MONTO DE LA AMORTIZACION//

               //////INICIO - SUMATORIA RETENCIONES////
               MOrdenPago  = eval(monto_valuacion) - eval(MAmortizacion) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               MReteciones = eval(MRetencionIva) + eval(MRetencionIslr) + eval(MRetencionTf) + eval(MRetencionIm) + eval(MAmortizacion);
               MCheque     = eval(monto_valuacion) - eval(MReteciones) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               //////FIN - SUMATORIA RETENCIONES////

               /////INICIO - MONTAR CALCULOS/////
	                $('EjeValuacioneMTotalCancelar').value      = formato_mostrar_return(monto_valuacion);
					$('EjeValuacioneMMontoIva').value           = formato_mostrar_return(m_iva);
					$('EjeValuacioneMDescontarImpuesto').value  = formato_mostrar_return(MDescontarImpuesto);
					$('EjeValuacioneMAmortizacion').value       = formato_mostrar_return(MAmortizacion);
					$('EjeValuacioneMOrdenPago').value          = formato_mostrar_return(MOrdenPago);
					$('EjeValuacioneMRetencionIva').value       = formato_mostrar_return(MRetencionIva);
					$('EjeValuacioneMRetencionIslr').value      = formato_mostrar_return(MRetencionIslr);
					$('EjeValuacioneMSustraendo').value         = formato_mostrar_return(m_sustraendo);
					$('EjeValuacioneMRetencionTf').value        = formato_mostrar_return(MRetencionTf);
					$('EjeValuacioneMRetencionIm').value        = formato_mostrar_return(MRetencionIm);
					$('EjeValuacioneMRetenciones').value        = formato_mostrar_return(MReteciones);
					$('EjeValuacioneMCheque').value             = formato_mostrar_return(MCheque);
					$('EjeValuacioneMRetencionLaboral').value   = formato_mostrar_return(MRetencionLaboral);
					$('EjeValuacioneMRetencionFiel').value      = formato_mostrar_return(MRetencionFiel);
               /////FIN - MONTAR CALCULOS///////


		}//fin else
		///////////FIN DE CALCULOS////////////////


}else{

       for (ii=0; ii<n_filas; ii++){
		  document.getElementById("monto_"+ii).value   = formato_mostrar_return(0);
		}
	   $('EjeValuacioneMontoValuacion').value   = '0,00';
	   $("total_final").innerHTML               = '<b>'+formato_mostrar_return(0)+'</b>';
       error("EL MONTO DE LA "+documento_titulo[tipo_documento]+" ES MAYOR AL SALDO DEL DOCUMENTO");

}







}//fin function













function calcular_labfiel(id){

var valor_partidas   = new Array();
var documento_titulo = new Array();

documento_titulo[1]  = "AUTORIZACI&oacute;N";
documento_titulo[2]  = "RETENCI&oacute;N";
documento_titulo[3]  = "RETENCI&oacute;N";


total_final        = 0;
monto_iva          = 0;


n_filas            = document.getElementById('total_filas').value;
monto_p_valuacion  = document.getElementById('monto_p_valuacion').value;
monto_t_valuacion  = document.getElementById('monto_t_valuacion').value;
saldo_documento    = document.getElementById('EjeLaboralFielcumplimientoSaldoDocumento').value;
saldo_anticipo     = document.getElementById('EjeLaboralFielcumplimientoSaldoAnticipo').value;
tipo_documento     = document.getElementById('EjeLaboralFielcumplimientoTipoDocumento').value;
monto_valuacion    = document.getElementById('EjeLaboralFielcumplimientoMontoValuacion').value;

////////////MONTO VALUACIÓN//////////////////
		var str = monto_valuacion;
		for(i=0; i<monto_valuacion.length; i++){str = str.replace('.','');}
		str = str.replace(',','.');
		var monto_valuacion = str;
////////////////////////////////////////////

saldo_documento_actual = redondear(eval(saldo_documento) - eval(monto_valuacion), 2);

		for (ii=0; ii<n_filas; ii++){

		  monto_partida      =  document.getElementById('monto_partida_'+ii).value;
          monto_parcial      = ((eval(monto_valuacion) * eval(monto_partida)) / eval(monto_p_valuacion));
          valor_partidas[ii] = redondear(monto_parcial, 2);
          total_final        = eval(total_final) + eval(redondear(monto_parcial, 2));

		}

		total_final = redondear(total_final,2);



if(eval(monto_t_valuacion)>=eval(monto_valuacion)){

		if(eval(monto_valuacion)!=eval(total_final)){

				for (ii=0; ii<n_filas; ii++){

				  monto_actual     =  document.getElementById('monto_actual_'+ii).value;
				  monto_partida    =  document.getElementById('monto_partida_'+ii).value;
				  diferencia       =  0;

				  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])>eval(monto_actual)){
				       diferencia         = eval(valor_partidas[ii]) - eval(monto_actual);
				       valor_partidas[ii] = eval(valor_partidas[ii]) - eval(diferencia);
				       total_final        = eval(total_final) - eval(diferencia);
				  }//fin fin
                  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])<eval(monto_actual)){
                       diferencia         = eval(monto_actual)       - eval(valor_partidas[ii]);
                       valor_partidas[ii] = eval(valor_partidas[ii]) + eval(diferencia);
                       total_final        = eval(total_final) + eval(diferencia);
                 }//fin fin


		                        if(eval(monto_valuacion)<eval(total_final)  && eval(diferencia)==eval(0)){

		                          total_final        = eval(total_final)  - eval(0.01);
                                  valor_partidas[ii] = valor_partidas[ii] - eval(0.01);

		                  }else if(eval(monto_valuacion)>eval(total_final) && eval(diferencia)==eval(0)){

		                          total_final        = eval(total_final)  + eval(0.01);
                                  valor_partidas[ii] = valor_partidas[ii] + eval(0.01);

		                  }

		                  document.getElementById("monto_"+ii).value   = formato_mostrar_return(valor_partidas[ii]);
				 }

		}else{
				for (ii=0; ii<n_filas; ii++){

				  monto_actual     =  document.getElementById('monto_actual_'+ii).value;
				  monto_partida    =  document.getElementById('monto_partida_'+ii).value;

				  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])>eval(monto_actual)){ diferencia = eval(valor_partidas[ii]) - eval(monto_actual);        valor_partidas[ii] = eval(valor_partidas[ii]) - eval(diferencia);  total_final = eval(total_final) - eval(diferencia);}//fin fin
                  if(eval(saldo_documento_actual)==eval(0) && eval(valor_partidas[ii])<eval(monto_actual)){ diferencia = eval(monto_actual)       - eval(valor_partidas[ii]);  valor_partidas[ii] = eval(valor_partidas[ii]) + eval(diferencia);  total_final = eval(total_final) + eval(diferencia);}//fin fin

		                  document.getElementById("monto_"+ii).value   = formato_mostrar_return(valor_partidas[ii]);
				 }
		}

		document.getElementById("total_final").innerHTML   = '<b>'+formato_mostrar_return(total_final)+'</b>';

		m_partida_403180100 = 0; //monto partida del iva
		m_partida_401       = 0; //monto partida 401
		m_partida_411       = 0; //monto partida 411
		m_iva               = 0; //monto del iva de la valuación
		m_sustraendo        = 0; //inicializando monto sustraendo
		MRetencionFiel      = 0; //Monto del fiel cumplimiento
		MRetencionLaboral   = 0; //Monto de laboral

		for (ii=0; ii<n_filas; ii++){
                if(document.getElementById('tipo_partida_'+ii).value=="403180100"){

            m_partida_403180100 = eval(m_partida_403180100) + eval(valor_partidas[ii]);

          }else if(document.getElementById('tipo_partida_'+ii).value=="401"){

            m_partida_401     = eval(m_partida_401) + eval(valor_partidas[ii]);

          }else if(document.getElementById('tipo_partida_'+ii).value=="411"){

            m_partida_411     = eval(m_partida_411) + eval(valor_partidas[ii]);

          }
		}
		m_partida_403180100 = redondear(m_partida_403180100,2);
		m_partida_401       = redondear(m_partida_401,2);
		m_partida_411       = redondear(m_partida_411,2);

		PMontoIva    = retornar_valor_calculo($('EjeLaboralFielcumplimientoPMontoIva').value);
		PMontoIva    = eval(PMontoIva) / eval(100); ///PORCENTAJE IVA

		PRetencionTf = retornar_valor_calculo($('EjeLaboralFielcumplimientoPRetencionTf').value);
		PRetencionTf = eval(PRetencionTf) / eval(100);///PORCENTAJE TIMBRE FISCAL

		PRetencionIslr = retornar_valor_calculo($('EjeLaboralFielcumplimientoPRetencionIslr').value);
		PRetencionIslr = eval(PRetencionIslr) / eval(100);///PORCENTAJE IMPUESTO SOBRE LA RENTA

		PRetencionIm = retornar_valor_calculo($('EjeLaboralFielcumplimientoPRetencionIm').value);
		PRetencionIm = eval(PRetencionIm) / eval(100);///PORCENTAJE IMPUESTO MUNICIPAL

		PAmortizacion = retornar_valor_calculo($('EjeLaboralFielcumplimientoPAmortizacion').value);
		PAmortizacion = eval(PAmortizacion) / eval(100);///PORCENTAJE DE AMORTIZACIÓN

		if($('EjeLaboralFielcumplimientoPRetencionLaboral')){
		  PRetencionLaboral = retornar_valor_calculo($('EjeLaboralFielcumplimientoPRetencionLaboral').value);
		  PRetencionLaboral = eval(PRetencionLaboral) / eval(100);///PORCENTAJE DE RETENCION LABORAL
		}else{
		  PRetencionLaboral = 0;
		}

		if($('EjeLaboralFielcumplimientoPRetencionFiel')){
		  PRetencionFiel = retornar_valor_calculo($('EjeLaboralFielcumplimientoPRetencionFiel').value);
		  PRetencionFiel = eval(PRetencionFiel) / eval(100);///PORCENTAJE DE RETENCION FIEL CUMPLIMIENTO
		}else{
		  PRetencionFiel = 0;
		}


		      if($('EjeLaboralFielcumplimientoPRetencionIva0').checked == true){
             PRetencionIva  = 0;
		}else if($('EjeLaboralFielcumplimientoPRetencionIva75').checked == true){
             PRetencionIva  = 75;
        }else if($('EjeLaboralFielcumplimientoPRetencionIva100').checked == true){
             PRetencionIva  = 100;
		}
		PRetencionIva = eval(PRetencionIva) / eval(100); //PORCENTAJE DE LA RETENCION DEL IVA

		MSustraendoNeto = retornar_valor_calculo($('EjeLaboralFielcumplimientoMSustraendoNeto').value);///MONTO DEL SUSTRAENDO NETO

		AnticipoConIva      = $('EjeLaboralFielcumplimientoAnticipoConIva').value;///SI EL ANTICIPO INCLUYE IVA
		RetencionIncluyeIva = $('EjeLaboralFielcumplimientoRetencionIncluyeIva').value;///SI LAS RETENCIONES INCLUYEN IVA
		ObjetoRif           = $('EjeLaboralFielcumplimientoObjetoRif').value;///OBJETO DEL RIF


		///////////INICIO DE CALCULOS////////////////
		if(tipo_documento=="1"){

		        m_iva = m_partida_403180100;

				factor_reversion = redondear(eval(1) + eval(PMontoIva),2);
			  	base             = redondear(eval(m_partida_411) / eval(factor_reversion),2);
				m_partida_411    = eval(m_partida_411) - eval(base);
				m_iva            = eval(m_iva) +  eval(m_partida_411);
				m_iva            = redondear(m_iva, 2);

				MontoValuacionSinIva401 = redondear( (eval(monto_valuacion)  -  eval(m_iva))  -  eval(m_partida_401)    , 2);
		        MontoValuacionSinIva    = redondear( (eval(monto_valuacion)  -  eval(m_iva)), 2);

		        if(eval(m_iva)==eval(0)){
			        $('EjeLaboralFielcumplimientoPRetencionIva0').checked      = true;
			        $('EjeLaboralFielcumplimientoPRetencionIva75').checked     = false;
			        $('EjeLaboralFielcumplimientoPRetencionIva100').checked    = false;
			        $('EjeLaboralFielcumplimientoPMontoIva').value             = "0,00";
			        PMontoIva                                     = 0;
		        }

               //INCIO - CALCULANDO MONTO DE LA RETENCION DEL IVA//
                 MRetencionIva = eval(m_iva) *  eval(PRetencionIva) ;
               //FIN- CALCULANDO MONTO DE LA RETENCION DEL IVA//


               //INCIO - CALCULANDO MONTO DEL ISLR//
			        if(ObjetoRif=="4"){
						m_sustraendo  = eval(MSustraendoNeto) * eval(PRetencionIslr);
					}//fin else

					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(38.33)){m_sustraendo=115;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(45.83)){m_sustraendo=137.50;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(54.16)){m_sustraendo=162.50;}

					MRetencionIslr = ((eval(MontoValuacionSinIva401) *  eval(PRetencionIslr))  -  eval(m_sustraendo));
			   //FIN - CALCULANDO MONTO DEL ISLR//

			   //INCIO - CALCULANDO MONTO DEL TIMBRE FISCAL//
                 MRetencionTf = (eval(MontoValuacionSinIva401) / eval(1000)) *  eval(PRetencionTf) ;
               //FIN- CALCULANDO MONTO DEL TIMBRE FISCAL//

               //INCIO - CALCULANDO MONTO DEL IMPUESTO MUNICIPAL/
                 MRetencionIm = eval(MontoValuacionSinIva401) *  eval(PRetencionIm) ;
               //FIN- CALCULANDO MONTO DEL IMPUESTO MUNICIPAL//

               //INCIO - CALCULANDO MONTO DE LA AMORTIZACION//
               if(eval(saldo_documento_actual) == eval(0)){
                       MAmortizacion = saldo_anticipo;
               }else{
                   if(AnticipoConIva == '1'){
                       MAmortizacion = eval(monto_valuacion) *  eval(PAmortizacion) ;
                   }else{
                       MAmortizacion = eval(MontoValuacionSinIva401) *  eval(PAmortizacion) ;
                   }
               }
               //FIN- CALCULANDO MONTO DE LA AMORTIZACION//

               //////INICIO - SUMATORIA RETENCIONES////
               MOrdenPago  = eval(monto_valuacion) - eval(MAmortizacion) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               MReteciones = eval(MRetencionIva) + eval(MRetencionIslr) + eval(MRetencionTf) + eval(MRetencionIm) + eval(MAmortizacion);
               MCheque     = eval(monto_valuacion) - eval(MReteciones) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               //////FIN - SUMATORIA RETENCIONES////

               /////INICIO - MONTAR CALCULOS/////
	                $('EjeLaboralFielcumplimientoMTotalCancelar').value      = formato_mostrar_return(monto_valuacion);
					$('EjeLaboralFielcumplimientoMMontoIva').value           = formato_mostrar_return(m_iva);
					$('EjeLaboralFielcumplimientoMDescontarImpuesto').value  = formato_mostrar_return(MontoValuacionSinIva401);
					$('EjeLaboralFielcumplimientoMAmortizacion').value       = formato_mostrar_return(MAmortizacion);
					$('EjeLaboralFielcumplimientoMOrdenPago').value          = formato_mostrar_return(MOrdenPago);
					$('EjeLaboralFielcumplimientoMRetencionIva').value       = formato_mostrar_return(MRetencionIva);
					$('EjeLaboralFielcumplimientoMRetencionIslr').value      = formato_mostrar_return(MRetencionIslr);
					$('EjeLaboralFielcumplimientoMSustraendo').value         = formato_mostrar_return(m_sustraendo);
					$('EjeLaboralFielcumplimientoMRetencionTf').value        = formato_mostrar_return(MRetencionTf);
					$('EjeLaboralFielcumplimientoMRetencionIm').value        = formato_mostrar_return(MRetencionIm);
					$('EjeLaboralFielcumplimientoMRetenciones').value        = formato_mostrar_return(MReteciones);
					$('EjeLaboralFielcumplimientoMCheque').value             = formato_mostrar_return(MCheque);
               /////FIN - MONTAR CALCULOS///////


        }else if(tipo_documento=="2"){


                MontoManoObra = retornar_valor_calculo($('EjeLaboralFielcumplimientoMontoManoObra').value);

                if(eval(MontoManoObra)>eval(monto_valuacion)){
					error('MONTO DE LA MANO DE OBRA NO PUEDE SER MAYOR AL MONTO DE LA VALUACI&oacute;N');
					$('EjeLaboralFielcumplimientoMontoManoObra').value = "0,00";
					                        MontoManoObra = 0;
				}

				if(MontoManoObra==0){PRetencionLaboral = 0;}
				if(RetencionIncluyeIva=="1"){
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2 );
				}else{
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2);
				}

				if(RetencionIncluyeIva=="1"){
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2 );
				}else{
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2);
				}

                m_iva           = m_partida_403180100;
                TotalRetencion  = 0;

				if(RetencionIncluyeIva=="1"  && (PRetencionFiel!=0 || PRetencionLaboral!=0)){
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);

				}else{
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);
				}

                MDescontarImpuesto   = eval(monto_valuacion) - eval(m_iva) - eval(MRetencionFiel) - eval(MRetencionLaboral);
		        MDescontarImpuesto   = redondear(MDescontarImpuesto, 2);

		        if(eval(m_iva)==eval(0)){
			        $('EjeLaboralFielcumplimientoPRetencionIva0').checked      = true;
			        $('EjeLaboralFielcumplimientoPRetencionIva75').checked     = false;
			        $('EjeLaboralFielcumplimientoPRetencionIva100').checked    = false;
			        $('EjeLaboralFielcumplimientoPMontoIva').value             = "0,00";
			        PMontoIva                                     = 0;
		        }

               //INCIO - CALCULANDO MONTO DE LA RETENCION DEL IVA//
                 MRetencionIva = eval(m_iva) *  eval(PRetencionIva) ;
               //FIN- CALCULANDO MONTO DE LA RETENCION DEL IVA//


               //INCIO - CALCULANDO MONTO DEL ISLR//
			        if(ObjetoRif=="4"){
						m_sustraendo  = eval(MSustraendoNeto) * eval(PRetencionIslr);
					}//fin else

					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(38.33)){m_sustraendo=115;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(45.83)){m_sustraendo=137.50;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(54.16)){m_sustraendo=162.50;}

					MRetencionIslr = ((eval(MDescontarImpuesto) *  eval(PRetencionIslr))  -  eval(m_sustraendo));
			   //FIN - CALCULANDO MONTO DEL ISLR//

			   //INCIO - CALCULANDO MONTO DEL TIMBRE FISCAL//
                 MRetencionTf = (eval(MDescontarImpuesto) / eval(1000)) *  eval(PRetencionTf) ;
               //FIN- CALCULANDO MONTO DEL TIMBRE FISCAL//

               //INCIO - CALCULANDO MONTO DEL IMPUESTO MUNICIPAL/
                 MRetencionIm = eval(MDescontarImpuesto) *  eval(PRetencionIm) ;
               //FIN- CALCULANDO MONTO DEL IMPUESTO MUNICIPAL//

               //INCIO - CALCULANDO MONTO DE LA AMORTIZACION//
               if(eval(saldo_documento_actual) == eval(0)){
                       MAmortizacion = saldo_anticipo;
               }else{
                   if(AnticipoConIva == '1'){
                       MAmortizacion = eval(monto_valuacion) *  eval(PAmortizacion) ;
                   }else{
					   iva_aux_ccc2         = redondear(eval(monto_valuacion)  / (eval(1) + eval(PMontoIva)),2);
					   iva_aux_ccc3         = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc2),2);
					   MontoValuacionSinIva = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc3),2);
                       MAmortizacion        = eval(MontoValuacionSinIva) *  eval(PAmortizacion) ;
                   }
               }
               //FIN- CALCULANDO MONTO DE LA AMORTIZACION//

               //////INICIO - SUMATORIA RETENCIONES////
               MOrdenPago  = eval(monto_valuacion) - eval(MAmortizacion) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               MReteciones = eval(MRetencionIva) + eval(MRetencionIslr) + eval(MRetencionTf) + eval(MRetencionIm) + eval(MAmortizacion);
               MCheque     = eval(monto_valuacion) - eval(MReteciones) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               //////FIN - SUMATORIA RETENCIONES////

               /////INICIO - MONTAR CALCULOS/////
	                $('EjeLaboralFielcumplimientoMTotalCancelar').value      = formato_mostrar_return(monto_valuacion);
					$('EjeLaboralFielcumplimientoMMontoIva').value           = formato_mostrar_return(m_iva);
					$('EjeLaboralFielcumplimientoMDescontarImpuesto').value  = formato_mostrar_return(MDescontarImpuesto);
					$('EjeLaboralFielcumplimientoMAmortizacion').value       = formato_mostrar_return(MAmortizacion);
					$('EjeLaboralFielcumplimientoMOrdenPago').value          = formato_mostrar_return(MOrdenPago);
					$('EjeLaboralFielcumplimientoMRetencionIva').value       = formato_mostrar_return(MRetencionIva);
					$('EjeLaboralFielcumplimientoMRetencionIslr').value      = formato_mostrar_return(MRetencionIslr);
					$('EjeLaboralFielcumplimientoMSustraendo').value         = formato_mostrar_return(m_sustraendo);
					$('EjeLaboralFielcumplimientoMRetencionTf').value        = formato_mostrar_return(MRetencionTf);
					$('EjeLaboralFielcumplimientoMRetencionIm').value        = formato_mostrar_return(MRetencionIm);
					$('EjeLaboralFielcumplimientoMRetenciones').value        = formato_mostrar_return(MReteciones);
					$('EjeLaboralFielcumplimientoMCheque').value             = formato_mostrar_return(MCheque);
					$('EjeLaboralFielcumplimientoMRetencionLaboral').value   = formato_mostrar_return(MRetencionLaboral);
					$('EjeLaboralFielcumplimientoMRetencionFiel').value      = formato_mostrar_return(MRetencionFiel);
               /////FIN - MONTAR CALCULOS///////




		}else if(tipo_documento=="3"){


		        MontoManoObra = retornar_valor_calculo($('EjeLaboralFielcumplimientoMontoManoObra').value);

                if(eval(MontoManoObra)>eval(monto_valuacion)){
					error('MONTO DE LA MANO DE OBRA NO PUEDE SER MAYOR AL MONTO DE LA VALUACI&oacute;N');
					$('EjeLaboralFielcumplimientoMontoManoObra').value = "0,00";
					                        MontoManoObra = 0;
				}

				if(MontoManoObra==0){PRetencionLaboral = 0;}
				if(RetencionIncluyeIva=="1"){
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2 );
				}else{
				  MRetencionLaboral = redondear(eval(MontoManoObra) * eval(PRetencionLaboral), 2);
				}

				if(RetencionIncluyeIva=="1"){
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2 );
				}else{
				  MRetencionFiel = redondear(eval(monto_valuacion) * eval(PRetencionFiel), 2);
				}

                m_iva           = m_partida_403180100;
                TotalRetencion  = 0;

				if(RetencionIncluyeIva=="1"  && (PRetencionFiel!=0 || PRetencionLaboral!=0)){
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral) + eval(m_partida_401);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);

				}else{
					              A  =  eval(MRetencionFiel) + eval(MRetencionLaboral) + eval(m_partida_401);
					              B  =  eval(monto_valuacion)-eval(A);
					 TotalRetencion  =  redondear(eval(B) /  (eval(1) + eval(PMontoIva)), 2);
					          m_iva  =  redondear(eval(B) - eval(TotalRetencion),2);
				}

                MDescontarImpuesto   = eval(monto_valuacion) - eval(m_iva) - eval(MRetencionFiel) - eval(MRetencionLaboral);
		        MDescontarImpuesto   = redondear(MDescontarImpuesto, 2);

		        if(eval(m_iva)==eval(0)){
			        $('EjeLaboralFielcumplimientoPRetencionIva0').checked      = true;
			        $('EjeLaboralFielcumplimientoPRetencionIva75').checked     = false;
			        $('EjeLaboralFielcumplimientoPRetencionIva100').checked    = false;
			        $('EjeLaboralFielcumplimientoPMontoIva').value             = "0,00";
			        PMontoIva                                     = 0;
		        }

               //INCIO - CALCULANDO MONTO DE LA RETENCION DEL IVA//
                 MRetencionIva = eval(m_iva) *  eval(PRetencionIva) ;
               //FIN- CALCULANDO MONTO DE LA RETENCION DEL IVA//


               //INCIO - CALCULANDO MONTO DEL ISLR//
			        if(ObjetoRif=="4"){
						m_sustraendo  = eval(MSustraendoNeto) * eval(PRetencionIslr);
					}//fin else

					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(38.33)){m_sustraendo=115;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(45.83)){m_sustraendo=137.50;}
					if(eval(PRetencionIslr)==eval(0.03) && eval(m_sustraendo)!=eval(0) && eval(MSustraendoNeto)==eval(54.16)){m_sustraendo=162.50;}

					MRetencionIslr = ((eval(MDescontarImpuesto) *  eval(PRetencionIslr))  -  eval(m_sustraendo));
			   //FIN - CALCULANDO MONTO DEL ISLR//

			   //INCIO - CALCULANDO MONTO DEL TIMBRE FISCAL//
                 MRetencionTf = (eval(MDescontarImpuesto) / eval(1000)) *  eval(PRetencionTf) ;
               //FIN- CALCULANDO MONTO DEL TIMBRE FISCAL//

               //INCIO - CALCULANDO MONTO DEL IMPUESTO MUNICIPAL/
                 MRetencionIm = eval(MDescontarImpuesto) *  eval(PRetencionIm) ;
               //FIN- CALCULANDO MONTO DEL IMPUESTO MUNICIPAL//

               //INCIO - CALCULANDO MONTO DE LA AMORTIZACION//
               if(eval(saldo_documento_actual) == eval(0)){
                       MAmortizacion = saldo_anticipo;
               }else{
                   if(AnticipoConIva == '1'){
                       MAmortizacion = eval(monto_valuacion) *  eval(PAmortizacion) ;
                   }else{
					   iva_aux_ccc2         = redondear(eval(monto_valuacion)  / (eval(1) + eval(PMontoIva)),2);
					   iva_aux_ccc3         = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc2),2);
					   MontoValuacionSinIva = redondear(eval(monto_valuacion)  -  eval(iva_aux_ccc3),2);
                       MAmortizacion        = eval(MontoValuacionSinIva) *  eval(PAmortizacion) ;
                   }
               }
               //FIN- CALCULANDO MONTO DE LA AMORTIZACION//

               //////INICIO - SUMATORIA RETENCIONES////
               MOrdenPago  = eval(monto_valuacion) - eval(MAmortizacion) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               MReteciones = eval(MRetencionIva) + eval(MRetencionIslr) + eval(MRetencionTf) + eval(MRetencionIm) + eval(MAmortizacion);
               MCheque     = eval(monto_valuacion) - eval(MReteciones) - eval(MRetencionFiel) - eval(MRetencionLaboral);
               //////FIN - SUMATORIA RETENCIONES////

               /////INICIO - MONTAR CALCULOS/////
	                $('EjeLaboralFielcumplimientoMTotalCancelar').value      = formato_mostrar_return(monto_valuacion);
					$('EjeLaboralFielcumplimientoMMontoIva').value           = formato_mostrar_return(m_iva);
					$('EjeLaboralFielcumplimientoMDescontarImpuesto').value  = formato_mostrar_return(MDescontarImpuesto);
					$('EjeLaboralFielcumplimientoMAmortizacion').value       = formato_mostrar_return(MAmortizacion);
					$('EjeLaboralFielcumplimientoMOrdenPago').value          = formato_mostrar_return(MOrdenPago);
					$('EjeLaboralFielcumplimientoMRetencionIva').value       = formato_mostrar_return(MRetencionIva);
					$('EjeLaboralFielcumplimientoMRetencionIslr').value      = formato_mostrar_return(MRetencionIslr);
					$('EjeLaboralFielcumplimientoMSustraendo').value         = formato_mostrar_return(m_sustraendo);
					$('EjeLaboralFielcumplimientoMRetencionTf').value        = formato_mostrar_return(MRetencionTf);
					$('EjeLaboralFielcumplimientoMRetencionIm').value        = formato_mostrar_return(MRetencionIm);
					$('EjeLaboralFielcumplimientoMRetenciones').value        = formato_mostrar_return(MReteciones);
					$('EjeLaboralFielcumplimientoMCheque').value             = formato_mostrar_return(MCheque);
					$('EjeLaboralFielcumplimientoMRetencionLaboral').value   = formato_mostrar_return(MRetencionLaboral);
					$('EjeLaboralFielcumplimientoMRetencionFiel').value      = formato_mostrar_return(MRetencionFiel);
               /////FIN - MONTAR CALCULOS///////


		}//fin else
		///////////FIN DE CALCULOS////////////////


}else{

       for (ii=0; ii<n_filas; ii++){
		  document.getElementById("monto_"+ii).value   = formato_mostrar_return(0);
		}
	   $('EjeLaboralFielcumplimientoMontoValuacion').value   = '0,00';
	   $("total_final").innerHTML               = '<b>'+formato_mostrar_return(0)+'</b>';
       error("EL MONTO DE LA "+documento_titulo[tipo_documento]+" ES MAYOR AL SALDO DEL DOCUMENTO");

}


}//fin function









function calcular_valuacion_reload(){



}



function retornar_valor_calculo(monto){

var var_aux = monto+'';
var str     = var_aux;
var acepta  = "no";

for(i=0; i<var_aux.length; i++){
 ch = var_aux.charAt(i);
 if(ch==","){acepta  = "si";}
}

if(acepta=="si"){
	for(i=0; i<var_aux.length; i++){str = str.replace('.','');}
	str   = str.replace(',','.');
}


var var_aux = str;

return var_aux;

}//fin funtion


function formato_cantidades(id,precision,mensaje){
	var str=document.getElementById(id).value;
	str=retornar_valor_calculo(str);
	var c=0;
	for(i=0; i<str.length; i++){
		if(str.charAt( i )!="."){
			c++;
		}else{
			var aux=i+1;
			break;
		}
	}

	var d=0;
	for(i=aux; i<str.length; i++){
			d++;
	}

	if(c<=precision && d<=2){
		//moneda(id);
	}else{
		if(mensaje){
			error(mensaje);
		}
		document.getElementById(id).value='';
		document.getElementById(id).focus();
		return false;
	}


}

function solo_cc(e){

	tecla_codigo = (document.all) ? e.keyCode : e.which;
	if(tecla_codigo==8 || tecla_codigo==0 || tecla_codigo==13)return true;
	patron =/[4-5\-]/;
	tecla_valor = String.fromCharCode(tecla_codigo);
	return patron.test(tecla_valor);

}//fin solo_cuatro_cinco


