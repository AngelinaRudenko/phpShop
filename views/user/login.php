<?php include ROOT . '/views/layouts/header.php'; ?>

    <section id="form"><!--form-->
        <div class="container row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li>- <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="login-form"><!--login form-->
                    <h2>Авторизация</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="email" value="<?php echo $email; ?>"/>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <button type="submit" name="submit" class="btn btn-default">Вход</button>
                    </form>
                </div><!--/login form-->

            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>