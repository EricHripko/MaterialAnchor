<?php
// Enable content-aware coloring
$primary = empty(article_title()) ? site_meta('primary', 'indigo') : str_replace('-', '_', color(article_title()));
$accent = empty(article_title()) ? site_meta('accent', 'pink') : str_replace('-', '_', accent(article_title()));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>

    <!-- Include Roboto font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <!-- Include Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Include Material Design Lite -->
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.<?php echo $primary; ?>-<?php echo $accent; ?>.min.css">
    <script type="text/javascript" src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
    <!-- Include website styles -->
    <link rel="stylesheet" href="<?php echo theme_url('/css/main.css'); ?>">
    <!-- Include Twitter share button -->
    <script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <!-- Include Facebook SDK -->
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Include Google+ share button -->
    <script src="https://apis.google.com/js/platform.js" async defer>
        {lang: 'en-GB'}
    </script>

    <!-- Disable mobile scaling -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Website metadata -->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
    <link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">
    <meta name="description" content="<?php echo site_description(); ?>">
    <meta name="generator" content="Anchor CMS">
    <!-- OpenGraph metadata -->
    <meta property="og:title" content="<?php echo site_name(); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(current_url()); ?>">
    <meta property="og:image" content="<?php echo theme_url('img/og_image.gif'); ?>">
    <meta property="og:site_name" content="<?php echo site_name(); ?>">
    <meta property="og:description" content="<?php echo site_description(); ?>">

    <!-- Custom styles and JavaScript for the displayed article -->
    <?php if(customised()): ?>
        <style type="text/css"><?php echo article_css(); ?></style>
        <script type="text/javascript"><?php echo article_js(); ?></script>
    <?php endif; ?>
</head>
<body>
<!-- Initialise Facebook SDK -->
<div id="fb-root"></div>
<!-- Website header -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <section class="mdl-layout__header-row">
            <!-- Website title -->
            <span class="mdl-layout-title"><?php echo site_name(); ?></span>
            <div class="mdl-layout-spacer"></div>

            <!-- Website search -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                <form id="search" action="<?php echo search_url(); ?>" method="post">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="term">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" name="term" id="term" />
                    </div>
                </form>
            </div>
        </section>

        <section class="mdl-layout__header-row">
            <!-- Post categories -->
            <nav class="mdl-navigation">
                <?php while(categories()): ?>
                    <a class="mdl-navigation__link" href="<?php echo category_url(); ?>" title="<?php echo category_description(); ?>">
                        <span class="mdl-badge" data-badge="<?php echo category_count(); ?>"><?php echo category_title(); ?></span>
                    </a>
                <?php endwhile; ?>
            </nav>
        </section>
    </header>

    <!-- Website menu -->
    <aside class="mdl-layout__drawer">
        <span class="mdl-layout-title">Navigation</span>
        <nav class="mdl-navigation">
            <?php while(menu_items()): ?>
                <a class="mdl-navigation__link <?php echo (menu_active() ? 'mdl-color--white mdl-navigation__link--current' : ''); ?>" href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>>">
                    <?php echo menu_name(); ?>
                </a>
            <?php endwhile; ?>
        </nav>
    </aside>

    <!-- Website content -->
    <main class="mdl-layout__content">
        <div class="anchor-ribbon mdl-color--primary">&nbsp;</div>
        <section class="anchor-content mdl-grid">
            <!-- Create whitespace padding -->
            <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>

            <!-- Page content -->
            <div class="mdl-cell mdl-cell--8-col">