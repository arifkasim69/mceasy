<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		helper('fungsi');
		if (!cekLogin(session())){
			return redirect()->to(base_url('/login'));
		}

			$data = [
				'judul' => 'Dashboard'
			];

			echo view('temp/view_header', $data);
			echo view('temp/view_sidebar');
			echo view('temp/view_topbar');
			echo view('dashboard/index');
			echo view('temp/view_footer');
	}
}
