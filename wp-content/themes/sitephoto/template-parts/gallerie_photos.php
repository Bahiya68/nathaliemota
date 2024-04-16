<section id="galerie_photos">

    <div id="filtres"></div>

    <!--  You'll need to add Google Icons to your project for the icons I use. Or use whatever you'd like. I'm a developer; not your mom -->

    <section class="gallery mt-5">
        <section class="p-0 container">
            <div class="row d-flex">
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-0.jpeg.webp'; ?>"
                            alt="Santé !">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-1.jpeg.webp'; ?>"
                            alt="Et bon anniversaire !">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-2.jpeg.webp'; ?>"
                            alt="Let's party!">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-3.jpeg.webp'; ?>"
                            alt="Tout est installé">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-4.jpeg.webp'; ?>"
                            alt="Vers l'éternité">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-5.jpeg.webp'; ?>"
                            alt="Embrassez la mariée">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-6.jpeg.webp'; ?>"
                            alt="Dansons ensemble">
                    </div>
                </div>
                <div class=" col-12 col-md-4 p-3">
                    <div class="lightbox_img_wrap">
                        <img class="lightbox-enabled"
                            src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-7.jpeg.webp'; ?>"
                            alt="Le menu">
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section class="lightbox-container">

        <span class="material-symbols-outlined material-icons lightbox-btn left" id="left">
            arrow_back
        </span>
        <span class="material-symbols-outlined material-icons lightbox-btn right" id="right">
            arrow_forwards
        </span>
        <span id="close" class="close material-icons material-symbols-outlined">
            close
        </span>
        <div class="lightbox-image-wrapper">
            <img alt="lightboximage" class="lightbox-image">
        </div>

    </section>
</section>