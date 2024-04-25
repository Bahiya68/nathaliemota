<section class="filterbox">
    <div class="filtrepart1">
        <div class="dropdown filtre1">
            <input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
            <label for="filter-switch" class="dropdown__options-filter">
                <ul class="dropdown__filter" role="listbox" tabindex="-1">
                    <li class="dropdown__filter-selected" aria-selected="true">
                        Catégorie
                    </li>

                    <ul class="dropdown__select" onfocus="this.size=4;" onblur="this.size=0;" onchange="this.size=1; this.blur()">
                        <option class="dropdown__select-option" role="option">
                            Réception
                        </option>
                        <option class="dropdown__select-option" role="option">
                            Télévision
                        </option>
                        <option class="dropdown__select-option" role="option">
                            Concert
                        </option>
                        <option class="dropdown__select-option" role="option">
                            Mariage
                        </option>
                    </ul>

                </ul>
            </label>
        </div>
        <div class="dropdown2 filtre2">
            <input type="checkbox" class="dropdown2__switch2" id="filter-switch2" hidden />
            <label for="filter-switch2" class="dropdown2__options-filter2">
                <ul class="dropdown2__filter2" role="listbox" tabindex="-1">
                    <li class="dropdown2__filter-selected2" aria-selected="true">
                        Formats
                    </li>

                    <ul class="dropdown2__select2">
                        <option class="dropdown2__select-option2" role="option">
                            Portrait
                        </option>
                        <option class="dropdown2__select-option2" role="option">
                            Paysage
                        </option>
                    </ul>

                </ul>
            </label>
        </div>
    </div>


    <div class="filtrepart2">
        <div class="dropdown3 filtre3">
            <input type="checkbox" class="dropdown3__switch3" id="filter-switch3" hidden />
            <label for="filter-switch3" class="dropdown3__options-filter3">
                <ul class="dropdown3__filter3" role="listbox" tabindex="-1">
                    <li class="dropdown3__filter-selected3" aria-selected="true">
                        Trier par
                    </li>

                    <ul class="dropdown3__select3">
                        <option class="dropdown3__select-option3" role="option">
                            À partir des plus récentes
                        </option>
                        <option class="dropdown3__select-option3" role="option">
                            À partir des plus anciennes
                        </option>
                    </ul>

                </ul>
            </label>
        </div>
    </div>
</section>