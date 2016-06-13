## Faq plugin ##
 - Contributors: (this should be a list of wordpress.org userid's)
 - Donate link: https://pledgie.com/campaigns/31846
 - Tags: faq, wordpress,plugin
 - Requires at least: 4.5.2
 - Tested up to: 4.5.2
 - Stable tag: 4.5.2
 - License: GPLv2 or later
 - License URI: http://www.gnu.org/licenses/gpl-2.0.html

[https://styleci.io/repos/61020559/shield](https://styleci.io/repos/61020559/shield)

Description
-----------

Minimal FAQ plugin for wordpress
add FAQ custom post type

Installation
------------

This section describes how to install the plugin and get it working.

1. Activate the plugin through the 'Plugins' menu in WordPress


      <?php
      $query_args = array(
        'post_type' => 'faq'
      );
      // create a new instance of WP_Query
      $the_query = new WP_Query( $query_args );
      ?>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
      <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
        <?php
        get_template_part('templates/panel', 'faq');
        ?>
        <?php endwhile; endif; ?>
        </div>

Changelog
---------

1.0

Initial plugin.
Add documentation
