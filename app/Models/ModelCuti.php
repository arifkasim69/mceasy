<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelCuti extends Model
{
    public function getAllKaryawanCuti()
    {
        $query = $this->db->query("SELECT k.nomor_induk, k.nama, c.tanggal_cuti, c.lama_cuti, c.keterangan FROM karyawan k, cuti c WHERE k.nomor_induk = c.nomor_induk;")->getResultArray();
        return $query;
    }

    public function getSisaCuti()
    {
        $query = $this->db->query("SELECT a.nomor_induk, a.nama, CASE WHEN a.nomor_induk NOT IN (SELECT b.nomor_induk FROM cuti b ) THEN 12 ELSE (12 - (SELECT SUM(b.lama_cuti) FROM cuti b WHERE a.nomor_induk = b.nomor_induk)) END AS cuti FROM karyawan a;")->getResultArray();
        return $query;
    }
    }