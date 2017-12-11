<?php

include 'Xu-ly.php';

?>


<?php 
include 'header.php';
?>


        
        <div class="slideshow">
            <div class="container">
                <div class="row">
                        <div class="col-md-3">

<div class="menu-product">
    <div class="wpb_content_element hidden-xs">
        <section class="widget-container ts-menus-widget">
            <div class="widget-title-wrapper">
                <h3 class="widget-title heading-title">Danh mục</h3>
            </div>
            <nav class="vertical-menu ts-mega-menu-wrapper">
                <ul class="menu" id="menu-shop-by-category">
                    <?php
                        $sl="select * from loai_cha";
                        $kq=mysql_query($sl);
                        $d=mysql_fetch_array($kq);
                        ?>
                        <li class="parent">
                        <a href="Chi-tiet.php?id=<?php echo $d['loaicha_id'] ?>">
                            <span class="menu-icon">
                                <i class="fa fa-mobile"></i>
                            </span>
                            <span class="menu-label"><?php echo $d['loaicha_name'] ?></span>
                        </a>
                    </li><?php 
                        while($d=mysql_fetch_array($kq)){

                    ?>
                    <li class="parent">
                        <a href="Chi-tiet.php?id=<?php echo $d['loaicha_id'] ?>">
                            <span class="menu-icon">
                                <i class="fa fa-laptop"></i>
                            </span>
                            <span class="menu-label"><?php echo $d['loaicha_name'] ?></span>
                        </a>
                    </li><?php }?>
                    <!--Kết thúc menu 1-->
                   </ul>
            </nav>
        </section>
    </div>
    
    <!--Kết thúc megamenu-->
</div>

<script src="js/moduleServices.js"></script>
<script src="js/moduleController.js"></script>
    <!--Begin-->
    <div class="box-adv" ng-controller="moduleController" ng-init="initAdvMenuController('AdvMenus')">
        <div class="ts-single-image ts-effect-image eff-border-scale hidden-xs" ng-repeat="item in AdvMenus">
            <div class="image-link">
                <img ng-src="{{item.Image}}" data-original="{{item.Image}}" alt="{{item.Name}}" class="img-responsive lazy">
                <span class="overlay"></span>
            </div>
        </div>
    </div>
    <!--End-->
<script type="text/javascript">
    window.AdvMenus = [{"Id":2345,"ShopId":910,"AdvType":1,"AdvTypeName":"Menu 2 bên","Name":"1","Image":"images/banner_img_1.jpg","ImageThumbnai":"_thumbs/images/banner_img_1.jpg","Link":"#","IsVideo":false,"Index":1,"Inactive":false,"Timestamp":"AAAAAAAduNY="},{"Id":2346,"ShopId":910,"AdvType":1,"AdvTypeName":"Menu 2 bên","Name":"2","Image":"images/banner_img_2.jpg","ImageThumbnai":"_thumbs/images/banner_img_2.jpg","Link":"#","IsVideo":false,"Index":2,"Inactive":false,"Timestamp":"AAAAAAAduNc="}];
</script>                        </div>
                        <div class="col-md-6">

<script src="js/moduleServices.js"></script>
<script src="js/moduleController.js"></script>
    <!--Begin-->
    <div id="slideshow" class="clearfix wpb_content_element" ng-controller="moduleController" ng-init="initSlideshowController('Slideshows')">
        <div class="slider-container ">
            <div id="sliderlayer" class="slide-link ng-scope nivo-imageLink">
                <a href="#" class="slide-link ng-scope nivo-imageLink" ng-repeat="item in Slideshows">
                    <img class="img-responsive" alt="" src="hinh/BANNER.jpg" title="#htmlcaption1">
                </a>
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#sliderlayer').nivoSlider({
                effect: 'random',
                animSpeed: 500,
                pauseTime: 8000
            });
            $('#sliderlayer').on('swipeleft', function (e) {
                $('a.nivo-nextNav').trigger('click');
                loadslide();
                e.stopPropagation();
                return false;
            });
            $('#sliderlayer').on('swiperight', function (e) {
                $('a.nivo-prevNav').trigger('click');
                loadslide();
                e.stopPropagation();
                return false;
            });
            $(document).on("click", "#custombullet li a", function () {
                var tagaClick = $(this);
                $('#custombullet li').each(function () {
                    $(this).removeClass('active');
                });
                tagaClick.parent().addClass('active');
                $('.nivo-controlNav .nivo-control').each(function () {
                    var textControl = $(this).attr('rel');
                    var dataA = tagaClick.data('bullet');
                    if (textControl == dataA) {
                        $(this).trigger('click');
                    }
                });
            });
            function loadslide() {
                $('.nivo-controlNav .nivo-control').each(function () {
                    var targetSlide = $(this).attr("rel");
                    var hsclass = $(this).attr("rel", targetSlide).hasClass('active');
                    if (hsclass) {
                        $('#custombullet li[data-rel=' + targetSlide + ']').addClass('active');
                        $('#custombullet li[data-rel!=' + targetSlide + ']').removeClass('active');
                    }
                });
            }
        });
    </script>
    <!--Kết thúc slidershow-->
    <!--End-->
<script type="text/javascript">
    window.Slideshows = [{"Id":2793,"ShopId":910,"Name":"1","Image":"images/slideshow_1.jpg","Link":"#","Index":1,"Inactive":false,"Timestamp":"AAAAAAAduKo="},{"Id":2794,"ShopId":910,"Name":"2","Image":"images/slideshow_2.jpg","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAAduKs="},{"Id":2795,"ShopId":910,"Name":"3","Image":"images/slideshow_3.jpg","Link":"#","Index":3,"Inactive":false,"Timestamp":"AAAAAAAduKw="}];
</script>
<div class="hrv_commerce">
    <div class="ts-product-deals-slider-wrapper ts-slider">
        <header class="heading-wrapper">
            <h3 class="heading-title">
                Ưu đãi lớn
            </h3>
            <div class="navslider">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        </header>
        <div class="content-wrapper loading ">
            <div class="products ">
                    <?php
                    $sl="select * from san_pham ";
                    $kq=mysql_query($sl);
                    $d=mysql_fetch_array($kq);
                    ?>
                    <section class="product">
                        <div class="product-wrapper">
                            <div class="thumbnail-wrapper lazy-loading">
                                <a href="Chi-tiet.php?id=<?php echo $d['id'] ?>">
                                    <figure class="no-back-image">
                                        <img src="<?php echo $d['url_img'] ?>">
                                    </figure>
                                </a>
                                    <div class="product-label">
                                        <span class="onsale">-52%</span>
                                    </div>
                                <div class="product-group-button three-button">
                                    <div>
                                        <a href="/san-pham/ao-thun-nu-belike.html" class="">
                                            <i class="fa fa-align-center"></i>
                                            <span class="ts-tooltip button-tooltip">Chi tiết</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="meta-wrapper">
                                <h3 class="product-name">
                                   
                                    <a href="Chi-tiet.php?id=<?php echo $d['id'] ?>"><?php echo $d['name'] ?></a>
                                </h3>
                                <span class="price">
                                     <del><span class="amount"><?php echo $d['price'] ?></span></del>
                                            <ins><span class="amount">12.250.000₫</span></ins>
                                </span>
                                <div class="short-description"><p>Trẻ trung và cuốn hút theo phong cách đường phố thu-đông với áo nỉ thêu hình động vật của thương hiệu Asos.- Chất liệu cotton pha- Cổ 3cm- Tay dài, suông- Không lót trong- Màu sắc: XámHướng dẫn sử dụng:- Giặt bằng tay với nhiệt độ không quá 30°C- Không được tẩy- Không được sấy khô- Ủi với nhiệt độ...</p>
</div>
                                <div class="counter-wrapper days-3 clock-day-21229"></div>


                                <input id="deal_day_21229" value="dealday_2017-09-16T07:38:00" type="hidden">
                                <script>
                                var time_deal = $('#deal_day_21229').val();
                                var array_time = time_deal.split('_');
                                var endDate = array_time[1];
                                $('.clock-day-21229').countdown({
                                    date: endDate,
                                    render: function (data) {
                                        $(this.el).html("<div class='days'><div class='number-wrapper'><span class='number'>" + this.leadingZeros(data.days, 1) + "</span></div><div class='ref-wrapper'>Ngày</div></div><div class='hours'><div class='number-wrapper'><span class='number'>" + this.leadingZeros(data.hours, 2) + "</span></div><div class='ref-wrapper'>Giờ</div></div><div class='minutes'><div class='number-wrapper'><span class='number'>" + this.leadingZeros(data.min, 2) + "</span></div><div class='ref-wrapper'>Phút</div></div><div class='seconds'><div class='number-wrapper'><span class='number'>" + this.leadingZeros(data.sec, 2) + "</span></div><div class='ref-wrapper'>Giây</div></div>");
                                    }
                                });
                                </script>

                                <div class="loop-add-to-cart">
                                    <a href="javascript:void(0);" rel="nofollow" onclick="AddToCard(21229,1)" class="button ajax_add_to_cart_button">
                                        <span class="ts-tooltip button-tooltip"> Thêm giỏ hàng </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function ($) {
        var posTabProduct = $(".ts-slider .products");
        posTabProduct.owlCarousel({
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [991, 1],
            itemsTablet: [767, 1],
            itemsMobile: [480, 1],
            autoPlay: false,
            stopOnHover: false,
            addClassActive: true,

        });
        $(".ts-slider .navslider .next").click(function () {
            posTabProduct.trigger('owl.next');
        })
        $(".ts-slider .navslider .prev").click(function () {
            posTabProduct.trigger('owl.prev');
        })
    });
</script>                        </div>
                        <div class="col-md-3">

<section class="ts-products-widget">
    <div class="title-wrapper">
        <h3 class="hr_title heading-title">
            Sản phẩm khuyến mãi
        </h3>
    </div>
    <div class="ts-products-wrapper ">
        <div class="per-slide">
            <ul class="product_list_widget">
                   <?php

                    $sl="select * from san_pham limit 0,5";
                    $kq=mysql_query($sl);
                    $d=mysql_fetch_array($kq); 
                    while($d=mysql_fetch_array($kq))
                    {
                   ?>
                    <li>
                        <a class="ts-wg-thumbnail" href="/san-pham/son-moi-tpa-115.html" title="Son m&#244;i TPA-115">
                            <img src="<?php echo $d['url_img'] ?>" alt="Son m&#244;i TPA-115">
                        </a>
                        <div class="ts-wg-meta">
                            <a href="Chi-tiet?id=<?php echo $d['id'] ?>" title="Son m&#244;i TPA-115"><?php echo $d['name'] ?></a>
                                    <span class="price">
                                              <del><span class="amount"><?php echo $d['price'] ?></span></del>
                                            <ins><span class="amount">12.250.000₫</span></ins>                                    </span>
                        </div>
                    </li><?php } ?>
            </ul>
        </div>
    </div>
</section><script src="js/moduleServices.js"></script>
<script src="js/moduleController.js"></script>


    <!--Begin-->
    <section class="feedburner-subscription" ng-controller="moduleController" ng-init="initController()">
        <div class="widget-title-wrapper">
            <h3 class="widget-title heading-title">Đăng ký nhận tin</h3>
        </div>
        <div class="subscribe-widget">
            <form method="post" class="contact-form" ng-submit="registerNewsletter()" accept-charset="UTF-8">
                <div class="subscribe-email">
                    <input type="email" value="" size="18" name="Email" placeholder="Email của bạn" class="subscribe-input" ng-model="newsletter.Email" required>
                    <span class="input-group-btn">
                        <button class="button button-secondary transparent" name="submitNewsletter" type="submit">Đăng ký</button>
                    </span>
                </div>
            </form>
        </div>
    </section>
    <!--End-->
                        </div>
                </div>
            </div>
        </div>

        
            <div class="adv">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
    <div class="box-html">
        <div class="ts-effect-image eff-border-scale ts-single-image">
            <div class="image-link">
                <img alt="" src="images/banner_home_img.jpg"> 
                <span class="overlay"></span>
            </div>
        </div>
    </div>
                        </div>
                    </div>
                </div>
            </div>

        
    <div id="main" class="wrapper">
        <div class="page-container container ">
            <div id="main-content" class="row">
                <div id="primary" class="site-content">
                    <article>
                            <div class="col-md-12">

<div class="row">
    <div class="col-lg-12">
           <?php 
            $sl="select * from loai_cha where loaicha_id=331";
            $kq=mysql_query($sl);
            $d=mysql_fetch_array($kq);
            ?>
            <div class="box-section-collection">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ts-product-in-category-tab-wrapper tabs_1 clearfix box-section-background border-top-index">
                            <div class="column-tabs hr-col-md-2">
                                <div type="button" id="tabs_1_home" class="collapsed" data-toggle="collapse" data-target="#tabs_1" aria-expanded="false">
                                    <div class="heading-tab">
                                        <h3 class="heading-title">
                                            <i class="fa fa-mobile"></i>
                                         
                                            <span><?php echo $d['loaicha_name'] ?></span>
                                        </h3>
                                    </div>
                                </div>
                                <ul class="catalog-list clearfix group-link-collection navbar-collapse collapse" aria-expanded="false" style="" id="tabs_1" role="tablist">
                                    <li data-handle="0" data-loaded="true" class="active">
                                        <a href="javascript:void(0);">
                                            Tất cả
                                        </a>
                                    </li>
                                     <?php 
                                    
                                        $sl="select * from loai_con where loaicha_id={$d['loaicha_id']} ";
                                        $kq=mysql_query($sl);
                                        $d=mysql_fetch_array($kq);
                                         if(isset($_GET['loaicon_id'])==$d['loaicon_id'])
                                     {
                                        ?>
                                    <style>
                                        .tabs_1 .group-link-collection > li:hover, .tabs_1 .group-link-collection > li.li<?php echo $_GET['loaicon_id'] ?>{
                                            background-color: #ebb651;
                                        }
                                    </style>
                                        <?php
                                     }
                                         ?>
                                        <li data-handle="15155" class="li<?php echo $d['loaicon_id'] ?>">
                                            <a href="san-pham.php?loaicon_id=<?php echo $d['loaicon_id'] ?>&#lii<?php echo $d['loaicon_id'] ?>">
                                                <?php echo $d['loaicon_name'] ?>
                                            </a>
                                        </li>
                                        <?php
                                        while($d=mysql_fetch_array($kq)){
                                    ?>
                                    <?php
                                     if(isset($_GET['loaicon_id'])==$d['loaicon_id'])
                                     {
                                        ?>
                                    <style>
                                        .tabs_1 .group-link-collection > li:hover, .tabs_1 .group-link-collection > li.li<?php echo $_GET['loaicon_id'] ?>{
                                            background-color: #ebb651;
                                        }
                                    </style>
                                        <?php
                                       
                                        

                                     } ?>
                                        <li data-handle="15155" class="li<?php echo $d['loaicon_id'] ?>">
                                            <a href="san-pham.php?loaicon_id=<?php echo $d['loaicon_id'] ?>&#lii<?php echo $d['loaicon_id'] ?>">
                                                <?php echo $d['loaicon_name'] ?>
                                            </a>
                                        </li>
                                        <?php }?>
                                </ul>
                            </div>
                            <!--Kết thúc tabs-->
                         <div id="lii<?php echo $_GET['loaicon_id'] ?>" class="group-collection column-products hr_commerce hr-col-md-6">
                                <div class="clearfix section-collection product-lists box-product-lists active products content-product-list">
                                        
                                       <?php 
                                        $sl="select * from san_pham where loaicon_id={$_GET['loaicon_id']} limit 0,7 ";
                                    
                                        $kq=mysql_query($sl);
                                        $d=mysql_fetch_array($kq);
                                        
                                        while($d=mysql_fetch_array($kq)){
                                    ?>
                                        <div class="product col-md-3 col-sm-4 col-xs-6 product-item animated zoomIn ">
                                            <div class="product-wrapper product-resize ">
                                                <div class="product-information">
                                                    <div class="product-detail">
                                                        <div class="product-image thumbnail-wrapper">
                                                            <a href="Chi-tiet.php?id=<?php echo $d['id']?>" title="<?php echo $d['name']?>">
                                                                <figure class="no-back-image image-resize">
                                                                    <img alt="<?php echo $d['name']?>" src="<?php echo $d['url_img']?>">
                                                                </figure>
                                                            </a>
                                                            <div class="product-label field-sale">
                                                                <span class="onsale">Hot</span>
                                                            </div>
                                                            <div class="product-group-button three-button">
                                                            
                                                                <div>
                                                                    <a href="Chi-tiet.php?id=<?php echo $d['id']?>" class="">
                                                                        <i class="fa fa-align-center"></i>
                                                                        <span class="ts-tooltip button-tooltip">Chi tiết</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <a class="quickshop quick-view hidden-lg hidden-xs quickshop_mb" href="javascript:void(0);" data-handle="/san-pham/ao-so-mi-nu-vnxk.html">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                        <div class="product-info meta-wrapper">
                                                            <a href="Chi-tiet.php?id=<?php echo $d['id']?>" title="<?php echo $d['name']?>">
                                                                <h3 class="heading-title product-name">
                                                                    <?php echo $d['name']?>
                                                                </h3>
                                                            </a>
                                                            <div class="price-info clearfix">
                                                                <div class="price-new-old">
                                                                    <span><?php echo $d['price'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="loop-add-to-cart">
                                                                <a href="javascript:void(0);" rel="nofollow" onclick="AddToCard(21228,1)" class="button ajax_add_to_cart_button">
                                                                    <span class="ts-tooltip button-tooltip"> Giỏ hàng </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }?>
                                </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!--Kết thúc content tabs-->
                            <div class="column-banners hr-col-md-4 loading hidden-sm hidden-xs">
                                <figure>
                                    <a href="/collections/all">
                                        <img src="hinh/BANNER.jpg" class="attachment-full size-full" alt="Thời trang">
                                    </a>
                                </figure>
                            </div>
                            <!--Kết thúc Banner Tabs-->
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var owl = $(".tabs_1 .column-banners figure");
                owl.owlCarousel({
                    slideSpeed: 100,
                    paginationSpeed: 400,
                    loop: true,
                    responsiveClass: true, nav: false, dots: true,
                    items: 1,
                    itemsDesktop: [1000, 1],
                    itemsDesktopSmall: [900, 1],
                    itemsTablet: [600, 1],
                    autoPlay: true,
                    itemsMobile: false,
                });
                jQuery("#tabs_" +1 +"_home").on("click", function () {
                    jQuery(this).toggleClass("active");
                });
            </script>
            
        <!--Kết thúc tabs_1-->
         <?php 
            $sl="select * from loai_cha where loaicha_id=332";
            $kq=mysql_query($sl);
            $d=mysql_fetch_array($kq);
            ?>
            <div class="box-section-collection">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ts-product-in-category-tab-wrapper tabs_2 clearfix box-section-background border-top-index">
                            <div class="column-tabs hr-col-md-2">
                                <div type="button" id="tabs_2_home" class="collapsed" data-toggle="collapse" data-target="#tabs_2" aria-expanded="false">
                                    <div class="heading-tab">
                                        <h3 class="heading-title">
                                            <i class="fa fa-laptop"></i>
                                            <span><?php echo $d['loaicha_name'] ?></span>
                                        </h3>
                                    </div>
                                </div>
                                <ul class="catalog-list clearfix group-link-collection navbar-collapse collapse" aria-expanded="false" style="" id="tabs_2" role="tablist">
                                    <li data-handle="0" data-loaded="true" class="active">
                                        <a href="javascript:void(0);">
                                            Tất cả
                                        </a>
                                    </li>
                                     <?php 
                                    $sl="select * from loai_con where loaicha_id={$d['loaicha_id']}";
                                    $kq=mysql_query($sl);
                                    $d=mysql_fetch_array($kq);
                                     ?>
                                        <li data-handle="15226" data-loaded="false">
                                            <a href="san-pham-laptop.php?loaicon_idlt=<?php echo $d['loaicon_id'] ?>">
                                                <?php echo $d['loaicon_name'] ?>
                                            </a>
                                        </li>
                                       <?php 
                                    while($d=mysql_fetch_array($kq)){
                                    ?>
                                        <li data-handle="15226" data-loaded="false">
                                            <a href="san-pham-laptop.php?loaicon_idlt=<?php echo $d['loaicon_id'] ?>">
                                                <?php echo $d['loaicon_name'] ?>
                                            </a>
                                        </li>
                                       <?php }?>
                                </ul>
                            </div>
                            <!--Kết thúc tabs-->
                            <?php
                               if(isset($_GET['loaicon_idlt']))
                            {
                                include 'san-pham-laptop.php';
                            }
                            else

                            ?>
                            <div  class="group-collection column-products hr_commerce hr-col-md-6">
                                <div class="clearfix section-collection product-lists box-product-lists active products content-product-list">
                                         <?php 
                                        $sl="select * from san_pham where loaicon_id=72   limit 0,7";
                                        $kq=mysql_query($sl);
                                        $d=mysql_fetch_array($kq);
                                        while($d=mysql_fetch_array($kq)){
                                        ?>
                                        <div class="product col-md-3 col-sm-4 col-xs-6 product-item animated zoomIn ">
                                            <div class="product-wrapper product-resize ">
                                                <div class="product-information">
                                                    <div class="product-detail">
                                                        <div class="product-image thumbnail-wrapper">
                                                            <a href="Chi-tiet-laptop.php?idlp=<?php echo $d['id'] ?>" title="<?php echo $d['name'] ?>">
                                                                <figure class="no-back-image image-resize">
                                                                    <img alt="<?php echo $d['name'] ?>" src="<?php echo $d['url_img'] ?>">
                                                                </figure>
                                                            </a>
                                                            <div class="product-label field-sale">
                                                                <span class="onsale">HOT</span>
                                                            </div>
                                                            <div class="product-group-button three-button">
                                                                
                                                                <div>
                                                                    <a href="Chi-tiet-laptop.php?idlp=<?php echo $d['id'] ?>" class="">
                                                                        <i class="fa fa-align-center"></i>
                                                                        <span class="ts-tooltip button-tooltip">Chi tiết</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <a class="quickshop quick-view hidden-lg hidden-xs quickshop_mb" href="javascript:void(0);" data-handle="Chi-tiet.php?id=<?php echo $d['id'] ?>">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </div>
                                                        <div class="product-info meta-wrapper">
                                                            <a href="Chi-tiet-laptop.php?idlp=<?php echo $d['id'] ?>" title="<?php echo $d['name'] ?>">
                                                                <h3 class="heading-title product-name">
                                                                    <?php echo $d['name'] ?>
                                                                </h3>
                                                            </a>
                                                            <div class="price-info clearfix">
                                                                <div class="price-new-old">
                                                                    <span><?php echo $d['price'] ?></span>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="loop-add-to-cart">
                                                                <a href="javascript:void(0);" rel="nofollow" onclick="AddToCard(21477,1)" class="button ajax_add_to_cart_button">
                                                                    <span class="ts-tooltip button-tooltip"> Giỏ hàng </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix section-collection product-lists box-product-lists animated fadeIn products">
                                        <div class="icon-loading group-load-collection" style="display:none">
                                            <div class="uil-ring-css">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!--Kết thúc content tabs-->
                            <div class="column-banners hr-col-md-4 loading hidden-sm hidden-xs">
                                <figure>
                                    <a href="/collections/all">
                                        <img src="hinh/iPhone-X-San-hang-Banner-web_slide_1320x640.jpg" class="attachment-full size-full" alt="Mỹ phẩm" >
                                    </a>
                                </figure>
                            </div>
                            <!--Kết thúc Banner Tabs-->
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var owl = $(".tabs_2 .column-banners figure");
                owl.owlCarousel({
                    slideSpeed: 100,
                    paginationSpeed: 400,
                    loop: true,
                    responsiveClass: true, nav: false, dots: true,
                    items: 1,
                    itemsDesktop: [1000, 1],
                    itemsDesktopSmall: [900, 1],
                    itemsTablet: [600, 1],
                    autoPlay: true,
                    itemsMobile: false,
                });
                jQuery("#tabs_" +2 +"_home").on("click", function () {
                    jQuery(this).toggleClass("active");
                });
            </script>
        <!--Kết thúc tabs_1-->
    </div>
</div>
<!--Kết thúc Tabs -->                            </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

        
            <div class="partner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

<script src="js/moduleServices.js"></script>
<script src="js/moduleController.js"></script>
    <!--Begin-->
   
    <!--End-->
<script type="text/javascript">
    window.Partners = [{"Id":3266,"ShopId":910,"Name":"1","Link":"#","Logo":"images/partner_img_1.png","Index":1,"Inactive":false},{"Id":3267,"ShopId":910,"Name":"2","Link":"#","Logo":"images/partner_img_2.png","Index":2,"Inactive":false},{"Id":3268,"ShopId":910,"Name":"3","Link":"#","Logo":"images/partner_img_3.png","Index":3,"Inactive":false},{"Id":3269,"ShopId":910,"Name":"4","Link":"#","Logo":"images/partner_img_4.png","Index":4,"Inactive":false},{"Id":3270,"ShopId":910,"Name":"5","Link":"#","Logo":"images/partner_img_5.png","Index":5,"Inactive":false},{"Id":3271,"ShopId":910,"Name":"6","Link":"#","Logo":"images/partner_img_6.png","Index":6,"Inactive":false},{"Id":3272,"ShopId":910,"Name":"7","Link":"#","Logo":"images/partner_img_7.png","Index":7,"Inactive":false}];
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
                            <img alt="" src="img/support_img_1.png?v=5676">
                        </div>
                        <div class="hrv_sp-text">
                            <h4>24/7</h4>
                            <p>Hỗ trợ miễn phí</p>
                        </div>
                    </div>

                    <div class="col-sm-4 hrv_sp block-feature-middle">
                        <div class="hrv_sp-icon">
                            <img alt="" src="img/support_img_2.png?v=5676">
                        </div>
                        <div class="hrv_sp-text">
                            <h4>100% hoàn tiền</h4>
                            <p>Bảo hành</p>
                        </div>
                    </div>

                    <div class="col-sm-4 hrv_sp">
                        <div class="hrv_sp-icon">
                            <img alt="" src="img/support_img_3.png?v=5676">
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
                                <p>Copyright &copy; 2016 Big Market. <a href="https://www.runtime.vn" target="_blank">Powered by RUNTIME.VN</a>.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="wpb_content_element ">
                                <p><img alt="" src="img/payment-logo.png?v=5676" class="alignright"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

        </div>

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
            $(this).attr("data-original", $(this).attr("src"));
            $(this).attr("src", "/Images/blank.gif");
        });
        $("img.lazy-img").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>


   