<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    /**
     * Paginated user fetch
     */
    public function page($search = '', $limit = 5, $page = 1)
    {
        $offset = ($page - 1) * $limit;

        $builder = $this->db->table('users');

        if (!empty($search)) {
            $builder->like('fname', $search);
            $builder->or_like('lname', $search);
            $builder->or_like('email', $search);
        }

        $builder->limit($limit, $offset);
        $records = $builder->get()->result_array();

        // Count total rows for pagination
        $countBuilder = $this->db->table('users');
        if (!empty($search)) {
            $countBuilder->like('fname', $search);
            $countBuilder->or_like('lname', $search);
            $countBuilder->or_like('email', $search);
        }
        $total_rows = $countBuilder->count_all_results();

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }

    public function insert($data)
    {
        return $this->db->table('users')->insert($data);
    }

    public function find($id, $with_deleted = false)
    {
        return $this->db->table('users')->where('id', $id)->get()->row_array();
    }

    public function update($id, $data)
    {
        return $this->db->table('users')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('users')->where('id', $id)->delete();
    }
}
