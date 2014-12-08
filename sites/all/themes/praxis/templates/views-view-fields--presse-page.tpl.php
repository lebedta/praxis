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



<?php //print $fields['title']->content; ?>
<h3><?php print $fields['title_field']->content; ?></h3>

<?php print $fields['body']->content; ?>
<?php if (count($row->field_field_file)>0): ?>
    <a target="_blank" href="<?php print str_replace('public:/', '/sites/default/files', $row->field_field_file[0]['raw']['uri']); ?>" class="more"><?php print t('Read More'); ?></a>
<?php else: ?>
    <?php if (count($row->field_field_link)>0): ?>
        <a target="_blank" href="<?php print $row->field_field_link[0]['raw']['value']; ?>" class="more"><?php print t('Read More'); ?></a>
    <?php endif; ?>
<?php endif; ?>
<div class="date-author">
    <?php print $fields['created']->content; ?>
    <?php print $fields['field_author']->content; ?>
</div>