<?php
/**
Template Name:テンプレ
***/
?>

<?php get_header();?>
<body>
<header>
    
   <img src="<?php echo get_template_directory_uri(); ?>/image/image2.png" class="pic">
    

<?php if( !(is_home() || is_front_page() || is_singular('lp') ) ){ ?>
  <div class="breadcrumb-area">
    <div class="wrap">
      <?php bzb_breadcrumb(); ?>
    </div>
  </div>
<?php } ?>

</header>

<div id="recent_post_content" class="front-loop">

<h2><i class="fa fa-clock-o"></i> 譲渡会</h2>
<div class="wrap">
  <div class="front-loop-cont2">
<?php
      $i = 1;
      wp_reset_query();

        $args=array(
            'meta_query'=>
            array(
              array(  'key'=>'bzb_show_toppage_flag',
                         'compare' => 'NOT EXISTS'
              ),
              array(  'key'=>'bzb_show_toppage_flag',
                        'value'=>'none',
                        'compare'=>'!='
              ),
             'relation'=>'OR'
          ),
            'showposts'=>10,
            'order'=>'DESC'
          );

    // 特定の記事だけを抜粋する場合
     $args['category_name'] = 'event';

      query_posts($args);

      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

        $cf = get_post_meta($post->ID);
        $recent_class = 'popular_post_box recent-'.$i;
?>

  <article id="post-<?php echo the_ID(); ?>" <?php post_class($recent_class); ?>>
      <a href="<?php the_permalink(); ?>" class="wrap-a"><?php if( get_the_post_thumbnail() ) { ?>
        <div class="post-thumbnail">
        <?php the_post_thumbnail('loop_thumbnail'); ?>
        </div>
        <?php } else{ ?>
          <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="300" height="250" />
        <?php } // get_the_post_thumbnail ?>
           
            <h3><?php the_title(); ?></h3>
            <p class="p_date"><span class="date-y"><?php the_time('Y'); ?></span><span class="date-mj"><?php the_time('m/j'); ?></span></p></a>
  </article>

<?php
        $i++;
        endwhile;
      endif;
?>

</div><!-- /front-root-cont -->

</div><!-- /wrap -->
</div><!-- /recent_post_content -->

</body>

<?php get_footer();?>
