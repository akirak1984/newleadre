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
      <?php the_content(); ?>
      <h2 class="p-sent__title" data-sal="slide-up">送信が完了しました</h2>
      <p class="p-sent__text" data-sal="slide-up">弊社の資料に興味を持って頂きありがとうございます<br>資料は下記のボタン、<br class="u-sp">またはメールよりダウンロードください</p>
      <div class="p-sent__download" data-sal="slide-up">
        <button class="c-button -primary -large js-download-button"><i class="fa-solid fa-arrow-right-to-bracket"></i>資料をダウンロード<span class="c-button__icon -absolute -right"><?php get_template_part('template-parts/svg/icon-arrow'); ?></span></button>
      </div>
      <div class="p-sent__back" data-sal="slide-up">
        <a href="<?php echo home_url() ?>">トップに戻る</a>
      </div>
      <?php get_template_part('template-parts/block-sent-menu'); ?>
    </div>
  </main>
</div>

<script type="text/javascript">
  var downloadButtonEl = document.querySelector('.js-download-button');

  if (downloadButtonEl) {
    downloadButtonEl.addEventListener('click', () => {
      var link = document.createElement('a');
      link.download = "";
      link.href = "<?php echo get_useful_materials_download_url() ?>";
      link.click();

      setTimeout(() => {
        location.href = "<?php echo home_url('download/thanks2') ?>";
      }, 1000);
    });
  }
</script>
<?php get_footer(); ?>
