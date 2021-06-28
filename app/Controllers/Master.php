<?php

namespace App\Controllers;

class Master extends BaseController
{
	public function index()
	{

		helper('fungsi');
		if (!cekLogin(session())){
			return redirect()->to(base_url('/login'));
		}

		if (!backDoor(session(), 'master')) {
			return redirect()->to(base_url('/dashboard'));
		}

		$data = [
			'judul' => 'Master'
		];

		echo view('temp/view_header', $data);
		echo view('temp/view_sidebar');
		echo view('temp/view_topbar');
		echo view('master/index');
		echo view('temp/view_footer');
	}
}