<footer class="footerMenu">
    <?php
    // Fonction pour le menu footer
    wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container'      => 'false',
            'menu_class'     => 'footer',
        )
    );
    ?>

</footer>
<?php wp_footer(); ?>

</body>

</html>