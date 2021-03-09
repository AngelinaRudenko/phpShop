<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 padding-right">

            <?php if ($result): ?>
                <h4>Данные отредактированы</h4>
            <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li>- <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация на сайте</h2>
                    <form action="#" method="post">
                        <p>Логин</p>
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <button type="submit" name="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->

            <?php endif; ?>

        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
