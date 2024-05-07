<div class="page-container">
    <!-- Filtrage des photos  -->
    <div class="filters">
        <form action="">
            <!-- Filtre par Catégorie -->
            <div class="filter1">
                <select name="categoryfilter" id="category" class="filter-select" onfocus="this.size=5;"
                    onblur="this.size=0;" onchange="this.size=1; this.blur()">
                    <option value="">Catégories</option>
                    <?php
                    // récupération des catégories
                    $categories = get_terms('categorie');
                    // récupération de la catégorie actuellement sélectionnée
                    $selected_category = isset($_GET['categoryfilter']) ? $_GET['categoryfilter'] : '';
                    // boucle sur les catégories
                    foreach ($categories as $category) {
                    ?>
                    <option value="<?php echo $category->slug; ?>"
                        <?php echo $selected_category == $category->slug ? 'selected' : ''; ?>>
                        <?php echo $category->name; ?></option>
                    <?php
                    }
                    ?>
                </select>

                <!-- Filtre par Format -->
                <select name="formats" id="format" class="filter-select" onfocus="this.size=3;" onblur="this.size=0;"
                    onchange="this.size=1; this.blur()">
                    <option value="">Formats</option>
                    <?php
                    $formats = get_terms('format');
                    // récupération du format actuellement sélectionné
                    $selected_format = isset($_GET['formats']) ? $_GET['formats'] : '';
                    foreach ($formats as $format) {
                    ?>
                    <option value="<?php echo $format->slug; ?>"
                        <?php echo $selected_format == $format->slug ? 'selected' : ''; ?>><?php echo $format->name; ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <!-- Filtre par Ancienneté -->
            <div class="filter2">
                <select name="orderby" id="orderby" class="filter-select" onfocus="this.size=3;" onblur="this.size=0;"
                    onchange="this.size=1; this.blur()">
                    <option value="">Trier par</option>
                    <option value="date_desc"
                        <?php echo isset($_GET['orderby']) && $_GET['orderby'] == 'date_desc' ? 'selected' : ''; ?>>
                        Récentes aux plus anciennes</option>
                    <option value="date_asc"
                        <?php echo isset($_GET['orderby']) && $_GET['orderby'] == 'date_asc' ? 'selected' : ''; ?>>
                        Anciennes aux plus récentes</option>
                </select>
            </div>
        </form>
    </div>
</div>