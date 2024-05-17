<div class="page-container">
    <!-- Filtrage des photos  -->
    <div class="filters">
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" id="filter-form">
            <!-- Filtre par Catégorie -->
            <div class="filter1">
                <select name="categoryfilter" id="category" class="filter-select">
                    <option value="">Catégories</option>
                    <?php
                    // Récupération des catégories
                    $categories = get_terms('categorie');
                    // Récupération de la catégorie actuellement sélectionnée
                    $selected_category = isset($_GET['categoryfilter']) ? $_GET['categoryfilter'] : '';
                    // Boucle sur les catégories
                    foreach ($categories as $category) {
                    ?>
<<<<<<< HEAD
                    <option value="<?php echo esc_attr($category->slug); ?>"
                        <?php selected($selected_category, $category->slug); ?>>
                        <?php echo esc_html($category->name); ?>
                    </option>
=======
                        <option value="<?php echo esc_attr($category->slug); ?>" <?php selected($selected_category, $category->slug); ?>>
                            <?php echo esc_html($category->name); ?>
                        </option>
>>>>>>> 367f88b9e50409394df64dea87470bb0df4c7ef9
                    <?php
                    }
                    ?>
                </select>


                <!-- Filtre par Format -->

                <select name="formatfilter" id="format" class="filter-select">
                    <option value="">Formats</option>
                    <?php
                    $formats = get_terms('format');
                    // Récupération du format actuellement sélectionné
                    $selected_format = isset($_GET['formatfilter']) ? $_GET['formatfilter'] : '';
                    foreach ($formats as $format) {
                    ?>
<<<<<<< HEAD
                    <option value="<?php echo esc_attr($format->slug); ?>"
                        <?php selected($selected_format, $format->slug); ?>>
                        <?php echo esc_html($format->name); ?>
                    </option>
=======
                        <option value="<?php echo esc_attr($format->slug); ?>" <?php selected($selected_format, $format->slug); ?>>
                            <?php echo esc_html($format->name); ?>
                        </option>
>>>>>>> 367f88b9e50409394df64dea87470bb0df4c7ef9
                    <?php
                    }
                    ?>
                </select>
            </div>

            <!-- Filtre par Ancienneté -->
            <div class="filter2">
                <select name="orderby" id="orderby" class="filter-select">
                    <option value="">Trier par</option>
<<<<<<< HEAD
                    <option value="date_desc"
                        <?php selected(isset($_GET['orderby']) && $_GET['orderby'] == 'date_desc'); ?>>
                        Récentes aux plus anciennes</option>
                    <option value="date_asc"
                        <?php selected(isset($_GET['orderby']) && $_GET['orderby'] == 'date_asc'); ?>>
=======
                    <option value="date_desc" <?php selected(isset($_GET['orderby']) && $_GET['orderby'] == 'date_desc'); ?>>
                        Récentes aux plus anciennes</option>
                    <option value="date_asc" <?php selected(isset($_GET['orderby']) && $_GET['orderby'] == 'date_asc'); ?>>
>>>>>>> 367f88b9e50409394df64dea87470bb0df4c7ef9
                        Anciennes aux plus récentes</option>
                </select>
            </div>
        </form>
    </div>