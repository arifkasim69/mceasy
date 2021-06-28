<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelLogin extends Model
{
    public function login($data)
    {

        $builder =  $this->db->table('master_user');
        $builder->select('role_name, id_role');
        $builder->selectCount('email');
        $builder->join('master_role', 'master_user.role_id = master_role.id_role', 'left');
        $builder->where('email', $data['email']);
        $builder->where('password', $data['password']);
        $query = $builder->get();
        
        return $query;
    }

    public function permission($data)
    {

        $builder =  $this->db->table('master_list_menu');
        $builder->select('menu_name, menu_id, url_link, role_id');
        $builder->join('master_role_menu', 'master_role_menu.menu_id = master_list_menu.id_menu', 'left');
        $builder->where('role_id', $data);
        $query = $builder->get();
        
        return $query;
    }
}