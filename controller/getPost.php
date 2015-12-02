<?php
    require_once('../blog/wp-blog-header.php');

    $blogId = $_GET['id'];


    $post_ret = get_post($blogId);
    $post_array = array($post_ret);

    foreach($post_array as $post) :
        setup_postdata($post);
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
?>
    <div class="blog-content" name="<?php the_id() ?>">
        <h1 class="title center-text"><?php the_title() ?></h1>
        <h3 class="subtitle center-text"><?php the_date(); ?> || <?php the_time(); ?></h3>
        <p>
            <?php echo $content ?>
        </p>
    </div>

    <hr class="divider">

<?php    
    endforeach;
    wp_reset_postdata();    
?>
