                </div>

                <!-- Create whitespace padding -->
                <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>

                <!-- Website footer -->
                <footer class="anchor-footer mdl-mini-footer">
                    <!-- Quick access links -->
                    <div class="anchor-footer__left-section mdl-mini-footer--left-section">
                        <ul class="mdl-mini-footer--link-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="<?php echo rss_url(); ?>">RSS</a></li>
                            <li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
                        </ul>
                    </div>

                    <!-- Social network accounts -->
                    <div class="anchor-footer__right-section mdl-mini-footer--right-section">
                        <ul class="mdl-mini-footer--link-list">
                            <?php foreach(array('facebook', 'twitter', 'github') as $network): ?>
                                <?php if(social_account($network)): ?>
                                    <li class="mdl-mini-footer--social-btn anchor-social">
                                        <a class="anchor-social__link anchor-social__link--<?php echo $network; ?>" href="<?php echo social_url($network); ?>">&nbsp;</a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </footer>
            </section>
        </main>
    </div>
</body>
</html>