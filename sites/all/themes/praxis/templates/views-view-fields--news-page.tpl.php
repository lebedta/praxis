<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
    global $language;
    $suf = "'th";
    if ($language->language == 'de'){
        $suf = "";
    }
?>

<?php foreach ($fields as $id => $field): ?>
    <?php if ($id != 'field_attachment'): ?>
        <?php if ($id == 'field_image_news'): ?>
            <?php
            $content = $field->content;
            $new_content = str_replace("<a ", '<a rel="shadowbox['.$row->nid.']" ', $content);
            ?>
            <?php if (!empty($field->separator)): ?>
                <?php print $field->separator; ?>
            <?php endif; ?>

            <?php print $field->wrapper_prefix; ?>
            <?php print $field->label_html; ?>
            <?php print $new_content; ?>
            <?php print $field->wrapper_suffix; ?>
        <?php else: ?>
            <?php if (!empty($field->separator)): ?>
                <?php print $field->separator; ?>
            <?php endif; ?>

            <?php print $field->wrapper_prefix; ?>
            <?php print $field->label_html; ?>
            <?php if ($id == 'created'): ?>
                <?php
                    $months = array(1 => "Januar",    //January
                        2 => "Februar", //February
                        3 => "März",      //March
                        4 => "April", //April
                        5 => "Mai", //May
                        6 => "Juni",         //Jun
                        7 => "Juli",      //July
                        8 => "August", //August
                        9 => "September",       //September
                        10=> "Oktober",    //October
                        11=> "November", //November
                        12=> "Dezember");      //December

                    $mj = date("n", $field->raw);
                    $month = $months[$mj];
                ?>
                    <span class="field-content"><?php print  date("j", $field->raw) . ". ". $month . ' '  . date('Y', $field->raw); ?></span>

            <?php else: ?>
                <?php print $field->content; ?>
            <?php endif; ?>
            <?php print $field->wrapper_suffix; ?>
            <?php if ($id == 'created'): ?>
                <div class="share">
                    <a class="fb" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo url('node/' . $row->nid, array('absolute' => true)); ?>" target="_blank"></a>
                    <a class="tw" href="https://twitter.com/share?url=<?php echo url('node/' . $row->nid, array('absolute' => true)); ?>" target="_blank"></a>
                </div>
            <?php endif ?>

        <?php endif; ?>
    <?php else: ?>
        <?php if (isset($row->field_field_attachment[0])): ?>
            <a target="_blank" href="<?php print $row->field_field_attachment[0]['rendered']['#markup']; ?>" class="news-attachment"><?php print t('Download Attachment'); ?></a>
        <?php endif; ?>
    <?php endif; ?>

<?php endforeach; ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.expanded a').click(function(){
                jQuery('.expanded ul').css("display","block").addClass("current");
            }
        )
    });
</script>
