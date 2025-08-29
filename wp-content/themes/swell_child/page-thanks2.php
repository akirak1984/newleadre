<?php get_header(); ?>
<div class="l-container">
  <header class="p-title">
    <h1 class="c-heading-v1" data-sal="slide-up">
      <p class="c-heading-v1__en">Useful materials</p>
      <p class="c-heading-v1__ja">お役立ち資料</p>
    </h1>
  </header>
  <main>
    <div class="p-sent">
      <p class="p-sent__text" data-sal="slide-up">資料をダウンロード頂きありがとうございます。</p>
      <div class="p-sent__buttons" data-sal="slide-up">
        <a href="<?php echo home_url(); ?>" class="c-button -primary -large">トップに戻る<span class="c-button__icon -absolute -right"><?php get_template_part('template-parts/svg/icon-arrow'); ?></span></a>
      </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>
