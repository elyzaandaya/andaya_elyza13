<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Core\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $model = new UsersModel();

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $users = $model->getAllUsers($search);

        // 🔴 REMOVE or comment out these (they cause the error)
        // $this->pagination->create_links();
        // $data['pagination'] = $this->pagination->create_links();

        return $this->view('users/index', [
            'users' => $users,
            'search' => $search
        ]);
    }

    public function save()
    {
        $model = new UsersModel();
        $data = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email']
        ];

        if (!empty($_POST['id'])) {
            $model->update($_POST['id'], $data);
        } else {
            $model->insert($data);
        }

        redirect('/');
    }

    public function delete($id)
    {
        $model = new UsersModel();
        $model->delete($id);
        redirect('/');
    }
}
