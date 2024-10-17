<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Task;

class UserController
{
    public function __construct()
    {
        unset($_SESSION["message"]);

        if (!auth()) {
            $_SESSION['message'] = "Войдите в аккаунт или создайте новую!";
            header("location: /");
        } else {
            if (auth()->role == "admin") {
                header("location: /403");
            }
        }
    }

    public function galery(){
        $_SESSION['PanelActive'] = 5;
        $users = Task::WhereCol('user_id', '=', auth()->id);
        return view('trello/galery', 'Галерия', $users, 'main.php');
    }
    public function kanban()
    {
        $users =  User::WhereCol('email', '=', auth()->email);
        $data = Task::WhereCol('user_id', '=', $users[0]->id);
        if (empty($data)) {
            $data = 'Пусто';
        }
        $_SESSION['PanelActive'] = 6;
        return view("trello/users/kanban", "Мои задачы", $data, 'main.php');
    }
    public function update()
    {

        if (isset($_POST['update'])) {

            $user = User::Show($_POST['UpId']);

            $data = [
                "name" => $user->name,
                "email" => $user->email,
                "password" => $user->password,
                "role" => $user->role,
                "status" => "Принята"
            ];

            User::Update($_POST['UpId'], $data);
            header('location: /AdminNewUser');
        }
        if (isset($_POST['update_ver_2'])) {

            $user = User::Show($_POST['UpId']);

            $data = [
                "name" => $user->name,
                "email" => $user->email,
                "password" => $user->password,
                "role" => $user->role,
                "status" => "Принята"
            ];

            User::Update($_POST['UpId'], $data);
            header('location: /UserTrello');
        } 

    }
}
