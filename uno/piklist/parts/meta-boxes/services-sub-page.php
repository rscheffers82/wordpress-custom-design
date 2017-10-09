<?php
/*
Title: Add your Services and content below them
Post Type: page
Template: template-services-sub-page, template-services-sub-page-dev
*/

// piklist('field', array(
//     'type' => 'text'
//     ,'field' => 'demo_text'
//     ,'label' => 'Text Box'
//     ,'description' => 'Field Description'
//     ,'value' => 'Default text'
//     ,'help' => 'This is help text.'
//     ,'attributes' => array(
//       'class' => 'text'
//     )
//   ));
//
// piklist('field', array(
//     'type' => 'select'
//     ,'field' => 'demo_select'
//     ,'label' => 'Select Box'
//     ,'description' => 'Choose from the drop-down.'
//     ,'help' => 'This is help text.'
//     ,'attributes' => array(
//       'class' => 'text'
//     )
//     ,'choices' => array(
//       'option1' => 'Option 1'
//       ,'option2' => 'Option 2'
//       ,'option3' => 'Option 3'
//     )
//   ));
//
// piklist('field', array(
//     'type' => 'colorpicker'
//     ,'field' => 'demo_colorpicker'
//     ,'label' => 'Choose a color'
//     ,'value' => '#aee029'
//     ,'description' => 'Click in the box to select a color.'
//     ,'help' => 'This is help text.'
//     ,'attributes' => array(
//       'class' => 'text'
//     )
//   ));

  piklist('field', array(
      'type' => 'group'
      ,'field' => 'intuition-services'
      ,'label' => 'Intuition services'
      ,'list' => false
      ,'add_more' => true
      ,'description' => 'Add a widget for each service.' // <br/><br/>Lower you can add additional content that will be displayed below the services.'
      ,'fields' => array(
        array(
          'type' => 'text'
          ,'field' => 'title'
          ,'label' => 'Title'
          ,'required' => false
          ,'columns' => 12
          ,'attributes' => array(
            'placeholder' => 'Let\'s get creative...'
          )
        )
        ,array(
          'type' => 'file'
          ,'field' => 'image'
          ,'scope' => 'post_meta'
          ,'label' => 'Select Widget image'
          ,'description' => __('This is the basic upload field.','piklist')
          ,'options' => array(
            'preview_size' => 'thumbnail' //change this i.e 'medium', 'large', 'full' etc
          )
          ,'validate' => array(
            array(
              'type' => 'limit'
              ,'options' => array(
                'min' => 1
                ,'max' => 1
              )
              ,'message' => 'Select only one image!'
            )
          )
        )
        ,array(
          'type' => 'editor'
          ,'field' => 'description'
          ,'label' => 'Type details of the service here.'
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
        ,array(
          'type' => 'text'
          ,'field' => 'price'
          ,'label' => 'Price'
          ,'columns' => 12
          ,'attributes' => array(
            'placeholder' => 'in USD'
          )
        )
        ,array(
          'type' => 'text'
          ,'field' => 'button'
          ,'label' => 'button'
          ,'columns' => 12
          ,'attributes' => array(
            'placeholder' => 'Paste redirect URL here...'
          )
        )
      )
      ,'on_post_status' => array(
        'value' => 'lock'
      )
    ));

    piklist('field', array(
      'type' => 'editor'
      ,'field' => 'text-below-services'
      ,'label' => 'Content below the Services section'
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
    ));
?>
