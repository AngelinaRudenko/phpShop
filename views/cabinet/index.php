<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <h2 class="title text-center">Кабиент пользователя</h2>
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <p>Email: <?php echo $user['email'];?></p>
                    <p>Имя: <?php echo ($user['name'] ? $user['name'] : 'не указано'); ?></p>
                    <p>Фамилия: <?php echo ($user['surname'] ? $user['surname'] : 'не указано'); ?></p>
                    <p>Страна: <?php echo ($user['country'] ? $user['country'] : 'не указано'); ?></p>
                    <a class="btn btn-default" href="/cabinet/edit">Редактировать данные</a>
                    <?php if ($user['role']=='admin'): ?>
                        <a class="btn btn-default" href="/admin/index"'>Перейти в панель администратора</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>