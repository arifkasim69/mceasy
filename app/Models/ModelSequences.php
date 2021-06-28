<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelSequences extends Model
{
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