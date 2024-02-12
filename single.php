<?php 

/**
 * The template for displaying all single posts
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
					<article class="post">
						<div class="post__content"><?php the_content(); ?></div>
					</article>
			<?php endwhile;
			endif; ?>
		</main>
		<aside class="sidebar">
			<?php get_template_part('sidebar'); ?>
		</aside>
	</div>
</section>


<?php get_footer(); ?>