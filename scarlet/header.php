<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">



	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    
    <script type='text/javascript' src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
    
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

    <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.validate.js'></script>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
<!-- fontawesome -->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="icon" type="image/x-icon" href="http://data.nekohand.moe/favicon.gif">

<!-- Core js -->

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/core27.js"></script>	
	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/core2s.js"></script>	


<!--Bootstrap core-->
    
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 
   
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap-theme.css" type="text/css" />
    
   
<!-- user css -->
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
   
   <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.lazyload.min.js'></script>
   <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/modernizr.js'></script>
   <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/respond.min.js'></script>
   <script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/shine.min.js'></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    
  <style>
  </style>
  <!--
  <script>
jQuery(document).ready(function($){
var snow=function(options){var $flake=$('<div id="flake" />').css({'position':'absolute','top':'-50px'}).html('&#10052;'),documentHeight=$(document).height(),documentWidth=$(document).width(),defaults={minSize:10,maxSize:20,newOn:500,flakeColor:"#FFFFFF"},options=$.extend({},defaults,options);var interval=setInterval(function(){var startPositionLeft=Math.random()*documentWidth-100,startOpacity=0.5+Math.random(),sizeFlake=options.minSize+Math.random()*options.maxSize,endPositionTop=documentHeight-40,endPositionLeft=startPositionLeft-100+Math.random()*200,durationFall=documentHeight*10+Math.random()*5000;$flake.clone().appendTo('body').css({left:startPositionLeft,opacity:startOpacity,'font-size':sizeFlake,color:options.flakeColor}).animate({top:endPositionTop,left:endPositionLeft,opacity:0.2},durationFall,'linear',function(){$(this).remove()});},options.newOn);};
snow({ minSize: 5, maxSize: 100, newOn: 1000, flakeColor: 'gold' });});
</script>-->
<!-- jwplayer -->
<script type="text/javascript">jwplayer.defaults = { "ph": 2 };</script>
            <script type="text/javascript">
            if (typeof(jwp6AddLoadEvent) == 'undefined') {
                function jwp6AddLoadEvent(func) {
                    var oldonload = window.onload;
                    if (typeof window.onload != 'function') {
                        window.onload = func;
                    } else {
                        window.onload = function() {
                            if (oldonload) {
                                oldonload();
                            }
                            func();
                        }
                    }
                }
            }
            </script>

<?php wp_head(); ?>
	
</head>









<body style="overflow-x:hidden;">
<!--导航栏-->

<?php include('shortcodes.php'); ?>
<?php include('gotop.php'); ?>
<?php include('headinfo.php'); ?>
<?php 
//include('panel.php');
include('navbar.php'); ?>



