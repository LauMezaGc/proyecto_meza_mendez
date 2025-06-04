<?php
namespace App\Controllers;
Use App\Models\usuarios_model;
use CodeIgniter\Controller;

class usuario_controller extends Controller {

	public function_construct() {
		helper(['form','url']);
	}

	public function create() {
		$dato['titulo'] = 'Registro';
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/usuario/registro');
		echo view('front/footer');
	}

	public funcion formValidation() {
		$input = $this->validate([
			'nombre' => 'required|min_length[3]',
			'apellido' => 'required|min_length[3]|max_length[30]',
			'usuario' => 'required|min_length[3]',
			'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
			'pass' => 'required|min_length[3]|max_length[30]'
		],

		);
	}

	$formModel = new usuarios_model;

	if(!input) {
		$dato['titulo'] = 'Registro';
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/usuario/registro', ['validation' => $this->validator]);
		echo view('front/footer');
	} else {
		$formModel->save([
			'nombre' => $this->request->getVar('nombre'),
			'apellido' => $this->request->getVar('apellido'),
			'usuario' => $this->request->getVar('usuario'),
			'email' => $this->request->getVar('email'),
			'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
		]);

		session()->setFlashData('success', 'Usuario registrado con exito');
		return $this->response->redirect(to_url('/registro'));
	}
}

?>