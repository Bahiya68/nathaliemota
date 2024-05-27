<?php get_header();
global $wp_query; ?>

<?php get_template_part('template-parts/banner'); ?>
<section id="filtres">
    <?php get_template_part('template-parts/sectionfilter'); ?>
</section>

<div class="gallery-container">
    <?php
    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'paged'          => 1,
    );
    $ajaxphoto = new WP_Query($args);

    if ($ajaxphoto->have_posts()) :
        while ($ajaxphoto->have_posts()) :
            $ajaxphoto->the_post();

            get_template_part('template-parts/photo'); // chemin relatif au thème

        endwhile;
        wp_reset_postdata();
    else :
        echo 'Aucune photo trouvée.';
    endif;
    ?>
</div>
<section id="no-more-photos" style="display: none;">
    <p>Aucune photo</p>
</section>

<section id="bouton_charger_plus">
    <button class="btn__wrapper" id="load-more" data-offset="1" data-ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>">
        <a class="btn">Charger plus</a>
    </button>
</section>

<?php get_footer(); ?>