<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['inicio'] = 'welcome/index';
$route['iniciarSesionAdministrador'] = 'administrador/iniciarSesionAdministrador';


/*  ---------------------------------------------------------------- ADMIMNISTRADOR ---------------------------------------------------------------- */
//CARGA MASIVA
$route['panel_administrador'] = 'administrador/panel_administrador';
$route['carga_masiva'] = 'administrador/carga_masiva';
$route['insertUsuarios'] = 'administrador/insertUsuarios';

//CRUD USUARIOS
$route['getUsuario'] = 'administrador/getUsuario';
$route['editarEstadoUsuario'] = 'administrador/editarEstadoUsuario';

//CRUD EMPRESA
$route['addEmpresa'] = 'administrador/addEmpresa';
$route['getEmpresa'] = 'administrador/getEmpresa';
$route['editarEstadoEmpresa'] = 'administrador/editarEstadoEmpresa';
$route['editarNombreEmpresa'] = 'administrador/editarNombreEmpresa';

//CRUD CARGO
$route['addCargo'] = 'administrador/addCargo';
$route['getCargo'] = 'administrador/getCargo';
$route['editarEstadoCargo'] = 'administrador/editarEstadoCargo';
$route['editarNombreCargo'] = 'administrador/editarNombreCargo';

//Encuesta 






//Usuario
$route['login_usuario']= 'usuario/login_usuario';
$route['iniciarSesionUsuario']= 'usuario/iniciarSesionUsuario'; 
$route['panel_usuario']= 'usuario/panel_usuario';
$route['inicio_correo']= 'usuario/inicio_correo';

//ENCUESTAS
$route['barrat']= 'usuario/barrat'; 
$route['disc']= 'usuario/disc'; 
$route['wonderlic']= 'usuario/wonderlic'; 
$route['alerta']= 'usuario/alerta'; 
$route['relacionesInterpersonales']= 'usuario/relacionesInterpersonales'; 


$route['enviarBarrat'] = 'encuesta/enviarBarrat'; 
$route['enviarWonderlic'] = 'encuesta/enviarWonderlic'; 
$route['enviarAlerta'] = 'encuesta/enviarAlerta'; 
$route['enviarRelacionesInterpersonales'] = 'encuesta/enviarRelacionesInterpersonales'; 
$route['enviarDisc'] = 'encuesta/enviarDisc'; 

$route['salir'] = 'usuario/salir'; 



$route['terminoCuenta'] = 'usuario/terminoCuenta'; 
$route['terminoWonderlic'] = 'usuario/terminoWonderlic'; 
$route['terminoAlerta'] = 'usuario/terminoAlerta'; 



//$route['revisionWonderlic'] = 'encuesta/revisionWonderlic';  

$route['test'] = 'welcome/test';  
$route['finalizar'] = 'usuario/finalizar';  

$route['getTokens'] = 'administrador/getTokens';  
$route['detalle_encuesta'] = 'administrador/detalle_encuesta';  



$route['descargarPDF'] = 'administrador/descargarPDF';  
//Usuario
$route['login_usuario']= 'usuario/login_usuario';
$route['iniciarSesionUsuario']= 'usuario/iniciarSesionUsuario'; 

$route['panel_usuario']= 'usuario/panel_usuario'; 
$route['barrat']= 'usuario/barrat'; 
$route['disc']= 'usuario/disc'; 
$route['wonderlic']= 'usuario/wonderlic'; 
$route['alerta']= 'usuario/alerta'; 

