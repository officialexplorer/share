<?php
/**
Template Name:問い合わせ
***/
?>

<?php get_header();?>
<body>
<header>
    
   <img src="<?php echo get_template_directory_uri(); ?>/image/image1.png" class="pic">
    

<?php if( !(is_home() || is_front_page() || is_singular('lp') ) ){ ?>
  <div class="breadcrumb-area">
    <div class="wrap">
      <?php bzb_breadcrumb(); ?>
    </div>
  </div>
<?php } ?>

</header>

<!-- お問い合わせフォーム -->
<section id="contact">
    <!-- フォームタグ -->
        <form
            action="https://formspree.io/f/mjvnvlkd"
            method="POST" id="form">
    
        <input type="text" name="honeypot" style="display:none">
        <!-- STATIC FORMSのアクセスキー -->
        <input type="hidden" name="accessKey" value="">
        <!--メールのタイトル-->
        <input type="hidden" name="subject" value="お問い合わせフォーム">
        <!--送信先のメールアドレスをvalueに設定する-->
        <input type="hidden" name="replyTo" value="jinpo.ayumi@gmail.com">
        <!--redirectToのURLは公開後ののURLへリンクする-->
        <input type="hidden" name="redirectTo" value="">
       
        <table id="company-table">
        <div class="flexbox3">
          <div class="contact-heading">
            <label class="contact-label">お名前　　　　<span class="contact-span">必須</span></label>
          </div>
          <div class="contact-form">
              <input id="name2" type="text" name="name" placeholder="入力してください" class="contact-textbox">
          </div>
        </div>
        </div>
        <div class="flexbox3">
            <div class="contact-heading">
                <label class="contact-label">メールアドレス<span class="contact-span">必須</span></label>
            </div>
            <div>
                <input id="email" type="text" name="email" placeholder="入力してください" class="contact-textbox">
            </div>
        </div>
        <div class="flexbox3">
            <div class="contact-heading">
                <label class="contact-label">電話番号　　　<span class="contact-span">必須</span></label>
            </div>
            <div>
                <input id="tel" type="text" name="tel" placeholder="入力してください" class="contact-textbox">
            </div>
        </div>
        <div class="flexbox3">
            <div class="contact-heading">
                <label class="contact-label">お問い合わせ内容<span class="contact-span">必須</span></label>
            </div>
            <div>
                <textarea id="message" class="contact-textarea " placeholder="入力してください" name="message"></textarea>
            </div>
        </div>

        <button type="submit" id="submit">送信する</button>

    </form>
</section>
<p id="noti">内容によってはお返事をすることが難しい場合もございますのでご容赦ください。</p>

</main>

</body>
<?php get_footer();?>