<?php

namespace App\Controllers;

class CekLogin extends BaseController
{
    public function cekLogin()
	{
		if(session()->get('logged_in') == null){
            return true;
		} else {
			redirect()->to(base_url('/login'));
			return false;
		}
	}
}