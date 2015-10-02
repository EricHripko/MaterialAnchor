<?php theme_include('header'); ?>

    <!-- Post -->
    <article class="anchor-article mdl-card mdl-shadow--4dp">
        <!-- Post title -->
        <header class="anchor-article__title mdl-card__title">
            <h2 class="mdl-card__title-text">
                Search results
            </h2>
        </header>

        <!-- Post content -->
        <section class="anchor-article__content mdl-card__supporting-text mdl-typography--text-justify">
            <?php if(has_search_results()): ?>
            <?php while(search_results()): ?>
                <a class="anchor-link--clean" href="<?php echo article_url(); ?>">
                    <article id="comment<?php echo comment_id(); ?>" class="anchor-comment">
                        <div class="anchor-comment__avatar mdl-color--<?php echo color(article_title()); ?>">
                            <?php echo strtoupper(substr(article_title(), 0, 1)); ?>
                        </div>
                        <header class="anchor-comment__author">
                            <h5 class="anchor-comment__author-name"><?php echo article_title(); ?></h5>
                            <h6 class="anchor-comment__author-time">
                                <time><?php echo relative_time(article_time()); ?></time>
                            </h6>
                        </header>
                    </article>
                </a>
            <?php endwhile; ?>
            <?php else: ?>
                <p>Unfortunately, there's no results for <span class="mdl-color-text--accent"><?php echo search_term(); ?></span>. Did you spell everything correctly?</p>
            <?php endif; ?>
        </section>
    </article>

    <!-- Shortcut to comment section -->
    <a id="next" href="#discuss" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">comment</i>
    </a>
    <div class="mdl-tooltip" for="next">
        Discuss this post
    </div>

<?php theme_include('footer'); ?>