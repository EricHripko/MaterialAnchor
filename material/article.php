<?php theme_include('header'); ?>

    <!-- Post -->
    <article class="anchor-article mdl-card mdl-shadow--4dp">
        <!-- Post title -->
        <header class="anchor-article__title mdl-card__title">
            <h2 class="mdl-card__title-text">
                <?php echo article_title(); ?>
                <time class="anchor-article__title-time mdl-typography--body-1">
                    <?php echo relative_time(article_time()); ?>
                </time>
            </h2>
        </header>

        <!-- Post content -->
        <section class="anchor-article__content mdl-card__supporting-text mdl-typography--text-justify">
            <?php echo article_markdown(); ?>

            <div id="share" class="mdl-typography--text-right">
                <div class="anchor-article__share">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo social_account('twitter'); ?>">
                        Tweet
                    </a>
                </div>
                <div class="anchor-article__share">
                    <div class="fb-share-button" data-href="<?php echo article_url(); ?>" data-layout="button_count"></div>
                </div>
                <div class="anchor-article__share">
                    <div class="g-plus" data-action="share" data-annotation="bubble"></div>
                </div>
            </div>
        </section>

        <footer class="anchor-article__actions mdl-card__actions mdl-card--border">
            <br>
            <article class="anchor-comment">
                <div class="anchor-comment__avatar mdl-color--<?php echo color(article_author()); ?>">
                    <?php echo strtoupper(substr(article_author(), 0, 1)); ?>
                </div>
                <header class="anchor-comment__author">
                    <h5 class="anchor-comment__author-name"><?php echo article_author(); ?></h5>
                    <h6 class="anchor-comment__author-time anchor-comment__author-time--stretch"><?php echo article_author_bio(); ?></h6>
                </header>
            </article>
        </footer>

        <!-- Post menu -->
        <section class="mdl-card__menu">
            <a id="link<?php echo article_id(); ?>" href="<?php echo article_url(); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--grey-700">
                <i class="material-icons">link</i>
            </a>
            <a id="share<?php echo article_id(); ?>" href="#share" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--grey-700">
                <i class="material-icons">share</i>
            </a>
        </section>
    </article>

    <!-- Shortcut to comment section -->
    <a id="next" href="#discuss" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">comment</i>
    </a>
    <div class="mdl-tooltip" for="next">
        Discuss this post
    </div>

<?php if(comments_open()): ?>
    <!-- Comments -->
    <article id="discuss" class="anchor-article mdl-card mdl-shadow--4dp">
        <?php if(has_comments()): ?>
            <!-- Post title -->
            <header class="anchor-article__title mdl-card__title">
                <h2 class="mdl-card__title-text">
                    <?php echo total_comments() . pluralise(total_comments(), ' Comment'); ?>
                </h2>
            </header>

            <!-- Post content -->
            <section class="anchor-article__content mdl-card__supporting-text mdl-typography--text-justify">
                <?php while(comments()): ?>
                    <?php
                        // Insert default the name if not specified
                        $name = comment_name();
                        if(empty($name))
                            $name = 'Anonymous';
                    ?>
                    <article id="comment<?php echo comment_id(); ?>" class="anchor-comment">
                        <div class="anchor-comment__avatar mdl-color--<?php echo color($name); ?>">
                            <?php echo strtoupper(substr($name, 0, 1)); ?>
                        </div>
                        <header class="anchor-comment__author">
                            <h5 class="anchor-comment__author-name"><?php echo $name; ?></h5>
                            <h6 class="anchor-comment__author-time">
                                <time><?php echo relative_time(comment_time()); ?></time>
                            </h6>
                            <a href="#comment<?php echo comment_id(); ?>" class="anchor-comment__link mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--grey-700">
                                <i class="material-icons">link</i>
                            </a>
                        </header>
                        <section class="anchor-comment__content">
                            <p><?php echo comment_text(); ?></p>
                        </section>
                    </article>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <header class="anchor-article__title <?php echo has_comments() ? 'anchor-article__title--short' : ''; ?> mdl-card__title">
            <h2 class="mdl-card__title-text">
                Add a comment
            </h2>
        </header>

        <!-- Comments -->
        <section class="anchor-article__content mdl-card__supporting-text mdl-typography--text-justify">
            <div class="mdl-color-text--accent"><?php echo comment_form_notifications(); ?></div>

            <!-- Add comment -->
            <form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
                <!-- Author name -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <?php echo comment_form_input_name('class="mdl-textfield__input"'); ?>
                    <label class="mdl-textfield__label" for="name">Your name</label>
                </div>
                <br>

                <!-- Author email -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <?php echo comment_form_input_email('class="mdl-textfield__input"'); ?>
                    <label class="mdl-textfield__label" for="email">Email (won't be published)</label>
                    <span class="mdl-textfield__error">Valid email address required</span>
                </div>
                <br>

                <!-- Comment content -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <?php echo comment_form_input_text('class="mdl-textfield__input" rows=5'); ?>
                    <label class="mdl-textfield__label" for="text">Text</label>
                </div>
                <br>

                <!-- Comment actions -->
                <div class="anchor-comment__create mdl-typography--text-right">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                        Send
                    </button>
                    &nbsp;
                    <button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                        Cancel
                    </button>
                </div>
            </form>
        </section>
    </article>
<?php endif; ?>
<?php theme_include('footer'); ?>