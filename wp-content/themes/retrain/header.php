<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package retrain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180133805-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180133805-1');
</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script> (function(ss,ex){ window.ldfdr=window.ldfdr||function(){(ldfdr._q=ldfdr._q||[]).push([].slice.call(arguments));}; (function(d,s){ fs=d.getElementsByTagName(s)[0]; function ce(src){ var cs=d.createElement(s); cs.src=src; cs.async=1; fs.parentNode.insertBefore(cs,fs); }; ce('https://sc.lfeeder.com/lftracker_v1_'+ss+(ex?'_'+ex:'')+'.js'); })(document,'script'); })('3P1w24do2Xk7mY5n'); </script>
	<script async src="https://js.convertflow.co/production/websites/38611.js"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'retrain' ); ?></a>
	
	<!-- Loader -->
	<!-- <div class="retrian-loader">
		<div class="loader-main">
			<div class="loader-inner">
				<img src="/wp-content/uploads/2022/03/loader-1.png">
			</div>
		</div>
	</div> -->
	<!-- Loader -->

	<!-- Header -->
		<header class="header-retrain">
			<div class="container">
				<nav class="navbar navbar-expand-lg d-flex justify-content-between p-0"><?php   
					$h_logo = get_field('h_logo', 'option');
			  		$logo_dark = get_field('logo_dark', 'option');
			  		if($h_logo)
			  		{ ?>
					  	<a class="navbar-brand mr-0 p-0 logo-light" href="<?php echo site_url(); ?>">
					  		<img src="<?php echo $h_logo; ?>" class="img-fluid">
					  	</a><?php
					} 
					if($logo_dark)
					{ ?>
					  	<a class="navbar-brand mr-0 p-0 dark-logo" href="<?php echo site_url(); ?>">
					  		<img src="<?php echo $logo_dark; ?>" class="img-fluid">
					  	</a><?php
					} ?>
				  	
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					    <span class="navbar-toggler-icon"></span>
					    <span class="navbar-toggler-icon"></span>
					    <span class="navbar-toggler-icon"></span>
					</button>
				  	<div class="collapse navbar-collapse" id="collapsibleNavbar">
					    <?php
						 wp_nav_menu( array(
			              	'menu' => 'Main Menu',
			              	'theme_location' => 'primary',
			              	'menu_class'  => 'navbar-nav align-items-center ml-auto',
			              	'container' => 'ul',
			              	'before'         => '',
							'after'          => '',
							'depth'          => 3,
							'link_before'    => '',
							'link_after'     => '',
			            
			            ) );  ?>
				  	</div>  
				</nav>
			</div>
		</header>	
		<!-- Header End -->