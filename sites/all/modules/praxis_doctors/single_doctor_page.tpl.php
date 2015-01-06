<?php
$region = block_get_blocks_by_region('sidebar_second');
$items = field_get_items('node', $doctor, 'title_field');
$name = field_view_value('node', $doctor, 'title_field', $items[0], array(), $lang);
//$items = field_get_items('node', $doctor, 'field_degree');
//$degree = field_view_value('node', $doctor, 'field_degree', $items[0], array(), $lang);
$items = field_get_items('node', $doctor, 'field_position');
$position = field_view_value('node', $doctor, 'field_position', $items[0], array(), $lang);

$image = array(
    'style_name' => 'team_doctor',
    'path' => isset($doctor->field_ph['und']) ? $doctor->field_ph['und'][0]['uri'] : '',
    'width' => '',
    'height' => '',
    'alt' => render($name)

);

$translations = array(
    'en' => array(
        'Doctors' => 'Doctors',
        'Therapist' => 'Therapist'
    ),
    'de' => array(
        'Doctors' => 'Ärzte',
        'Therapist' => 'Therapeuten'
    ),
);

$br = array();
$br[] = l(t('Home'), '<front>');
$br[] = l(t('Team'), 'team/doctors');
if ($doctor->field_type['und'][0]['value'] == 'Arzte'){
    $br[] = l($translations[$lang]['Doctors'], 'team/doctors');
  $link = 'team/doctors';
}
else{
    $br[] = l($translations[$lang]['Therapist'], 'team/therapists');
  $link = 'team/therapists';
}

$br[] = l($name['#markup'], $link .'/'.getDoctorSlug($doctor));
    $link = $link .'/'.getDoctorSlug($doctor);
if (isset($page)){

    $items = field_get_items('node', $page, 'field_button_title');
    $title = field_view_value('node', $page, 'field_button_title', $items[0], array(), $lang);

    $br[] = l($title['#title'], $link . "/page/".getDoctorPageSlug($page));
}
drupal_set_breadcrumb($br);

$hospitals = array();
if ($items = field_get_items('node', $doctor, 'field_hospitals')){
    foreach ($items as $item){
        $hospitals[] = field_view_value('node', $doctor, 'field_hospitals', $item, array(), $lang);
    }
}

$items = field_get_items('node', $doctor, 'field_email');
$email = field_view_value('node', $doctor, 'field_email', $items[0], array(), $lang);

$items = field_get_items('node', $doctor, 'field_press');
$press = field_view_value('node', $doctor, 'field_press', $items[0], array(), $lang);

$items = field_get_items('node', $doctor, 'field_description');
$description = field_view_value('node', $doctor, 'field_description', $items[0], array(), $lang);

$educations = array();
if ($items = field_get_items('node', $doctor, 'field_education')){
    foreach ($items as $item){
        $educations[] = field_view_value('node', $doctor, 'field_education', $item, array(), $lang);
    }
}


$training = array();
if ($items = field_get_items('node', $doctor, 'field_training')){
    foreach ($items as $item){
        $training[] = field_view_value('node', $doctor, 'field_training', $item, array(), $lang);
    }
}

$honors = array();
if ($items = field_get_items('node', $doctor, 'field_honors')){
    foreach ($items as $item){
        $honors[] = field_view_value('node', $doctor, 'field_honors', $item, array(), $lang);
    }
}

$certifications = array();
if ($items = field_get_items('node', $doctor, 'field_certification')){
    foreach ($items as $item){
        $certifications[] = field_view_value('node', $doctor, 'field_certification', $item, array(), $lang);
    }
}
$memberships = array();
if ($items = field_get_items('node', $doctor, 'field_membership')){
    foreach ($items as $item){
        $memberships[] = field_view_value('node', $doctor, 'field_membership', $item, array(), $lang);
    }
}

if ($item = field_get_items('node', $doctor, 'field_main_subject')){
    $subject = field_view_value('node', $doctor, 'field_main_subject', $item[0], array(), $lang);
}

$subjects = array();
if ($items = field_get_items('node', $doctor, 'field_subjects')){
    foreach ($items as $item){
        if ($item['nid'] != $subject['#options']['entity']->nid){
            $subjects[] = field_view_value('node', $doctor, 'field_subjects', $item, array(), $lang);
        }

    }
}


$pref = $lang != 'en' ? "/".$lang : "";

?>

<div class="doctor">
    <div class="wrap">

        <div class="left-column-single-doctors">
            <div class="doctor-img-wrap">
                <a class="lightbox" rel="lightbox" href="<?php print file_create_url(isset($doctor->field_ph['und']) ? $doctor->field_ph['und'][0]['uri'] : ''); ?>">
                    <?php print theme('image_style', $image); ?>
                </a>
            </div>
            <ul class="editing-nav">
                <?php if ( (($user->uid == $doctor->uid && $user->uid != 0) || in_array('administrator', array_values($user->roles)) || in_array('Super admin', array_values($user->roles)))): ?>
                    <li class="edit-btn"><a href="<?php print $pref ?>/node/<?php print ($page ? $page->nid : $doctor->nid) ?>/edit<?php if ($page): ?>?nid=<?php print $doctor->nid ?><?php endif; ?>"><?php print t('Edit'); ?></a></li>
                <?php endif; ?>
                <?php if ($page && (($user->uid == $doctor->uid && $user->uid != 0) || in_array('administrator', array_values($user->roles)) || in_array('Super admin', array_values($user->roles)))): ?>
                    <li class="remove-btn"><a href="<?php print $pref ?>/node/<?php print ($page ? $page->nid : $doctor->nid) ?>/delete"><?php print t('Delete'); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="brief-info">
            <h2 class="name"><?php print render($name); ?></h2>
            <ul class="hospitals">
                <li style="font-weight: bold;"><?php print render($subject); ?></li>
                <?php foreach($subjects as $value): ?>
                    <li><?php print render($value); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="doctors-links-block">
            <div class="position"><?php print nl2br($position['#markup']) ?></div>
            <ul class="links">
                <li <?php if (!$page): ?>class="active" <?php endif; ?>>
                    <?php if ($page): ?>
                        <a href="<?php print $pref . "/". $link ?>"><?php print t('Curriculum Vitae'); ?></a>
                    <?php else: ?>
                        <?php if(isset($doctor->metatags[$lang]) && $doctor->metatags[$lang]['keywords']['value'] != ''){
                            $system_meta2 = array(
                                '#type' => 'html_tag',
                                '#tag' => 'meta',
                                '#attributes' => array(
                                    'name' => 'keywords',
                                    'content' => $doctor->metatags[$lang]['keywords']['value'],
                                ));
                            drupal_add_html_head($system_meta2, 'my_meta');
                        }

                        if(isset($doctor->metatags[$lang]) && $doctor->metatags[$lang]['description']['value'] != ''){
                            $system_meta1 = array(
                                '#type' => 'html_tag',
                                '#tag' => 'meta',
                                '#attributes' => array(
                                    'name' => 'description',
                                    'content' => $doctor->metatags[$lang]['description']['value'],
                                ));
                            drupal_add_html_head($system_meta1, 'my_meta1');
                        } ?>
                        <?php print t('Curriculum Vitae'); ?>
                    <?php endif; ?>
                </li>
                <?php foreach($pages as $value): ?>
                    <?php

                    $items = field_get_items('node', $value, 'field_button_title');
                    $title = field_view_value('node', $value, 'field_button_title', $items[0], array(), $lang);
                    if ($page && $page->nid == $value->nid){
                        $class = 'active';
                        $head_title =  drupal_get_title().' | ';
                        drupal_set_title($head_title.$title['#title']);

                        if(isset($value->metatags[$lang]) && $value->metatags[$lang]['keywords']['value'] != ''){
                            $system_meta2 = array(
                                '#type' => 'html_tag',
                                '#tag' => 'meta',
                                '#attributes' => array(
                                    'name' => 'keywords',
                                    'content' => $value->metatags[$lang]['keywords']['value'],
                                ));
                            drupal_add_html_head($system_meta2, 'my_meta');
                        }

                        if(isset($value->metatags[$lang]) && $value->metatags[$lang]['description']['value'] != ''){
                            $system_meta1 = array(
                                '#type' => 'html_tag',
                                '#tag' => 'meta',
                                '#attributes' => array(
                                    'name' => 'description',
                                    'content' => $value->metatags[$lang]['description']['value'],
                                ));
                            drupal_add_html_head($system_meta1, 'my_meta1');
                        }
                    }
                    else{
                        $class = '';
                    }
                    ?>
                    <li class="<?php print $class; ?>">
                        <?php if ($page && $page->nid == $value->nid): ?>
                            <?php print isset($title['#title']) ? $title['#title'] : ""; ?>
                        <?php else: ?>

                            <a href="<?php print $pref ?>/team/doctors/<?php print getDoctorSlug($doctor); ?>/page/<?php print getDoctorPageSlug($value) ?>/"><?php print isset($title['#title']) ? $title['#title'] : ""; ?></a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                <?php if ((($user->uid == $doctor->uid && $user->uid != 0) || in_array('administrator', array_values($user->roles)) || in_array('Super admin', array_values($user->roles))) && count($pages)<4): ?>
                    <li><a href="/node/add/doctor-page?nid=<?php print $doctor->nid; ?>"><?php print t('Add page'); ?></a></li>
                <?php endif; ?>
            </ul>

            <div class="email"><a href="mailto:<?php print render($email); ?>"><?php print render($email); ?></a></div>

        </div>

    </div>


    <div class="main-content">
        <?php if($page): ?>
            <?php
            $items = field_get_items('node', $page, 'body');
            $body = field_view_value('node', $page, 'body', $items[0], array(), $lang);
            ?>
            <div class="page-body"><?php print render($body); ?></div>
        <?php else: ?>
            <?php
            $items = field_get_items('node', $doctor, 'body');
            $body = field_view_value('node', $doctor, 'body', $items[0], array(), $lang);
            ?>
            <div class="page-body"><?php print render($body); ?></div>
        <div class="description"><?php print render($description); ?></div>
            <?php if (count($educations)>0): ?>
                <h3><?php print t("Education"); ?></h3>
                <ul class="education list">
                    <?php foreach ($educations as $value): ?>
                        <li><?php print render($value); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (count($training)>0): ?>
                <h3><?php print t("Training") ?></h3>
                <ul class="trainings list">
                    <?php foreach ($training as $value): ?>
                        <li><?php print render($value); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (count($certifications)>0): ?>
                <h3><?php print t("Licensure and Board Certification") ?></h3>
                <ul class="certifications list">
                    <?php foreach ($certifications as $value): ?>
                        <li><?php print render($value); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (count($memberships)>0): ?>
                <h3><?php print t("Membership") ?></h3>
                <ul class="certifications list">
                    <?php foreach ($memberships as $value): ?>
                        <li><?php print render($value); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if (count($honors)>0): ?>
                <h3><?php print t("Honors") ?></h3>
                <ul class="honors list">
                    <?php foreach ($honors as $value): ?>
                        <li><?php print render($value); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        <?php endif; ?>
    </div>
    <div id="inner-sidebar-second" class="column sidebar specialities-page-sidebar"><div class="section">
            <?php print render($region); ?>
    </div></div>
</div>
