<?php theme_include('header'); ?>

    <!-- Page -->
    <div class="anchor-article mdl-card mdl-shadow--4dp">
        <!-- Page title -->
        <div class="anchor-article__title mdl-card__title">
            <h2 class="mdl-card__title-text">
                <?php echo page_title(); ?>
            </h2>
        </div>

        <!-- Page content -->
        <div class="anchor-article__content mdl-card__supporting-text mdl-typography--text-justify">
            <?php echo page_content(); ?>
        </div>
    </div>

<?php theme_include('footer'); ?>