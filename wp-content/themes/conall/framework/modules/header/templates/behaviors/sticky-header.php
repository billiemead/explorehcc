<?php do_action('conall_edge_before_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action( 'conall_edge_after_sticky_menu_html_open' ); ?>
    <div class="edgtf-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class=" edgtf-vertical-align-containers">
                <div class="edgtf-position-center">
                    <div class="edgtf-position-center-inner"><div class="edh-innerbox hs-box">
                        <?php conall_edge_get_sticky_menu('edgtf-sticky-nav'); ?>
                    </div></div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action('conall_edge_after_sticky_header'); ?>