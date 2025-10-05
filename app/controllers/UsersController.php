<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
    }

    public function index()
    {
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $result = $this->UsersModel->page($search, 5, $page);
        $users = $result['records'];
        $total_rows = $result['total_rows'];
        $limit = 5;
        $total_pages = ceil($total_rows / $limit);

        $this->call->view('users/index', [
            'users' => $users,
            'page' => $page,
            'total_pages' => $total_pages,
            'search' => $search
        ]);
    }

    public function store()
    {
        $data = [
            'fname' => $this->io->post('fname'),
            'lname' => $this->io->post('lname'),
            'email' => $this->io->post('email')
        ];

        if ($this->UsersModel->insert($data)) {
            redirect('');
        }
    }

    public function delete($id)
    {
        $this->UsersModel->delete($id);
        redirect('');
    }
}
