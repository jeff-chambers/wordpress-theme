<?php 

/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Jeff Chambers
 * @since Jeff Chambers 1.0
 */

get_header(); ?>

<section class="main">
	<div class="container main__container">
		<main class="main__content">
			<h1 class="main__title"><?php the_archive_title(); ?></h1>
			<?php wp_reset_query();
			if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="post">
						<h2 class="post__title"><?php the_title(); ?></h2>
						<div class="post__excerpt"><?php the_excerpt(); ?></div>
						<a href="<?= get_permalink(); ?>" class="post__more">Read more</a>
					</article>

			<?php endwhile; ?>
				<?php the_posts_pagination(); ?>
			<?php endif; ?>
		</main>
		<aside class="sidebar">
			<?php get_template_part('sidebar'); ?>
		</aside>
	</div>
</section>


<?php get_footer(); ?>