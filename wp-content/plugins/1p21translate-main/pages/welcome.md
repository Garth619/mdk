<!---DO NOT EDIT welcome.html as it is being compiled based on the contents of its .md counterpart file. Edit .md instead with a compiler such as codekit. -->

<style>
    pre {
        max-height: 30em;
        width:40em;
        max-width:100%;
        overflow:auto;
    }
    pre code {
        background:none;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 2em;
    }
    h1 code,
    h2 code,
    h3 code,
    h4 code,
    h5 code,
    h6 code {
        font-size: 1em;
    }
</style>

<h1><big>Welcome to iLawyer Translation Plugin!</big></h1>

Here's how to setup translations:

1.  If you're setting up on a new site or one without translations setup, proceeed to the next step. For older setups that may have an older form of iLawyer translations, double check to make sure no template part or source code in the theme uses the following functions. If these exist or are declared in the theme functions, remove the declarations in `functions.php` and modify found instances to have their parameters setup to support [the functions included in the plugin](/wp-admin/admin.php?page=ilaw-translation-docs). 

    *   `ilaw_get_translation` -> [`ilaw_tr_parse`](/wp-admin/admin.php?page=ilaw-translation-docs#ilaw_tr_parsearraydataarray) function is recommended
    *   `ilaw_the_translation` -> [`ilaw_tr_parse`](/wp-admin/admin.php?page=ilaw-translation-docs#ilaw_tr_parsearraydataarray) function is recommended
    *   `ilaw_is_lang` -> [`is_lang`](/wp-admin/admin.php?page=ilaw-translation-docs#is_langstringlanguage_post_typeintidnull) function is recommended
    *   `is_spanish` -> [`is_lang`](/wp-admin/admin.php?page=ilaw-translation-docs#is_langstringlanguage_post_typeintidnull) function is recommended (WARNING: this may or may not be declared from the iLawyer custom theme itself. Evaluate if needed to be modified first)
    *   `is_lang` -> [`is_lang`](/wp-admin/admin.php?page=ilaw-translation-docs#is_langstringlanguage_post_typeintidnull) function is recommended (WARNING: this may or may not be declared from the iLawyer custom theme itself. Evaluate if needed to be modified first)

2.  <a href="https://developer.wordpress.org/reference/functions/register_post_type/" target="_blank">Register your custom post type</a> for your chosen language/s. For example, here's a quick snippet to setup for Spanish pages/post types:

    ```php
    add_action( 'init', 'ilaw_register_cpts' );
    function ilaw_register_cpts() {

        // Verbiage for admin pages
        $labels = array( 

            'name' => _x( 'Spanish Pages', 'espanol' ),
            'singular_name' => _x( 'Spanish Page', 'espanol' ),
            'add_new' => _x( 'Add New', 'espanol' ),
            'add_new_item' => _x( 'Add New Spanish Page', 'espanol' ),
            'edit_item' => _x( 'Edit Spanish Page', 'espanol' ),
            'new_item' => _x( 'New Spanish Page', 'espanol' ),
            'view_item' => _x( 'View Spanish Page', 'espanol' ),
            'search_items' => _x( 'Search Spanish Pages', 'espanol' ),
            'not_found' => _x( 'No Spanish Page found', 'espanol' ),
            'not_found_in_trash' => _x( 'No Spanish Page found in Trash', 'espanol' ),
            'parent_item_colon' => _x( 'Parent Spanish Page:', 'espanol' ),
            'menu_name' => _x( 'Spanish Page', 'espanol' ),
        );

        
        //set it all up
        $args = array( 
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'Published & protected Spanish Page',
            'supports' => array( 'title', 'editor', 'excerpt', 'revisions','thumbnail','page-attributes'),
            'taxonomies' => array( 'espanol_category' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-media-document',
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => false,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => array(
                'slug'=>'es',
                'with_front'=> false,
                'feed'=> false,
                'pages'=> true
            ),
            'capability_type' => 'page'
        );

        register_post_type( 'es', $args );
    }
    ```
    
3.  [Setup the Custom post types](/wp-admin/admin.php?page=ilaw-translation-config) to enable the translation setup to.

4.  [Setup the verbaige for the translation](/wp-admin/admin.php?page=ilaw-translation-text)

5.  [Create and Setup menus](/wp-admin/nav-menus.php) for the registered translates versions

6.  Setup [Gravity forms for translation](/wp-admin/admin.php?page=gf_edit_forms). 
    1.  Optional. If you would like to override the header error validation on gravity forms, [setup a translation row](/wp-admin/admin.php?page=ilaw-translation-text) with the [prebuilt key](/wp-admin/admin.php?page=ilaw-translation-docs#pre-builttranslations) `ilaw_tr_gform_validation_message`
    2.  Admin > Forms > Hover over form > Duplicate > Edit new duplicate form.
    3.  Translate the following:
        *   each field labels
        *   each field placeholders
        *   each field validation messages
        *   each field choices (if applicable)
    4.  While in edit form page go to Settings > Form Settings
    5.  Translate the following
        *   Form title
        *   Description
        *   Button Text
        
7.  If applicable, [Setup sidebars](/wp-admin/admin.php?page=ilaw-sidebar-options) for language cpts and add appropriate navigation menu widgets in [the admin widget settings](/wp-admin/widgets.php)

9.  Modify theme templates to output the translations

    1.   [`ilaw_tr_menu_location`](/wp-admin/admin.php?page=ilaw-translation-docs#ilaw_tr_menu_locationstringmenu_name) for menu locations (NOTE: this only works if menus are setup using the `init` action hook)
        
    2.   [`ilaw_get_translation`](/wp-admin/admin.php?page=ilaw-translation-docs#ilaw_get_translationstringkey) For setup text translations from step 3
    
    3.   [`ilaw_tr_parse`](/wp-admin/admin.php?page=ilaw-translation-docs#ilaw_tr_parsearraydataarray) For basic text strings, acf fields aside from those in step 3, or gravity forms, etc..

    More functions that can be utilized can be found here: [helpers installed with the plugin](/wp-admin/admin.php?page=ilaw-translation-docs#functions).

    4.   NOTE: On your `header.php` template/s . make sure [`<?php language_attributes() ?>`](https://developer.wordpress.org/reference/functions/language_attributes/) is being called AND there are no hardcoded `lang` attributes