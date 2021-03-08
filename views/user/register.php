<?php include ROOT.'/views/layouts/header.php';?>

<section id="form"><!--form-->
    <div class="container row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($result) && $result): ?>
                <p>Регистрация прошла успешно</p>
                <?php endif;?>

                <?php if (isset($errors) && is_array($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                    <li>- <?php echo $error;?></li>
                    <?php endforeach;?>
                </ul>
                <?php endif;?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация на сайте</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>"/>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>"/>
                        <button type="submit" name="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->
            </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php';?>