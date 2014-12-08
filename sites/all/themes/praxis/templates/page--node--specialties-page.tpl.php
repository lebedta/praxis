<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>
<?php
global $language;
$locales = array('en' => 'en_GB', 'de' => 'de_DE');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/<?php print $locales[$language->language]?>/sdk.js#xfbml=1&appId=305264592938569&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="page-wrapper"><div id="page-specialities">

        <div id="header-wrap">
            <div id="header">
                <div class="header-right-block">
                    <ul class="social-media">
                        <li class="fb">
                            <a target="_blank" href="http://www.facebook.com/pages/Praxis-am-Bahnhof/127140757364554">Facebook</a>
                        </li>
                        <li class="tw">
                            <a target="_blank" href="http://twitter.com/praxisambahnhof">Twitter</a>
                        </li>
                        <li class="like">
                            <div class="fb-like" data-href="http://new.praxisambahnhof.ch/" data-width="58" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
                        </li>
                    </ul>
                    <div class="telephone">
                        <p >+41 55 555 05 05</p>
                        <span>&nbsp; </span>
                    </div>
                </div>
                <div class="logo">
                    <a href="<?php print $front_page; ?>"><h1><?php print $site_name; ?></h1></a>
                </div>
                <?php global $user; if ($logged_in==true): ?>
                    <a href="/user/logout" class="login-link">Logout</a>
                <?php else: ?>
                    <a href="/user" class="login-link">Login</a>
                <?php endif; ?>
                <?php print render($page['header']); ?>
            </div>
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



        <?php if ($messages): ?>
            <div id="messages"><div class="section clearfix">
                    <?php print $messages; ?>
                </div></div> 
        <?php endif; ?>

        <div class="content-specialities-wrapper">
            <div class="main_container_inner">
                <?php if ($page['featured']): ?>
                    <div id="featured"><div class="section clearfix">
                            <?php print render($page['featured']); ?>
                        </div></div> 
                <?php endif; ?>

                <?php if ($page['sidebar_first']): ?>
                    <div id="sidebar-first" class="column sidebar-right"><div class="section">
                            <?php print render($page['sidebar_first']); ?>
                        </div></div> 
                <?php endif; ?>

                <div id="content-specialities-page" class="column"><div class="section">
                        <div id="main" class="">

                            <?php if ($breadcrumb): ?>
                                <div id="breadcrumb"><?php print $breadcrumb; ?></div>
                            <?php endif; ?>

                            <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
                            <div class="body-inner">
                                <a id="main-content"></a>
                                
                                <?php print render($title_suffix); ?>

                                <?php print render($page['help']); ?>
                                <?php if ($action_links): ?>
                                    <ul class="action-links">
                                        <?php print render($action_links); ?>
                                    </ul>
                                <?php endif; ?>
                                <?php print render($page['content']); ?>
                                <?php print $feed_icons; ?>

                            </div></div>


                    </div>

                </div></div> 
        </div>

    </div>

    <div id="footer-wrapper">
        <div class="footer-block">
            <a class="copyright" href="http://jz-design.ch/" target="_blank">Design by JZdesign</a>
            <?php if ($page['footer']): ?>
                <div id="footer">
                    <?php print render($page['footer']); ?>
                </div> 
            <?php endif; ?>
        </div>
    </div> 

</div></div> 
