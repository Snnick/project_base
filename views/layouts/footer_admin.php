    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2016 Nick Sekretariov</p>
                <p class="pull-right">News</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->
<script src="/template/admin/js/jquery.js"></script>
<script src="/template/admin/js/jquery.cycle2.min.js"></script>
<script src="/template/admin/js/jquery.cycle2.carousel.min.js"></script>
<script src="/template/admin/js/bootstrap.min.js"></script>
<script src="/template/admin/js/jquery.scrollUp.min.js"></script>
<script src="/template/admin/js/price-range.js"></script>
<script src="/template/admin/js/jquery.prettyPhoto.js"></script>
<script src="/template/admin/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

</body>
</html>