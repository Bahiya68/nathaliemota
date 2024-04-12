<?php
get_header();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="photodetail">
        <div class="info">
            <h2 class="titrephoto">TEAM <br> MARIÉE</h2>
            <p class="refphoto">RÉFÉRENCE : BF2400</p>
            <p class="catphoto">CATÉGORIE : MARIAGE</p>
            <p class="formatphoto">FORMAT : PORTRAIT</p>
            <p class="typephoto">TYPE : NUMÉRIQUE</p>
            <p class="anneephoto">ANNÉE : 2022</p>

        </div>

        <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-15.jpeg.webp'; ?>" alt="Team mariée">
    </section>

    <section class="section_post_contact_nav">
        <div>
            <p>Cette photo vous intéresse ?</p>
        </div>
        <div>
            <button id="myBtn">Contact</button>
        </div>
    </section>

    <section class="suggestion">
        <h3 class="autrechoix">Vous aimerez AUSSI</h3>
        <div class="image">
            <div class="image1">
                <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-4.jpeg.webp'; ?>" alt="Vers l'éternité">
            </div>
            <div class="image2">
                <img src="<?php echo get_stylesheet_directory_uri() . './assets/images/nathalie-5.jpeg.webp'; ?>" alt="Embrassez la mariée ">
            </div>
        </div>
    </section>


</body>

</html>
<?php

get_footer();
