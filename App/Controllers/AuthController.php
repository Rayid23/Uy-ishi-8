<?php

namespace App\Controllers;

use App\Helpers\Auth;
class AuthController
{
    public function loginPage()
    {
        return view("authorization/Login", "Логин", '', 'AuthMain.php');
    }

    public function registerPage()
    {
        return view("authorization/Register", "Регистрация", '', 'AuthMain.php');
    }
    public function logout() {
        Auth::logout();
        header('Location: /');
    }

    public function login()
    {

        if (isset($_POST['checkUser']) && !empty($_POST['login'])&& !empty($_POST['password'])) {
            $login = htmlspecialchars(strip_tags($_POST['login']));
            $password = htmlspecialchars(strip_tags($_POST['password']));

            $data = [
                'email' => $login,
                'password' => $password
            ];

            $user = Auth::attach($data);
            
            if ($user) {
                if($_SESSION['Auth']->role == 'admin') {
                    header("location: /adminTrello");
                }
                else{
                    header("location: /userReceived");
                    exit();
                }
            }
            else{
                header("location: /");
            }
        }
        else{
            $_SESSION['message'] = 'Заполните все поля!';
            header('location: /');
        }
    }
    public function register()
    {
        if (isset($_POST['newUser'])) {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $login = htmlspecialchars(strip_tags($_POST['login']));
            $password = htmlspecialchars(strip_tags($_POST['password']));

            $data = [
                'name' => $name,
                'email' => $login,
                'password' => $password,
                'role' => 'user',
                'status' => 'Не принята'
            ];

            $mains = Auth::create($data);

            if($mains){
                header("location: /userReceived");
            }
            else{
                header('location: /register');
            }
        }
    }
}
