<?php get_header(); ?>

<?php echo do_shortcode('[metaslider id="84"]');?>

<?php if( !(is_home() || is_front_page() || is_singular('lp') ) ){ ?>
  
  <div class="breadcrumb-area">
    <div class="wrap">
      <?php bzb_breadcrumb(); ?>
    </div>
  </div>
    
<?php } ?>



<div  class="flexbox">
  <img src="<?php echo get_template_directory_uri(); ?>/image/image5.jpg" id="pic3">
  <div class="back">
    <h1>譲渡会</h1>
    <p>新たな家族の一員を見つけに来ませんか？新たな家族との素敵な出会いを待つ犬たちがあなたを待っています。</p>
    <a href="http://ayumi2.local/kotei-page/" style="color:black; font-size: 1.2rem; background-color:#F9EFDB; border:2px solid #EBD9B4; border-radius:5px; padding:5px; display:inline-block; font-weight: bold;">詳細はこちら</a>
  </div>
</div>

<div class="flexbox">
  <img src="<?php echo get_template_directory_uri(); ?>/image/image4.jpg" id="pic4">
  <div class="back">
    <h1>里親希望のお問い合わせ</h1>
    <p>愛犬の里親になりたい方、お問い合わせお待ちしています。経験豊富なスタッフがサポートします。一緒に幸せを分かち合いましょう。</p>
    <a href="http://ayumi2.local/ask/" style="color:black; font-size: 1.2rem; background-color:#F9EFDB; border:2px solid #EBD9B4; border-radius:5px; padding:5px; display:inline-block; font-weight: bold;">詳細はこちら</a>
  </div>
</div>




<!--今回は人気のある記事の部分は抜いた  -->


<div id="recent_post_content" class="front-loop">

<h2><i class="fa fa-clock-o"></i> 最近仲間になったお友達</h2>
<div class="wrap">
  <div class="front-loop-cont">
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
            'showposts'=>5,
            'order'=>'DESC'
          );

    // 特定の記事だけを抜粋する場合
     $args['category_name'] = 'animal';

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
          <img src="<?php echo get_template_directory_uri(); ?>/lib/images/noimage.jpg" alt="noimage" width="800" height="533" />
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


<!-- 会社概要 -->
<div id="front-company" class="front-main-cont">
  <?php
    $companies = get_option('company');
    $use_company_map = get_option('use_company_map');
    $company_map = "";
    $company_map_class = '';

    if(isset($use_company_map) && $use_company_map !== ''){
      $company_map = get_option('company_map');
    }else{
      $company_map_class='no-company-map';
    }

  $icon = 'none';
  $titile = '';
  $ruby = '';
  $bzb_company_header_array = get_option('bzb_company_header');
  if(is_array($bzb_company_header_array)){
    extract($bzb_company_header_array) ;
  }

  ?>

  <header class="category_title main_title front-cont-header">
    <div class="cont-icon"><i class="<?php echo $icon;?>"></i></div>
    <h2 class="cont-title"><?php echo $title;?></h2>
    <p class="cont-ruby"><?php echo $ruby;?></p>
    <div class="tri-border"><span></span></div>
  </header>


  <section id="front-contents-1" class="c_box c_box_left <?php echo $company_map_class; ?>">
    <div class="c_img_box">
      <?php echo $company_map;?>
    </div>

    <div class="wrap">
      <div class="c_box_inner">
        <?php
        if(isset($companies) && is_array($companies) && !empty($companies)){
          $i = 1;
          foreach($companies as $key => $company){
            if(isset($company['name']) && isset($company['val'])){
              echo '<dl id="front-company-'.$i.'">';
              echo "<dt><span>" . $company['name'] . "</span></dt><dd><span>" . $company['val'] . "</span></dd>";
              echo "</dl>";
              $i++;
            }
          }
        }
        ?>
      </div>
    </div>
  </section>
</div><!-- front-company -->

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script src="slick.min.js"></script>
<script src="script.js"></script>


<?php wp_reset_query(); ?>
<?php get_footer(); ?>
