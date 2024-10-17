<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Task;

class AdminController
{
    public function __construct()
    {
        $_SESSION['PanelActive'] = '0';
        unset($_SESSION["message"]);

        if (auth()) {
            if (auth()->role != "admin") {
                header("location: /403");
            }
        } else {
            $_SESSION['message'] = "Войдите в аккаунт или создайте новую!";
            header("location: /");
        }
    }
    public function trello()
    {
        $_SESSION['PanelActive'] = 1;

        $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id');
        $_SESSION['pagenetionCount'] = ceil(count($data) / 15);

        switch ($_POST) {
            case isset($_POST['all_task']):
                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_task';

                $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id ORDER BY status DESC LIMIT ' . $_SESSION['start'] . ',15');

                break;
            case isset($_POST['all_send']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_send';

                $_SESSION['pagenetionCount'] = ceil(count(Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "send"')) / 15);

                $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "send" LIMIT ' . $_SESSION['start'] . ',15');
                break;
            case isset($_POST['all_progress']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_progress';

                $_SESSION['pagenetionCount'] = ceil(count(Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "progress"')) / 15);

                $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "progress" LIMIT ' . $_SESSION['start'] . ',15');
                break;
            case isset($_POST['all_ready']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_ready';

                $_SESSION['pagenetionCount'] = ceil(count(Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "ready"')) / 15);

                $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "ready" LIMIT ' . $_SESSION['start'] . ',15');
                break;
            case isset($_POST['all_success']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_success';

                $_SESSION['pagenetionCount'] = ceil(count(Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "success"')) / 15);

                $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "success" LIMIT ' . $_SESSION['start'] . ',15');
                break;
            case isset($_POST['all_cancel']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_cancel';

                $_SESSION['pagenetionCount'] = ceil(count(Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "cancel"')) / 15);


                $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id HAVING status = "cancel" LIMIT ' . $_SESSION['start'] . ',15');
                break;
        }

        $data['all'] = count(Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id'));
        $data['send'] = count(Task::WhereCol('status', '=', 'send'));
        $data['ready'] = count(Task::WhereCol('status', '=', 'ready'));
        $data['progress'] = count(Task::WhereCol('status', '=', 'progress'));
        $data['success'] = count(Task::WhereCol('status', '=', 'success'));
        $data['cancel'] = count(Task::WhereCol('status', '=', 'cancel'));
        $data['Users'] = User::SelectAll(1);
        $data['time'] = 0;

        return view("trello/admin/adminTrello", 'Менеджмент задач', $data, 'main.php');
    }

    public function galery()
    {
        $_SESSION['PanelActive'] = 5;
        $data = Task::SelectToQuery('SELECT task.id, task.title, task.description, task.image, user.name, user.id as user_id, task.status, task.comment FROM task LEFT JOIN user ON task.user_id = user.id');
        return view('trello/galery', 'Галерия', $data, 'main.php');
    }

    public function UserTrello()
    {
        $_SESSION['PanelActive'] = 4;

        $data = User::SelectAll(1);
        $_SESSION['pagenetionCount'] = ceil(count($data) / 15);

        switch ($_POST) {
            case isset($_POST['all_user']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_user';

                $data = User::SelectToLimit($_SESSION['start']+1);
                break;
            case isset($_POST['all_not_accepted']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_not_accepted';

                $_SESSION['pagenetionCount'] = ceil(count(User::WhereCol('status', '=', 'Не принята')) / 15);

                $data = User::WhereColLimit('status', '=', 'Не принята', $_SESSION['start']);
                break;
            case isset($_POST['all_accepted']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'all_accepted';

                $_SESSION['pagenetionCount'] = ceil(count(User::WhereCol('status', '=', 'Принята')) / 15);

                $data = User::WhereColLimit('status', '=', 'Принята', $_SESSION['start']);
                break;
            case isset($_POST['deleted']):

                if (isset($_POST['back-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] - 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['next-btn'])) {
                    $_SESSION['page'] = $_SESSION['page'] + 1;
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } elseif (isset($_POST['do-btn'])) {
                    $_SESSION['page'] = $_POST['do-btn'];
                    $_SESSION['start'] = ($_SESSION['page'] - 1) * 15;
                } else {
                    $_SESSION['start'] = 0;
                    $_SESSION['page'] = 1;
                }

                $_SESSION['path'] = 'deleted';

                $_SESSION['pagenetionCount'] = ceil(count(User::WhereCol('status', '=', 'Удалено')) / 15);

                $data = User::WhereColLimit('status', '=', 'Удалено', $_SESSION['start']);
                break;
        }

        $data['count_all_user'] = count(User::SelectAll(1));
        $data['not_acepted'] = count(User::WhereCol('status', '=', 'Не принята'));
        $data['accepted'] = count(User::WhereCol('status', '=', 'Принята'));
        $data['deleted'] = count(User::WhereCol('status', '=', 'Удаленные'));

        return view("trello/users/userTrello", 'Пользователи', $data, 'main.php');
    }
    public function dispetcher()
    {
        $_SESSION['PanelActive'] = 2;
        $data = User::WhereCol('status', '=', 'Принята');
        return view("trello/admin/adminDispetcher", 'Диспетчер задач', $data, 'main.php');
    }
    public function controller()
    {
        $data = User::WhereCol('status', '=', 'Принята');

        $_SESSION['PanelActive'] = 3;
        return view("trello/admin/adminControl", 'Управление командой', $data, 'main.php');
    }
    public function reports()
    {
        if (isset($_POST['read'])) {
            $data = Task::WhereCol2('user_id', '=', $_POST['user_id'], 'status', '=', 'ready');
        }
        $_SESSION['PanelActive'] = 3;
        return view("trello/admin/adminReports", 'test', $data, 'main.php');
    }
}
