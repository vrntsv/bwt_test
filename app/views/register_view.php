



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <br><br><br>
            <div class="card">

                <header class="card-header">
                    <a href="" class="float-right btn btn-outline-primary mt-1">Войти</a>
                    <h4 class="card-title mt-2">Зарегистрироваться</h4>
                </header>
                <article class="card-body">
                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Имя</label>
                                <input type="text" name="first_name" class="form-control" placeholder="" required>
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Фамилия</label>
                                <input type="text" name="second_name" class="form-control" placeholder=" " required>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-group">
                            <label>Электронная почта</label>
                            <input type="email" name="email" class="form-control" placeholder="" required>
                        </div> <!-- form-group end.// -->

                        <div class="form-row">

                            <div class="col form-group">
                                <br>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <span class="form-check-label"> Мужчина </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <span class="form-check-label"> Женщина</span>
                                </label>

                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Дата рождения</label>
                                <input class="form-control" name="birth_date" type="date">

                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->
                        <div class="form-group">
                            <label>Создать пароль</label>
                            <input class="form-control" name="password" type="password">
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Создать аккаунт  </button>
                        </div> <!-- form-group// -->
                    </form>
                </article> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->


</div>
<!--container end.//-->

<br><br>
