<?php

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedColumns = ["fname", "lname", "email", "created_at"];

    public function page($q = "", $limit = 5, $page = 1)
    {
        $offset = ($page - 1) * $limit;

        $db = new Database();
        $params = [];

        // Base query
        $sql = "SELECT * FROM {$this->table}";
        if (!empty($q)) {
            $sql .= " WHERE fname LIKE :q OR lname LIKE :q OR email LIKE :q";
            $params['q'] = "%$q%";
        }

        // Count total rows
        $count_sql = str_replace("SELECT *", "SELECT COUNT(*) as total", $sql);
        $db->query($count_sql, $params);
        $count_result = $db->get();
        $total_rows = $count_result ? $count_result->total : 0;

        // Paginated data
        $sql .= " LIMIT {$offset}, {$limit}";
        $db->query($sql, $params);
        $records = $db->getAll();

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }
}
