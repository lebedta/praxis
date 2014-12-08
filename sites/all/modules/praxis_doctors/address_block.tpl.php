<div id="accordion" class="accordion-block">
    <?php foreach ($data as $key => $doctors): ?>
        <h3><?php echo $terms[$key]; ?></h3>
        <div class="section-wrapper">
            <ul>
                <?php foreach($doctors as $doctor): ?>
                    <li class="address-item">
                        <?php if (in_array($key, array('a', 'l', 's'))): ?>
                            <span class="title"><?php print $doctor['title']; ?></span>
                            <span class="delimiter">:</span>
                            <span class="email"><a href="mailto:<?php print mb_strtolower($doctor['email']); ?>"><?php print mb_strtolower($doctor['email']); ?></a></span>
                        <?php else: ?>
                            <?php

                            $items = field_get_items('node', $doctor, 'title_field');
                            $name = field_view_value('node', $doctor, 'title_field', $items[0], array(), $lang);
                            $items = field_get_items('node', $doctor, 'field_email');
                            $email = field_view_value('node', $doctor, 'field_email', $items[0], array(), $lang);
                            //                            debug($name);
                            ?>
                            <span class="title"><?php print render($name); ?></span>
                            <span class="delimiter">:</span>
                            <span class="email"><a href="mailto:<?php print render($email); ?>"><?php print render($email); ?></a></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){

        var hash = window.location.hash.substring(1);
        var active_id = hash ? Drupal.settings.ids[hash] : 0;

        jQuery('#accordion' ).accordion({
            heightStyle: "content",
            collapsible: true,
            active: active_id,
            create: function(e, ui){
                jQuery('.section-wrapper').css('height', 'auto');
            }});

    });
</script>
