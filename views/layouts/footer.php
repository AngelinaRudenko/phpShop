<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Курсовой проект 2021</p>
                <p class="pull-right">уч. гр. 7к2493 Руденко А.А.</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<script src="/template/js/jquery.js"></script>
<script src="/template/js/jquery.cycle2.min.js"></script>
<script src="/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/price-range.js"></script>
<script src="/template/js/jquery.prettyPhoto.js"></script>
<script src="/template/js/main.js"></script>
<!--асинхронное добавление в корзину-->
<script>
    //код должен быть выполнен только после загрузки док-та
    $(document).ready(function () {
        //нажатие на кнопку "добавить к корзину"
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/" + id, {}, function (data) {
                $("#cart-count").html(" (" + data + ")");
            });
            return false;
        });
    });
</script>
</body>
</html>