<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Удалить товар</li>
                </ol>
            </div>


            <h4>Удалить товар #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить этот товар?</p>

            <div class="form login-form">
            <form method="post">
                <button type="submit" name="submit" class="btn btn-default">Удалить</button>
            </form>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

