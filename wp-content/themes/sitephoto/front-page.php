<?php get_header(); ?>

<?php get_template_part('template-parts/banner'); ?>

<?php get_template_part('template-parts/sectionfilter'); ?>

<section id="gallerie">
    <?php get_template_part('template-parts/gallerie_photos'); ?>
</section>
<section id="bouton_charger_plus">
    <button class="btn__wrapper">
        <a class="btn" id="load-more">Charger plus</a>
    </button>
</section>
<?php get_footer(); ?>