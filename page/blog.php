<div id="right">

    <h1 id="title-phrase" class="title center-text"></h1>

    <div id="blog-loading-gif" class="center-text">
        <img id="loading-gif" src="res/img/load.gif" class="center">
    </div>
    <div id="blog-post-wrap" style="display: none;">
        <div id="blog-posts">
                
            
        </div>
        <h1 id="no-posts-warning" class="title text-center" style="display: none;">Sorry, There's no more blogs to show!  Go on Twitter and yell at Cudabear to write some more.</h1>
        <a id="next-page-link" href="javascript:void 0;" onclick="" class="float-right" style="display: none;">Let's progress forward, to the next page...</a>
        <a id="previous-page-link" href="javascript:void 0;" onclick="" class="float-left" style="display: none;">...I'm scared, let's go back a page</a>
    </div>
</div>
<script type="text/javascript">
    var hash = window.location.hash;
    var hashSplit = hash.split('-');
    var page = 1;
    if(hashSplit.length > 2){
        page = parseInt(hash.split('-')[2]);
    }

    var pageComments = [
        "Messing with the url hash, are we??",
        "Latest posts on Cuda's Blog",
        "Slightly expired posts on Cuda's Blog",
        "Cobweb-covered posts on Cuda's Blog",
        "Historically distinct posts on Cuda's Blog",
        "Carbon-dated posts on Cuda's Blog"
    ];

    var titlePhrase = pageComments[pageComments.length-1];
    if(page < pageComments.length){
        titlePhrase = pageComments[page];
    }
    $('#title-phrase').html(titlePhrase);

    $("#next-page-link").attr('onclick', 'Utils.loadPage("blog-page-'+(page+1)+'")');
    $("#previous-page-link").attr('onclick', 'Utils.loadPage("blog-page-'+(page-1)+'")');

    $('#blog-posts').load("controller/getPosts.php?page="+page, function(){
        $('#blog-loading-gif').fadeOut(500, function(){
            $('#blog-loading-gif').remove();
            $('#blog-post-wrap').fadeIn();
        });

        $('.blog-excerpt').each(function(excerpt){
            var id = $(this).attr('name');

            $(this).find('a').attr('href', 'javascript:void 0;').attr('onclick', 'Utils.loadPage("blog-id-'+id+'")');
        }, this);

        if($('.blog-excerpt').length == 0){
            $('#no-posts-warning').css("display", "block");
            $('#previous-page-link').html("...I'm scared, let's go back to the first page").attr('onclick', 'Utils.loadPage("blog-page-1")');
        }

        //lazy detection of if there's another page.  If it's the last page and we have exactly 10 blogs on the page,
        //the user will get a 404 on the next page.  That's bound to be pretty rare, though.  Acceptable bug for now.
        if($('.blog-excerpt').length == 10){
            $('#next-page-link').css("display", "block");
        }

        if(page != 1){
            $('#previous-page-link').css("display", "block");
        }
    });
</script>
