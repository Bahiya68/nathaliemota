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
            <img class="eye-image" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>"
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
<?php endif; ?>