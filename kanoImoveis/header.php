<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> || <?php wp_title( '|', true, 'right' ); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <meta name="robots" content="follow,all" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png" type="image/png"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 