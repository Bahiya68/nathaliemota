<section class="gallery mt-5">
    <section class="p-0 container">
        <div class="row d-flex">
            <?php
            $images = array(
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-1.jpeg.webp',
                    'title' => 'Embrassez la mariée',
                    'category' => 'MARIAGE'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-2.jpeg.webp',
                    'title' => 'Team mariée',
                    'category' => 'Concert'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-3.jpeg.webp',
                    'title' => 'Embrassez la mariée',
                    'category' => 'MARIAGE'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-4.jpeg.webp',
                    'title' => 'Du soir au matin',
                    'category' => 'Concert'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-5.jpeg.webp',
                    'title' => 'Vers l\'éternité',
                    'category' => 'Concert'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-6.jpeg.webp',
                    'title' => 'Le menu',
                    'category' => 'Concert'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-7.jpeg.webp',
                    'title' => 'Bière ou eau plate ?',
                    'category' => 'MARIAGE'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-8.jpeg.webp',
                    'title' => 'Au bal masqué',
                    'category' => 'Concert'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-9.jpeg.webp',
                    'title' => 'Embrassez la mariée',
                    'category' => 'MARIAGE'
                ),
                array(
                    'src' => get_stylesheet_directory_uri() . '/assets/images/nathalie-10.jpeg.webp',
                    'title' => 'Embrassez la mariée',
                    'category' => 'MARIAGE'
                )
            );

            foreach ($images as $image) {
            ?>
            <div class=" col-12 col-md-4 p-3">
                <div class="lightbox_img_wrap">
                    <div class="photo-block">
                        <img class="photo-image lazyload" src="<?php echo $image['src']; ?>"
                            alt="<?php echo $image['title']; ?>">
                        <div class="photo-overlay">
                            <h2 class="photo-title"><?php echo $image['title']; ?></h2>
                            <h3 class="photo-categorie"><?php echo $image['category']; ?></h3>
                            <div class="eye-icon">
                                <a class="eye-link"
                                    href="http://localhost/nathaliemota/?photo=<?php echo urlencode($image['title']); ?>">
                                    <img class="eye-image"
                                        src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>"
                                        alt="Icone oeil pour voir la photo">
                                </a>
                            </div>
                            <div class="fullscreen-icon lightbox-enabled">
                                <img class="fullscreen-image lazyload"
                                    src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>"
                                    alt="Icone fullscreen pour voir la photo en grand">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
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