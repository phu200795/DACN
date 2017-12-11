
<?php 
include 'header.php';
?>

        

        

        
    <div id="main" class="wrapper">
        <div class="page-container container ">
            <div id="main-content" class="row">
                <div id="primary" class="site-content">
                    <article>
                            <div class="col-md-3">

<div class="menu-product ts-product-categories-widget">
    <div aria-expanded="false" data-target="#category_menu" data-toggle="collapse" class="collapsed" type="button">
        <span class="sr-only">Toggle navigation</span>
        <div class="title-wrapper">
            <h3 class="hr_title heading-title">Sản phẩm</h3>
        </div>
    </div>
    <div id="category_menu" aria-expanded="false" class="block_content navbar-collapse collapse">
        <ul class='list-block product-categories tree dhtml'>
         <?php
                        $sl="select * from loai_cha";
                        $kq=mysql_query($sl);
                        $d=mysql_fetch_array($kq);
                        ?><li class="parent">
                        <a href="xem-sp-dienthoai.php?idloaicha=<?php echo $d['loaicha_id'] ?>">
                            <span class="menu-icon">
                                <i class="fa fa-mobile"></i>
                            </span>
                            <span class="menu-label"><?php echo $d['loaicha_name'] ?></span>
                        </a>
                    </li><?php
                        while($d=mysql_fetch_array($kq)){

                    ?>
                    <li class="parent">
                        <a href="xem-sp-laptop.php?idloaicha=<?php echo $d['loaicha_id'] ?>">
                            <span class="menu-icon">
                                <i class="fa fa-laptop"></i>
                            </span>
                            <span class="menu-label"><?php echo $d['loaicha_name'] ?></span>
                        </a>
                    </li><?php }?>

</ul class='list-block product-categories tree dhtml'>
    </div>
</div>
                            </div>
                            <div class="col-md-9">

<div class="breadcrumb clearfix">
    <ul>
                    <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                        <a title="Đến trang chủ" href="Trang-chu.php" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                    </li>
                    <li class="icon-li"><strong>Tìm kiếm</strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>

<div id="main-content" class="product-content page_commerce">
   
        <?php 
        if (isset($_REQUEST['submit_search'])) {
            $search = addslashes($_GET['search']);?>
             <h1 class="title clearfix"><span>Kết quả tìm kiếm với <?php echo $search ?></span></h1>
    <!--Kết thúc gird list -->
    <div class="product_list grid row products-grid content-product-list products">
        <?php
            if (empty($search)) {
                alert("vui lòng nhập lại");
            } 
            else{

                $query = "select * from san_pham where name like '%$search%'";
               
               

                
                $sql = mysql_query($query);
 
               
                $num = mysql_num_rows($sql);
 
               
                if ($num > 0 && $search != "") 
                {
                    while($d=mysql_fetch_array($sql)){
                    ?>

                    <section class="product  product-resize col-lg-3 col-md-3 col-sm-6 col-xs-6 fixheight" style="height: 313px;">
                <div class="product-wrapper">
                    <div class="thumbnail-wrapper left-block">
                        <a href="Chi-tiet.php?id=<?php echo $d['id']?>">
                            <figure class="no-back-image image-resize" style="height: 248px;">
                                <img src="<?php echo $d['url_img'] ?>" alt="&#193;o sơ mi nữ VNXK">
                            </figure>
                        </a>
                                                  <div class="product-group-button three-button">
                            
                            <div>
                                <a href="Chi-tiet.php?id=<?php echo $d['id']?>" class="">
                                    <i class="fa fa-align-center"></i>
                                    <span class="ts-tooltip button-tooltip">Chi tiết</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="meta-wrapper right-block">
                        <div class="pr-0 product-contents">
                            <h3 class="heading-title product-name">
                                <a href="Chi-tiet.php?id=<?php echo $d['id']?>"><?php echo $d['name'] ?></a>
                            </h3>
                            <span class="price">
                                            <ins><span class="amount"><?php echo $d['price'] ?></span></ins>
                            </span>

                            
                                <div class="loop-add-to-cart  hidden-lg">
                                    <a href="javascript:void(0);" rel="nofollow" onclick="AddToCard(21228,1)" class="button ajax_add_to_cart_button">
                                        <span class="ts-tooltip button-tooltip"> Thêm giỏ hàng </span>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
                    
                <?php } } 
                else {
                    echo "Khong tim thay ket qua!";
                }
        }
        }
        ?>
            
            
    </div>
    <!--Kết thúc sản phẩm-->
</div>                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

        
            <div class="partner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

<script src="/app/services/moduleServices.js"></script>
<script src="/app/controllers/moduleController.js"></script>
    <!--Begin-->

    <!--End-->
<script type="text/javascript">
    window.Partners = [{"Id":3266,"ShopId":910,"Name":"1","Link":"#","Logo":"/Uploads/shop910/images/partner_img_1.png","Index":1,"Inactive":false},{"Id":3267,"ShopId":910,"Name":"2","Link":"#","Logo":"/Uploads/shop910/images/partner_img_2.png","Index":2,"Inactive":false},{"Id":3268,"ShopId":910,"Name":"3","Link":"#","Logo":"/Uploads/shop910/images/partner_img_3.png","Index":3,"Inactive":false},{"Id":3269,"ShopId":910,"Name":"4","Link":"#","Logo":"/Uploads/shop910/images/partner_img_4.png","Index":4,"Inactive":false},{"Id":3270,"ShopId":910,"Name":"5","Link":"#","Logo":"/Uploads/shop910/images/partner_img_5.png","Index":5,"Inactive":false},{"Id":3271,"ShopId":910,"Name":"6","Link":"#","Logo":"/Uploads/shop910/images/partner_img_6.png","Index":6,"Inactive":false},{"Id":3272,"ShopId":910,"Name":"7","Link":"#","Logo":"/Uploads/shop910/images/partner_img_7.png","Index":7,"Inactive":false}];
</script>                        </div>
                    </div>
                </div>
            </div>

        
        <div class="footer">

    <footer id="colophon">
        <div class="footer-container">
            <div class="first-footer-area footer-area">
                <div class="fix-column-no-margin clearfix">
                    <div class="col-sm-4 hrv_sp">
                        <div class="hrv_sp-icon">
                            <img alt="" src="/assets/100001/img/support_img_1.png?v=5676">
                        </div>
                        <div class="hrv_sp-text">
                            <h4>24/7</h4>
                            <p>Hỗ trợ miễn phí</p>
                        </div>
                    </div>

                    <div class="col-sm-4 hrv_sp block-feature-middle">
                        <div class="hrv_sp-icon">
                            <img alt="" src="/assets/100001/img/support_img_2.png?v=5676">
                        </div>
                        <div class="hrv_sp-text">
                            <h4>100% hoàn tiền</h4>
                            <p>Bảo hành</p>
                        </div>
                    </div>

                    <div class="col-sm-4 hrv_sp">
                        <div class="hrv_sp-icon">
                            <img alt="" src="/assets/100001/img/support_img_3.png?v=5676">
                        </div>
                        <div class="hrv_sp-text">
                            <h4>Miễn phí shipping</h4>
                            <p>Trên 5 đơn hàng</p>
                        </div>
                    </div>
                </div>
                <!--Kết thúc support-->
                <div class="container">
                    <div class="ts-footer-block clearfix row">
                            <div class="col-md-3 col-lg-3 col-sm-6">
                                <div class="wpb_content_element">
                                    <h3 class="widget-title heading-title">
                                        <span>Về ch&#250;ng t&#244;i</span>
                                    </h3>
                                        <ul class="no-padding">
                                                            <li>
                                                                <a href="/gioi-thieu.html">
                                                                    Giới thiệu
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/content/giao-hang-doi-tra.html">
                                                                    Giao h&#224;ng - Đổi trả
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/content/chinh-sach-bao-mat.html">
                                                                    Ch&#237;nh s&#225;ch bảo mật
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/lien-he.html">
                                                                    Li&#234;n hệ
                                                                </a>
                                                            </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6">
                                <div class="wpb_content_element">
                                    <h3 class="widget-title heading-title">
                                        <span>Trợ gi&#250;p</span>
                                    </h3>
                                        <ul class="no-padding">
                                                            <li>
                                                                <a href="/content/huong-dan-mua-hang.html">
                                                                    Hướng dẫn mua h&#224;ng
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/content/huong-dan-thanh-toan.html">
                                                                    Hướng dẫn thanh to&#225;n
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/content/tai-khoan-giao-dich.html">
                                                                    T&#224;i khoản giao dịch
                                                                </a>
                                                            </li>
                                        </ul>
                                </div>
                            </div>
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="wpb_content_element">
                                <section class="ts-social-icons">
                                    <h3 class="widget-title heading-title">Kết nối với chúng tôi</h3>
                                    <div class="social-icons style-3">
                                        <ul class="list-icons">
                                            <li>
                                                <a title="" class="facebook">
                                                    <i class="fa fa-facebook"></i>
                                                    <span class="ts-tooltip social-tooltip">Facebook</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a title="" target="_blank" class="twitter">
                                                    <i class="fa fa-google-plus"></i>
                                                    <span class="ts-tooltip social-tooltip">Google Plus</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a title="" target="_blank" class="google-plus">
                                                    <i class="fa fa-twitter"></i>
                                                    <span class="ts-tooltip social-tooltip">Twitter</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="" target="_blank" href="https://www.flickr.com/" class="flickr">
                                                    <i class="fa fa-flickr"></i>
                                                    <span class="ts-tooltip social-tooltip">Flickr</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <h3 class="widget-title heading-title">Hãy đến với chúng tôi</h3>
                            <div class="block_content">
                                <div class="block_content">
                                    <div class="sns-facebook" id="sns_facebook_16999696191449829151">
                                        <div id="fb-root">
                                            <div style="overflow-x : hidden;" class="facebook-fanbox">
                                                <div data-show-border="false" data-width="262" data-stream="false" data-header="false" data-show-faces="true" data-colorscheme="light" data-href="https://www.facebook.com/runtime.vn" class="fb-like-box">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        jQuery(document).ready(function () {
                                            initfb(document, 'script', 'facebook-jssdk');
                                        });
                                        function initfb(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id))
                                                return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=334341610034299";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <span class="vc_sep_line col-lg-12 col-md-12 col-sm-12 col-xs-12"></span>
                    </div>
                </div>
            </div>
            <div class="end-footer footer-area">
                <div class="container">
                    <div class="ts-footer-col">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="wpb_content_element ">
                                <p>Copyright &copy; 2016 Big Market.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="wpb_content_element ">
                                <p><img alt="" src="/assets/100001/img/payment-logo.png?v=5676" class="alignright"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<footer id="colophon" ng-controller="moduleController" ng-init="initFooterController('Shop')">
    <div class="footer-container">
        <div class="first-footer-area footer-area">
            <div class="fix-column-no-margin clearfix">
                <div class="col-sm-4 hrv_sp">
                    <div class="hrv_sp-icon">
                        <img alt="" src="/assets/100001/img/support_img_1.png?v=5676">
                    </div>
                    <div class="hrv_sp-text">
                        <h4>24/7</h4>
                        <p>Hỗ trợ miễn phí</p>
                    </div>
                </div>

                <div class="col-sm-4 hrv_sp block-feature-middle">
                    <div class="hrv_sp-icon">
                        <img alt="" src="/assets/100001/img/support_img_2.png?v=5676">
                    </div>
                    <div class="hrv_sp-text">
                        <h4>100% hoàn tiền</h4>
                        <p>Bảo hành</p>
                    </div>
                </div>

                <div class="col-sm-4 hrv_sp">
                    <div class="hrv_sp-icon">
                        <img alt="" src="/assets/100001/img/support_img_3.png?v=5676">
                    </div>
                    <div class="hrv_sp-text">
                        <h4>Miễn phí shipping</h4>
                        <p>Trên 5 đơn hàng</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="ts-footer-block clearfix row">
                    <div class="col-md-3 col-lg-3 col-sm-6" ng-repeat="item in menus|filter: { ParentId: null }|limitTo:2">
                        <div class="wpb_content_element">
                            <h3 class="widget-title heading-title">
                                <span>{{item.Name}}</span>
                            </h3>
                            <ul class="no-padding" ng-if="(menus|filter: { ParentId: item.Id }).length>0">
                                <li ng-repeat="it in menus|filter: { ParentId: item.Id }">
                                    <a href="/{{it.PageCode}}.html" ng-if="it.LinkType==LinkTypeConst.Page">
                                        {{it.Name}}
                                    </a>
                                    <a href="/{{it.PageOptionCode}}/{{it.PageContentCode}}.html" ng-if="it.LinkType==LinkTypeConst.PageContent">
                                        {{it.Name}}
                                    </a>
                                    <a href="/san-pham/{{it.ProductGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupProduct">
                                        {{it.Name}}
                                    </a>
                                    <a href="/tin-tuc/{{it.NewsGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupNews">
                                        {{it.Name}}
                                    </a>
                                    <a href="/du-an/{{it.ProjectGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupProject">
                                        {{it.Name}}
                                    </a>
                                    <a href="/dich-vu/{{it.ServiceGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupService">
                                        {{it.Name}}
                                    </a>
                                    <a href="/san-giao-dich/{{it.ExchangeGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupExchange">
                                        {{it.Name}}
                                    </a>
                                    <a href="{{it.Url}}" ng-if="it.LinkType==LinkTypeConst.Url">
                                        {{it.Name}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6">
                        <div class="wpb_content_element">
                            <section class="ts-social-icons">
                                <h3 class="widget-title heading-title">Kết nối với chúng tôi</h3>
                                <div class="social-icons style-3">
                                    <ul class="list-icons">
                                        <li>
                                            <a title="" href="{{shop.Facebook}}" class="facebook">
                                                <i class="fa fa-facebook"></i>
                                                <span class="ts-tooltip social-tooltip">Facebook</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a title="" target="_blank" href="{{shop.Google}}" class="twitter">
                                                <i class="fa fa-google-plus"></i>
                                                <span class="ts-tooltip social-tooltip">Google Plus</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a title="" target="_blank" href="{{shop.Twitter}}" class="google-plus">
                                                <i class="fa fa-twitter"></i>
                                                <span class="ts-tooltip social-tooltip">Twitter</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="" target="_blank" href="https://www.flickr.com/" class="flickr">
                                                <i class="fa fa-flickr"></i>
                                                <span class="ts-tooltip social-tooltip">Flickr</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-3 col-sm-6">
                        <h3 class="widget-title heading-title">Hãy đến với chúng tôi</h3>
                        <div class="block_content">
                            <div class="block_content">
                                <div class="sns-facebook" id="sns_facebook_16999696191449829151">
                                    <div id="fb-root">
                                        <div style="overflow-x : hidden;" class="facebook-fanbox">
                                            <div data-show-border="false" data-width="262" data-stream="false" data-header="false" data-show-faces="true" data-colorscheme="light" data-href="{{shop.Fanpage}}" class="fb-like-box">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    jQuery(document).ready(function () {
                                        initfb(document, 'script', 'facebook-jssdk');
                                    });
                                    function initfb(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id))
                                            return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&amp;appId=334341610034299";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <span class="vc_sep_line col-lg-12 col-md-12 col-sm-12 col-xs-12"></span>
                </div>
            </div>
        </div>
        <div class="end-footer footer-area">
            <div class="container">
                <div class="ts-footer-col">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="wpb_content_element ">
                            <p>Copyright &copy; 2016 Big Market. <a href="https://www.runtime.vn" target="_blank">Powered by RUNTIME.VN</a>.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="wpb_content_element ">
                            <p><img alt="" src="/assets/100001/img/payment-logo.png?v=5676" class="alignright"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".menu-quick-select ul").hide();
                $(".menu-quick-select").hover(function () { $(".menu-quick-select ul").show(); }, function () { $(".menu-quick-select ul").hide(); });
            });
        </script>
    </div>
</body>

    
    <div style="display: none;" id="loading-mask">
        <div id="loading_mask_loader" class="loader">
            <img alt="Loading..." src="/Images/ajax-loader-main.gif" />
            <div>
                Please wait...
            </div>
        </div>
    </div>
    <a class="back-to-top" href="#" style="display: inline;">
        <i class="fa fa-angle-up">
        </i>
    </a>
    
    
</body>
</html>
<script type="text/javascript">
    $(".header-content").css({ "background": '' });
    $("html").addClass('');
    $(document).ready(function () {
        $("img.lazy-img").each(function () {
            //$(this).attr("data-original", $(this).attr("src"));
            //$(this).attr("src", "/Images/blank.gif");
        });
        $("img.lazy-img").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>

