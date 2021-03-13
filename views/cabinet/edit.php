<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <h2 class="title text-center">Данные профиля</h2>
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

                <div class="form signup-form"><!--sign up form-->
                    <form action="#" method="post">

                        <p>Email
                            <input type="email" name="email" placeholder="email@gmail.com" value="<?php echo $user['email']; ?>"/>
                        </p>
                        <p>Имя
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $user['name']; ?>"/>
                        </p>
                        <p>Фамилия
                            <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $user['surname']; ?>"/>
                        </p>
                        <p>Страна
                            <input type="text" name="country" placeholder="Страна" value="<?php echo $user['country']; ?>"/>
                        </p>
                        <p>Пароль
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $user['password'];; ?>"/>
                        </p>

                        <button type="submit" name="submit" class="btn btn-default">Подтвердить</button>
                    </form>
                </div><!--/sign up form-->

            <?php endif; ?>

        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
