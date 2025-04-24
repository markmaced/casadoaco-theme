<?php

function cpt_tabelas()
{
    register_post_type('tabelas', [
        'labels' => [
            'name' => 'Tabelas',
            'singular_name' => 'Tabela'
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-table-col-before',
        'supports' => ['title', 'editor']
    ]);
}
add_action('init', 'cpt_tabelas');

function get_theme_image($image_name)
{
  $image_url = home_url() . '/wp-content/themes/casadoaco-theme/resources/images/' . $image_name;

  return $image_url;
}