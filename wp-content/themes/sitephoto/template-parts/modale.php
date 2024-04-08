<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close"></span>
        <div class="boite">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/contactHeader.png'; ?>" alt="contact">
            <?php
            // On insère le formulaire de demandes de renseignements
            echo do_shortcode('[contact-form-7 id="0f07703" title="Modale contact"]');
            ?>
        </div>

    </div>
</div>