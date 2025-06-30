<?php
namespace App\Controllers;
Use App\Models\usuarios_model;
use CodeIgniter\Controller;

class contacto_controller extends Controller {

	public function __construct() {
		helper(['form','url']);
	}

	public function formValidation() {
		$input = $this->validate([
			'asunto' => 'required|min_length[3]',
			'mensaje' => 'required|min_length[15]|max_length[2000]',
			],
		);

		$formModel = new usuarios_model();

		if(!$input) {
			session()->setFlashData('fail', '¡Formulario Incompleto!');
			return $this->response->redirect('contacto');
		} else {
			$formModel->save([
				'asunto' => $this->request->getVar('asunto'),
				'mensaje' => $this->request->getVar('mensaje'),
				'usuario_id' => $session->get('id'),
			]);

			session()->setFlashData('success', 'Enviado con éxito.');
			return $this->response->redirect('contacto');
		}


	}

	public function formValidationResp() {
		$input = $this->validate([
			'respuesta' => 'required|min_length[3]|max_length[2000]',
			],
		);

		$formModel = new usuarios_model();

		if(!$input) {
			session()->setFlashData('fail', '¡Formulario Incompleto!');
			return $this->response->redirect('contacto');
		} else {
			$formModel->save([
				'asunto' => $this->request->getVar('asunto'),
				'mensaje' => $this->request->getVar('mensaje'),
				'usuario_id' => $session->get('id'),
			]);

			session()->setFlashData('success', 'Enviado con éxito.');
			return $this->response->redirect('registro');
		}

		
	}
}

?>