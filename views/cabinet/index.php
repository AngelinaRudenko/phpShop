<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <h1>Кабиент пользователя</h1>
                <h3>Добрый день, <?php echo $user['login'];?></h3>
                <h4>Авторизация поршла успешно</h4>
                <ul>
                    <li><a href="/cabinet/edit">Редактировать данные</a></li>
                    <li><a href="/user/history">Список покупок</a></li>
                </ul>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>