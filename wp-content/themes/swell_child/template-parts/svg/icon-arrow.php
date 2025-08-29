<?php
$args = wp_parse_args(
  $args,
  [
    'type' => 'right',
    'size' => '',
  ]
);

$w = 29;
$h = 7;
if ($args['size'] === 'small') {
  $w = 19;
  $h = 4;
}
?>

<svg width="<?php echo $w ?>" height="<?php echo $h ?>" viewBox="0 0 29 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<?php if ($args['type'] === 'right') : ?>
  <path d="M0 6.10417H28.2951L17.3782 1" stroke="white"/>
<?php elseif ($args['type'] === 'left') : ?>
  <path d="M29.2951 6.10417H1.00001L11.9169 1" stroke="white"/>
<?php endif ?>
</svg>
