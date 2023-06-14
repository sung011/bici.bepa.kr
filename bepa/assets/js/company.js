$(function () {
    //category.init();
    view.init();
});

var view = {

    ajaxDataTransfer: null,
    init: function () {
        this.ajaxDataTransfer = new AjaxDataTransfer();
        /*this.goPage(1);*/
        this.setChangeSort();
    },
    goPage: function (page) {
        $('#page').val(page);
        this.getCompany();
    },
    getCompany: function () {
        $('#loading').show();
        console.log("dwd : "+$('#search_form').seriali67e());
        var params = {
            method: 'GET',
            url: 'http://nabis.bizq.kr/Api_S/get_company_list_ajax',//http://nabis.bizq.kr/Api_S/get_company_list_ajax
            //data: $('#search_form').serialize(),
            success: function (result) {
                console.log(result);
                $('#company').empty();
                $('#pagination').empty();
                var total = Number(result['pagination']['all_post']);
                var totalBookmark = Number(result['total_bookmark']);
                var limit_start = Number(result['pagination']['limit_start']);


                $('#total').text(numberFormat(total));
                $('#total_bookmark').text(numberFormat(totalBookmark));
                var companies = [];
                $(result['companies']).each(function (index, item) {
                    item['num'] = (total - limit_start) - index;
                    item['sales'] = numberFormat(Number(item['sales']));
                    item['employee'] = numberFormat(Number(item['employee']));
                    item['is_bookmark'] = Number(item['is_bookmark']);
                    companies.push(item);
                });

                $('#company-tmpl').tmpl(companies).appendTo("#company");
                $('#pagination').append(result['pagination']['page_view']);
                $('#loading').hide();
            }
        };
        this.ajaxDataTransfer.getUrlData(params);
    },
    setChangeSort: function () {
        var $this = this;
        $('#order').on('change', function () {
            $this.goPage(1);
        });
    },
    setFavorite: function (cmp_cd, obj) {
        var data = {
            cmp_cd: cmp_cd,
            csrf_name: $('input[name=csrf_name]').val(),
            type: 'nice'
        };

        $('#loading').show();
        var params = {
            method: 'POST',
            url: '/index.php/company/set_company_favorite_ajax',
            data: $.param(data),
            success: function (result) {
                console.log(result);
                var totalBookmark = Number(result['total_bookmark']);
                $('#total_bookmark').text(numberFormat(totalBookmark));

                if (result['is_bookmark'] == '0') {
                    $(obj).removeClass('text-primary');
                } else {
                    $(obj).addClass('text-primary');
                }
                $('input[name=csrf_name]').val(result['csrf_name']);
                $('#loading').hide();
            }
        };
        this.ajaxDataTransfer.getUrlData(params);

    }
};
/*var category = {
    init: function () {
        this.getCategoryList();
    },
    getCategoryList: function () {

        var url = '/index.php/company/get_search_data_ajax';
        var $this = this;
        $.ajax({
            type: 'GET',
            async: false,
            processData: false,
            url: url,
            dataType: 'json',
            error: function (e) {
                console.log(e);
            },
            success: function (result) {
                var cities = [];
                var guguns = [];
                $(result['cities']).each(function (index, item) {
                    if (item['pidx'] == '0') {
                        cities.push(item);
                    } else {
                        guguns.push(item);
                    }
                });
                $('#category-tmpl').tmpl(cities).appendTo("#sido");
                $this.setGugun(guguns);

                $('#category-tmpl').tmpl(result['sizes']).appendTo("#size");
                $('#category-tmpl').tmpl(result['shapes']).appendTo("#shape");

                var mainCategories = [];
                var subCategories = [];
                $(result['types']).each(function (index, item) {
                    if (item['pidx'] == '0') {
                        mainCategories.push(item);
                    } else {
                        subCategories.push(item);
                    }
                });
                $('#category-tmpl').tmpl(mainCategories).appendTo("#main_category");
                $this.setCategory(subCategories);
            }
        });
    },
    setGugun: function (guguns) {
        $('#sido').on('click', function (e) {
            e.preventDefault();
            $('#gugun').empty();
            var pidx = $(this).find('option:selected').attr('rel');
            var gugun = [];
            $(guguns).each(function (index, item) {
                if (pidx == item['pidx']) {
                    gugun.push(item);
                }
            });
            $('#gugun').append('<option value="">구군</option>');
            $('#category-tmpl').tmpl(gugun).appendTo("#gugun");
        });
    },
    setCategory: function (subCategories) {
        $('#main_category').on('click', function (e) {
            e.preventDefault();
            $('#sub_category').empty();
            var pidx = $(this).find('option:selected').attr('rel');
            var subCategory = [];
            $(subCategories).each(function (index, item) {
                if (pidx == item['pidx']) {
                    subCategory.push(item);
                }
            });
            $('#sub_category').append('<option value="">세부분류</option>');
            $('#category-tmpl').tmpl(subCategory).appendTo("#sub_category");
        });
    }
};*/

function goPage(page) {
    view.goPage(page);
}

function onBookmark(cmp_cd, obj) {
    view.setFavorite(cmp_cd, obj);
}
