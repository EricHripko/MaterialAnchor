<?php theme_include('header'); ?>

<!-- Post list -->
<?php while(posts()): ?>
    <article class="anchor-article mdl-card mdl-shadow--4dp">
        <!-- Post title -->
        <header class="anchor-article__title mdl-card__title">
            <h2 class="mdl-card__title-text">
                <a href="<?php echo article_url(); ?>">
                    <?php echo article_title(); ?>
                </a>
                <time class="anchor-article__title-time mdl-typography--body-1">
                    <?php echo relative_time(article_time()); ?>
                </time>
            </h2>
        </header>

        <!-- Post content -->
        <section class="anchor-article__content mdl-card__supporting-text mdl-typography--text-justify">
            <?php echo article_markdown(); ?>
        </section>

        <!-- Post link -->
        <footer class="anchor-article__actions mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo article_url(); ?>">
                More
            </a>
        </footer>

        <!-- Post menu -->
        <section class="mdl-card__menu">
            <a id="link<?php echo article_id(); ?>" href="<?php echo article_url(); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--grey-700">
                <i class="material-icons">link</i>
            </a>
            <a id="share<?php echo article_id(); ?>" href="<?php echo article_url(); ?>#share" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--grey-700">
                <i class="material-icons">share</i>
            </a>
        </section>
    </article>
<?php endwhile; ?>

<!-- Pagination -->
<?php if(has_pagination()): ?>
    <!-- Previous post -->
    <a id="previous" href="<?php echo href(posts_prev()); ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">skip_previous</i>
    </a>
    <div class="mdl-tooltip" for="previous">
        Previous post
    </div>

    <!-- Next post -->
    <a id="next" href="<?php echo href(posts_next()); ?>" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">skip_next</i>
    </a>
    <div class="mdl-tooltip" for="next">
        Next post
    </div>
<?php endif; ?>

<?php theme_include('footer'); ?>