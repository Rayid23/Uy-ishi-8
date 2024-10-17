<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-4">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">

                    <div class="small-box" style="background-color:#177685">
                        <div class="inner">
                            <h3><?= $models['count_all_user'] ?></h3>

                            <p>Все пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <form action="/UserTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_user" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box" style="background-color:#CFCB36">
                        <div class="inner">
                            <h3><?= $models['not_acepted'] ?></h3>

                            <p>Новые пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <form action="/UserTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_not_accepted" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box" style="background-color:#369532">
                        <div class="inner">
                            <h3><?= $models['accepted'] ?></h3>

                            <p>Принято</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-round"></i>
                        </div>
                        <form action="/UserTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="all_accepted" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box" style="background-color:#E75D25">
                        <div class="inner">
                            <h3><?= $models['deleted'] ?></h3>

                            <p>Удаленные</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-minus-circled"></i>
                        </div>
                        <form action="/UserTrello" class="small-box-footer" method="POST">
                            <button type="submit" name="deleted" class="btn text-light">Подробности <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row mt-4">

                <div class="col-12" align="center">

                    <!-- <a class="btn btn-danger">Удалить все задачи</a> -->
                    <!-- <a class="btn btn-warning">Очистить</a> -->

                </div>

                <table class="table table-dark table-bordered table-hover mt-2" align="center" style="width:1100px">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ИМЯ</th>
                            <th scope="col">ЛОГИН</th>
                            <th scope="col">СТАТУС</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($models as $user) {
                            if (gettype($user) != "object") {
                                break;
                            }
                        ?>
                            <tr>
                                <td class="wid"><?= $user->id ?></td>
                                <td class="wid text-primary"><?= $user->name ?></td>
                                <td class="wid"><?= $user->email ?></td>
                                <?php

                                if ($user->status == 'Не принята') { ?>
                                    <td>
                                        <form action="UpdateStatusUser" method="POST">
                                            <input type="hidden" name="UpId" value="<?= $user->id ?>">
                                            <button type="submit" name="update_ver_2" class="btn btn-success"><i class="bi bi-check2"></i></button>
                                        </form>
                                    </td>

                                <?php } else { ?>
                                    <td class="wid text-success"><?= $user->status ?></td>
                                <?php }

                                ?>
                            </tr>

                        <?php }

                        ?>



                    </tbody>
                </table>

            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <li class="page-item">
                        <form action="UserTrello" method="POST">
                            <input type="hidden" name="<?= $_SESSION['path'] ?>">
                            <button type="submit" class="page-link bg-dark" name="back-btn" <?php echo ($_SESSION['page'] == 1) ? 'disabled' : '' ?>>Назад</button>
                        </form>
                    </li>

                    <?php
                    for ($page = 1; $page <= $_SESSION['pagenetionCount']; $page++) { ?>
                        <li class="page-item">
                            <form action="UserTrello" method="POST">
                                <input type="hidden" name="<?= $_SESSION['path'] ?>">
                                <button type="submit" class="page-link <?= ($_SESSION['page'] == $page) ? 'bg-primary' : 'bg-dark' ?> active" name="do-btn" value="<?= $page ?>"><?= $page ?></button>
                            </form>
                        </li>
                    <?php }
                    ?>

                    <li class="page-item">
                        <form action="UserTrello" method="POST">
                            <input type="hidden" name="<?= $_SESSION['path'] ?>">
                            <button type="submit" class="page-link bg-dark " name="next-btn" <?php ($_SESSION['page'] == $_SESSION['pagenetionCount']) ? 'disabled' : '' ?>>Вперед</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->