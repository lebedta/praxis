<?php

/**
 * Add body classes if certain regions have content.
 */
function praxis_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_js(path_to_theme() . '/js/menu.js');
    drupal_add_js(path_to_theme() . '/js/jquery.validate.js');
    drupal_add_js(path_to_theme() . '/js/forms.js');

    if (count($variables['head_title_array']) > 1){
        $variables['head_title'] = $variables['head_title_array']['title'] .  " | " . $variables['head_title_array']['name'];
//        $variables['head_title'] =   $variables['head_title_array']['title'] .  " | " . "Praxis am Bahnhof";
    }
    elseif(count($variables['head_title_array']) == 1 && $variables['is_front']){
        $variables['head_title'] = "Home" . " | " . $variables['head_title_array']['name'];
//$system_meta_keywords = array(
//       '#type' => 'html_tag',
//       '#tag' => 'meta',
//       '#attributes' => array(
//           'name' => 'keywords',
//           'content' => 'Arztpraxis, Rüti, Dürnten, Bubikon, Wald, Oberdürnten, Wolfhausen, Notfallarzt, Notarzt, Jona, Rapperswil, Notfall, Notfalldienst, Notfallmedizin, medizinischer Notfall, Arzt, Notfallnummern, Spitalnummern, Spitäler',
//          ),
//       );
//
//        $system_meta_description = array(
//        '#type' => 'html_tag',
//        '#tag' => 'meta',
//        '#attributes' => array(
//            'name' => 'description',
//            'content' => 'Die Praxis am Bahnhof direkt neben dem Bahnhof Rüti hat 365 Tage von 8 - 20 Uhr geöffnet!',
//        ),
//        );
//
//        drupal_add_html_head($system_meta_description, 'my_meta');
//        drupal_add_html_head($system_meta_keywords, 'my_meta');
    }
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function praxis_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function praxis_process_page(&$variables) {


  if (isset($variables['node']))
  {
      $variables['theme_hook_suggestions'][] = "page__node__".$variables['node']->type;
  }

    if (isset($variables['theme_hook_suggestions'][1])){
        if (($variables['theme_hook_suggestions'][1] == 'page__team__therapists' || $variables['theme_hook_suggestions'][1] == 'page__team__doctors') && isset($variables['theme_hook_suggestions'][2])){
            $variables['theme_hook_suggestions'][] = "page__single__doctor__page";
        }
    }
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
   // Get the entire main menu tree
  $main_menu_tree = menu_tree_all_data('main-menu');

  // Add the rendered output to the $main_menu_expanded variable
  $variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);

}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function praxis_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'praxis') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function praxis_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function praxis_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
    $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->nid;
  }
    if ($variables['type'] == 'specialties_page' || $variables['type'] == 'sub_specialties' || $variables['type'] == 'subject' || $variables['node']->nid == 282){
        if ($blocks = block_get_blocks_by_region('sidebar_second')){
            $variables['region']['sidebar_second'] = $blocks;
        }
        else{
            $variables['region']['sidebar_second'] = array();
        }
    }
    if ($variables['type'] == 'specialties_page' || $variables['node']->nid == 282){
        if ($blocks = block_get_blocks_by_region('subject_bottom')){
            $variables['region']['subject_bottom'] = $blocks;
        }
        else{
            $variables['region']['subject_bottom'] = array();
        }
    }
}

/**
 * Override or insert variables into the block template.
 */
function praxis_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

function praxis_preprocess_menu_tree(&$variables){
    if ($variables){

    }
}

/**
 * Implements theme_menu_tree().
 */
function praxis_menu_tree($variables) {
    if (strpos($variables['tree'],'active') !== false){
        $class = 'active';
    }
    else{
        $class = '';
    }
  return '<ul class="menu clearfix '. $class .'">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function praxis_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}



function praxis_menu_link($variables){
//    return theme_menu_link($variables);
    $element = $variables['element'];
    $sub_menu = '';

    $element['#attributes']['class'][] = 'depth-' . $element['#original_link']['depth'];

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }

    if (strpos($sub_menu,'active') !== false){
        $class = 'active';
    }
    else{
        $class = '';
    }
    $options = $element['#localized_options'];
    $options['attributes']['class'][] = $class;
    $output = l($element['#title'], $element['#href'], $options);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";

}

function praxis_theme(&$existing, $type, $theme, $path) {
    $hooks['user_login'] = array(
        'template' => 'templates/user_login',
        'render element' => 'form',
        // other theme registration code...
    );
    return $hooks;
}
function praxis_preprocess_user_login(&$variables) {

    //$variables['rendered'] = drupal_render_children($variables['form']);
}

function praxis_status_messages(&$variables){
    $display = $variables['display'];
    $output = '';

    $status_heading = array(
        'status' => t('Status message'),
        'error' => t('Error message'),
        'warning' => t('Warning message'),
    );
    foreach (drupal_get_messages($display) as $type => $messages) {
        if (!user_access('administer') && $type == 'warning') {
            continue;
        }
        $t_message = "<div class=\"messages $type\">\n";
        if (!empty($status_heading[$type])) {
            $t_message .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
        }

        //<em class="placeholder">Warning</em>: file_get_contents(/misc/ui/jquery.ui.widget.min.js): failed to open stream: No such file or directory in <em class="placeholder">_locale_parse_js_file()</em> (line <em class="placeholder">1488</em> of <em class="placeholder">/Users/chioshinu/projects/praxis/includes/locale.inc</em>).
        if (count($messages) > 1) {
            $t_message .= " <ul>\n";
            $l_message = "";
            foreach ($messages as $message) {
                if (strpos($message, "file_get_contents(/misc/ui/jquery.ui") === false){
                    $l_message .= '  <li>' . $message . "</li>\n";
                }
            }
            if ($l_message != ""){
                $t_message .= $l_message . " </ul>\n";
            }
            else{
                continue;
            }
        }
        else {
            $t_message .= $messages[0];
        }
        $output .= $t_message  . "</div>\n";
    }
    return $output;
}
