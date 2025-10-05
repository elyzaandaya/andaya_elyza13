<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model {

    /**
     * Paginate and search users.
     */
    public function page($search = '', $limit = 5, $page = 1)
    {
        $offset = ($page - 1) * $limit;

        // Apply search filters
        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }

        // Get limited records
        $query = $this->db->limit($limit, $offset)->get('users');
        $records = $query->result_array();

        // Count total rows for pagination
        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }
        $total_rows = $this->db->count_all_results('users');

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }

    /**
     * Insert new user.
     */
    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    /**
     * Find a single user by ID.
     * Compatible with Model::find($id, $with_deleted = false)
     */
    public function find($id, $with_deleted = false)
    {
        return $this->db->where('id', $id)->get('users')->row_array();
    }

    /**
     * Update user by ID.
     */
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    /**
     * Delete user by ID.
     */
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }
}
