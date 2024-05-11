<?php get_header(); ?>

<!-- 1st part dynamique -->
<section class="detailphoto">
    <div class="photodetail">
        <div class="info">
            <h2><?php the_title(); ?></h2>
            <p>RÉFÉRENCE : <span class="ref-val"><?php the_field('reference'); ?></p>
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
            <img class="Card-image " src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
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
                    <div class=" fleche_nav">
                        <div class="flechegauche_nav">
                            <?php if (get_previous_post()) { ?>
                                <a href="<?php echo get_the_permalink($previous) ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url($previous) ?>" alt="">
                                    <div>
                                        <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/flechegauche.svg'; ?>" alt="flechegauche">
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="flechedroite_nav">
                            <?php if (get_next_post()) { ?>
                                <a href="<?php echo get_the_permalink($next) ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url($next) ?>" alt="">
                                    <div>
                                        <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/flechedroite.svg'; ?>" alt="flechedroite">
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
                'orderby' => 'rand', //ordonner les résultats d'une requête de manière aléatoire
                'post_type' => 'photo', // Type de contenu (article)
                'posts_per_page' => 2, // Nombre d'articles à afficher

            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();

            ?>
                    <div class="photo-block">
                        <?php get_template_part('/template-parts/photo'); ?>
                    </div>
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

<?php get_footer(); ?>