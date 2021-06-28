<?php

namespace App\Controllers;
use App\Models\ModelLogin;
use CodeIgniter\Controller;

class Login extends BaseController
{
    /**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

    public function __construct()
    {
        $this->modelLogin = new ModelLogin();
    }

	public function index()
	{
		$data = [
			'judul' => 'Login'
		];

		echo view('temp/view_header', $data);
		echo view('login/index');
	}

    public function login()
    {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];

            $response = $this->modelLogin->login($data)->getResult();
            $success = $response[0]->email;
           
            if ($success == 1){
                $permission = $this->modelLogin->permission($response[0]->id_role)->getResult();
                $session_login = [
                    'email'     => $data['email'],
                    'id_role'   => $response[0]->id_role,
                    'role_name' => $response[0]->role_name,
                    'logged_in' => true
            ];
                session()->set($session_login);
                session()->set('menu', $permission);
                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('log_in', 'Email atau Password anda tidak sesuai.');
                return redirect()->to(base_url('/login'));
            }   
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
