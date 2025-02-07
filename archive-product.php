<?php get_header(); ?>

<div class="termek-lista">
    <h1><?php post_type_archive_title(); ?></h1>
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="projekt-tartalom">
                <?php the_excerpt(); ?>
            </div>
        </article>
    <?php endwhile; else : ?>
        <p><?php _e('Nincsenek projektek.'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>