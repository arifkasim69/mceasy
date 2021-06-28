<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelCuti;
use App\Models\ModelKaryawan;
use App\Models\ModelSequences;

class Karyawan extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    public function __construct()
    {
        $this->modelKaryawan = new ModelKaryawan();
        $this->modelSequences = new ModelSequences();
        $this->modelCuti = new ModelCuti();
    }

    public function index()
    {
        helper('fungsi');
        if (!cekLogin(session())) {
            return redirect()->to(base_url('/login'));
        }

        if (backDoor(session(), 'data karyawan')) {
            if (session()->get('id_role') == "2") {
                return redirect()->to(base_url('/dashboard'));
            }
        }

        $data = [
            'judul' => 'Info Karyawan',
            'karyawan' => $this->modelKaryawan->getAllKaryawan(),
            'seq' => $this->modelSequences->getSequenceNik()
        ];

        echo view('temp/view_header', $data);
        echo view('temp/view_sidebar');
        echo view('temp/view_topbar');
        echo view('karyawan/index');
        echo view('temp/view_footer');
    }

    public function cekLogin()
    {
        if (session()->get('email') != null) {
            return redirect()->to(base_url('/karyawan'));
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nomor_induk' => [
                    'label' => 'Nomor Induk',
                    'rules' => 'required|min_length[7]|max_length[7]|is_unique[karyawan.nomor_induk]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'min_length' => '{field} tidak boleh kurang dari {param} karakter!',
                        'max_length' => '{field} tidak boleh lebih dari {param} karakter!',
                        'is_unique' => '{field} sudah digunakan!'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required|min_length[3]|max_length[30]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'min_length' => '{field} tidak boleh kurang dari {param} karakter!',
                        'max_length' => '{field} tidak boleh lebih dari {param} karakter!'
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required|min_length[15]|max_length[100]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'min_length' => '{field} tidak boleh kurang dari {param} karakter!',
                        'max_length' => '{field} tidak boleh lebih dari {param} karakter!'
                    ]
                ],
                'tanggal_lahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ],
                'tanggal_bergabung' => [
                    'label' => 'Tanggal Bergabung',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!'
                    ]
                ]
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                return redirect()->to(base_url('/karyawan'));
            } else {
                $seq = $this->modelSequences->getSequenceNik();

                $data = [
                    'nomor_induk' => $this->request->getPost('nomor_induk'),
                    'nama' => $this->request->getPost('nama'),
                    'alamat' => $this->request->getPost('alamat'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'tanggal_bergabung' => $this->request->getPost('tanggal_bergabung')
                ];

                $success = $this->modelKaryawan->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Berhasil Ditambahkan.');
                    $this->modelSequences->updateSeq($seq);
                    return redirect()->to(base_url('/karyawan'));
                }
            }
        } else {
            return redirect()->to(base_url('/karyawan'));
        }
    }

    public function hapus($nik)
    {
        $success = $this->modelKaryawan->hapus($nik);
        if ($success) {
            session()->setFlashdata('message', 'Berhasil Dihapus.');
            return redirect()->to('/karyawan');
        }
    }

    public function getKaryawan($nik)
    {
        $data = [
            'detail' => $this->modelKaryawan->getKaryawan($nik)
        ];

        var_dump($data);
        die;
    }

    public function edit()
    {
        $data = [
            'nomor_induk' => $this->request->getPost('nomor_induk'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tanggal_bergabung' => $this->request->getPost('tanggal_bergabung')
        ];

        $success = $this->modelKaryawan->edit($data);
        if ($success) {
            session()->setFlashdata('message', 'Berhasil Diubah.');
            return redirect()->to(base_url('/karyawan'));
        }
    }

    public function cuti()
    {
        $data = [
            'nomor_induk' => $this->request->getPost('nomor_induk'),
            'tanggal_cuti' => $this->request->getPost('tanggal_cuti'),
            'lama_cuti' => $this->request->getPost('lama_cuti'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $success = $this->modelKaryawan->cuti($data);
        if ($success) {
            session()->setFlashdata('cuti', 'Berhasil.');
            return redirect()->to(base_url('/karyawan'));
        }
    }
}
