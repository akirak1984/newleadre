<?php get_header(); ?>
  <div class="l-container">
    <header class="p-title">
      <h1 class="c-heading-v1" data-sal="slide-up">
        <p class="c-heading-v1__en">Contact</p>
        <p class="c-heading-v1__ja">お問い合せ</p>
      </h1>
    </header>
    <main>
      <?php the_content(); ?>
      <div class="p-sent">
        <h2 class="p-sent__title" data-sal="slide-up">お問い合わせありがとうございます</h2>
        <p class="p-sent__text" data-sal="slide-up">お問い合わせ頂いた内容を確認した上、担当者よりご連絡いたします</p>
        <div class="p-sent__buttons" data-sal="slide-up">
          <a href="<?php echo home_url(); ?>" class="c-button -primary -large">トップに戻る<span class="c-button__icon -absolute -right"><?php get_template_part('template-parts/svg/icon-arrow'); ?></span></a>
        </div>
        <?php get_template_part('template-parts/block-sent-menu'); ?>
      </div>
    </main>
  </div>
<?php get_footer(); ?>
