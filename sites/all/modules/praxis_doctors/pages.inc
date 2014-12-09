<?php



function team_view($type){
    global $language;
    $types = array(
        'staff' => array( 'en' => 'Our team', 'de' => 'Praxisteam', 'type' => 'Praxis team'),
        'doctors' => array('en' => 'Doctors', 'de' => 'Ärzte', 'type' => 'Arzte'),
        'therapists' => array('en' => 'Therapists', 'de' => 'Therapeuten', 'type' => 'Terapeuten')
    );

    $res = array();
    $js = array();
    $GLOBALS['page_type'] = $type;
    if ($type == 'staff'){
        $terms = taxonomy_get_tree(8, 0, null, true);
        $arr = array('' => 'Uncategorized');
        foreach($terms as $value){
            $term = i18n_taxonomy_term_get_translation($value, $language->language);

            $arr[$term->tid] = $term->name;
        }
//        asort($arr);


        $nodes = node_load_multiple(array(), array('type' => 'team_staff', 'status' => 1));

        $i=0;
        foreach($nodes as $node){
            $f = false;
            if (isset($node->field_category['und'])){
                foreach($node->field_category['und'] as $value){
                    $term = taxonomy_term_load($value['tid']);
                    $translation = i18n_taxonomy_term_get_translation($term, $language->language);
                    if (!isset($res[$translation->tid])){
                        $js[slug($arr[$translation->tid])] = $i;
                        $i++;
                    }
                    $res[$translation->tid][] = $node;
                }
            }
            else{
                $res[''][] = $node;
            }
        }
        drupal_set_title($types[$type][$language->language]);
    }
    else{
        $specialities = node_load_multiple(array(), array('type' => 'specialties_page', 'status' => 1));
        $arr = array();
        foreach($specialities as $speciality){
            $arr[$speciality->nid] = isset($speciality->title_field[$language->language]) ? $speciality->title_field[$language->language][0]['value'] : $speciality->title;
        }
        $arr[''] = 'Uncategorized';

        asort($arr);

        $nodes = node_load_multiple(array(), array('type' => 'doctor_biography', 'status' => 1));
        $i =0;
        foreach ($nodes as $node){
            $f = false;
            if($node->field_type['und'][0]['value'] == $types[$type]['type']){
                if ($item = field_get_items('node', $node, 'field_main_subject')){
                    $subject_id = $item[0]['nid'];
                    if (!isset($res[$subject_id])){
                        $js[slug($arr[$subject_id])] = $i;
                        $i++;
                        $res[$subject_id] = array();
                    }
                    if (!in_array($node, $res[$subject_id])){
                        $res[$subject_id][] = $node;
                    }

                }
                else{
                    $f = true;
                }

                if ($f){
                    $res[''][] = $node;
                }
            }
//            if ($type == 'doctors'){
//                drupal_set_title("Ärzte");
//            }
//            else{
                drupal_set_title($types[$type][$language->language]);
//            }
        }
    }






//    drupal_debug($nodes[0]);


    $some_data = array();
    foreach($arr as $key=>$value){
        $some_data[$key] = $value;
    }
    $GLOBALS['some_data'] = $some_data;
    uksort($res, "cmp_items");


    drupal_add_js(array('ids' => $js), 'setting');
    drupal_add_js('/misc/ui/jquery.ui.core.min.js');
    drupal_add_js('/misc/ui/jquery.ui.widget.min.js');
    drupal_add_js('/misc/ui/jquery.ui.accordion.min.js');
    drupal_add_css('/misc/ui/jquery.ui.core.css');
    drupal_add_css('/misc/ui/jquery.ui.accordion.css');
    $output = theme('doctors_page', array(
        'type' => $type,
        'data' => $res,
        'terms' => $arr,
        'image_field' => $type == 'staff' ? 'field_photo' : 'field_ph',
        'is_staff' => $type == 'staff' ? true : false,
        'lang' => $language->language));
    return $output;
}

//function cmp_items($a, $b){
//    $stuff_weights = array(
//        '' => 10,
//        40 => 0,
//        38 => 1,
//        42 => 2,
//        43 => 3
//    );
//    if (!isset($GLOBALS['some_data'])) return 0;
//    if ($GLOBALS['page_type'] == 'staff'){
//        return $stuff_weights[$a] >= $stuff_weights[$b] ? 1 : -1;
//    }
//    else{
//        return $GLOBALS['some_data'][$a] >= $GLOBALS['some_data'][$b] ? 1 : -1;
//    }
//}

function doctor_view($id){
    global $user;
    global $language;
    $node = node_load($id);
    if (!$node){
        drupal_not_found();
    }
    $query = new EntityFieldQuery();
    $entities = $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'doctor_page')
        ->fieldCondition('field_biografy_page','value', $id, '=')
        ->pager(5)
        ->execute();

    $nodes = isset($entities['node']) ? node_load_multiple(array_keys($entities['node'])) : array();
    menu_tree_set_path('main-menu','team/doctors');


    $output = theme('single_doctor_page', array(
        'doctor'=>$node,
        'pages' => $nodes,
        'lang' => $language->language,
        'user' => $user
    ));
    return $output;
}

function doctor_view_page($bio_id, $page_slug){
    global $user;
    global $language;
    $bio = node_load($bio_id);

    $query = new EntityFieldQuery();
    $entities = $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'doctor_page')
        ->fieldCondition('field_biografy_page','value', $bio_id, '=')
        ->fieldCondition('field_slug','value', $page_slug, '=')
        ->execute();

    $temp = $entities['node'];

    $page_id = reset($temp)->nid;

    $query = new EntityFieldQuery();
    $entities = $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'doctor_page')
        ->fieldCondition('field_biografy_page','value', $bio_id, '=')
        ->pager(5)
        ->execute();

    $nodes = node_load_multiple(array_keys($entities['node']));

    $page = isset($nodes[$page_id]) ? $nodes[$page_id] : false;

    if (!$bio || !$page){
        drupal_not_found();
    }
    $items = field_get_items('node', $bio, 'title_field');
    $name = field_view_value('node', $bio, 'title_field', $items[0], array(), $language->language);

    menu_tree_set_path('main-menu','team/doctors');

    $output = theme('single_doctor_page', array('doctor'=>$bio, 'pages' => $nodes, 'lang' => $language->language, 'user' => $user, 'page' => $page));
    return $output;
}

