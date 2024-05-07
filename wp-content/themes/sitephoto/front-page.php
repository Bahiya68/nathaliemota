<?php get_header();
global $wp_query; ?>

<?php get_template_part('template-parts/banner'); ?>
<section id="filtres">
    <?php get_template_part('template-parts/sectionfilter'); ?>
</section>
<section id="gallerie">
    <?php get_template_part('template-parts/gallerie_photos'); ?>
</section>

<section id="bouton_charger_plus">
    <button class="btn__wrapper" id="load-more" data-offset="1" data-ajaxurl="<?php echo admin_url('/'); ?>">
        <a class="btn">Charger plus</a>
    </button>
</section>
<?php get_footer(); ?>