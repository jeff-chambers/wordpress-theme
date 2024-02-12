<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Jeff Chambers
 * @since Jeff Chambers 1.0
 */

get_header(); ?>

<section class="main">
	<div class="container main__container">
		<main class="main__content">
			<h1 class="main__title"><?php the_title(); ?></h1>
			<?php wp_reset_query();
			if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
			<?php endwhile;
			endif; ?>
		</main>
		<aside class="sidebar">
			<?php get_template_part('sidebar'); ?> 
		</aside>
	</div>
</section>

<?php get_footer(); ?>