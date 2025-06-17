<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usuarios_model;

class login_controller extends BaseController 
{
	public function index()
	{
		helper(['form', 'url']);
	}

	public function auth() 
	{
		$session = session(); //inicia el objeto session()
		$model = new usuarios_model(); //instanciamos el modelo

		//traemos los datos del formulario
		$email = $this->request->getVar('email'); //correo
		$password = $this->request->getVar('pass'); //contraseña

		$data = $model->where('email', $email)->first();
		if($data) {
			$pass = $data['pass'];
			$ba = $data['baja'];
			if($ba == 'SI') {
				$session->setFlashData('msg', 'Este usuario fue dado de baja');
				return redirect()->to('/login');
			}

			//se verifican los datos ingresados para iniciar
			//si cumplen la verificación inicia la sesión

			//password_verify determina los requisitos de configuración de la contraseña
			$verify_pass = password_verify($password, $pass);
			if($verify_pass) {
				$ses_data = [
					'id' => $data['id'],
					'nombre' => $data['nombre'],
					'apellido' => $data['apellido'],
					'email' => $data['email'],
					'usuario' => $data['usuario'],
					'perfil_id' => $data['perfil_id'],
					'logged_in' => TRUE
				];
				//se cumple la verificación e inicia sesión
				$session->set($ses_data);

				session()->setFlashData('msg', 'Bienvenido!');
				return redirect()->to('/panel');
			} else {
				//no paso la validacion de la contraseña
				$session->setFlashData('msg', 'Contraseña incorrecta');
				return redirect()->to('/login');
			}

		} else {
			$session->setFlashData('msg', 'Mail incorrecto o no ingresado');
			return redirect()->to('/login');
		}
	}

	public function logout() //cierra la sesión
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}
} 

?>