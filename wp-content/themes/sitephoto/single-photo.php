<?php get_header(); ?>
<section class="detailphoto">
    <div class="photodetail">
        <div class="info">
            <h2><?php the_title(); ?></h2>
            <p>RÉFÉRENCE : <?php echo get_field('reference'); ?></p>
            <p>CATÉGORIE : <?php
                            $categories = get_the_term_list($post->ID, 'categorie');
                            if (!is_wp_error($categories)) {
                                echo strip_tags($categories);
                            }
                            ?></p>
            <p>FORMAT : <?php
                        $formats = get_the_term_list($post->ID, 'format');
                        if (!is_wp_error($formats)) {
                            echo strip_tags($formats);
                        }
                        ?></p>
            <p>TYPE : <?php echo get_field('type'); ?></p>
            <p>ANNÉE : <?php echo get_the_date('Y'); ?></p>
        </div>


        <div class="photos-container">
            <img class="Card-image " src="<?php echo get_the_post_thumbnail_url(); ?>"
                alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
        </div>

    </div>

    <div class="section_post_contact_nav">
        <div class="part1">
            <div>
                <p>Cette photo vous intéresse ?</p>
            </div>
            <div>
                <button id="myBtn">Contact</button>
            </div>
        </div>
        <div class="part2">
            <div class="photominiature">
                <div class="miniimg">
                    <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-0.jpeg.webp'; ?>"
                        alt="Santé !">
                </div>
                <div class="fleche_nav">
                    <div class="flechegauche_nav">
                        <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/flechegauche.svg'; ?>"
                            alt="flechegauche">
                    </div>
                    <div class="flechedroite_nav">
                        <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/flechedroite.svg'; ?>"
                            alt="flechedroite">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="autre_photos">
        <div class="autrechoix">
            <h3>VOUS AIMEREZ AUSSI</h3>
        </div>
        <div class="card_photos">
            <div class="lightbox_img_wrap">
                <div class="photo-block">
                    <img class="photo-image lazyload"
                        src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-5.jpeg.webp'; ?>"
                        alt="Embrassez la mariée">
                    <div class="photo-overlay">
                        <h2 class="photo-title">Embrassez la mariée</h2>
                        <h3 class="photo-categorie">MARIAGE</h3>
                        <div class="eye-icon">
                            <a class="eye-link" href="http://localhost/nathaliemota/?photo=embrassez-la-mariee">
                                <img class="eye-image"
                                    src="<?php echo get_stylesheet_directory_uri() . './assets/images/Icon_eye.png'; ?>"
                                    alt="Icone oeil pour voir la photo">
                            </a>
                        </div>
                        <div class="fullscreen-icon lightbox-enabled">
                            <img class="fullscreen-image lazyload"
                                src="<?php echo get_stylesheet_directory_uri() . './assets/images/Icon_fullscreen.png'; ?>"
                                alt="Icone fullscreen pour voir la photo en grand">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lightbox_img_wrap">
                <div class="photo-block">
                    <img class="photo-image lazyload"
                        src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-4.jpeg.webp'; ?>"
                        alt="Embrassez la mariée">
                    <div class="photo-overlay">
                        <h2 class="photo-title">Embrassez la mariée</h2>
                        <h3 class="photo-categorie">MARIAGE</h3>
                        <div class="eye-icon">
                            <a class="eye-link" href="http://localhost/nathaliemota/?photo=embrassez-la-mariee">
                                <img class="eye-image"
                                    src="<?php echo get_stylesheet_directory_uri() . './assets/images/Icon_eye.png'; ?>"
                                    alt="Icone oeil pour voir la photo">
                            </a>
                        </div>
                        <div class="fullscreen-icon lightbox-enabled">
                            <img class="fullscreen-image lazyload"
                                src="<?php echo get_stylesheet_directory_uri() . './assets/images/Icon_fullscreen.png'; ?>"
                                alt="Icone fullscreen pour voir la photo en grand">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</section>
<section class="lightbox-container">

    <span class="material-symbols-outlined material-icons lightbox-btn left" id="left">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrows_gauche.png'; ?>" alt="précedent">

    </span>
    <span class="material-symbols-outlined material-icons lightbox-btn right" id="right">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrows_droite.png'; ?>" alt="suivant">
    </span>
    <span id="close" class="close material-icons material-symbols-outlined">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Cross.png'; ?>" alt="fermer">
    </span>
    <div class="lightbox-image-wrapper">
        <img alt="lightboximage" class="lightbox-image">


    </div>

</section>



<?php get_footer(); ?>