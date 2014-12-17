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

        <div class="logo">
            <a href="<?php print $front_page; ?>"><h1><?php print $site_name; ?></h1></a>
        </div>

        <div class="nav-wrap">
            <div class="nav">
                <div class="notfall">
                    <a href="/notfall">
                        <span>notfall</span>
                    </a>
                </div>
                <?php if ($main_menu): ?>
                    <div id="main-menu" class="navigation">
                        <?php print render($main_menu_expanded); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>



        <?php global $user; if ($logged_in==true): ?>
            <a href="/user/logout" class="login-link">Logout</a>
        <?php else: ?>
            <a href="/user" class="login-link">Login</a>
        <?php endif; ?>
        <?php print render($page['header']); ?>
    </div>
</div>

