<?php 
    //output the html directly to the target page
    require_once('../blog/wp-blog-header.php');

    $page = $_GET['page'];
    $args = array(
        'posts_per_page' => 10,
        'offset' => ($page-1)*10,
    );

    $recent_posts = get_posts( $args, ARRAY_A );


    foreach($recent_posts as $post) :
        setup_postdata($post);
?>
    <div class="blog-excerpt box-outline" name="<?php the_id() ?>">
        <h2 class="subtitle center-text"><a><?php the_title() ?></a></h2>
        <p>
            <?php the_excerpt() ?>
        </p>
    </div>

<?php    
    endforeach;
    wp_reset_postdata();    
?>