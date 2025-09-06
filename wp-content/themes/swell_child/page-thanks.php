<?php get_header(); ?>
  <div class="l-container">
    <main>
      <div class="p-sent">
        <h2 class="p-sent__title" data-sal="slide-up">お問い合わせありがとうございます</h2>
        <p class="p-sent__text" data-sal="slide-up">お問い合わせ頂いた内容を確認した上、担当者よりご連絡いたします</p>
        <div class="container text-center my-5">
          <div class="p-sent__buttons" data-sal="slide-up">
            <a href="<?php echo home_url(); ?>" class="c-button -primary -large">
              <button class="btn btn-primary rounded-pill">
                トップに戻る<span class="c-button__icon -absolute -right"><?php get_template_part('template-parts/svg/icon-arrow'); ?></span>
              </button>
            </a>
          </div>
        </div>
        <?php get_template_part('template-parts/block-sent-menu'); ?>
      </div>
    </main>
  </div>
<?php get_footer(); ?>
