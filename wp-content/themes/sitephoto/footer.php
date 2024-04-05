<footer>
    <nav>
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
</footer>
<?php wp_footer(); ?>

</body>

</html>