<?php

namespace App\Models;

use LavaLust\Database\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedColumns = ['fname', 'lname', 'email'];

    public function getAllUsers($search = '')
    {
        $builder = $this->db->table($this->table);
        if (!empty($search)) {
            $builder->like('fname', $search)
                    ->orLike('lname', $search)
                    ->orLike('email', $search);
        }
        return $builder->get()->getResultArray();
    }
}
