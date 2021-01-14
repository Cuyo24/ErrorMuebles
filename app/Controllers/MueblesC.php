<?php namespace App\Controllers;

class MueblesC extends BaseController
{
	public function index()
	{
		$vistas = view('Layout/header') . view('GestorM/Gestor') . view('Layout/footer');
		return $vistas;
	}

	//--------------------------------------------------------------------

	public function agregarUsuarios() {

		$data = array("nombre" => $_POST['nombre'],
					   "tipo" => $_POST['tipo'],
					   "costoVenta" => $_POST['costoVenta'],
					"CostoCompra" => $_POST['CostoCompra']);
		$model =  new HomePostModel();
		echo $exito = $model->agregarUsuario($data);
	}

	public function obtenerTodosLosUsuarios(){
		$model =  new HomePostModel();
		$datos = $model->obtenerTodosLosUsuariosModel();

		echo json_encode($datos);
	}

	public function eliminaUsuario(){
		$model =  new HomePostModel();
		$datos = array("id_compra" => $_POST['idCompra']);
		echo $model->eliminaUsuario($datos);

	}

	public function obtenerDatosUpdate() {
		$model =  new HomePostModel();
		$data = array('id_compra' => $_POST['idCompra']);
		echo $model->obtenerDatosUpdate($data);
	}

	public function actualizarUsuario() {
		$model =  new HomePostModel();
		$data =array("nombre" => $_POST['nombreu'],
					   "tipo" => $_POST['tipou'],
					   "costoVenta" => $_POST['costoVentau'],
					"CostoCompra" => $_POST['CostoComprau']);
		echo $model->actualizarUsuario($data);
	}	
}
