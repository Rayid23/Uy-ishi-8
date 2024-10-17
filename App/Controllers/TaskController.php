<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController
{
    public function create()
    {

        if (isset($_POST["AddTask"])) {

            $title = $_POST["title"];
            $description = $_POST["desc"];
            $userID = $_POST["UserId"];

            $image = $_FILES["image"]['type'];
            $type = explode('/', $image);

            $array = ['jpeg', 'png', 'jpg'];

            if (in_array($type[1], $array)) {
                $imageName = "Picture_" . $_FILES['image']['name'];
                $ImageNewPath = 'Images/' . $imageName;

                move_uploaded_file($_FILES['image']['tmp_name'], $ImageNewPath);

                $data = [
                    'title' => $title,
                    'description' => $description,
                    'image' => $ImageNewPath,
                    'user_id' => $userID,
                    'status' => 'send',
                    'comment' => null
                ];

                Task::Create($data);
                header('location: /AdminDispetcher');
            }
        } elseif (isset($_POST['add_task'])) {
            $title = $_POST["title"];
            $description = $_POST["desc"];
            $userID = $_POST["UserId"];
            $image = $_FILES["image"]['type'];
            $type = explode('/', $image);

            if (empty($_FILES["image"]['type'])) {
                $imageName = 'Picture_default.jpg';
                $ImageNewPath = 'Images/' . $imageName;

                move_uploaded_file($_FILES['image']['tmp_name'], $ImageNewPath);

                $data = [
                    'title' => $title,
                    'description' => $description,
                    'image' => $ImageNewPath,
                    'user_id' => $userID,
                    'status' => 'send',
                    'comment' => null
                ];

                Task::Create($data);
                header('location: /adminTrello');
            } else {
                $array = ['jpeg', 'png', 'jpg'];

                if (in_array($type[1], $array)) {
                    $imageName = "Picture_" . $_FILES['image']['name'];
                    $ImageNewPath = 'Images/' . $imageName;

                    move_uploaded_file($_FILES['image']['tmp_name'], $ImageNewPath);

                    $data = [
                        'title' => $title,
                        'description' => $description,
                        'image' => $ImageNewPath,
                        'user_id' => $userID,
                        'status' => 'send',
                        'comment' => null
                    ];

                    Task::Create($data);
                    header('location: /adminTrello');
                }
            }
        }
    }

    public function update()
    {
        #Использовать switch-case для того чтоб было кароче код!

        if (isset($_POST['progress'])) {

            $id = $_POST['task_id'];

            $data = [
                'status' => 'progress'
            ];

            Task::Update($id, $data);
            header('location: /userReceived');
        } elseif (isset($_POST['ready'])) {
            $id = $_POST['task_id'];

            $data = [
                'status' => 'ready'
            ];

            Task::Update($id, $data);
            header('location: /userReceived');
        } elseif (isset($_POST['success'])) {
            $id = $_POST['task_id'];

            $data = [
                'status' => 'success'
            ];

            Task::Update($id, $data);
            header('location: /adminTrello');
        } elseif (isset($_POST['addmessage'])) {
            $id = $_POST['update'];
            $comment = htmlspecialchars(strip_tags($_POST['message']));

            $data = [
                'status' => 'send',
                'comment' => $comment
            ];

            Task::Update($id, $data);
            header('location: /adminTrello');
        } elseif (isset($_POST['delmessage'])) {
            $id = $_POST['update'];
            $comment = htmlspecialchars(strip_tags($_POST['message']));

            $data = [
                'status' => 'cancel',
                'comment' => $comment
            ];

            Task::Update($id, $data);
            header('location: /adminTrello');
        }elseif (isset($_POST['update_task_btn'])) {
            if (isset($_POST['update_task']) && !empty($_POST['title']) && !empty($_POST['desc'])) {

                $upId = $_POST['update_task'];
                $title = htmlspecialchars(strip_tags($_POST['title']));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));
                $ImageNewPath = $_POST['old_image'];

                if (!empty($_FILES['image']['name'])) {
                    $imageName = 'Picture_' . $_FILES['image']['name'];
                    $ImageNewPath = 'Images/' . $imageName;

                    move_uploaded_file($_FILES['image']['tmp_name'], $ImageNewPath);
                }

                $data = [
                    'title' => $title,
                    'description' => $desc,
                    'image' => $ImageNewPath
                ];

                Task::Update($upId, $data);
                header('location: /adminTrello');
            }
        } else {
            header('location: /adminTrello');
        }
    }

    public function delete(){
        if(isset($_POST['delete-btn'])){
            $id = $_POST['delete'];

            Task::Delete($id);
            header('location: /adminTrello');
        }
    }
}
