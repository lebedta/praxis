<?php
/**
 * Created by PhpStorm.
 * User: timon
 * Date: 17.12.14
 * Time: 12:10
 */
?>
<div id="header-wrap">
    <div id="header">
<!--        <div>-->
<!--            --><?php //global $user; if ($logged_in !=true): ?>
<!--                <div class="search">-->
<!--                    <a href="#"><span>--><?php //print t('Search'); ?><!--</span></a>-->
<!--                </div>-->
<!---->
<!--                <div class="user_login_block">-->
<!--                    <a href="/user" class="login-user-link"><span>--><?php //print t('Login'); ?><!--</span></a>-->
<!--                </div>-->
<!--            --><?php //else: ?>
<!--                <div class="user_logout_block">-->
<!--                    <a href="/user/logout" class="logout-link">--><?php //print t('Welcome').',';?><!-- <span>--><?php //print $user->name;  ?><!-- </span></a>-->
<!--                </div>-->
<!---->
<!--                <div class="search">-->
<!--                    <a href="#"><span>--><?php //print t('Search'); ?><!--</span></a>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
<!--        </div>-->

        <div class="logo">
            <a href="<?php print $front_page; ?>"><h1><?php print $site_name; ?></h1></a>
        </div>

        <div class="nav-wrap">
            <div class="nav">
                <?php if ($main_menu): ?>
                    <div id="main-menu" class="navigation">
                        <?php print render($main_menu_expanded); ?>
                    </div>
                <?php endif; ?>
                <div class="notfall">
                    <a href="/notfall">
                        <span>notfall</span>
                    </a>
                </div>
            </div>
        </div>

        <?php print render($page['header']); ?>
    </div>
</div>


