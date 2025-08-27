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
	register_post_type( 'news', $news_args );

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
	register_post_type( 'interview', $interview_args );

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
	register_post_type( 'download', $download_args );
}
add_action( 'init', 'action_init' );

/**
 * 子テーマでのファイルの読み込み
 */
add_action('wp_enqueue_scripts', function() {
	$timestamp = date( 'Ymdgis', filemtime( get_stylesheet_directory() . '/style.css' ) );
	wp_enqueue_style( 'child_style', get_stylesheet_directory_uri() .'/style.css', [], $timestamp );

	/* その他の読み込みファイルはこの下に記述 */

}, 11);
