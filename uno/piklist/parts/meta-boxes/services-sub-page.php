<?php
/*
Title: Specify your packages
Post Type: page
Template: template-services-sub-page, template-services-sub-page-dev
*/

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
            'placeholder' => 'Enter amount (numbers only) - $ ,- will be added.'
          )
        )
      )
      ,'on_post_status' => array(
        'value' => 'lock'
      )
    ));

?>
