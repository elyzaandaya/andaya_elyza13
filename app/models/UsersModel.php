<?php

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fname', 'lname', 'email'];

    // Get all users with pagination
    public function page($q = '', $limit = 5, $offset = 0)
    {
        $builder = $this->db->table($this->table);

        if (!empty($q)) {
            $builder->like('fname', $q)
                    ->orLike('lname', $q)
                    ->orLike('email', $q);
        }

        $total_rows = $builder->countAllResults(false);
        $builder->limit($limit, $offset);
        $records = $builder->get()->getResultArray();

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }

    // Find by ID
    public function find($id, $with_deleted = false)
    {
        return $this->db->table($this->table)
                        ->where($this->primaryKey, $id)
                        ->get()
                        ->getRowArray();
    }

    // Insert user
    public function insertUser($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    // Update user
    public function updateUser($id, $data)
    {
        return $this->db->table($this->table)
                        ->where($this->primaryKey, $id)
                        ->update($data);
    }

    // Delete user
    public function deleteUser($id)
    {
        return $this->db->table($this->table)
                        ->where($this->primaryKey, $id)
                        ->delete();
    }
}
