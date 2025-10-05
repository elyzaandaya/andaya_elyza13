<?php

class UsersController extends Controller
{
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function index()
    {
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $records_per_page = 5;
        $offset = ($page - 1) * $records_per_page;

        $all = $this->UsersModel->page($q, $records_per_page, $offset);

        $data['users'] = $all['records'];
        $data['total_rows'] = $all['total_rows'];
        $data['page'] = $page;
        $data['records_per_page'] = $records_per_page;
        $data['q'] = $q;

        return view('users/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email']
            ];
            $this->UsersModel->insertUser($data);
            redirect('/');
        }
        return view('users/add');
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email']
            ];
            $this->UsersModel->updateUser($id, $data);
            redirect('/');
        }

        $data['user'] = $this->UsersModel->find($id);
        return view('users/edit', $data);
    }

    public function delete($id)
    {
        $this->UsersModel->deleteUser($id);
        redirect('/');
    }
}
