<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content mt-4">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color:#676ED1">
                        <div class="inner">
                            <h3><?= $models['all'] ?></h3>

                            <p>Все задачи</p>
                        </div>

                        <a href="#">
                            <div class="icon">
                                <i class="ion ion-clipboard"></i>
                            </div>
                        </a>

                        <form action="/adminTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_task" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $models['send'] ?></h3>

                            <p>Подтверждения</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pin"></i>
                        </div>
                        <form action="/adminTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_send" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?= $models['progress'] ?><sup style="font-size: 20px"></sup></h3>

                            <p>В Прогрессе</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <form action="/adminTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_progress" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color:#436C43">
                        <div class="inner">
                            <h3><?= $models['ready'] ?></h3>

                            <p>Готовые</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-round"></i>
                        </div>
                        <form action="/adminTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_ready" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $models['success'] ?></h3>

                            <p>Принятые</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-thumbsup"></i>

                        </div>
                        <form action="/adminTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_success" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $models['cancel'] ?></h3>

                            <p>Не принятые</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close"></i>
                        </div>
                        <form action="/adminTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_cancel" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row mt-4">

                <div class="col-12" align="center">

                    <!-- Модал для добавление задача -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddTask">
                        Добавить задачу
                    </button>

                    <!-- Внутренности модаля -->
                    <div class="modal fade" id="AddTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-5" id="exampleModalLabel">Добавьте задачу!</h4>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                    <h3 class=" mt-2 text-primary">Новая задача</h3>

                                    <form action="NewTask" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="title" required class="form-control" id="exampleInputEmail1" placeholder="Название" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <textarea rows="7" class="form-control" name="desc" required class="form-control" placeholder="Подробности..."></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" name="image" style="height:45px" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <select name="UserId" required class="form-control">
                                                <?php

                                                foreach ($models['Users'] as $user) { ?>
                                                    <option value="<?= $user->id ?>"><?= $user->name ?></option>
                                                <?php }

                                                ?>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                            <button type="submit" name="add_task" class="btn btn-primary">Сохранить</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                    <a class="btn btn-danger">Удалить все задачи</a>
                    <a class="btn btn-warning">Очистить</a>

                </div>

                <table class="table table-dark table-bordered table-hover mt-2" align="center" style="width:1100px">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ЗАГОЛОВОК</th>
                            <th scope="col">ОПИСАНИЕ</th>
                            <th scope="col">КАРТИНКА</th>
                            <th scope="col">ПОЛЬЗОВАТЕЛЬ</th>
                            <th scope="col">СТАТУС</th>
                            <th scope="col">КОММЕНТАРИЯ</th>
                            <th scope="col">ОПЦИИ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $index = 1;
                        foreach ($models as $task) {
                            if (gettype($task) != "object") {
                                break;
                            }
                        ?>
                            <tr>
                                <th class="wid" scope="row"><?= $index ?></th>
                                <td class="wid"><?= $task->title ?></td>
                                <td class="wid"><?= mb_substr($task->description, 0, 50) ?></td>
                                <td class="wid"><img src="<?= $task->image ?>" width="100px" style="border:2px solid black; border-radius:30px; border-color:blue"></td>
                                <td class="wid text-center"><?= $task->name ?></td>
                                <?php

                                if ($task->status == 'ready') { ?>
                                    <td>

                                        <!-- Возвращение задачи -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ReadyTask<?= $task->id ?>">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>

                                        <!-- Внутренности возвращение задачи -->
                                        <div class="modal fade" id="ReadyTask<?= $task->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fs-5" id="exampleModalLabel">Добавить комментарии: <?= $task->id ?></h4>
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="AddMessageTask" method="POST">
                                                            <h3 align="center">Примечение</h3>
                                                            <input type="hidden" name="update" value="<?= $task->id ?>">
                                                            <textarea class="form-control" rows="4" name="message" placeholder="Добавьте комментарии"></textarea>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                <button type="submit" name="addmessage" class="btn btn-primary">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Принять задачу -->
                                        <form action="/UpdateStatusTask" method="POST" style="display:inline-block">
                                            <input type="hidden" name="task_id" value="<?= $task->id ?>">
                                            <button type="submit" name="success" class="btn btn-success"><i class="bi bi-check2"></i></button>
                                        </form>

                                        <!-- Отменить задачу -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeletedModal<?= $task->id ?>">
                                            <i class="bi bi-x"></i>
                                        </button>

                                        <!-- Внутренности отмени задачи -->
                                        <div class="modal fade" id="DeletedModal<?= $task->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fs-5" id="exampleModalLabel">Добавить комментарии: <?= $task->id ?></h4>
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="DeleteTask" method="POST">
                                                            <h3 align="center">Исключение задачу...</h3>
                                                            <input type="hidden" name="update" value="<?= $task->id ?>">
                                                            <textarea class="form-control" rows="4" name="message" placeholder="Добавьте комментарии"></textarea>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                <button type="submit" name="delmessage" class="btn btn-primary">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <?php } else {
                                    if ($task->status == 'send') {
                                    ?>

                                        <td class="wid">
                                            <a class="btn btn-warning">
                                                Ожидание
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    if ($task->status == 'progress') {
                                    ?>

                                        <td class="wid">
                                            <a class="btn btn-primary">
                                                В прогрессии
                                            </a>
                                        </td>
                                    <?php
                                    }
                                    if ($task->status == 'success') {
                                    ?>

                                        <td class="wid">
                                            <a class="btn btn-success">
                                                Принято
                                            </a>
                                        </td>
                                    <?php
                                    }

                                    if ($task->status == 'cancel') {
                                    ?>

                                        <td class="wid">
                                            <a class="btn btn-danger">
                                                Остановлено
                                            </a>
                                        </td>
                                <?php
                                    }
                                }
                                ?>
                                <td class="wid"><?= $task->comment ?></td>

                                <td>
                                    <!-- Модал для обновление задачи -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateTask<?= $task->id ?>">
                                        <i class="bi bi-vector-pen"></i>
                                    </button>

                                    <!-- Внутренности модаля -->
                                    <div class="modal fade" id="UpdateTask<?= $task->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fs-5" id="exampleModalLabel" style="color:blue">Обновите задачу!</h4>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class=" mt-2 text-primary text-center">Обновление...</h3>

                                                    <form action="UpdateTask" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="update_task" value="<?= $task->id ?>">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="title" required class="form-control" id="exampleInputEmail1" placeholder="Название" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea rows="7" class="form-control" name="desc" required class="form-control" placeholder="Подробности..."></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="hidden" name="old_image" value="<?= $task->image ?>">
                                                            <input type="file" class="form-control" name="image" style="height:45px" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                            <button type="submit" name="update_task_btn" class="btn btn-primary">Сохранить</button>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <a class="btn btn-info"><i class="bi bi-journal-album"></i></a>
                                    <!-- Удалить задачу -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteTask<?= $task->id ?>">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>

                                    <!-- Внутренности отмени задачи -->
                                    <div class="modal fade" id="DeleteTask<?= $task->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="exampleModalLabel" style="color:red">Вы действительно хотите удалить данные: <?= $task->id ?>?</h5>
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="DeletedTask" method="POST" align="center">
                                                        <input type="text" value="<?= $task->title ?>" class="form-control" readonly>
                                                        <textarea class="form-control mt-1" rows="5" readonly><?= htmlspecialchars($task->description) ?></textarea>
                                                        <img src="<?= $task->image ?>" width="200px" style="border:2px solid black; border-radius:30px" class="mt-2">
                                                        <input type="hidden" name="delete" value="<?= $task->id ?>">
                                                        <input type="text" value="Пользователь: <?= $task->name ?>" readonly class="form-control mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                            <button type="submit" name="delete-btn" class="btn btn-danger">Удалить</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        <?php $index = $index + 1;
                        }

                        ?>



                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        <li class="page-item">
                            <form action="adminTrello" method="POST">
                                <input type="hidden" name="<?= $_SESSION['path'] ?>">
                                <button type="submit" class="page-link bg-dark" name="back-btn" <?php echo ($_SESSION['page'] == 1) ? 'disabled' : '' ?>>Назад</button>
                            </form>
                        </li>

                        <?php
                        for ($page = 1; $page <= $_SESSION['pagenetionCount']; $page++) { ?>
                            <li class="page-item">
                                <form action="adminTrello" method="POST" >
                                    <input type="hidden" name="<?= $_SESSION['path'] ?>">
                                    <button type="submit" class="page-link <?= ($_SESSION['page'] == $page) ? 'bg-primary' : 'bg-dark'?> active" name="do-btn" value="<?=$page?>"><?=$page?></button>
                                </form>
                            </li>
                        <?php }
                        ?>

                        <li class="page-item">
                            <form action="adminTrello" method="POST">
                                <input type="hidden" name="<?= $_SESSION['path'] ?>">
                                <button type="submit" class="page-link bg-dark " name="next-btn" <?php ($_SESSION['page'] == $_SESSION['pagenetionCount']) ? 'disabled' : '' ?>>Вперед</button>
                            </form>
                        </li>
                    </ul>
                </nav>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->