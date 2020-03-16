<!doctype html>
<html <?php language_attributes(); ?>  moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>


</head>
<body id="<?php echo $id; ?>" <?php body_class(); ?>>

<?php
// we shouldn't even be looking at this if ACF is not enabled
if( function_exists('acf_get_fields'))
{
  $fields = get_fields( $ID );

}

?>

<?php if($fields['preloader']): ?>
    <div class="preloader">
        <div class="svg-inner"></div>
    </div>
<?php endif; ?>


<?php if($fields['show_theme_switcher']): ?>
    <div class="swatch-wrapper">
        <a id="light-theme" class="swatch-light"></a>
        <a id="dark-theme" class="swatch-dark"></a>
        <a id="dark-theme" class="swatch-dark"></a>
        <a id="dark-theme" class="swatch-dark"></a>
        <a id="dark-theme" class="swatch-dark"></a>
    </div>
<?php endif; ?>

<?php
