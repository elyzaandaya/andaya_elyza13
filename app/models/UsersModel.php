<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    /**
     * Get paginated users
     */
    public function page($search = '', $limit = 5, $page = 1)
    {
        $offset = ($page - 1) * $limit;

        // Build main query
        $this->db->from('users');

        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }

        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $records = $query->result_array();

        // Count total
        $this->db->from('users');
        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }
        $total_rows = $this->db->count_all_results();

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }

    /**
     * Insert a new user
     */
    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    /**
     * Find by ID (fixed signature)
     */
    public function find($id, $with_deleted = false)
    {
        return $this->db->where('id', $id)->get('users')->row_array();
    }

    /**
     * Update user
     */
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('users', $data);
    }

    /**
     * Delete user
     */
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }
}
