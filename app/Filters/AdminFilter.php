<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface 
{
	public function before(RequestInterface $request, $arguments = null)
	{
		// si el usuario no esta logueado
		if(!session()->get('logged_in')) {
			//entonces redirecciona a la pagina del login
			return redirect()->to('/login');
		} else {
			if(session()->get('perfil_id') != 1) {
				return redirect()->to('error404');
			}
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
		//hacer algo aca?
	}
}

?>