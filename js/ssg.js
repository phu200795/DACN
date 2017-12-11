var ssg = {
    isEmail: function (email) {
        var pattern = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return pattern.test(email);
    },
    isEmpty: function (str) {
        return (!str || str.length === 0 || !str.trim());
    },
    canvasOverlay: function (status, target, zindex, bg_level) {
        zindex = zindex ? zindex : 999;
        bg_level = bg_level ? "rgba(0, 0, 0, " + bg_level + ")" : "rgba(0, 0, 0, 0.2)";
        if (status === true) {
            $('#page-overlay').attr('data-target', target).css({
                'z-index': zindex,
                'background-color': bg_level
            }).fadeIn(200);
            $('body').bind({
                'mousewheel': function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            });
        } else {
            $('#page-overlay').attr('data-target', target).css({'z-index': zindex}).fadeOut(100);

            $('body').unbind('mousewheel');
        }
    },
    openDialog: function (target, zindex) {
        zindex = zindex || 999;
        $(target).fadeIn(300).addClass('active').css({'z-index': zindex});
        $('body').addClass('modal-open');
        this.canvasOverlay(true, target, zindex);
    },
    closeDialog: function (target) {
        $(target).removeClass('active');
        this.canvasOverlay(false);
        $('body').removeClass('modal-open');
    },
    socialLogin: function (loginUrl) {
        window.open(loginUrl, 'socialLogin', 'height=800,width=800');
    },
    openOverlayDialog: function (target) {
        $(target).addClass('dialog-open');
        $('html').addClass('dialog-overflow-hidden');
        $('.container-fluid').addClass('dialog-hide');
        this.canvasOverlay(true);
    },
    closeOverlayDialog: function (target) {
        $(target).removeClass('dialog-open');
        $('html').removeClass('dialog-overflow-hidden');
        $('.container-fluid').removeClass('dialog-hide');
        this.canvasOverlay(false);
    },
    parseJSON: function ($json) {
        try {
            return $.parseJSON($json);
        } catch (e) {
            console.log("Json parse error!")
        }
    },
    moneyFormat: function (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    historyPush: function (updateParams, url) {

        var title = $('title').text();

        var historyParam = {params: updateParams, scrollTop: 0};

        history.pushState(historyParam, title, url);
    },
    updateUrl: function () {
        var isSearchPage = page_id === 'search';
        var location = window.location;
        var updateParams = [
            {'param': 'f', 'default': ''},
            {'param': 'price', 'default': ''},
            {'param': 'b', 'default': ''},
            {'param': 'keyword', 'default': ''},
            {'param': 'sort', 'default': 'popularity'},
            {'param': 'page', 'default': 1}
        ];

        if (page_id === "search" || page_id === "tag") {
            updateParams.push({'param': 't', 'default': ''});
            updateParams.push({'param': 'st', 'default': 1});
        }

        var paramUrlArray = [];
        var objLen = Object.keys(updateParams).length;

        for (var i = 0; i < objLen; i++) {
            var item = updateParams[i];
            if (params.hasOwnProperty(item['param']) && params[item['param']] !== item['default']) {
                if ((item['param'] === 't' && (page_id !== "search" && page_id !== "tag")) || (item['param'] === 'b' && page_id !== "search" && page_id !== "tag") || (item['param'] === 'keyword' && page_id === "search")){
                    continue;
                }

                paramUrlArray.push(item['param'] + '=' + params[item['param']]);
            }
        }

        return location.protocol + '//' + location.hostname + location.pathname + (paramUrlArray.length === 0 ? "" : '?' + paramUrlArray.join('&'));
    },
    filterParamsCompair: function (params, params1) {
        var filterParams = ['price', 'f', 'b'];
        var isFilterChanged = false;
        for (var param in params) {
            if ((params[param] !== params1[param]) && $.inArray(param, filterParams) !== -1) {
                //console.log(param);
                isFilterChanged = true;
            }
        }
        return isFilterChanged;
    },
    applyFilter: function (params, callback, updateListOnly = false) {
        var requestUrl = "";
        switch (page_id) {
            case 'category':
                requestUrl = "ajax/listing/get-list";
                break;
            case 'brand':
                requestUrl = '/ajax/brand/get-list';
                break;
            case 'search':
                requestUrl = '/ajax/search/get-list';
                break;
            case 'tag':
                requestUrl = '/ajax/tag/get-list';
                break;
        }
        params.type = updateListOnly ? 1 : 2;

        var isSearchPage = page_id === 'search';

        $.ajax({
            url: requestUrl,
            type: 'GET',
            data: params,
            success: function (res) {
                // Update browser url and make history
                var url = ssg.updateUrl();

                if (url !== null) {
                    var currentState = history.state;

                    if (currentState !== null) {

                        if (JSON.stringify(currentState.params) !== JSON.stringify(params)) {
                            ssg.historyPush(params, url);
                        }
                    } else {
                        ssg.historyPush(params, url);
                    }
                }

                var data = ssg.parseJSON(res);
                if (data.hasOwnProperty('content')) {
                    $('.productlist-products-container').html(data.content);
                }

                if (data.hasOwnProperty('filters')) {
                    var filters = data.filters;
                    /* Price ranges */
                    var priceRanges = filters['price-ranges'];
                    if (priceRanges !== null && typeof priceRanges === 'object' && Object.keys(priceRanges).length > 0) {
                        var price_range_html = "", count_html = "";
                        priceRanges.forEach(function (item) {
                            count_html = item.hasOwnProperty('total') ? ' <span class="filter-count">(' + item.total + ')</span>' : '';
                            price_range_html += '<li><a href="' + item.link + '" data-price="' + item.from + '-' + item.to + '" data-filter="price" data-value="' + item.from + '-' + item.to + '">' + item.text + count_html + '</a></li>'
                        });

                        $('#price-ranges-ls').html(price_range_html);
                    } else {
                        $('#price-ranges-ls').html('');
                    }

                    /* Update Min - Max Price */
                    if (filters['custom-price-range']) {
                        var customPriceRange = filters['custom-price-range'];

                        minPrice = __minPrice = customPriceRange['min-price'];
                        maxPrice = __maxPrice = customPriceRange['max-price'];

                        $('#min-price').val(ssg.moneyFormat(__minPrice)).data('value', __minPrice);
                        $('#max-price').val(ssg.moneyFormat(__maxPrice)).data('value', __maxPrice);

                        var slider = $("#price-slider");
                        slider.slider('setAttribute', 'min', __minPrice);
                        slider.slider('setAttribute', 'max', __maxPrice);
                        slider.slider('setValue', [__minPrice, __maxPrice]);
                    }

                    /* Category */
                    var categories = filters['categories'];

                    if (categories !== null && typeof categories === 'object' && Object.keys(categories).length > 0) {
                        var categories_html = "";
                        Object.keys(categories).forEach(function (key) {
                            var item = categories[key];
                            var count_html = (item.hasOwnProperty('total') && item.total !== null) ? ' <span class="filter-count">(' + item.total + ')</span>' : '';
                            categories_html += '<li' + (item.hasOwnProperty('pick') && item.pick === "true" ? ' class="selected"' : '') + '><a href="' + item.link + '" ' + (isSearchPage ? 'data-filter="t" data-value="' + item.id + '"' : '') + '>' + item.name + count_html + '</a></li>';
                        });

                        $('#categories').html(categories_html);
                    }

                    /* Brand */
                    var brands = filters['brands'];
                    if (brands !== null && typeof brands === 'object' && Object.keys(brands).length > 0) {
                        var brand_html = "";
                        Object.keys(brands).forEach(function (key) {
                            var item = brands[key];
                            var count_html = (item.hasOwnProperty('total') && item.total !== null) ? ' <span class="filter-count">(' + item.total + ')</span>' : '';
                            brand_html += '<li' + (item.hasOwnProperty('pick') && item.pick === "true" ? ' class="selected"' : '') + '><a href="' + item.link + '" data-pick="' + item.pick + '" data-filter="b" data-value="' + item.id + '">' + item.name + count_html + '</a></li>'
                        });

                        $('#brands').html(brand_html);
                    }

                    /* Author */
                    var authors = filters['authors'];
                    if (authors !== null && typeof authors === 'object' && Object.keys(authors).length > 0) {
                        var author_html = "";
                        Object.keys(authors).forEach(function (key) {
                            var item = authors[key];
                            var count_html = (item.hasOwnProperty('total') && item.total !== null) ? ' <span class="filter-count">(' + item.total + ')</span>' : '';
                            author_html += '<li' + (item.hasOwnProperty('pick') && item.pick === "true" ? ' class="selected"' : '') + '><a href="' + item.link + '" data-pick="' + item.pick + '" data-filter="b" data-value="' + item.id + '">' + item.name + count_html + '</a></li>'
                        });

                        $('#authors').html(author_html);

                        if($('#author-section').hasClass('hide')){
                            $('#author-section').removeClass('hide');
                        }
                    }else{
                        $('#author-section').addClass('hide');
                    }
                }

                var container = [];
                if (data.hasOwnProperty('pick-filters') && data['pick-filters'].length > 0) {
                    var pickFilters = data['pick-filters'];
                    pickFilters.forEach(function (item) {
                        var li = $('<li></li>', {class: 'filter-item'});
                        var a = $('<a></a>', {
                            'class': 'icon-remove icon'
                        });
                        if (item['filter'] === 'b' && (page_id !== 'search' && page_id !== 'tag')) {
                            a.attr('href', item['remove_link']);
                        } else {
                            a.attr({
                                'href': "#",
                                'data-slt-filter': item['filter'],
                                'data-value': item['value']
                            });
                        }

                        li.append(a);
                        li.append(item['text']);
                        container.push(li);
                    });
                }

                if (params.type === 2)
                    $('#pick-filter-container').html(container);

                if ($('#pick-filter-container li').length > 0) {
                    if ($('.selected-filter.hidden').length > 0)
                        $('.selected-filter.hidden').removeClass('hidden');
                } else
                    $('.selected-filter').addClass('hidden');

                $('.productlist-products-container').html(data.content);

                if ($.isFunction(callback))
                    callback(data);

                // Resize scrollbar
                $(".scroll-container").getNiceScroll().resize();

                $(document).scrollTop(0);
            }
        });
    }
};

$(function (e) {
    $('#page-overlay[data-target="dialog"]').on('click', function (ev) {
        ssg.closeDialog('.ssg-dialog:not(:hidden)');
    });

    $('.overlay-dialog .close-btn').on('click', function (e) {
        e.preventDefault();
        $(this).parent('.dialog-header').parent('.overlay-dialog').removeClass('dialog-open');
        $('body').removeClass('modal-open');
        $('html.dialog-overflow-hidden').removeClass('dialog-overflow-hidden');
        $('.container-fluid').removeClass('hide');
        ssg.canvasOverlay(false);
    });


    $('.input-clr').on('keyup', function (e) {
        if ($(this).val().length > 0) {
            if ($(this).next('div.input-clr-btn').length == 0) {

                const _input = $(e.target);
                const clrBtn = $('<div></div>', {'class': 'input-clr-btn'});
                clrBtn.on('click', function (e) {
                    _input.val('');
                    $(this).remove();
                });
                $(this).after(clrBtn);
            }
        } else {
            $(this).next('div.input-clr-btn').remove();
        }
    });

    if ($.fn.owlCarousel) {
        $('.share-carousel').owlCarousel({
            autoplay: false,
            smartSpeed: 1000,
            items: 1,
            nav: true,
            navText: ["<i class='ssg-icon icon-arrow-left'></i>", "<i class='ssg-icon icon-arrow-right'></i>"],
            loop: true,
            dots: false,
            lazyLoad: true
        });
    }
});