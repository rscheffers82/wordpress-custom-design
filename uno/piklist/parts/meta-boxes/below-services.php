<?php
/*
Title: Content below the packages
Post Type: page
Template: template-services-sub-page, template-services-sub-page-dev
*/

// piklist('field', array(
//   'type' => 'editor'
//   ,'field' => 'content_below_packages'
//   ,'label' => 'Post Content'
// ));

piklist('field', array(
    'type' => 'group'
    ,'field' => 'group-below-packages'
    ,'columns' => 12
    ,'template' => 'field'
    ,'fields' => array(
      array(
        'type' => 'editor'
        ,'field' => 'content_below_packages'
        ,'columns' => 12
        ,'options' => array(
          'wpautop' => true
          ,'media_buttons' => false
          ,'tabindex' => ''
          ,'editor_css' => ''
          ,'editor_class' => ''
          ,'teeny' => false
          ,'dfw' => false
          ,'tinymce' => true
          ,'quicktags' => true
        )
      )
    )
  ));
?>
