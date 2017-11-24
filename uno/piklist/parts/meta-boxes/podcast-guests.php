<?php
/*
Title: Guests at Julie in Conversation #motherhood, #let's create a village
Post Type: page
Template: template-podcast-main, template-podcast-main-dev
*/


  piklist('field', array(
      'type' => 'group'
      ,'field' => 'podcast-guests'
      ,'label' => 'List of guests'
      ,'list' => false
      ,'add_more' => true
      ,'description' => 'Add/remove guests by clicking the +/- symbol. Re-arrange them by dragging a guest up or down.'
      ,'fields' => array(
        array(
          'type' => 'text'
          ,'field' => 'guest-name'
          ,'label' => 'Guest Name'
          ,'columns' => 12
          ,'attributes' => array(
            'placeholder' => 'Enter name of who will be next on your show'
          )
        )
        ,array(
          'type' => 'text'
          ,'field' => 'guest-company'
          ,'label' => 'Guest company/website'
          ,'columns' => 12
          ,'attributes' => array(
            'placeholder' => 'e.g. Therapist (www.my-website.com)'
          )
        )
        ,array(
          'type' => 'text'
          ,'field' => 'date'
          ,'label' => 'Date when on-air'
          ,'required' => false
          ,'columns' => 12
          ,'attributes' => array(
            'placeholder' => 'e.g. December 6th'
          )
        )
        ,array(
          'type' => 'file'
          ,'field' => 'image'
          ,'scope' => 'post_meta'
          ,'label' => 'Select guest image'
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
      )
      ,'on_post_status' => array(
        'value' => 'lock'
      )
    ));
?>
