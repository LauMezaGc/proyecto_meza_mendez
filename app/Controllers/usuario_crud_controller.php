<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use App\Models\perfiles_model;
use CodeIgniter\Controller;

class usuario_crud_controller extends Controller
{
	public function __construct() {
		helper(['url', 'form']);
	}

	// muestra la lista de usuarios
	public function index() {
		$userModel = new usuarios_model();
		$data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
		$dato['titulo'] = 'Crud_usuarios';

		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/usuarios/usuario_nuevo_view', $data);
		echo view('front/footer');
	}

	public function creausuario() {
		$userModel = new usuarios_model();
		$data['user_obj'] = $userModel->orderBy('id', 'DESC')->findAll();
		
		$perfilModel = new perfiles_model();
		$data['perfiles'] = $perfilModel->orderBy('id', 'DESC')->findAll();

		$dato['titulo'] = 'Alta Usuario';
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/usuarios/alta_usuario_view', $data);
		echo view('front/footer');
	}

	public function store() {
		$input = $this->validate([
			'nombre' => 'required|min_length[3]',
			'apellido' => 'required|min_length[3]|max_length[30]',
			'usuario' => 'required|min_length[3]',
			'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
			'pass' => 'required|min_length[3]|max_length[30]'
			],
		);

		$userModel = new usuarios_model();

		if(!$input) {
			$perfilModel = new perfiles_model();
            $data['perfiles'] = $perfilModel->orderBy('id', 'DESC')->findAll();
            $data['validation'] = $this->validator;

			$data['titulo'] = 'Modificación';
			echo view('front/header', $data);
			echo view('front/navbar');
			echo view('back/usuarios/alta_usuario_view', $data);
			echo view('front/footer');
		} else {
			$data = [
				'nombre' => $this->request->getVar('nombre'),
				'apellido' => $this->request->getVar('apellido'),
				'perfil_id' => $this->request->getVar('perfil_id'),
				'usuario' => $this->request->getVar('usuario'),
				'email' => $this->request->getVar('email'),
				'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
			];

			$userModel->insert($data);
			return $this->response->redirect(site_url('usuarios'));
		}
	}

	public function singleUser($id = null) {
		$userModel = new usuarios_model();
		$data['user_obj'] = $userModel->where('id', $id)->first();

		$perfilModel = new perfiles_model();
        $data['perfiles'] = $perfilModel->orderBy('id', 'DESC')->findAll(); 

		$dato['titulo'] = 'Crud_usuarios';
		echo view('front/header', $dato);
		echo view('front/navbar');
		echo view('back/usuarios/edit_usuarios_view', $data);
		echo view('front/footer');
	}

	public function update($id = null) {
		$userModel = new usuarios_model();
		$id = $userModel->where('id', $id)->first();

		$data = [
			'nombre' => $this->request->getVar('nombre'),
			'apellido' => $this->request->getVar('apellido'),
			'usuario' => $this->request->getVar('usuario'),
			'email' => $this->request->getVar('email'),
			'perfil_id' => $this->request->getVar('perfil_id')
		];
		$userModel->update($id, $data);
		return $this->response->redirect(site_url('usuarios'));
	}

	//delete lógico (cambia el estado del campo baja)
	public function deletelogico($id = null) {
		$userModel = new usuarios_model();
		$data['baja'] = $userModel->where('id', $id)->first();
		$data['baja'] = 'SI';
		$userModel->update($id, $data);
		return $this->response->redirect(site_url('usuarios'));
	}

	public function activar($id = null) {
		$userModel = new usuarios_model();
		$data['baja'] = $userModel->where('id', $id)->first();
		$data['baja'] = 'NO';
		$userModel->update($id, $data);
		return $this->response->redirect(site_url('usuarios'));
	}
}

?>