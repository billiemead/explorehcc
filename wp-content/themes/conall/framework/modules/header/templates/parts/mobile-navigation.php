<?php do_action('conall_edge_before_mobile_navigation'); ?>

<nav class="edgtf-mobile-nav">
    <div class="edh-outerbox hs-box">
        <div class="edh-innerbox hs-box">
            <div class="edgtf-grid">
                <?php

                wp_nav_menu(array(
                    'theme_location' => 'mobile-navigation',
                    'container'  =>  '',
                    'container_class' => '',
                    'menu_class' => '',
                    'menu_id' => '',
                    'fallback_cb' => 'top_navigation_fallback',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'walker' => new ConallEdgeClassMobileNavigationWalker()
                )); ?>
            </div>
        </div>
    </div>
    <div class="edgtf-mobile-menu-opener">
        <a href="javascript:void(0)">
            <span class="mobile-opener-icon-holder-bottom">
                <img class="close-icon" src="/wp-content/themes/conall-child/images/mobile-nav-open-36x36.png" />
            </span>
        </a>
    </div>
</nav>

<?php do_action('conall_edge_after_mobile_navigation'); ?>