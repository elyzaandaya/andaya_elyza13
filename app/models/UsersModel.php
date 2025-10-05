<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {

    public function page($search = '', $limit = 5, $page = 1)
    {
        $offset = ($page - 1) * $limit;

        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }

        $query = $this->db->limit($limit, $offset)->get('users');
        $records = $query->result_array();

        $total_rows = $this->db->count_all_results('users');

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function find($id)
    {
        return $this->db->where('id', $id)->get('users')->row_array();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }
}
