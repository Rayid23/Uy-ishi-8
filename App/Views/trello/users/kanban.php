<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper kanban">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <h1 class="text-center">Панель управление задача</h1>
                </div>
                <div class="col-sm-2 d-none d-sm-block">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="userReceived">Home</a></li>
                        <li class="breadcrumb-item active">Панель задач</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content pb-3">
        <div class="container-fluid h-100">

            <div class="card card-row card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Входящие
                    </h3>
                </div>
                <div class="card-body">

                    <?php
                    if ($models != 'Пусто') {
                        $start = 1;

                        foreach ($models as $userTask) {
                            if ($userTask->status != 'send') {
                                continue;
                            }
                    ?>

                            <div class="card card-outline ">

                                <div class="card-header ">
                                    <h4 class="card-title"><?= $userTask->title ?></h4>
                                    <div class="card-tools" style="display:flex">
                                        <a type="button" class="btn btn-primary" style="margin-right: 3px;" data-card-widget="collapse" href="#<?= $start ?>" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <form action="UpdateStatusTask" method="POST">
                                            <input type="hidden" name="task_id" value="<?= $userTask->id ?>">

                                            <button type="submit" name="progress" class="btn btn-warning " title="Collapse">
                                                <i class="bi bi-file-plus-fill"></i>
                                            </button>
                                        </form>

                                    </div>

                                </div>
                                <div class="card-body text-center">
                                    <p>
                                        <?= $userTask->description ?>
                                    </p>
                                    <a href="<?= $userTask->image ?>">
                                        <img src="<?= $userTask->image ?>" width="150px" style="border:2px solid black; border-radius:30px">

                                    </a>
                                </div>
                            </div>


                    <?php $start++;
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="card card-row card-default">

                <div class="card-header bg-info"> <!--Внутренности card-head-->
                    <h3 class="card-title">
                        В прогрессе
                    </h3>
                </div>

                <div class="card-body"> <!--Внутренности card-body-->

                    <?php

                    if (is_array($models) && !empty($models)) {
                        foreach ($models as $userTask) {
                            if ($userTask->status != 'progress') {
                                continue;
                            }
                    ?>

                            <div class="card card-light card-outline">
                                <div class="card-header ">
                                    <h4 class="card-title">Задача в прогрессе: <?= $userTask->id ?></h4>
                                    <div class="card-tools" style="display:flex">
                                        <a type="button" class="btn btn-primary" style="margin-right: 3px;" data-card-widget="collapse" href="#<?= $start ?>" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </a>
                                        <form action="UpdateStatusTask" method="POST">
                                            <input type="hidden" name="task_id" value="<?= $userTask->id ?>">

                                            <button type="submit" name="ready" class="btn btn-success " title="Collapse">
                                                <i class="bi bi-check-circle-fill"></i>
                                            </button>
                                        </form>

                                    </div>

                                </div>
                                <div class="card-body text-center">
                                    <p>
                                        <?= $userTask->description ?>
                                    </p>
                                    <a href="<?= $userTask->image ?>">
                                        <img src="<?= $userTask->image ?>" width="150px" style="border:2px solid black; border-radius:30px">
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>Нет задач в прогрессе.</p>";
                    }
                    ?>

                </div> <!--Закрытие card-body-->

            </div>

            <div class="card card-row card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        Готова
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    if (is_array($models) && !empty($models)) {
                        foreach ($models as $userTask) {
                            if ($userTask->status != 'ready') {
                                continue;
                            }
                    ?>
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Готова: <?= $userTask->id ?> задача</h5>
                                    <div class="card-tools">
                                        <a type="button" class="btn btn-primary" style="margin-right: 3px;" data-card-widget="collapse" href="#<?= $start ?>" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <p>
                                        <?= $userTask->description ?>
                                    </p>
                                    <a href="<?= $userTask->image ?>">
                                        <img src="<?= $userTask->image ?>" width="150px" style="border:2px solid black; border-radius:30px">
                                    </a>
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <div class="card card-row card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        Принятые
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    if (is_array($models) && !empty($models)) {
                        foreach ($models as $userTask) {
                            if ($userTask->status != 'success') {
                                continue;
                            }
                    ?>
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Принято: <?= $userTask->id ?> задача</h5>
                                    <div class="card-tools">
                                        <a type="button" class="btn btn-primary" style="margin-right: 3px;" data-card-widget="collapse" href="#<?= $start ?>" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <p>
                                        <?= $userTask->description ?>
                                    </p>
                                    <a href="<?= $userTask->image ?>">
                                        <img src="<?= $userTask->image ?>" width="150px" style="border:2px solid black; border-radius:30px">
                                    </a>
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>