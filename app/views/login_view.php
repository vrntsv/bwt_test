



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <br><br><br>
            <div class="card">

                <header class="card-header">
                    <a href="index.php?register" class="float-right btn btn-outline-primary mt-1">Зарегистрироваться</a>
                    <h4 class="card-title mt-2">Войти</h4>
                </header>
                <article class="card-body">
                    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <?php if ($data['invalid_data']):?>
                            <h6 class="card-title mt-2" style="color: indianred">Неверные данные!</h6>

                        <?php endif; ?>
                        <div class="form-group">
                            <label>Электронная почта</label>
                            <input type="email" name="email" class="form-control" placeholder="" required>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>Пароль</label>
                            <input class="form-control" name="password"  type="password">
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Войти </button>
                        </div> <!-- form-group// -->
                    </form>
                </article> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->


</div>
<!--container end.//-->

<br><br>
