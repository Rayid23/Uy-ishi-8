<div class="content-wrapper">


    <section class="content">

        <div class="container-fluid">
            <div class="row text-center mt-4">

                <table class="table border   table-bordered" style="width:1100px">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ИМЯ</th>
                            <th scope="col">ЛОГИН</th>
                            <th scope="col">ОПЦИЯ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($models as $user) { ?>
                            <tr>
                                <th class="wid"><?= $user->id ?></th>
                                <td class="wid"><?= $user->name ?></td>
                                <td class="wid"><?= $user->email ?></td>
                                <td class="wid">
                                    <form action="/AdminReports" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                                        <button class="btn btn-info" name="read" type="submit">Войти</button>
                                    </form>
                                    <a class="btn btn-warning">Ограничать</a>
                                    <a class="btn btn-danger">Бан</a>

                                </td>
                            </tr>
                        <?php }

                        ?>



                    </tbody>
                </table>
            </div>

            <div>
                <div class="card " style="width: 67rem;">
                    <div class="card-header">
                        <h3>Онлайн чат</h3>
                    </div>
                    <div class="card-body">
                        <label from="message">Александр: </label>

                        <div style="border:1px solid aqua; width:600px; height:50px; color:blue; border-radius:30px" class="text-center">
                            <p id="message" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <br>
                        <label from="message2">Настя: </label>

                        <div style="border:1px solid aqua; width:600px; height:auto; color:blue; border-radius:30px" class="text-center">
                            <p id="message2" class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ipsam totam quis alias laboriosam, velit omnis dolores dolor doloremque, itaque error corporis, ab magnam voluptatibus impedit fugit ad soluta provident. quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>

                    </div>



                </div>
                <style>
                    .custom-form {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-top: 20px;
                        padding: 10px;
                        background-color: #f8f9fa;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    .custom-textarea {
                        flex: 1;
                        height: 100px;
                        padding: 10px;
                        border: 1px solid #ced4da;
                        border-radius: 10px;
                        resize: none;
                        background-color: #212529;
                        color: #ffffff;
                        font-size: 16px;
                        outline: none;
                        margin-right: 10px;
                    }

                    .custom-textarea::placeholder {
                        color: #adb5bd;
                    }

                    .custom-btn {
                        padding: 10px 20px;
                        border: none;
                        background-color: #007bff;
                        color: #ffffff;
                        font-size: 16px;
                        border-radius: 50%;
                        cursor: pointer;
                        transition: background-color 0.3s ease;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                    }

                    .custom-btn:hover {
                        background-color: #0056b3;
                    }

                    .custom-btn i {
                        font-size: 20px;
                    }
                </style> <!-- Стили для онлайн чата -->
                <form class="custom-form bg-dark mb-2">
                    <textarea class="custom-textarea" rows="2" placeholder="Напишите что-нибудь!"></textarea>
                    <button type="button" class="custom-btn"><i class="bi bi-send"></i></button>
                </form>
            </div>

        </div>


    </section>

</div>