<div class="content-wrapper">


    <section class="content">
        <h3 class="text-center mt-2 text-primary">Пользователи</h3>
        <a href="AdminController" class="btn btn-primary">Назад</a>
        <div class="container-fluid">
            <div class="row text-center mt-4">

                <table class="table border table-primary table-bordered" style="width:1100px">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ЗАГОЛОВОК</th>
                            <th scope="col">ОПИСАНИЕ</th>
                            <th scope="col">КАРТИНКА</th>
                            <th scope="col">СТАТУС</th>
                            <th scope="col">ОПЦИЯ</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($models as $task) {

                        ?>
                            <tr>
                                <th class="wid" scope="row"><?= $task->id ?></th>
                                <td class="wid"><?= $task->title ?></td>
                                <td class="wid"><?= mb_substr($task->description, 0, 50) ?></td>
                                <td class="wid"><img src="<?= $task->image ?>" width="100px" style="border:2px solid black; border-radius:30px; border-color:blue"></td>
                                <td class="wid">
                                    <a class="btn btn-success">
                                        <?= $task->status ?>
                                    </a>
                                </td>

                                <td>
                                    <a class="btn btn-warning"><i class="bi bi-arrow-repeat"></i></i></a>
                                    <form action="/UpdateStatusTask" method="POST" style="display:inline-block">
                                        <input type="hidden" name="task_id" value="<?=$task->id?>">
                                        <button type="submit" name="success" class="btn btn-success"><i class="bi bi-check2"></i></button>
                                    </form>
                                    <a class="btn btn-danger"><i class="bi bi-x"></i></a>
                                </td>

                            </tr>
                        <?php }

                        ?>



                    </tbody>
                </table>
            </div>

        </div>


    </section>

</div>