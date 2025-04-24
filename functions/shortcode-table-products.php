<?php

function shortcode_tabela_produto($atts)
{
    $atts = shortcode_atts(['id' => ''], $atts);
    $post = get_post($atts['id']);
    if ($post && $post->post_type === 'tabelas') {
        return apply_filters('the_content', $post->post_content);
    }
    return 'Tabela não encontrada.';
}
add_shortcode('tabela_produto', 'shortcode_tabela_produto');