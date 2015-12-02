
<div id="right">
    <div id="blog-blocker" style="display: none;">

    </div>
    <div id="blog-loading-gif" class="center-text">
        <img id="loading-gif" src="res/img/load.gif" class="center">
    </div>
    <a id="link-back" href="javascript:void 0;" onclick="Utils.loadPage('blog-page-1')">...Back to main blog</a>
</div>

<script type="text/javascript">
    var hash = window.location.hash;
    var blogId = parseInt(hash.split('-')[2]);

    if(typeof page != "undefined"){
        $('#link-back').attr('onclick', "Utils.loadPage('blog-page-'+page)").html("...Back to blog list.");
    }

    $('#blog-blocker').load('controller/getPost.php?id='+blogId, function(){
        $('#blog-loading-gif').fadeOut(500, function(){
            $('#blog-loading-gif').remove();
            $('#blog-blocker').fadeIn();
        });
    });

    
</script>