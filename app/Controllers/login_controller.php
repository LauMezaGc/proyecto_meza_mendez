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
				return redirect()->to('/');
			}

		}
	}
}

?>