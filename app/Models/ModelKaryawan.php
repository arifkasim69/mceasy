<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKaryawan extends Model
{
    protected $tabel = 'karyawan';
    protected $primaryKey = 'nomor_induk';

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllKaryawan()
    {
        return $this->db->table('karyawan')->get()->getResultArray();
    }

    public function getKaryawan($nik)
    {
        return $this->db->table('karyawan')->getWhere(['nomor_induk', $nik])->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('karyawan')->insert($data);
    }

    public function hapus($nik)
    {
        return $this->db->table('karyawan')->delete(['nomor_induk' => $nik]);
    }

    public function edit($data)
    {
        return $this->db->table('karyawan')->set(
            'nama', $data['nama'],
            'alamat', $data['alamat'],
            'tanggal_lahir', $data['tanggal_lahir'],
            'tanggal_bergabung', $data['tanggal_bergabung']
            )->where('nomor_induk', $data['nomor_induk'])->update();
    }

    public function cuti($data)
    {
        return $this->db->table('cuti')->insert($data);
    }

    public function getSequenceNik()
    {
        $seq = $this->db->table('sequences')->getWhere(['id' => 'nik'])->getRow('sequence');
        return $seq;
    }

    public function updateSeq($seq)
    {
        $this->db->table('sequences')->set('sequence', $seq + 1)->where('id', 'nik')->update();
    }
}
