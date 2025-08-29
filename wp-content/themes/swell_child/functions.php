<?php

/* 子テーマのfunctions.phpは、親テーマのfunctions.phpより先に読み込まれることに注意してください。 */


/**
 * 親テーマのfunctions.phpのあとで読み込みたいコードはこの中に。
 */
// add_filter('after_setup_theme', function(){
// }, 11);

function action_init() {
	$news_args = array(
		'label'  => 'お知らせ',
		'public' => true,
		'show_in_rest' => true,
		'menu_position' => 5,
		'has_archive' =>  true,
		'supports' => ['title', 'editor', 'author', 'thumbnail'],
		'rewrite' => ['with_front' => false]
	);
	register_post_type('news', $news_args);

	$interview_args = array(
		'label'  => '事例紹介',
		'public' => true,
		'show_in_rest' => true,
		'menu_position' => 5,
		'has_archive' =>  true,
		'menu_icon' => 'dashicons-microphone',
		'supports' => ['title', 'editor', 'author', 'thumbnail'],
		'rewrite' => ['with_front' => false]
	);
	register_post_type('interview', $interview_args);

	$download_args = array(
		'label'  => 'お役立ち資料',
		'public' => true,
		'show_in_rest' => true,
		'menu_position' => 5,
		'has_archive' =>  true,
		'menu_icon' => 'dashicons-download',
		'supports' => ['title', 'editor', 'author', 'thumbnail'],
		'rewrite' => ['with_front' => false]
	);
	register_post_type('download', $download_args);
}
add_action( 'init', 'action_init' );

/**
 * 資料ダウンロードURLを返す関数
 */
function get_useful_materials_download_url($id = null) {
	$post_id = $id ?: $_GET['id'];

	if ($post_id) {
		return get_field('download_file_url', $post_id);
	} else {
		return '';
	}
}

/**
 * フォームIDを返す関数
 */
function get_mwform_id($slug) {
	$mwform_id = null;
	$args = [
		'post_type' => 'mw-wp-form',
		'posts_per_page' => 1,
		'name' => $slug,
	];
	$the_query = new WP_Query($args);

	while ($the_query->have_posts()) : $the_query->the_post();
		$mwform_id = get_the_ID();
	endwhile;

	return $mwform_id ?: '';
}

/**
 * mwform hooks
 */
$mwform_download_id = get_mwform_id('download');
/**
 * @param string $url 画面遷移先の URL
 * @param MW_WP_Form_Data $Data
 * @return string 画面遷移先の URL
 */
function action_mwform_redirect_url($url, $Data) {
	if (empty($_GET['id'])) {
		return add_query_arg( 'id', get_the_ID(), $url );
	}
	return $url;
}
add_action('mwform_redirect_url_mw-wp-form-'.$mwform_download_id, 'action_mwform_redirect_url', 10, 2);

/**
 * @param MW_WP_Form_Data $Data
 */
function action_mwform_after_send($Data) {
	global $mwform_download_id;
	if ($Data->get_form_key() === 'mw-wp-form-'.$mwform_download_id) {
		wp_redirect(home_url('download/thanks1/?'.$_SERVER["QUERY_STRING"]));
		exit;
	}
}
add_action('mwform_after_send_mw-wp-form-'.$mwform_download_id, 'action_mwform_after_send');

/**
 * @param object $Mail_raw
 * @param array $values
 * @param MW_WP_Form_Data $Data
 */
function filter_mwform_auto_mail_raw($Mail_raw, $values, $Data) {
	$post_id = $_GET['id'];

	if ($post_id) {
		$Mail_raw->body = str_replace('[file_url]', get_useful_materials_download_url($post_id), $Mail_raw->body);
	}

	return $Mail_raw;
}
add_filter('mwform_auto_mail_raw_mw-wp-form-'.$mwform_download_id, 'filter_mwform_auto_mail_raw', 10, 3);

/**
 * @param  String  $value  valueの初期値
 * @param  String  $name  name属性値
 */
function filter_mwform_value($value, $name) {
	if ($name === 'download_title') {
		return get_the_title();
	}
	return $value;
}
add_filter('mwform_value_mw-wp-form-'.$mwform_download_id, 'filter_mwform_value', 10, 2);

/**
 * 子テーマでのファイルの読み込み
 */
add_action('wp_enqueue_scripts', function() {
	$timestamp = date('Ymdgis', filemtime(get_stylesheet_directory() . '/style.css'));
	wp_enqueue_style('child_style', get_stylesheet_directory_uri() .'/style.css', [], $timestamp);

	/* その他の読み込みファイルはこの下に記述 */
}, 11);
