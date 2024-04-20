<?php get_header(); ?>

<!-- 1sy part dynamique -->
<section class="detailphoto">
    <div class="photodetail">
        <div class="info">
            <h2><?php the_title(); ?></h2>
            <p>RÉFÉRENCE : <?php the_field('reference'); ?></p>
            <p>CATÉGORIE : <?php $categorie = get_the_term_list($post_id, 'categorie');
                            if ($categorie) {
                                echo $categorie;
                            } else {
                                echo 'Aucun terme trouvé.';
                            }
                            ?></p>
            <p>FORMAT : <?php
                        $format = get_the_term_list($post_id, 'format');
                        if ($format) {
                            echo $format;
                        } else {
                            echo 'Aucun terme trouvé.';
                        }
                        ?></p>
            <p>TYPE : <?php the_field('type'); ?></p>
            <p>ANNÉE : <?php echo get_the_date('Y'); ?></p>
        </div>


        <div class="photos-container">
            <img class="Card-image " src="<?php echo get_the_post_thumbnail_url(); ?>"
                alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
        </div>
    </div>

    <!-- 2nd part dynamique -->
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
        <div class="likephoto">
            <?php
        $args = array(
            'post_type' => 'photo', // Type de contenu (article)
            'posts_per_page' => 2, // Nombre d'articles à afficher
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();

        ?>


            <div class="photo-block">
                <?php if (has_post_thumbnail()) : ?>
                <div class="photopost">
                    <a href="<?php echo get_the_permalink(get_the_ID()); ?>"
                        data-post-title="<?php echo esc_attr(get_the_title(get_the_ID())); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'post-thumbnail')); ?>
                    </a>
                </div>
                <?php endif; ?>

                <div class="photo-overlay">
                    <h2 class="photo-title"><?php the_field('reference'); ?></h2>
                    <h3 class="photo-categorie"><?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?>
                    </h3>
                    <div class="eye-icon">
                        <a class="eye-link" href="<?php the_permalink() ?>" class="eye-link">
                            <img class="eye-image"
                                src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>"
                                alt="Icone oeil pour voir la photo">
                        </a>
                    </div>
                    <div class="fullscreen-icon lightbox-enabled">
                        <img class="fullscreen-image"
                            src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>"
                            alt="Icone fullscreen pour voir la photo en grand">
                    </div>
                </div>
                <div class="lightbox-container">

                    <span class="material-symbols-outlined material-icons lightbox-btn left" id="left">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrows_gauche.png'; ?>"
                            alt="précedent">
                    </span>
                    <span class="material-symbols-outlined material-icons lightbox-btn right" id="right">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrows_droite.png'; ?>"
                            alt="suivant">
                    </span>
                    <span id="close" class="close material-icons material-symbols-outlined">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Cross.png'; ?>"
                            alt="fermer">
                    </span>
                    <div class="lightbox-image-wrapper">
                        <img alt="lightboximage" class="lightbox-image">
                    </div>

                </div>
            </div>


            <?php
            endwhile;
            wp_reset_postdata(); // Réinitialise la requête
        else :
            echo 'Aucun article trouvé.';
        endif;

        ?>
        </div>
        <!-- <div class="card_photos">
            <div class="lightbox_img_wrap">
                <div class="photo-block">
                    <img class="photo-image"
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
                    <img class="photo-image"
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
                            <img class="fullscreen-image"
                                src="<?php echo get_stylesheet_directory_uri() . './assets/images/Icon_fullscreen.png'; ?>"
                                alt="Icone fullscreen pour voir la photo en grand">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

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