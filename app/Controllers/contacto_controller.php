<?php
namespace App\Controllers;
Use App\Models\usuarios_model;
Use App\Models\contacto_model;
use CodeIgniter\Controller;

class contacto_controller extends Controller {

	public function __construct() {
		helper(['form','url']);
	}

	public function pagContacto() {
		$data = ['titulo' => 'Contacto'];
        echo view("front/header", $data);
        echo view("front/navbar");

        if (session()->get('perfil_id') == 1) {
        	$contacto = new contacto_model();
        	$usuarios = new usuarios_model();
        	$dato['consultas'] = $contacto->getMensajeActivo();
        	$dato['usuarios'] = $usuarios->findAll();
        	echo view("front/contacto", $dato);
        } else {
        	echo view("front/contacto");
        }
		
        echo view("front/footer.php");
	}

	public function pagListado($id = null) {
		$data = ['titulo' => 'Contacto'];
        echo view("front/header", $data);
        echo view("front/navbar");

        $contacto = new contacto_model();
        $dato['consultas'] = $contacto->getMensajesUser($id);

		echo view("front/ver-consultas", $dato);
        echo view("front/footer.php");
	}

	public function enviar_contacto() {
		$input = $this->validate([
			'asunto' => 'required|min_length[3]',
			'mensaje' => 'required|min_length[15]|max_length[2000]',
			],
		);

		$formModel = new contacto_model();

		if(!$input) {
			session()->setFlashData('fail', '¡Formulario Incompleto!');
		} else {

			if (!empty(session()->get('id'))) {
				$id = session()->get('id');
			} else {
				$id = 20;
			}

			$formModel->save([
				'asunto' => $this->request->getVar('asunto'),
				'mensaje' => $this->request->getVar('mensaje'),
				'usuario_id' => $id,
			]);

			session()->setFlashData('success', 'Enviado con éxito.');
		}
		return redirect()->to('contacto');
	}

	public function responder_consulta($id = null) {
		$input = $this->validate([
			'respuesta' => 'required|min_length[3]|max_length[4000]',
			],
		);

		if(!$input) {
			session()->setFlashData('fail', '¡La respuesta no cumple los requisitos!');
		} else {
			$consultasM = new contacto_model();
			$consultasM->getMensaje($id);
			$consultasM->update($id, ['respuesta' => $this->request->getVar('respuesta') ]);
			session()->setFlashData('success', 'Enviado con éxito.');
		}

		return redirect()->to('contacto');
	}

	public function eliminar_consulta($id = null) {
		$consultasM = new contacto_model();
		$consultasM->getMensaje($id);
		$consultasM->update($id, ['eliminado' => 'SI']);
		session()->setFlashData('success', 'Consulta eliminada con éxito.');
		return redirect()->to('contacto');
	}

}

?>