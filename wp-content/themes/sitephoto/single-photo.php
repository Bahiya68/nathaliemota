<?php get_header(); ?>

<!-- 1st part dynamique -->
<section class="detailphoto">
    <div class="photodetail">
        <div class="info">
            <h2><?php the_title(); ?></h2>
            <p>RÉFÉRENCE : <?php the_field('reference'); ?></p>
            <p>CATÉGORIE : <?php $categorie = get_the_term_list($post->ID, 'categorie');
                            if ($categorie) {
                                echo $categorie;
                            } else {
                                echo 'Aucun terme trouvé.';
                            }
                            ?></p>
            <p>FORMAT : <?php
                        $format = get_the_term_list($post->ID, 'format');
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

    <!-- ********Mini navigation  -->

    <?php
    $previous = get_previous_post();
    $next = get_next_post();
    ?>
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
                    <!-- <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?> -->
                    <div class=" fleche_nav">
                        <div class="flechegauche_nav">
                            <?php if (get_previous_post()) { ?>
                            <a href="<?php echo get_the_permalink($previous) ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($previous) ?>" alt="">
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/flechegauche.svg'; ?>"
                                        alt="flechegauche">
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                        <div class="flechedroite_nav">
                            <?php if (get_next_post()) { ?>
                            <a href="<?php echo get_the_permalink($next) ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($next) ?>" alt="">
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/flechedroite.svg'; ?>"
                                        alt="flechedroite">
                                </div>
                            </a>
                            <?php } ?>
                        </div>
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
                    <a data-href="<?php echo get_the_permalink(get_the_ID()); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'post-thumbnail')); ?>
                    </a>
                </div>
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
                    <!-- récupère l'URL de l'image mise en avant de l'article en cours -->
                    <div class="fullscreen-icon lightbox-enabled"
                        data-imgsrc="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())); ?>"
                        data-reference="<?php echo the_field('reference'); ?>"
                        data-categorie="<?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?>">
                        <img class="fullscreen-image"
                            src=" <?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>"
                            alt=" Icone fullscreen pour voir la photo en grand">
                    </div>
                </div>

                <?php get_template_part('/template-parts/lightbox'); ?>

            </div>
            <?php endif; ?>
            <?php the_posts_pagination(); ?>
            <?php
                endwhile;
                wp_reset_postdata(); // Réinitialise la requête
            else :
                echo 'Aucun article trouvé.';
            endif;
        ?>
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