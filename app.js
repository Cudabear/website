$(document).ready(function(){
    $('#header-logo').on('click', function(e){
        Utils.loadPage('home');
    });

    $(document).on('scroll', Utils.toggleHeader);
    $(window).on('resize', Utils.toggleHeader);
    Utils.toggleHeader();

    $('.header-button').click(function(){
        $('.header-button').removeClass("header-button-down");
        $(this).addClass("header-button-down");

        Utils.loadPage($(this).html());
    });

    $(window).on('hashchange', Utils.hashChange);

    if(window.location.hash === ""){
        Utils.loadPage('home');
    }else{
        Utils.hashChange();
    }
});

Utils = {};
Utils.toggleRight = function(e){
    var left = $('#left');
    var header = $('#header');
    var body = $('body');

    //left.height($('window'))
    if(left.css('left') == "0px"){
        left.animate({left: -200}, 500);
    }else if(left.css('left') == "-200px"){
        left.animate({left: 0}, 500);
        body.css({'overflow-y': hidden});
    }
}

Utils.toggleHeader = function(e){
    var header = $('#header');
    var body = $('body');
    var navigation = $('#navigation');
    var content = $('#content');
    var expandedHeight = parseInt(header.css('max-height').replace('px', ''));
    var maxNavigationHeight = navigation.height();
    var minimizedHeight = 0;
    var time = 500;
    var scrollTop = body.scrollTop();
    var scrollGoal = (scrollTop > expandedHeight - minimizedHeight ? minimizedHeight : expandedHeight - scrollTop);


    //navigation.height(scrollGoal == expandedHeight ? maxNavigationHeight : 0);
    navigation.css({'top': scrollGoal});
    //+25 for padding on actual content
    content.css({'padding-top': expandedHeight + maxNavigationHeight});
    header.height(scrollGoal);
}

Utils.loadPage = function(page){
    if(page === ""){
        page = "home";
    }

    window.location.hash = page.toLowerCase();
}

Utils.hashChange = function(event){
    var page = window.location.hash.replace('#', '');
    var pageToLoad = "page/"+page+".php";

    //putting this here makes sure we know which blog is loaded
    ga('send', 'event', 'Page', 'load', pageToLoad);

    if(page.indexOf("blog-id") >= 0){
        pageToLoad = "page/blogPost.php";
    }else if(page.indexOf("blog-page") >= 0){
        pageToLoad = "page/blog.php";
    }

    $('#content-body').animate({opacity: 0}, 250, function(e){
        $('#loading-gif').animate({opacity: 1}, 125);
        $('#content-body').load(pageToLoad, function(e){
            $('#loading-gif').stop(true);
            $('#loading-gif').animate({opacity: 0}, 125, function(){
                $('#content-body').animate({opacity: 1}, 250);

                if($('#navigation').css('top') === "0px"){
                    $('body').scrollTop(155);
                }
            });;
        });   
    });
}
