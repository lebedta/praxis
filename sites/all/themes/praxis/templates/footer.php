<div id="footer-wrapper">
    <div id="footer-wraper-block">
        <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
            <div id="footer-columns">
                <?php print render($page['footer_firstcolumn']); ?>
                <?php print render($page['footer_secondcolumn']); ?>
                <?php print render($page['footer_thirdcolumn']); ?>
                <?php print render($page['footer_fourthcolumn']); ?>
            </div>
        <?php endif; ?>

        <div class="footer-block">
            <?php if ($page['footer']): ?>
                <div id="footer">
                    <?php print render($page['footer']); ?>
                </div>
            <?php endif; ?>
            <div class="praxis-info">
                <div class="praxis-contact">
                    <p>Dorfstrasse 43 - 8630 Rüti ZH</p>
                    <p>+41 55 555 05 05</p>
                    <a href="#">praxis@praxisambahnhof.ch</a>
                </div>
            </div>
            <div class="links-listing-block">
                <ul class="links-listing">
                    <li class="equam"><a>Equam</a></li>
                    <li class="emergency"><a>Praxis emergency</a></li>
                    <li class="medix"><a>Medix</a></li>
                </ul>
            </div>

            <div class="footer-social-block">
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
                <a class="copyright" href="http://jz-design.ch/" target="_blank">Design by <span>JZdesign</span></a>
            </div>
        </div>
    </div>
</div>