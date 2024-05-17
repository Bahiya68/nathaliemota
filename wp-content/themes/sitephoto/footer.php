<footer id="menu-footer">
    <nav>
        <?php get_template_part('/template-parts/modale'); ?>
        <?php
        // Fonction pour le menu footer
        wp_nav_menu(
            array(
                'theme_location' => 'footermenu',
                'container'      => 'false',
                'menu_class'     => 'footerMenu',
            )
        );
        ?>
    </nav>
    <?php get_template_part('/template-parts/lightbox'); ?>
</footer>
</div>
<?php wp_footer(); ?>

</body>

</html>