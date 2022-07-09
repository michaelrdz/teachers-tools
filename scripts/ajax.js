// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosAlumno(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  mat=parseInt(document.nuevo_alumno.numb_matricula.value);
  matAnt=parseInt(document.nuevo_alumno.mat_hidden.value);
  nom=document.nuevo_alumno.txt_nombre.value;
  cor=document.nuevo_alumno.txt_correo.value;
  grp=document.nuevo_alumno.grp_hidden.value;
 
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  ajax.open("POST", "registro.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
	  //la función responseText tiene todos los datos pedidos al servidor
  	if (ajax.readyState==4) {
  		//mostrar resultados en esta capa
		divResultado.innerHTML = ajax.responseText
  		//llamar a funcion para limpiar los inputs
    alert("Actualización exitosa");
		LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
  if (matAnt >= 0) {
    //alert("es edicion");
    ajax.send("&matricula="+mat+"&matriculaAnt="+matAnt+"&nombre="+nom+"&correo="+cor+"&grupo="+grp)
  }
  else {
    //alert("es nuevo");
	  ajax.send("&matricula="+mat+"&nombre="+nom+"&correo="+cor+"&grupo="+grp)
  }
}
 
//función para limpiar los campos
function LimpiarCampos(){
  document.nuevo_alumno.numb_matricula.value="";
  document.nuevo_alumno.txt_nombre.value="";
  document.nuevo_alumno.txt_correo.value="";
  document.nuevo_alumno.numb_matricula.focus();
}

function editaDato(mati, nom, cor) {
  //alert("ediatndo a "+mati);
  document.nuevo_alumno.numb_matricula.value=mati;
  document.nuevo_alumno.txt_nombre.value=nom;
  document.nuevo_alumno.txt_correo.value=cor;
  document.nuevo_alumno.mat_hidden.value=mati;
  document.nuevo_alumno.numb_matricula.focus();
}

function borrarDato(mati) {
  /*alert("borrando a "+mati);*/
  divResultado = document.getElementById('resultado');
  mat=parseInt(mati);
  grp=document.nuevo_alumno.grp_hidden.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  ajax.open("POST", "borrarAlu.php",true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
    divResultado.innerHTML = ajax.responseText
      //llamar a funcion para limpiar los inputs
    alert("Alumno(a) se eliminó con éxito");
    LimpiarCampos();
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("&matricula="+mat+"&grupo="+grp);
}
