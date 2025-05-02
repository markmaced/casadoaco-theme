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

function registrar_cpt_produtos() {
    $labels = array(
        'name'               => 'Produtos',
        'singular_name'      => 'Produto',
        'menu_name'          => 'Produtos',
        'name_admin_bar'     => 'Produto',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Produto',
        'new_item'           => 'Novo Produto',
        'edit_item'          => 'Editar Produto',
        'view_item'          => 'Ver Produto',
        'all_items'          => 'Todos os Produtos',
        'search_items'       => 'Buscar Produtos',
        'not_found'          => 'Nenhum produto encontrado',
        'not_found_in_trash' => 'Nenhum produto na lixeira',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'produtos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true, // Habilita o uso com o editor de blocos (Gutenberg)
    );

    register_post_type('produtos', $args);
}
add_action('init', 'registrar_cpt_produtos');

// Função para registrar a taxonomia "Categorias de Produtos"
function registrar_taxonomia_produtos_categoria() {
    $labels = array(
        'name'              => 'Categorias de Produtos',
        'singular_name'     => 'Categoria de Produto',
        'search_items'      => 'Buscar Categorias de Produtos',
        'all_items'         => 'Todas as Categorias',
        'parent_item'       => 'Categoria Pai',
        'parent_item_colon' => 'Categoria Pai:',
        'edit_item'         => 'Editar Categoria',
        'update_item'       => 'Atualizar Categoria',
        'add_new_item'      => 'Adicionar Nova Categoria',
        'new_item_name'     => 'Nome da Nova Categoria',
        'menu_name'         => 'Categorias de Produtos',
    );

    $args = array(
        'hierarchical'      => true, // Habilita a estrutura hierárquica (como categorias de posts)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true, // Habilita a taxonomia no editor de blocos
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-produto'),
    );

    register_taxonomy('categoria_produto', 'produtos', $args);
}
add_action('init', 'registrar_taxonomia_produtos_categoria');

// Função para registrar a taxonomia "Lojas"
function registrar_taxonomia_lojas() {
    $labels = array(
        'name'              => 'Lojas',
        'singular_name'     => 'Loja',
        'search_items'      => 'Buscar Lojas',
        'all_items'         => 'Todas as Lojas',
        'parent_item'       => 'Loja Pai',
        'parent_item_colon' => 'Loja Pai:',
        'edit_item'         => 'Editar Loja',
        'update_item'       => 'Atualizar Loja',
        'add_new_item'      => 'Adicionar Nova Loja',
        'new_item_name'     => 'Nome da Nova Loja',
        'menu_name'         => 'Lojas',
    );

    $args = array(
        'hierarchical'      => false, // false para funcionar como tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true, // Habilita no editor de blocos
        'query_var'         => true,
        'rewrite'           => array('slug' => 'lojas'),
    );

    register_taxonomy('lojas', 'produtos', $args);
}
add_action('init', 'registrar_taxonomia_lojas');