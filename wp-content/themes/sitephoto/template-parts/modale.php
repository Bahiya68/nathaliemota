<div class="popup-overlay">
    <div class="popup-contact">
        <div class="popup-titlecontainer">
            <span class="popup-close"></span>
            <img src="<?php echo get_template_directory_uri() . '/assets/images/contactHeader.png'; ?>" alt="contact">
        </div>
        <div class="popup-informations">
            <?php
            // On insère le formulaire
            echo do_shortcode('[contact-form-7 id="910" title="Formulaire contact"]');
            ?>
        </div>
    </div>
</div>