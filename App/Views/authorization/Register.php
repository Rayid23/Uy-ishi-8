<div class="row"> <!--Контент-->
    <section class="vh-100">
        <div class="container-fluid h-custom">

            <div class="row d-flex justify-content-center align-items-center" style="margin-top:45px">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="register" method="POST">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Регистрация Через: </p>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                                <i class="bi bi-facebook"></i>
                            </button>

                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-floating mx-1">
                                <i class="bi bi-twitter"></i>
                            </button>

                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-floating mx-1">
                                <i class="bi bi-linkedin"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Или</p>
                        </div>

                        <?php

                        if (isset($_SESSION['message'])) { ?>
                            <div class="divider d-flex align-items-center my-4">
                                <span style="color:red"><?= $_SESSION['message'] ?></span>
                            </div>
                        <?php }
                        ?>


                        <!-- Имя добавление -->
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                name="name" placeholder="Введите Имя" style="font-size: 19px;" />
                            <label class="form-label" for="form3Example3">Имя</label>
                        </div>

                        <!-- Логин добавление -->
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                name="login" placeholder="Введите Логин" style="font-size: 19px;" />
                            <label class="form-label" for="form3Example3">Логин</label>
                        </div>

                        <!-- Пароль добавление -->
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                name="password" placeholder="Введите пароль" style="font-size: 19px;" />
                            <label class="form-label" for="form3Example4">Пароль</label>
                        </div>

                        <div class="text-center text-lg-start mt-3 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                name="newUser" style="padding-left: 2.5rem; padding-right: 2.5rem;">Зарегистрироваться</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">У вас есть учетной записи? <a href="/"
                                    class="link-danger">Войти</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
</div>