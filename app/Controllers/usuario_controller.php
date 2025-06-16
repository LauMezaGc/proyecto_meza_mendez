<?php
namespace App\Controllers;
Use App\Models\usuarios_model;
use CodeIgniter\Controller;

class usuario_controller extends Controller {

	public function __construct() {
		helper(['form','url']);
	}

	public function create() {
		$data['titulo'] = 'Registro';
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('front/registro');
		echo view('front/footer');
	}

	public function formValidation() {
		$input = $this->validate([
			'nombre' => 'required|min_length[3]',
			'apellido' => 'required|min_length[3]|max_length[30]',
			'usuario' => 'required|min_length[3]',
			'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
			'pass' => 'required|min_length[3]|max_length[30]'
			],

		);

		$formModel = new usuarios_model();

		if(!$input) {
			$data['titulo'] = 'Registro';
			echo view('front/header', $data);
			echo view('front/navbar');
			echo view('front/registro', ['validation' => $this->validator]);
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
			return $this->response->redirect(base_url('/registro'));
		}
	}
}

?>