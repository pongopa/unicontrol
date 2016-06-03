function cp1(t,max,ID,final){
    var IDs = new Array();
         IDs[1] = 'Frm2auxiliareSector';
         IDs[2] = 'Frm2auxiliarePrograma';
         IDs[3] = 'Frm2auxiliareSubprograma';
         IDs[4] = 'Frm2auxiliareProyecto';
         IDs[5] = 'Frm2auxiliareActivobra';
         IDs[6] = 'Frm2auxiliarePartida';
         IDs[7] = 'Frm2auxiliareGenerica';
         IDs[8] = 'Frm2auxiliareEspecifica';
         IDs[9] = 'Frm2auxiliareSubespecifica';
		longitud = t.value.length;
		var pasa = 0;
	    if(longitud+1==max && ID<10){
	        $(IDs[ID]).focus();
	        pasa = 1;

	    }else{
	       pasa = 0;
	    }
     if(final==1){
         c1 = $(IDs[1]).value;
         c2 = $(IDs[2]).value;
         c3 = $(IDs[3]).value;
         c4 = $(IDs[4]).value;
         c5 = $(IDs[5]).value;
         c6 = $(IDs[6]).value;
         c7 = $(IDs[7]).value;
         c8 = $(IDs[8]).value;
         c9 = $(IDs[9]).value;

         if(c1.length==2 && c2.length==2 && c3.length==2 && c4.length==2 && c5.length==2 && c6.length==3 && c7.length==2 && c8.length==2 && c9.length==2){
              if(c6>400){
                  buscar = c1 + '@' + c2 + '@' + c3 + '@' + c4 + '@' + c5 + '@' + c6 + '@' + c7 + '@' + c8 + '@' + c9;
                  ver_documento('/frm2auxiliares/codigos/1/'+buscar,'select_10');
              }else{
                 error('Verifique el codigo de la partida');
                 $(IDs[6]).focus();
              }

         }

     }
     return true;
}

function cp2(t){
    var IDs = new Array();
         IDs[1] = 'Frm2auxiliareSector';
         IDs[2] = 'Frm2auxiliarePrograma';
         IDs[3] = 'Frm2auxiliareSubprograma';
         IDs[4] = 'Frm2auxiliareProyecto';
         IDs[5] = 'Frm2auxiliareActivobra';
         IDs[6] = 'Frm2auxiliarePartida';
         IDs[7] = 'Frm2auxiliareGenerica';
         IDs[8] = 'Frm2auxiliareEspecifica';
         IDs[9] = 'Frm2auxiliareSubespecifica';
         IDs[10] = 'Frm2auxiliareCodigoAuxiliar';

         c1 = $(IDs[1]).value;
         c2 = $(IDs[2]).value;
         c3 = $(IDs[3]).value;
         c4 = $(IDs[4]).value;
         c5 = $(IDs[5]).value;
         c6 = $(IDs[6]).value;
         c7 = $(IDs[7]).value;
         c8 = $(IDs[8]).value;
         c9 = $(IDs[9]).value;

         if(c1.length==2 && c2.length==2 && c3.length==2 && c4.length==2 && c5.length==2 && c6.length==3 && c7.length==2 && c8.length==2 && c9.length==2 && t.value.length==4){
              buscar = c1 + '@' + c2 + '@' + c3 + '@' + c4 + '@' + c5 + '@' + c6 + '@' + c7 + '@' + c8 + '@' + c9;
              ver_documento('/frm2auxiliares/codigos/2/'+buscar+'/'+t.value,'select_10');
         }

     return true;
}


function cp3(t){
    var IDs = new Array();
         if(t.value.length==23){
              //num = t.value;//01060100514031801020000
              //alert(num.substring(17,15));
              buscar = t.value;
              ver_documento('/frm2auxiliares/detalle_codigo_presupuestario/'+buscar,'detalle_codigo_presupuestario');
         }

     return true;
}


function cp4(t){
    var IDs = new Array();
         if(t.value.length==23){
              buscar = t.value;
              ver_documento('/ComponentePartidas/detalle_codigo_presupuestario/'+buscar,'detalle_codigo_presupuestario');
         }

     return true;
}

function cp4_ejecucion(t){
    var IDs = new Array();
         if(t.value.length==23){
              buscar = t.value;
              ver_documento('/ComponentePartidas/detalle_codigo_presupuestario_ejecucion/'+buscar,'detalle_codigo_presupuestario');
         }

     return true;
}

function consolidacion(valor){
	if(valor==2){
		opcion='block';
	}else{
		opcion='none';
	}
	$('seleccion_dependencia2').style.display = opcion;
}



function consolidacion_2(valor){
	if(valor==2){
		jQuery(function ($){$("#info_dep").modal({ zIndex:1000000 });});
	}else{
		jQuery.modal.close();
	}
}


function GenerarContratacion(valor){
	if(valor==1){
		jQuery(function ($){$("#info_contratacion").modal({ zIndex:1000000 });});
	}else{
		jQuery.modal.close();
	}
}


function cola_impresion(valor){

    if(valor==1){
        $('div_especifica').style.display = 'none';
        $('div_rango').style.display = 'none';
        $('div_vaciar_cola').style.display = 'block';
    }else if(valor==2){
        $('div_especifica').style.display = 'none';
        $('div_rango').style.display = 'block';
        $('div_vaciar_cola').style.display = 'none';
    }else if(valor==3){
        $('div_especifica').style.display = 'block';
        $('div_rango').style.display = 'none';
        $('div_vaciar_cola').style.display = 'none';
    }

}

function verifica_partidas_agregadas(){
     var total = $('total_monto_partidas').value;
     if(total=='0' || total==0 || total=='0.00'){
          error('No existen partidas presupuestarias agregadas al documento');
          return false;
     }else{
          return true;
     }
}

function s_factura(){
   if($("f_numero_factura").value!=""){
      $("f_numero_control").value=$("f_numero_factura").value;
      var total=reemplazarPC($("monto_orden_pago").value);
      var m_base=0;
      var m_iva=0;
      var exc=0;
      //alert(total);
      formatear('f_monto_total',total);
      if($("f_iva").value!="0,00"){
           //info('primera parte');
           m_base=reemplazarPC($("monto_descontar_impuesto").value);//total/((document.getElementById("f_iva").value/100)+1);
           m_iva=reemplazarPC($('monto_iva_partidas').value); //document.getElementById("monto_base").value * (document.getElementById("f_iva").value/100);
           exc=eval(total)-(eval(m_base)+eval(m_iva));
           exc = redondear(exc, 2);
           formatear('f_monto_base',m_base,2);
           formatear('f_monto_iva',m_iva);
           formatear('f_excento',exc);
           formatear('f_iva',$("f_iva").value);
      }else{
         //info('segunda parte');
         $("f_iva").value=$("porcentaje_iva").value;
         //factor_iva = reemplazarPC($("porcentaje_iva").value);
         m_base=reemplazarPC($("monto_descontar_impuesto").value);//total/(($("f_iva").value/100)+1);
         m_iva=reemplazarPC($('monto_iva_partidas').value);//m_base*($("f_iva").value/100);
         //m_iva = redondear(m_iva, 2);
         exc=eval(total)-(eval(m_base)+eval(m_iva));
         //exc = redondear(exc, 2);
         formatear('f_monto_base',m_base);
         formatear('f_monto_iva',m_iva);
         formatear('f_excento',exc);
         //formatear('f_iva',$("f_iva").value);
       }
       $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
       $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;
   }
//s_factura();
}


function s_factura_cambio(){
   var X0=reemplazarPC($("f_monto_total").value);//reemplazarPC($("monto_total").value);
   var X1=reemplazarPC($("f_monto_base").value);
   var X2=reemplazarPC($("f_monto_iva").value);
   var X3=reemplazarPC($("f_excento").value);
   var X4=reemplazarPC($("f_iva").value);
   var X5=reemplazarPC($("porcentaje_iva").value);
   //alert(X0+" "+X1+" "+X2+" "+X3+" "+X4+" "+X5+" ");
  if($("f_monto_base").value!=""){
    $("bt_plus").disabled="";
      if($("f_iva").value!=""){
           X2=eval(X1)*(X4/100);
           X2 = redondear(X2, 2);
           X3=eval(X0)-(eval(X1)+eval(X2));
           X1=redondear(X1,2);
           X3 = redondear(X3, 2);
           formatear('f_monto_base',X1);
           formatear('f_monto_iva',X2);
           formatear('f_excento',X3);
           formatear('f_iva',X4);/**/
      }else{
         $("f_iva").value=reemplazarPC($("porcentaje_iva").value);
         X2=eval(X1)*(X5/100);
         X2 = redondear(X2, 2);
         X3=eval(X0)-(eval(X1)+eval(X2));
         X3 = redondear(X3, 2);
         formatear('f_monto_base',X1);
         formatear('f_monto_iva',X2);
         formatear('f_excento',X3);
         formatear('f_iva',X4);
      }
  }
  $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
  $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;
}//

function s_factura_cambio2(){
   var X0=reemplazarPC($("f_monto_total").value);
   var X1=reemplazarPC($("f_monto_base").value);
   var X2=reemplazarPC($("f_monto_iva").value);
   var X3=reemplazarPC($("f_excento").value);
   var X4=reemplazarPC($("f_iva").value);
   var X5=reemplazarPC($("porcentaje_iva").value);
   if($("f_monto_total").value!=""){
    	  $("bt_plus").disabled="";
          X3=eval(X0)-(eval(X1)+eval(X2));
          X3 = redondear(X3, 2);
          formatear('f_excento',X3);
  }
  $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
  $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;
}//
function s_factura_cambio3(){
   var X0=reemplazarPC($("f_monto_total").value);
   var X1=reemplazarPC($("f_monto_base").value);
   var X2=reemplazarPC($("f_monto_iva").value);
   var X3=reemplazarPC($("f_excento").value);
   var X4=reemplazarPC($("f_iva").value);
   var X5=reemplazarPC($("porcentaje_iva").value);
  if($("f_iva").value!=""){
    $("bt_plus").disabled="";
      if($("f_monto_base").value!=""){
           X2=eval(X1)*(X4/100);
           X2 = redondear(X2, 2);
           X3=eval(X0)-(eval(X1)+eval(X2));
           X3 = redondear(X3, 2);
           formatear('f_monto_iva',X2);
           formatear('f_excento',X3);
      }else{
         if($("f_monto_total").value!=""){
	         X1=eval(X0)/((X4/100)+1);
	         X2=eval(X1)*(X4/100);
	         X2 = redondear(X2, 2);
	         X3=eval(X0)-(eval(X1)+eval(X2));
	         X3 = redondear(X3, 2);
	         formatear('f_monto_base',redondear(X1,2));
             formatear('f_monto_iva',X2);
             formatear('f_excento',X3);
	     }else{
             error('no se puede realizar ninguna operacion, hace falta monto base o total');
	     }
      }
  }
  $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
  $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;
}//

function s_factura_cambio4(){
           var E=eval(reemplazarPC($("f_monto_total").value))-(eval(reemplazarPC($("f_monto_base").value))+eval(reemplazarPC($("f_monto_iva").value)));
           //$("excento").value=redondear(E,2);
           formatear('f_excento',redondear(E,2));
           $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
           $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;
}//

function verificar_factura(){
    if($("f_numero_factura").value!="" && $("f_numero_control").value!="" && $("f_monto_total").value!="" && $("f_monto_base").value!="" && $("f_monto_iva").value!="" && $("f_fecha_factura").value!=""){
         //alert(reemplazarPC($("monto_iva").value)+" - "+reemplazarPC($("monto_iva_partidas").value));
          if(eval(reemplazarPC($("f_monto_iva").value))>eval(reemplazarPC($("monto_iva_partidas").value))){
              //$("plus").disabled="disabled";
             // alert(reemplazarPC($("monto_iva").value)+" - "+reemplazarPC($("monto_iva_partidas").value));
              error('Por favor, verifique el monto del iva, execede del monto asignado en la partida');
              return false;
          }else{
              $("bt_plus").disabled="";
              $("f_fecha_factura").value=""
              $("f_numero_factura").setAttribute('onBlur','igual_num_control();');
          }
    }else{
       if($("f_fecha_factura").value==""){
        error('Por favor, ingrese la fecha de la factura');
        return false;
       }
       $("plus").disabled="";
       return false;
    }
    $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
    $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;

}
function retencion_iva(x){
    if(x==""){
	   z=75;
    }else{
	    z=x;
    }
    return z;
}
function igual_num_control(){
    $("f_numero_control").value=$("f_numero_factura").value;
    $("f_monto_total").focus();
}

function iva411(){
    var MTC   = reemplazarPC($('monto_total_cancelar').value);
    var p_i   = reemplazarPC($('porcentaje_iva').value);
    var Mi    = reemplazarPC($('monto_iva_partidas').value);//---
    var bas411=0;
    if($("iva411").value==1){
	    base411 = MTC / (1+(p_i / 100));
	    m_iva_411 = MTC - base411;
	    formatear('monto_iva_partidas',redondear(m_iva_411,2));
	    //alert(m_iva_411);
	    nMiliSegundos=500;
	    window.setTimeout("re_calcular();", nMiliSegundos);
	}else{
		re_calcular();
	}
    //re_calcular();
    $('documento_porcentaje_iva').value = $('porcentaje_iva').value;
    $('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;
}

///re-calcular los paramentros
function re_calcular(){
    var Mtc   = reemplazarPC($('monto_total_cancelar').value);//----
    var prl   = reemplazarPC($('porcentaje_laboral').value);
    var Ml    = reemplazarPC($('monto_retencion_laboral').value);//----
    var prfc  = reemplazarPC($('porcentaje_fielcumplimiento').value);
    var Mfc   = reemplazarPC($('monto_retencion_fielcumplimiento').value);//---
    var p_i   = reemplazarPC($('porcentaje_iva').value);
    var Mi    = reemplazarPC($('monto_iva_partidas').value);//---
    var Monto401= reemplazarPC($('monto_401').value);//---
    var Mdi   = reemplazarPC($('monto_descontar_impuesto').value);//----
    var paa   = reemplazarPC($('porcentaje_amortizacion').value);
    var Maa   = reemplazarPC($('amortizacion_anticipo').value);//---
    var Mop   = reemplazarPC($('monto_orden_pago').value);//---
    var pri   = retencion_iva(reemplazarPC($('porcentaje_retencion_iva').value));
    var Mri   = reemplazarPC($('monto_retencion_iva').value);//----
    var pdislr= reemplazarPC($('porcentaje_islr').value);
    var Mislr = reemplazarPC($('monto_islr').value);//---
    var Su    = reemplazarPC($('monto_sustraendo').value);//---
    var SuO   = reemplazarPC($('sustraendo_original').value);//---sustraendo_original
    var pdtf  = reemplazarPC($('porcentaje_timbre_fiscal').value);
    var Mtf   = reemplazarPC($('monto_timbre_fiscal').value);//---
    var pdim  = reemplazarPC($('porcentaje_impuesto_municipal').value);
    var Mim   = reemplazarPC($('monto_impuesto_municipal').value);//---
    var Mnc   = reemplazarPC($('monto_neto_cobrar').value);//---
    var RII   = $('retencion_incluye_iva').value;// 1.si  2.no
    var DMT   = $('desde_monto_timbre').value;
    var DMIM  = $('desde_monto_impuesto_municipal').value;
    var O_R   = $('objeto_rif').value;
    var DMJ   = $('desde_monto_juridico').value;
    var DMN   = $('desde_monto_natural').value;
    var ISLR  = $('impuesto_sobre_la_renta').value;
    var AII   = $('anticipo_incluye_iva').value;
    var restar_401 = $('id_restar_401').value;
/*
    alert("\n"+ "\n Mtc:" +  Mtc
    + "\n prl:" +  prl
    + "\n Ml:" +  Ml
    + "\n prfc:" +  prfc
    + "\n Mfc:" +  Mfc
    + "\n p_i:" +  p_i
    + "\n Mi:" +  Mi
    + "\n Monto401:" +  Monto401
    + "\n Mdi:" +  Mdi
    + "\n paa:" +  paa
    + "\n Maa:" +  Maa
    + "\n Mop:" +  Mop
    + "\n pri:" +  pri
    + "\n Mri:" +  Mri
    + "\n pdislr:" +  pdislr
    + "\n Mislr:" +  Mislr
    + "\n Su:" +  Su
    + "\n SuO:" +  SuO
    + "\n pdtf:" +  pdtf
    + "\n Mtf:" +  Mtf
    + "\n pdim:" +  pdim
    + "\n Mim:" +  Mim
    + "\n Mnc:" +  Mnc
    + "\n RII:" +  RII
    + "\n DMT:" +  DMT
    + "\n DMIM:" +  DMIM
    + "\n O_R:" +  O_R
    + "\n DMJ:" +  DMJ
    + "\n DMN:" +  DMN
    + "\n ISLR:" +  ISLR
    + "\n AII:" +  AII
    + "\n restar_401:" +  restar_401);*/


    if(RII==1){
       Ml=(Mtc*prl)/100;
       Mfc=(Mtc*prfc)/100;
    }else{
       Ml=((Mtc-Mi)*prl)/100;
       Mfc=((Mtc-Mi)*prfc)/100;
    }
    //$monto_descontar_inspuesto=$monto_total_cancelar - $c - $d - $monto_iva_partidas;
    Mdi=Mtc-Mfc-Ml-Mi;
    //alert("Mdi = Mtc["+Mtc+"] - Mfc["+Mfc+"] - Ml["+Ml+"] - Mi["+Mi+"]");
    if(restar_401=='si'){
       //alert("Mdi = Mdi["+Mdi+"] - Monto401["+Monto401+"]");
       Mdi=Mdi-Monto401;
       //alert("Mdi["+Mdi+"]");
    }

   // alert('mtc:'+Mtc+' - dmt:'+DMT);
    if(eval(Mtc)<eval(DMT)){
		Mtf=0;
		//alert('uno '+Mtf);
		}else{
		  Mtf=((Mdi/1000)*pdtf);
    }
    if(eval(Mtc)<eval(DMIM)){
		Mim=0;
		}else{
		Mim=((Mdi/100)*pdim);
	  }
    		//alert(O_R);
    		switch(eval(O_R)){
			case 1:
									if(eval(Mtc)<eval(DMJ)){
											 Mislr=0;
									}else{
										Mislr=Mdi*pdislr/100;
									}
			break;
			case 2:
							//alert("Mtc:"+Mtc+"\nDMJ:"+DMJ+"\nMdi:"+Mdi+"\nISLR:"+ISLR);
									if(eval(Mtc)<eval(DMJ)){
									         //alert('monto cancelar < monto juridico' + eval(Mtc) +' < '+ eval(DMJ) +  ' ');
											 Mislr=0;
									}else{
									    //alert('monto cancelar > monto juridico' + eval(Mtc) +' > '+ eval(DMJ) +  ' ');
										Mislr=eval(Mdi)*eval(pdislr)/100;
									}
									//alert(Mislr);

			break;
			case 3:

			break;
			case 4:
							 if(eval(Mtc)<eval(DMN)){
											 Mislr=0;
									}else{

										Mislr=Mdi*pdislr/100;
										if(pdislr==3 && SuO==38.33){
										  Su=115;
										}else{
										         if(pdislr==3 && SuO==45.83){
										     Su=137.50;
										   }else if(pdislr==3 && SuO==54.16){
										     Su=162.50;
										   }else{
										     Su=SuO*pdislr;
										   }

										}

										Mislr=Mislr-Su;
									}
			break;
		}//switch
        if(eval(AII)==1){
					Maa=Mtc*paa/100;
				}else{
					Maa=((Mtc-Mi)*paa)/100;
				}
        Mop=Mtc-Maa;
        //alert(Mi+' * '+pri);
        Mri=Mi*pri/100;

       // sprintfphp(pagina+Mri);
        //FF=function (oXML) {oXML.responseText; alert(peticion);};
        //FF= new peticion();
        //alert(peticion().responseText);



							acepto="no";
							if($("monto_retencion_multa")){
								monto_retencion_multa_monto = $("monto_retencion_multa").value;
							}else{
							    monto_retencion_multa_monto = 0;
							}

							var str = monto_retencion_multa_monto;
							for(i=0; i<monto_retencion_multa_monto.length; i++){
							   if(str.charAt(i)==","){acepto="si";}
							}//fin for
							if(acepto=="si"){
							  for(i=0; i<monto_retencion_multa_monto.length; i++){str = str.replace('.','');}//fin for
							  str = str.replace(',','.');

							}//fin
							var monto_retencion_multa_monto = redondear(str,2);



							acepto="no";
							if($("monto_retencion_responsabilidad_social")){
								monto_retencion_responsabilidad_social = $("monto_retencion_responsabilidad_social").value;
							}else{
							    monto_retencion_responsabilidad_social = 0;
							}

							var str = monto_retencion_responsabilidad_social;
							for(i=0; i<monto_retencion_responsabilidad_social.length; i++){
							   if(str.charAt(i)==","){acepto="si";}
							}//fin for
							if(acepto=="si"){
							  for(i=0; i<monto_retencion_responsabilidad_social.length; i++){str = str.replace('.','');}//fin for
							  str = str.replace(',','.');

							}//fin
							var monto_retencion_responsabilidad_social = redondear(str,2);

rmr = eval(monto_retencion_multa_monto) + eval(monto_retencion_responsabilidad_social);



//'monto_retencion_multa');
//moneda('monto_retencion_responsabilidad_social');



        Mnc=   Mop -(redondear(Mislr,2)+redondear(Mri,2)+redondear(Mtf,2)+redondear(Mim,2)+redondear(rmr,2));



        //Mnc=Mop -(eval(Mislr)+eval(Mri)+eval(Mtf)+eval(Mim));
        formatear('monto_retencion_laboral',redondear(Ml,2));
        formatear('monto_retencion_fielcumplimiento',redondear(Mfc,2));
        formatear('monto_iva_partidas',redondear(Mi,2));
        formatear('monto_descontar_impuesto',redondear(Mdi,2));
        formatear('amortizacion_anticipo',redondear(Maa,2));
        formatear('monto_orden_pago',redondear(Mop,2));
        formatear('monto_retencion_iva',redondear(Mri,2));
        formatear('monto_islr',redondear(Mislr,2));
        formatear('monto_sustraendo',redondear(Su,2));
        formatear('monto_timbre_fiscal',redondear(Mtf,2));
        formatear('monto_impuesto_municipal',redondear(Mim,2));
        formatear('monto_neto_cobrar',redondear(Mnc,2));
        formatear('x_monto_total',redondear(Mop,2));
        var CMPT=Mop * eval($('x_numero_pago').value);
        formatear('x_monto_parcial',CMPT);
        formatear('porcentaje_laboral',prl);
        formatear('porcentaje_fielcumplimiento',prfc);
        formatear('porcentaje_iva',p_i);
        formatear('porcentaje_amortizacion',paa);
        formatear('porcentaje_retencion_iva',pri);
        formatear('porcentaje_islr',pdislr);
        formatear('porcentaje_timbre_fiscal',pdtf);
        formatear('porcentaje_impuesto_municipal',pdim);
/*
        alert("\n"+ "\n Mtc:" +  Mtc
    + "\n prl:" +  prl
    + "\n Ml:" +  Ml
    + "\n prfc:" +  prfc
    + "\n Mfc:" +  Mfc
    + "\n p_i:" +  p_i
    + "\n Mi:" +  Mi
    + "\n Monto401:" +  Monto401
    + "\n Mdi:" +  Mdi
    + "\n paa:" +  paa
    + "\n Maa:" +  Maa
    + "\n Mop:" +  Mop
    + "\n pri:" +  pri
    + "\n Mri:" +  Mri
    + "\n pdislr:" +  pdislr
    + "\n Mislr:" +  Mislr
    + "\n Su:" +  Su
    + "\n SuO:" +  SuO
    + "\n pdtf:" +  pdtf
    + "\n Mtf:" +  Mtf
    + "\n pdim:" +  pdim
    + "\n Mim:" +  Mim
    + "\n Mnc:" +  Mnc
    + "\n RII:" +  RII
    + "\n DMT:" +  DMT
    + "\n DMIM:" +  DMIM
    + "\n O_R:" +  O_R
    + "\n DMJ:" +  DMJ
    + "\n DMN:" +  DMN
    + "\n ISLR:" +  ISLR
    + "\n AII:" +  AII
    + "\n restar_401:" +  restar_401);
*/
/*
 $('monto_laboral').value=redondear(Ml,2);
        $('monto_fiel_cumplimiento').value=redondear(Mfc,2);
        $('monto_iva_partidas').value=redondear(Mi,2);
        $('monto_descontar_impuesto').value=redondear(Mdi,2);
        $('monto_amortizacion_antipo').value=redondear(Maa,2);
        $('monto_orden_pago').value=redondear(Mop,2);
        $('monto_retencion_iva').value=redondear(Mri,2);
        $('monto_isrl').value=redondear(Mislr,2);
        $('sustraendo').value=redondear(Su,2);
        $('monto_timbre_fiscal').value=redondear(Mtf,2);
        $('monto_impuesto_municipal').value=redondear(Mim,2);
        $('monto_neto_cobrar').value=redondear(Mnc,2);
        $('c_monto_total').value=redondear(Mop,2);
        $('c_monto_parcial').value=Mop * eval($('c_numero_pago').value);
*/

$('documento_porcentaje_iva').value = $('porcentaje_iva').value;
$('f_porcentaje_retencion_iva').value = $('porcentaje_retencion_iva').value;

}//fin funtion

function factor_de_conversion(valor){
	$('factor_reversion').value='1.'+(reemplazarPC(valor)*10);
}


function cargar_islr_campo(opcion,valor_porcentaje,valor_id){
	if(opcion==4){//otros compromiso
	    $('codigo_retencion_islr').value = valor_id;
	    formatear('porcentaje_islr',valor_porcentaje);
	    nMiliSegundos=500;
	    window.setTimeout("re_calcular();", nMiliSegundos);
	    jQuery.modal.close();
	}else if(opcion==5){

	    if($('bt_buscar_porcentaje_islr_v').value == "true"){
	       valor_id         = 0;
	       valor_porcentaje = 0;
	    }
	    $('codigo_retencion_islr').value = valor_id;
	    formatear('EjeValuacionePRetencionIslr',valor_porcentaje);
	    nMiliSegundos=500;
	    window.setTimeout("calcular_valuacion();", nMiliSegundos);
	    jQuery.modal.close();



	}
}//fin funcion


function reintegros_limpiar(opcion){
	if(eval(opcion)==1){
		if($('ComponentePartidaPrecompromiso').value!='0,00'){
			$('ComponentePartidaCompromiso').value='0,00';
			$('ComponentePartidaCausado').value='0,00';
			$('ComponentePartidaPagado').value='0,00';
			$('ComponentePartidaCompromiso').readOnly=true;
			$('ComponentePartidaCausado').readOnly=true;
			$('ComponentePartidaPagado').readOnly=true;
		}else{
			$('ComponentePartidaCompromiso').value='0,00';
			$('ComponentePartidaCausado').value='0,00';
			$('ComponentePartidaPagado').value='0,00';
			$('ComponentePartidaCompromiso').readOnly=false;
			$('ComponentePartidaCausado').readOnly=false;
			$('ComponentePartidaPagado').readOnly=false;
		}
	}else if(eval(opcion)==2){
		$('ComponentePartidaCausado').value='0,00';
		$('ComponentePartidaPagado').value='0,00';
	}else if(eval(opcion)==3){
		$('ComponentePartidaPagado').value='0,00';
	}


}// fin reintegros_limpiar


function ficha_forma_pago(){
	if($('RchFichaFormaPago').value==3){
		$('RchFichaTesEntidadesBancariaId').disabled="";
		$('RchFichaTesSucursalesBancariaId').disabled="";
		$('RchFichaCuentaBancaria').disabled="";
	}else{
		$('RchFichaTesEntidadesBancariaId').disabled="disabled";
		$('RchFichaTesSucursalesBancariaId').disabled="disabled";
		$('RchFichaCuentaBancaria').disabled="disabled";
		$('RchFichaTesEntidadesBancariaId').value="";
		$('RchFichaTesSucursalesBancariaId').value="";
		$('RchFichaCuentaBancaria').value="";
	}
}

function ficha_condicion_actividad(){
	if($('RchFichaCondicionActividad').value==6){
		$('RchFichaMotivoRetiro').disabled="";
	}else{
		$('RchFichaMotivoRetiro').disabled="disabled";
	}
}

function ficha_dias_cancelar(){
	if($('RchFichaOpcionDiasCancelar1').checked==true || $('RchFichaOpcionDiasCancelar2').checked==true || $('RchFichaOpcionDiasCancelar3').checked==true){
		$('RchFichaDiasCancelar').readOnly=false;
	}else{
		$('RchFichaDiasCancelar').value="";
		$('RchFichaDiasCancelar').readOnly="true";
	}
}


function ficha_cargar_cargo(id,codigo_cargo,codigo_puesto,denominacion,sueldo_basico,compensaciones,primas,bonos,total, grado){
		$('RchFichaRchCargoId').value=id;
		$('RchFichaCodCargo').value=codigo_cargo;
//		$('RchFichaCodPuesto').value=codigo_puesto;
//		$('RchFichaDenoPuesto').value=denominacion;
//		$('RchFichaSueldo').value=sueldo_basico;
//		$('RchFichaCompensaciones').value=compensaciones;
//		$('RchFichaPrimas').value=primas;
//		$('RchFichaBonos').value=bonos;
//		$('RchFichaTotal').value=total;
//		$('RchFichaGrado').value=grado;

}

function ficha_cargar_persona(id,cedula,nom_ape){
		$('RchFichaRchDatosPersonalId').value=id;
		$('RchFichaCedulaIdentidad').value=cedula;
		$('RchFichaApellidosNombres').value=nom_ape;
}


function valida_ficha_personal(){
	if($('RchFichaRchTipoNominaId').value==''){
	 	 error('Seleccione la n&oacute;mina');
      	 return false;

	}else if($('RchFichaRchCargoId').value==''){
		 error('busque y Seleccione algun cargo');
       	 return false;

	}else if($('RchFichaRchDatosPersonalId').value==''){
		 error('Busque y Seleccione alguna persona');
       	 return false;

	}else if($('RchFichaFormaPago').value==3 && $('RchFichaTesEntidadesBancariaId').value==''){
		 error('Seleccione la Entidad Bncaria');
       	 return false;

	}else if($('RchFichaFormaPago').value==3 && $('RchFichaTesSucursalesBancariaId').value==''){
		 error('Seleccione la Sucursal Bancaria');
       	 return false;

	}else if($('RchFichaFormaPago').value==3 && $('RchFichaCuentaBancaria').value==''){
		 error('Ingrese la Cuenta Bancaria');
       	 return false;

	}else if($('RchFichaCondicionActividad').value==6 && $('RchFichaMotivoRetiro').value==''){
		 error('Ingrese el motivo de retiro');
       	 return false;
	}else if($('RchFichaFuncionesRealizar').value==''){
		 error('Ingrese las funciones a realizar');
       	 return false;
	}else if($('RchFichaResponsabilidadAdministrativa').value==''){
		 error('Ingrese la responsabilidad administrativa');
       	 return false;
	}else if($('RchFichaPaso').value==''){
		 error('Ingrese el paso');
       	 return false;
	}else if(($('RchFichaOpcionDiasCancelar1').checked==true || $('RchFichaOpcionDiasCancelar2').checked==true || $('RchFichaOpcionDiasCancelar3').checked==true) && $('RchFichaDiasCancelar').value==''){
		error('Ingrese los dias a cancelar');
	  	return false;
	}
}

function exportImage(){
    flashMovie = document.getElementById("amgrafica");
	flashMovie.exportImage('/js/ampie/export.php');
}

function fases_nomina(valor){
	if(valor==1){
		$('prenomina').style.display='block';
		$('prenomina2').style.display='none';
	}else{
		$('prenomina').style.display='none';
		$('prenomina2').style.display='block';
		if(valor==2){
			$('visor_prenomina').innerHTML='Corrida definitiva de n&oacute;mina';
			ver_documento('/rchPreNomina/seleccion_tipo_nomina/2','seleccion_prenomina2_tipo_nomina');
		}else if(valor==3){
			$('visor_prenomina').innerHTML='Corrida definitiva de n&oacute;mina y Emisi&oacute;n de Ordenes de pago';
			ver_documento('/rchPreNomina/seleccion_tipo_nomina/3','seleccion_prenomina2_tipo_nomina');
		}else if(valor==4){
			$('visor_prenomina').innerHTML='Cierre final de N&oacute;mina';
			ver_documento('/rchPreNomina/seleccion_tipo_nomina/4','seleccion_prenomina2_tipo_nomina');
		}

	}
}

function frecuencia_fase_nomina(tipo){
	if(tipo==1){
        $('RchTipoNominaFrecuencia27').checked = false;
        $('RchTipoNominaFrecuencia28').checked = false;
        $('RchTipoNominaFrecuencia310').checked = false;
	}else if(tipo==2){
        $('RchTipoNominaFrecuencia11').checked = false;
        $('RchTipoNominaFrecuencia12').checked = false;
        $('RchTipoNominaFrecuencia13').checked = false;
        $('RchTipoNominaFrecuencia14').checked = false;
        $('RchTipoNominaFrecuencia15').checked = false;
        $('RchTipoNominaFrecuencia310').checked = false;
	}else if(tipo==3){
        $('RchTipoNominaFrecuencia11').checked = false;
        $('RchTipoNominaFrecuencia12').checked = false;
        $('RchTipoNominaFrecuencia13').checked = false;
        $('RchTipoNominaFrecuencia14').checked = false;
        $('RchTipoNominaFrecuencia15').checked = false;
        $('RchTipoNominaFrecuencia27').checked = false;
        $('RchTipoNominaFrecuencia28').checked = false;
	}
}

function mostrar_acciones_nomina(valor){
	if(valor==1){
		$('accion_1').style.display='block';
		$('accion_2').style.display='none';
		$('accion_3').style.display='none';
	    $('accion_4').style.display='none';
	    $('accion_5').style.display='none';
		$('accion_6').style.display='none';
	}else if(valor==2){
		$('accion_1').style.display='none';
		$('accion_2').style.display='block';
		$('accion_3').style.display='none';
		$('accion_4').style.display='none';
		$('accion_5').style.display='none';
		$('accion_6').style.display='none';
	}else if(valor==3){
		$('accion_1').style.display='none';
		$('accion_2').style.display='none';
		$('accion_3').style.display='block';
		$('accion_4').style.display='none';
		$('accion_5').style.display='none';
		$('accion_6').style.display='none';
    }else if(valor==4){
		$('accion_1').style.display='none';
		$('accion_2').style.display='none';
		$('accion_3').style.display='none';
		$('accion_4').style.display='block';
		$('accion_5').style.display='none';
		$('accion_6').style.display='none';
	}else if(valor==5){
		$('accion_1').style.display='none';
		$('accion_2').style.display='none';
		$('accion_3').style.display='none';
		$('accion_4').style.display='none';
		$('accion_5').style.display='block';
		$('accion_6').style.display='none';
	}else if(valor==6){
		$('accion_1').style.display='none';
		$('accion_2').style.display='none';
		$('accion_3').style.display='none';
		$('accion_4').style.display='none';
		$('accion_5').style.display='none';
		$('accion_6').style.display='block';
	}
}


function ad_eliminar_concepto(){
	var n=0, i=0;
	var id_var=0;
	var seleccionados = Array();
	var total = $('RchConceptosCalculosAdRchTransaccionHijasIdTengo').options.length;
	for(n=0;n<total;n++){
		if($('RchConceptosCalculosAdRchTransaccionHijasIdTengo').options[n].selected==true){
			//alert($('RchConceptosCalculosAdRchTransaccionHijasIdTengo').options[n].value);
			seleccionados[i]=$('RchConceptosCalculosAdRchTransaccionHijasIdTengo').options[n].value;
			i++;
		}

	}


	for(var j=0;j<seleccionados.length;j++){
	      if(seleccionados.length==(j+1)){
			   ver_documento('/rchTransacciones/delete_concepto_ad/'+seleccionados[j]+'/si','div__calculos_ad')
			}else{
			   ver_documento('/rchTransacciones/delete_concepto_ad/'+seleccionados[j]+'/no','renovar_seleccion_no')
			}
			//alert("total:"+seleccionados.length+" N:"+j);
	}



}


/**************************************************************
Máscara de entrada. Script creado por Tunait! (21/12/2004)
Si quieres usar este script en tu sitio eres libre de hacerlo con la condición de que permanezcan intactas estas líneas, osea, los créditos.
No autorizo a distribuír el código en sitios de script sin previa autorización
Si quieres distribuírlo, por favor, contacta conmigo.
Ver condiciones de uso en http://javascript.tunait.com/
tunait@yahoo.com
****************************************************************/
var patron = new Array(2,2,4)
var patron2 = new Array(1,3,3,3,3)
function mascara_fecha_input(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
}

function carga_conexion(id,cargo,conexion,cedula,nom_ape){
		$('RchSituacionesIndividualeRchFichaId').value=id;
		$('RchSituacionesGeneraleCargo').value=cargo;
		$('RchSituacionesGeneraleConex').value=conexion;
		$('RchSituacionesGeneraleCedula').value=cedula;
		$('RchSituacionesGeneraleName').value=nom_ape;
}


function carga_puesto(puesto,deno){
		$('RchSituacionesPuestoCodigoPuesto').value=puesto;
		$('RchSituacionesGeneraleDeno').value=deno;
}