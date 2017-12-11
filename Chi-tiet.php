<?php 
include 'google.php';

?>
<?php 
include 'header.php';
?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=1405217469616755';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<div id="page-overlay"></div>
<div class="container-fluid">
    <div class="row">
       
    <div class="row">
    <div class="block-container">
        <div class="header-session">
                            <div class="breadcrumb-wrapper">
    <ul class="ssg-breadcrumb">
              <?php
                        $slsp="select * from san_pham where id={$_GET['id']}";
                        $kqsp=mysql_query($slsp);
                        $dsp=mysql_fetch_array($kqsp);
                        $sllc="select * from loai_con where loaicon_id={$dsp['loaicon_id']}";
                        $kqlc=mysql_query($sllc);
                        $dlc=mysql_fetch_array($kqlc);
                        $slc="select * from loai_cha where loaicha_id={$dlc['loaicha_id']}";
                        $kqc=mysql_query($slc);
                        $dc=mysql_fetch_array($kqc);


                        
                    ?>
                    <li itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
                                    <a itemprop="url" href="xem-sp-dienthoai.php?idloaicha=<?php echo $dc['loaicha_id'] ?>">
                        <span itemprop="title"><?php echo $dc['loaicha_name'];?></span>
                                            </a>
                            </li>
                    <li itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
                                    <a itemprop="url" href="xem-sp-dienthoai.php?idloaicha=<?php echo $dc['loaicha_id']?>&idloaicon=<?php echo $dlc['loaicon_id']?>">
                        <span itemprop="title"><?php echo $dlc['loaicon_name'];?></span>
                                            </a>
                            </li>
            </ul>
</div>                    </div>
    </div>
</div>


<div class="row">
    <div class="block-container">
        
         <?php
                        $sl="select * from san_pham where id={$_GET['id']}";
                        $kq=mysql_query($sl);
                        $d=mysql_fetch_array($kq);

                        
                    ?>
        <div class="product-slide-container">
            <div class="big-image">
                                    <img src="<?php echo $d['url_img'] ?>" alt="Laptop Dell Inspiron 14 3467 M20NR1">
                            </div>
                    </div>
        <div class="product-info-container">
            <a href="https://www.sosanhgia.com/p56569-laptop-dell-inspiron-14-3467-m20nr1.html" title="Laptop Dell Inspiron 14 3467 M20NR1">
               
                <h1><?php echo $d['name'] ?></h1>
            </a>
            
        
            <div class="rating-star">
                                                            <i class="icon icon-star grey-star"></i>
                                                                                <i class="icon icon-star grey-star"></i>
                                                                                <i class="icon icon-star grey-star"></i>
                                                                                <i class="icon icon-star grey-star"></i>
                                                                                <i class="icon icon-star grey-star"></i>
                                                </div>
        
            
            <div class="clearfix"></div>
            <div class="product-short-desc">
                <div class="short-desc">
                    <p>CPU: Core i3 6006U<br>
RAM/ HDD: 4Gb/ 1Tb<br>
Màn hình: 14.0Inch<br>
VGA: VGA onboard, Intel HD Graphics 5500<br>
HĐH: Dos</p>
                </div>
            </div>
                                                
                    <div class="clearfix"></div>

                    <?php
                    $m=strtolower($d['name']);

                    $parent=str_replace(" ","-", $m);

                    $thegioididong='https://www.thegioididong.com/dtdd/'.$parent;
                    $duchuy='https://www.duchuymobile.com/'.$parent;
                    $b=array();
                    $url = "https://www.bing.com/search?q=".urlencode($d['name']);
                    $parentt=str_replace("/","-", $parent);
                    $fpt='https://fptshop.com.vn/may-tinh-xach-tay/'.$parentt;
             
               
                    
                    if(get_data($url, $content)){
                        $b[]=save_all_loaicha($content);
                        foreach ($b as $k) {
                            foreach ($k as $key ) {
                                if(strcmp($key,$thegioididong)==0 ||strcmp($key,$duchuy)==0 )
                                    if(get_data($key,$contens))
                                   {
                                        @$dh = save_all_duchuy($contens);
                                        @$tgdd = save_all_thegioididong($contens);
                                        if(isset($dh) )
                                        {
                                            ?>
                                            <div class="priority-store">
                                            <span>Giá tốt từ nơi bán: </span>
                                            <span class="store-price "><?php echo $dh ?></span>
                                            <div class="merchant-logo-wrapper">
                                                <div class="merchant-logo">
                                                    <img src="hinh/logo-duchuymobile-2016.png"
                                                         title="">
                                                </div>
                                            </div>

                                            

                                            <a href="<?php echo $key ?>"
                                               class="ssg-btn price-btn link-btn-1 red-text"
                                               title="Đến nơi bán Laptop Dell Inspiron 14 3467 M20NR1 giá rẻ nhất"
                                               target="_blank" rel="nofollow">Đến nơi bán</a>
                                        </div>
                                        <?php

                                        }
                                        if(isset($tgdd) )
                                        {
                                            ?>
                                            <div class="priority-store">
                                            <span>Giá tốt từ nơi bán: </span>
                                            <span class="store-price"><?php echo $tgdd ?></span>
                                            <div class="merchant-logo-wrapper">
                                                <div class="merchant-logo">
                                                    <img src="hinh/3f683ebef7424655aff8da1581945afe.jpg"
                                                         title="">
                                                </div>
                                            </div>

                                            

                                            <a href="<?php echo $key ?>"
                                               class="ssg-btn price-btn link-btn-1 red-text"
                                               title="Đến nơi bán Laptop Dell Inspiron 14 3467 M20NR1 giá rẻ nhất"
                                               target="_blank" rel="nofollow">Đến nơi bán</a>
                                        </div>
                                        <?php

                                        }
                                    }
                   
                    ?>

                    
                    <?php 
                }
            }
        }

                    ?>
                                        <div class="stores-summrary">
                                                            Có 27 sản phẩm từ 16 nơi bán, giá từ
                        <span class="product-price">8.749.000</span> - <span
                            class="product-price">10.490.000</span>
                                                </div>
        </div>
    </div>
</div>

<div class="row" id="stores">
    <div class="block-container">
        <div class="section-collapse first merchant-list-section">
            <a class="section-collapse-trigger" role="button" data-toggle="collapse" href="#collapsePrice"
               aria-expanded="false" aria-controls="collapsePrice" rel="nofollow">
                <div class="collapse-header">
                    <div class="pull-left"><h4>Bảng giá bán</h4></div>
                    <div class="pull-right icon icon-toggler"></div>
                    <div class="clearfix"></div>
                </div>
            </a>
            <div class="section-collapse-body collapse col-xs-12 col-sm-12 in " id="collapsePrice">
                <div class="row">
                    <div class="merchant-container">
                        <ul class="product-merchants">
                 <li class="merchant-item">
                <?php 
                       if(get_data($url, $content)){ 
                      $b[]=save_all_loaicha($content);
                        foreach ($b as $k) {
                            foreach ($k as $key ) {
                                if(strcmp($key,$thegioididong)==0 ||strcmp($key,$duchuy)==0 )
                                    if(get_data($key,$contens))
                                   {
                                        @$dh = save_all_duchuy($contens);
                                        @$tgdd = save_all_thegioididong($contens);
                                        if(isset($dh) )
                                        {
                                            ?>
                                            <div class="first-product">
                                                <div class="store-product-img-wrapper">
                                                    <div class="store-product-img">
                                                        <img src="<?php echo $d['url_img'];?>" alt="Laptop Dell Inspiron 3467 M20NR1 14inch (Đen) - Hãng phân phối chính thức - Lazada"
                                                             onerror="javascript:this.src='https://img.sosanhgia.com/images/200x0/c08a2255eea54e828c3b22132ced78f2/image.jpg'">
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="product-name"><?php echo $d['name'];?>
                                                                                                                   
                                                                                                                                                                        <div class="promotions">
                                                                                                                            <a href="#" data-id="31"
                                                                   data-name="Lazada"
                                                                   class="ssg-btn red-text md-btn" rel="nofollow">Xem
                                                                    khuyến mãi</a>
                                                                                                                    </div>
                                                    </div>
                                                    <div class="merchant-logo-wrapper">
                                                        <div class="merchant-logo">
                                                            <img src="hinh/logo-duchuymobile-2016.png"
                                                                 title="Lazada">
                                                        </div>
                                                    </div>
                                                                                                        <div class="price-wrapper">
                                                        <div class=" grey-text"><?php echo $dh;?></div>
                                                        <div class="date-update">Cập nhật 17 giờ trước</div>
                                                    </div>
                                                    <div class="product-go-action">
                                                        
                                                        <a href="<?php echo $duchuy;?>"
                                                           class="ssg-btn price-btn link-btn-1  blue-text"
                                                           target="_blank" rel="nofollow"><span>Đến nơi bán</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } 
                                            if(isset($tgdd) )
                                        {
                                            ?>
                                            <div class="first-product">
                                                <div class="store-product-img-wrapper">
                                                    <div class="store-product-img">
                                                        <img src="<?php echo $d['url_img'];?>" alt="Laptop Dell Inspiron 3467 M20NR1 14inch (Đen) - Hãng phân phối chính thức - Lazada"
                                                             onerror="javascript:this.src='https://img.sosanhgia.com/images/200x0/c08a2255eea54e828c3b22132ced78f2/image.jpg'">
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="product-name"><?php echo $d['name'];?>
                                                                                                                   
                                                                                                                                                                        <div class="promotions">
                                                                                                                            <a href="#" data-id="31"
                                                                   data-name="Lazada"
                                                                   class="ssg-btn red-text md-btn" rel="nofollow">Xem
                                                                    khuyến mãi</a>
                                                                                                                    </div>
                                                    </div>
                                                    <div class="merchant-logo-wrapper">
                                                        <div class="merchant-logo">
                                                            <img src="hinh/3f683ebef7424655aff8da1581945afe.jpg"
                                                                 title="Lazada">
                                                        </div>
                                                    </div>
                                                                                                        <div class="price-wrapper">
                                                        <div class=" grey-text"><?php echo $tgdd;?></div>
                                                        <div class="date-update">Cập nhật 17 giờ trước</div>
                                                    </div>
                                                    <div class="product-go-action">
                                                        
                                                        <a href="<?php echo $thegioididong;?>"
                                                           class="ssg-btn price-btn link-btn-1  blue-text"
                                                           target="_blank" rel="nofollow"><span>Đến nơi bán</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } } } } }?>

                                                     

                                                 
                                <div class="socials">
                                    <div class="fb-share-btn">
                                        <div class="fb-share-button"
                                             data-href="https://www.sosanhgia.com/p56569-laptop-dell-inspiron-14-3467-m20nr1.html"
                                             data-layout="button"
                                             data-size="large"
                                             data-mobile-iframe="false"></div>
                                    </div>
                                    <div class="fb-like-btn">
                                        <div class="fb-like" data-href="https://www.sosanhgia.com/p56569-laptop-dell-inspiron-14-3467-m20nr1.html" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
                                    </div>
                                    <div class="fb-save-btn">
                                        <div class="fb-save" data-uri="https://www.sosanhgia.com/p56569-laptop-dell-inspiron-14-3467-m20nr1.html" data-size="large"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="block-container">
        
            <!-- Responsive -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6971966375135285"
                 data-ad-slot="9862777397"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var _uid = null; 
    function deconstructJWT(token) {
        var segments = token.split(".");
        if (!segments instanceof Array || segments.length !== 3) {
            throw new Error("Invalid JWT");
        }
        var claims = segments[1];
        return JSON.parse(decodeURIComponent(encodeURI(window.atob(claims))));
    }

    function doFbLogin(response) {
        try {
            var data = $.parseJSON(response);
            $.ajax({
                url: '/ajax/fb-login',
                type: 'POST',
                data: {_token: data.token},
                async: false
            }).done(function (response) {
                $('#cmt-confirmbox').modal('hide');
                try {
                    var responseJson = $.parseJSON(response);
                    if (responseJson.status) {
                        var auth_token = responseJson.data.auth_token;
                        var jwtData = deconstructJWT(auth_token);
                        var html = '<div class="comment-logged">Xin chào, <strong>' + jwtData.data.user.name + '</strong></div>';
                        $('#comment-form').before(html);
                        _uid = parseInt(jwtData.data.user.id);
                        //Submit comment form
                        $('#comment-form').submit();
                    } else {
                        alert(responseJson.message);
                    }
                } catch (e) {
                }
            });
        } catch (ex) {

        }
    }

    function doGoogleLogin(response) {
        try {
            var data = $.parseJSON(response);
            $.ajax({
                url: '/ajax/google-login',
                type: 'POST',
                data: {tokenObj: data},
                async: false
            }).done(function (response) {
                $('#cmt-confirmbox').modal('hide');
                try {
                    var responseJson = $.parseJSON(response);
                    if (responseJson.status) {
                        var auth_token = responseJson.data.auth_token;
                        var jwtData = deconstructJWT(auth_token);
                        var html = '<div class="comment-logged">Xin chào, <strong>' + jwtData.data.user.name + '</strong></div>';
                        $('#comment-form').before(html);
                        _uid = parseInt(jwtData.data.user.id);
                        //Submit comment form
                        $('#comment-form').submit();
                    } else {
                        alert(responseJson.message);
                    }
                } catch (e) {
                    alert('Có lỗi xãy ra, không thể lấy được thông tin đăng nhập');
                }
            });
        } catch (except) {
            /*console.log(except);*/
        }
    }

    $('#fblogin-btn').on('click', function (e) {
        e.preventDefault();
        var url = "";
        ssg.socialLogin(url);
    });

    $('#gglogin-btn').on('click', function (e) {
        e.preventDefault();
        var url = "";
        ssg.socialLogin(url);
    });
</script>
<script type="text/javascript">
    var _product_id = 56569;
    const CMT_STORAGE_KEY = 'comments';

    $(document).ready(function (e) {
        var merchantPromotions = {"31":[{"id":"505","code":"","merchant_id":"31","category_id":"9","merchant_name":"Lazada","affsub":"LAPTOP","brand_id":"0","title":"","content":"- Top 100 m&aacute;y t&iacute;nh laptop gi&aacute; t\u1ed1t nh\u1ea5t","link":"http:\/\/www.lazada.vn\/top-100-may-vi-tinh-laptop\/","cta":"Click xem","date_end":"31\/12\/2017","time_start":"0","time_end":"24","status":"1","logo":"188ccd667f4448b78b3f9188f95fc102\/lazada.jpg","redirect_link":"http:\/\/redirect.sosanhgia.com\/redirect.php?pr_id=505&asub=LAPTOP"},{"id":"506","code":"","merchant_id":"31","category_id":"35","merchant_name":"Lazada","affsub":"MAY-TINH-DE-BAN","brand_id":"0","title":"","content":"- Top SP m&aacute;y t&iacute;nh \u0111\u1ec3 b&agrave;n kh&ocirc;ng th\u1ec3 r\u1ebb h\u01a1n","link":"http:\/\/www.lazada.vn\/may-tinh-de-ban-va-phu-kien\/","cta":"Click xem","date_end":"31\/12\/2017","time_start":"0","time_end":"24","status":"1","logo":"188ccd667f4448b78b3f9188f95fc102\/lazada.jpg","redirect_link":"http:\/\/redirect.sosanhgia.com\/redirect.php?pr_id=506&asub=MAY-TINH-DE-BAN"},{"id":"510","code":"","merchant_id":"31","category_id":"1043","merchant_name":"Lazada","affsub":"THIET-BI-MANG","brand_id":"0","title":"","content":"- Thi\u1ebft b\u1ecb m\u1ea1ng&nbsp;\u01b0u \u0111&atilde;i gi&aacute; \u0111\u1ed9c quy\u1ec1n&nbsp;","link":"http:\/\/www.lazada.vn\/thiet-bi-mang\/","cta":"Click xem","date_end":"31\/12\/2017","time_start":"0","time_end":"24","status":"1","logo":"188ccd667f4448b78b3f9188f95fc102\/lazada.jpg","redirect_link":"http:\/\/redirect.sosanhgia.com\/redirect.php?pr_id=510&asub=THIET-BI-MANG"}],"45":[{"id":"767","code":"OF150","merchant_id":"45","category_id":"1004","merchant_name":"A \u0111\u00e2y r\u1ed3i","affsub":"OF150-MAYTINH","brand_id":"0","title":"","content":"- M&atilde; gi\u1ea3m 150K cho \u0111\u01a1n h&agrave;ng M&aacute;y t&iacute;nh - Thi\u1ebft b\u1ecb VP t\u1eeb 3 tri\u1ec7u","link":"https:\/\/www.adayroi.com\/may-tinh-linh-phu-kien-c349","cta":"L\u1ea5y m\u00e3","date_end":"01\/12\/2017","time_start":"0","time_end":"24","status":"1","logo":"0e1f29b8e11d41628b40def541349db4\/adayroi.jpg","redirect_link":"http:\/\/redirect.sosanhgia.com\/redirect.php?pr_id=767&asub=OF150-MAYTINH"},{"id":"768","code":"OF500","merchant_id":"45","category_id":"1004","merchant_name":"A \u0111\u00e2y r\u1ed3i","affsub":"OF500-MAYTINH","brand_id":"0","title":"","content":"- M&atilde; gi\u1ea3m 500K cho \u0111\u01a1n h&agrave;ng M&aacute;y t&iacute;nh - Thi\u1ebft b\u1ecb VP t\u1eeb 12 tri\u1ec7u","link":"https:\/\/www.adayroi.com\/may-tinh-linh-phu-kien-c349","cta":"L\u1ea5y m\u00e3","date_end":"01\/12\/2017","time_start":"0","time_end":"24","status":"1","logo":"0e1f29b8e11d41628b40def541349db4\/adayroi.jpg","redirect_link":"http:\/\/redirect.sosanhgia.com\/redirect.php?pr_id=768&asub=OF500-MAYTINH"}]};


        $('.scrollbox.ssg-dialog-content').niceScroll({
            cursorcolor: '#BCBCBC',
            cursorwidth: 7,
            autohidemode: false
        });

        $('.merchant-item .product-detail .promotions a.ssg-btn').on('click', function (e) {
            e.preventDefault();

            var ebox = $('#merchant-promotion-ebox');
            var merchant_id = $(this).data('id');
            var merchantName = $(this).data('name');
            var promotions = merchantPromotions[merchant_id];
            var wrapper = $(this).parentsUntil($(".merchant-item"), ".first-product");
            var merchantLogo = wrapper.find('.merchant-logo').html();
            var html = '';
            promotions.forEach(function (item) {
                html += '<div class="promotion-item merchant-promo"><div class="' + (item['code'] ? " coupon-code" : " promotion-link") + '"></div>';
                html += '<div class="promo-content">';
                html += '<div class="promo-text">' + item['title'] + '</div>';
                html += '<div class="promo-description">' + item['content'] + '</div>';
                html += '<div class="promo-info"><div class="expired"><i class="ssg-icon icon-clock"></i> Hạn đến: ' + item['date_end'] + '</div>';
                //html += '<a href="#" class="promo-label value"> - 600k</a>';
                html += '<div class="redirect-link"><a href="' + item['redirect_link'] + '" data-cp="' + item['code'] + '" class="ssg-btn link-btn-1 xs-btn' + (item['code'] ? " coupon-link red-text" : " blue-text") + '" target="_blank">' + (item['code'] ? "Lấy mã" : "Click xem") + '</a></div>';
                html += '</div></div></div>';
            });

            ebox.find('.ssg-dialog-content').html(html);
            ebox.find('.merchant-name').text(merchantName);
            ebox.find('#merchant-logo').html(merchantLogo);

            ssg.openDialog('#merchant-promotion-ebox');

            $('.scrollbox.ssg-dialog-content').getNiceScroll().resize();
        });

        $('#merchant-promotion-ebox .close-btn').on('click', function (e) {
            e.preventDefault();
            ssg.closeDialog('#merchant-promotion-ebox');
        });

        $('.submerchant-expand').on('click', function (e) {
            e.preventDefault();
            var ls = $(this).prev('.related-product-ls');
            if (ls.hasClass('collapsed')) {
                ls.slideDown().removeClass('collapsed');
            } else {
                ls.slideUp().addClass('collapsed');
            }
            $(this).toggleClass('collapsed');
        });

        $('.merchant-row.has-sub .merchant-expand-action').on('click', function (e) {
            $(this).parent('.row').parent('.merchant-row').toggleClass('collapsed');
        });

        $('#comment-model .close-btn').on('click', function (e) {
            e.preventDefault();
            ssg.closeOverlayDialog('#comment-model');

            const cmtBlockTop = $('#collapseComment').offset().top;
            $(window).scrollTop(cmtBlockTop - 50);
        });

        var descFullHeight = $('#product-detail #full-desc .description-content').innerHeight();

        if (descFullHeight > 800) {
            $('#full-desc').readmore({
                collapsedHeight: 600,
                speed: 500,
                moreLink: '<a class="expand-action-link" href="#">Xem thêm nội dung<i class="arrow-down-s icon"></i></a>',
                lessLink: '<a class="expand-action-link" href="#">Thu gọn nội dung<i class="arrow-down-s rotate-up icon"></i></a>'
            });
        }

        $('.comment-content ').expander({
            slicePoint: 210,
            expandText: 'Xem thêm',
            userCollapseText: 'Thu gọn',
            expandEffect: 'fadeIn',
            collapseEffect: 'fadeOut'
        });

        var ratingStars = $('.rating-stars');
        ratingStars.each(function (e) {
            var root = $(this);
            var stars = root.find('i.icon.icon-star');
            stars.on('mouseover', function () {
                var value = $(this).data('value');
                stars.each(function (i, el) {
                    if (i < value) {
                        $(el).removeClass('grey-star').addClass('blue-star');
                    } else if ($(el).hasClass('blue-star'))
                        $(el).removeClass('blue-star').addClass('grey-star');
                });
            });
        });

        /*ratingStars.on('mouseover', function (e) {
         var value = $(this).data('value');
         ratingStars.each(function (i, el) {
         if (i < value) {
         $(el).removeClass('grey-star').addClass('blue-star');
         } else if ($(el).hasClass('blue-star'))
         $(el).removeClass('blue-star').addClass('grey-star');
         });
         });*/

        var storage = Storages.localStorage;
        var acceptedCmtIDs = [];

        if (storage.isSet(CMT_STORAGE_KEY)) {
            var localComments = storage.get(CMT_STORAGE_KEY);
            if (localComments[0][_product_id]) {
                // Show small comment box
                if ($('.the-big-one').is(':hidden'))
                    $('.the-small-one').show(0);

                var html = '';
                var cmtObj = localComments[0][_product_id];
                for (var j = 0; j < cmtObj.length; j++) {
                    //Remove the comment object from local if this one has allowed in server
                    if ($.inArray(cmtObj[j].id, acceptedCmtIDs) !== -1) {
                        cmtObj.splice(j, 1);
                        j--;
                        continue;
                    }
                    var cmt = cmtObj[j];
                    var rating = cmt.rating;

                    html += '<div class="comment-row local-view">';
                    html += '<div class="row">';
                    html += '<div class="col-xs-12">';
                    html += '<div class="avt"></div>';
                    html += '<div class="comment-author"><strong class="author-name">' + cmt.name + '</strong><br></div>';
                    html += '<div class="comment-time-wrapper"><p class="comment-time">' + cmt.date + '</p></div>';
                    html += '<div class="comment-rate">';
                    if (rating > 0) {
                        for (var i = 1; i <= 5; i++) {
                            if (i <= rating) {
                                html += '<i class="icon icon-star blue-star"></i>';
                            } else {
                                html += '<i class="icon icon-star grey-star"></i>';
                            }
                        }
                    }

                    html += '</div></div></div>';
                    html += '<div class="row">';
                    html += '<div class="col-xs-12">';
                    html += '<p class="comment-content expander">' + cmt.comment + '</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row">';
                    html += '<div class="col-xs-12">';
                    html += '<div class="comment-like disabled">';
                    html += '<div class="pull-right">';
                    html += '<span class="like-count"><span class="like-text">Thích</span></span>';
                    html += '</div></div></div></div></div>';
                }
                if (cmtObj.length === 0) delete localComments[0][_product_id];
                storage.set(CMT_STORAGE_KEY, localComments);
            } else {
                // Show big comment box
                if ($('.the-small-one').is(':hidden'))
                    $('.the-big-one').show(0);
            }
        } else {
            // Show big comment box
            if ($('.the-small-one').is(':hidden'))
                $('.the-big-one').show(0);
        }

        /*var commentRow = $('#collapseComment .comment-row');
         if (commentRow.length > 0)
         commentRow.first().before(html);
         else
         $('#collapseComment .comment-post-row').before(html);*/

        $('.comment-container').append(html);


        $.ajax({
            url: '/ajax/similar-products',
            data: {
                'product_id': _product_id,
                'cid': 9,
                'brand_id': 51,
                'price': 8749000},
            success: function (response) {
                $('.product-grid').html(response);
            }
        });

        $('[data-toggle="popover"]').popover();

        $('#cmt-confirmbox').on('submit', function (e) {
            e.preventDefault();
            postComment();
        });

        $('.comment-form').on('submit', function (e) {
            e.preventDefault();
            var comment_txt = $(this).find('.cmt-input').val();
            if (ssg.isEmpty(comment_txt)) {
                $(this).find('.error-message').text('Bạn chưa nhập nội dung bình luận');
                return;
            }

            postComment($(this));
        });

        function postComment(target) {
            if (!_product_id)return;

            var commentForm = target;
            var errorMessage = commentForm.find('.error-message');

            var __error = false;
            var __error_msg = '';
            var comment_txt = commentForm.find('.cmt-input').val();
            var COMMENT_MIN_LENGTH = 5;

            if (comment_txt.length < COMMENT_MIN_LENGTH) {
                errorMessage.text("Nội dung bình luận quá ngắn");
                return;
            }

            var ratingStar = $(target).find('.rating-stars i.blue-star:last').data('value');
            var reqData = {
                product_id: _product_id,
                cmt: comment_txt,
                rating: ratingStar == undefined ? 3 : ratingStar,
                customer_id: _uid,
                customer_name: null,
                customer_email: null
            };

            if (!_uid) {

                reqData.customer_name = commentForm.find('.customer_name').val();
                reqData.customer_email = commentForm.find('.customer_email').val();

                if (ssg.isEmpty(reqData.customer_email)) {
                    __error = true;
                    __error_msg = 'Bạn chưa nhập email';
                } else if (!ssg.isEmail(reqData.customer_email)) {
                    __error = true;
                    __error_msg = 'Email không hợp lệ';
                } else if (ssg.isEmpty(reqData.customer_name)) {
                    __error = true;
                    __error_msg = 'Bạn chưa nhập họ tên';
                }

                if (__error) {
                    errorMessage.text(__error_msg);
                    return;
                }
            }

            $.ajax({
                url: '/ajax/new-comment',
                type: 'POST',
                data: {req: reqData},
                success: function (response) {
                    try {
                        var responseData = $.parseJSON(response);

                        //-- Storage the comment data into Local Storage
                        var localComments = new Array();
                        if (responseData.status) {
                            if ($('.comment-rows .comment-form-container').length > 0) {
                                $('.comment-summary .comment-form-container').fadeIn(100);
                                $('.comment-rows .comment-form-container').remove();
                            }

                            //Clear input
                            commentForm.find('.cmt-input').val('');
                            commentForm.find('.customer_name').val('');
                            commentForm.find('.customer_email').val('');

                            //Retrive the comment object
                            var commentResponseObj = responseData.data;

                            if (!storage.isEmpty(CMT_STORAGE_KEY)) {
                                localComments = storage.get(CMT_STORAGE_KEY);
                                if (localComments[0][_product_id] != undefined) {
                                    localComments[0][_product_id].push(commentResponseObj);
                                } else {
                                    localComments[0][_product_id] = [commentResponseObj];
                                }
                            } else {
                                var cmtObj = {};
                                cmtObj[_product_id] = [commentResponseObj];
                                localComments.push(cmtObj);
                            }
                            storage.set(CMT_STORAGE_KEY, localComments);

                            html = '<div class="comment-row local-view">';
                            html += '<div class="row">';
                            html += '<div class="col-xs-12">';
                            html += '<div class="avt"></div>';
                            html += '<div class="comment-author"><strong class="author-name">' + commentResponseObj.name + '</strong><br></div>';
                            html += '<div class="comment-time-wrapper"><p class="comment-time">' + commentResponseObj.date + '</p></div>';
                            html += '<div class="comment-rate">';
                            if (commentResponseObj.rating > 0) {
                                for (var i = 1; i <= 5; i++) {
                                    if (i <= commentResponseObj.rating) {
                                        html += '<i class="icon icon-star blue-star"></i>';
                                    } else {
                                        html += '<i class="icon icon-star grey-star"></i>';
                                    }
                                }
                            }

                            html += '</div></div></div>';
                            html += '<div class="row">';
                            html += '<div class="col-xs-12">';
                            html += '<p class="comment-content expander">' + commentResponseObj.comment + '</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                            html += '<div class="col-xs-12">';
                            html += '<div class="comment-like disabled">';
                            html += '<div class="pull-right">';
                            html += '<span class="like-count"><span class="like-text">Thích</span></span>';
                            html += '</div></div></div></div></div>';

                            /*commentRow = $('#collapseComment .comment-row');
                             if (commentRow.length > 0) {
                             commentRow.first().before(html);
                             } else {
                             $('#collapseComment .comment-post-row').before(html);
                             }*/

                            $('.comment-container').prepend(html);

                            //commentForm.find('input, textarea').attr('disabled', true);
                            //commentForm.find('input, textarea, button').hide();
                            commentForm.find('.error-message').addClass('success').text("Bạn gửi bình luận thành công!");
                            /*setTimeout(function () {
                             commentForm.find('.error-message').removeClass('success').text('');
                             }, 1500);*/
                        }
                    } catch (except) {
                        console.log(except);
                    }
                    if (!_uid)
                        $('#comment-model').css({'height': '0%'});
                }
            })
        }

        $('.comment-like[data-id]').click(function (e) {
            e.preventDefault();

            var wrapper = $(this);
            var id = $(this).data('id');
            if ($(this).hasClass('disabled'))return;

            $.ajax({
                url: '/ajax/comment/user-like',
                type: 'POST',
                data: {id: id},
                success: function (response) {
                    wrapper.addClass('disabled');
                    try {
                        var countEl = wrapper.find('.like-count');
                        var count = countEl.text().trim();
                        var result = $.parseJSON(response);
                        console.log(count);
                        if (result.success == true) {
                            count = (count.length == 0 ? 0 : count);
                            countEl.text(parseInt(count) + 1);
                        }
                    } catch (except) {

                    }
                }
            })
        });

        $('#cmt-post-shortcut').on('click', function (e) {
            e.preventDefault();
            $('#cmt-input').focus();
        });

        var cmt_row = $('.comment-row:not(.local-view)');
        let c = 4; // Number of now showing comment
        const showComment = 5;
        $('.read-more-comments').on('click', function (e) {
            e.preventDefault();
            if (c < cmt_row.length) {
                c += showComment;
                $('.comment-row.display-none:lt(' + showComment + ')').fadeIn(300).removeClass('display-none');

                if (c >= cmt_row.length)
                    $('.read-more-comments').remove();
            }

            if ($('.comment-form-container.bottom-sticky').length > 0) {
                $('.comment-form-container.bottom-sticky').removeClass('bottom-sticky').addClass('sticky');
            }
        });
    });


</script>
<script>
    $(document).ready(function () {

        if ($.fn.owlCarousel) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                items: 1,
                dots: false,
                thumbs: true,
                thumbImage: true,
                thumbContainerClass: 'owl-thumbs',
                thumbItemClass: 'owl-thumb-item'
            });
        }

        $('.product-slide-container .thumbs img').on("mouseover", function (e) {
            var src = $(this).data('src');
            if (!src)return;

            $('.product-slide-container .big-image img').attr('src', src);
        });

        $('.product-slide-container img').on('dragstart', function (e) {
            e.preventDefault();
        });


        var top, _top = 0;
        var visibleComments = $('.comment-container .comment-row:not(.display-none)');
        var commentRows = $('.comment-rows');
        var commentRowsTop = commentRows.offset().top;
        var commentRowsHeight = 0;
        var commentFormContainer = $('.comment-form-container');
        var commentContainerTop = commentFormContainer.offset().top;
        var commentRowHeight = visibleComments.innerHeight();


        $(window).scroll(function (e) {
            visibleComments = $('.comment-container .comment-row:not(.display-none)');

            if (visibleComments.length > 5) {
                top = $(document).scrollTop();

                commentRowsHeight = commentRows.innerHeight();

                if (top > commentContainerTop - 150) {
                    if ((top + commentFormContainer.innerHeight()) + 200 < (commentRowsTop + commentRowsHeight)) {
                        //console.log((top + commentFormContainer.innerHeight()) < (commentRowsTop + commentRowsHeight));
                        if (!commentFormContainer.hasClass('sticky')) {
                            if (commentFormContainer.hasClass('bottom-sticky')) {
                                commentFormContainer.removeClass('bottom-sticky');
                            }
                            commentFormContainer.addClass('sticky');
                        }
                    } else if (commentFormContainer.hasClass('sticky')) {
                        commentFormContainer.removeClass('sticky');
                        commentFormContainer.addClass('bottom-sticky');
                    }
                } else {
                    if (commentFormContainer.hasClass('sticky')) {
                        commentFormContainer.removeClass('sticky');
                    }
                }
            }
        })
    });


</script>


<img src="https://www.sosanhgia.com/tracking/product?id=56569" class="__tracking__">
</div>

<?php 
include 'footer.php';
?>