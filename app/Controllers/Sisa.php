<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelCuti;

class Sisa extends Controller
{
    /**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

    public function __construct()
    {
        $this->modelCuti = new ModelCuti();
    }

    public function index()
    {
        helper('fungsi');
		if (!cekLogin(session())){
			return redirect()->to(base_url('/login'));
		}

        $data = [
            'judul' => 'Sisa Cuti Karyawan',
            'sisa' => $this->modelCuti->getSisaCuti()
        ];

        echo view('temp/view_header', $data);
        echo view('temp/view_sidebar');
        echo view('temp/view_topbar');
        echo view('sisa/index');
        echo view('temp/view_footer');
    }

}
