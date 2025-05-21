<?php
add_action('wp_ajax_carregar_campos_calculadora', 'carregar_campos_calculadora_callback');
add_action('wp_ajax_nopriv_carregar_campos_calculadora', 'carregar_campos_calculadora_callback');

function carregar_campos_calculadora_callback()
{
    $post_id = intval($_POST['post_id']);
    $campos = get_field('campos', $post_id);
    $image = get_field('imagem_3d', $post_id);

    echo '<div class="w-full flex justify-center mb-5">';
    echo '<img src="' . $image . '" class="w-1/2 mx-auto border border-[#e8e7e7]">';
    echo '</div>';

    if ($campos) {
        echo '<form id="formCamposCalc" class="space-y-4">';

        $index = 0;

        foreach ($campos as $campo) {
            $label = esc_html($campo['label_do_campo']);
            $tipo = esc_html($campo['tipo_do_campo']);

            $letra = chr(97 + $index);
            $id = 'txt' . $letra;

            if (strtolower($tipo) === 'resultado') {
                echo '<div class="flex flex-col mb-5">';
                echo '<label for="resultado" class="text-sm font-medium text-gray-700 mb-1">' . $label . '</label>';
                echo '<input type="text" id="resultado" class="border rounded px-3 py-2 bg-gray-100" placeholder="-" disabled>';
                echo '</div>';
            } else {
                echo '<div class="flex flex-col">';
                echo '<input type="text" id="' . $id . '" class="w-full border rounded px-3 py-2" placeholder="' . $label . '">';
                echo '</div>';
                $index++;
            }
        }

        echo '<button type="button" id="addToCart" data-dialog-target="animated-modal" class="bg-casadoaco-orange text-white font-noto py-2 px-5 w-full rounded-md cursor-pointer transition-all duration-500 hover:bg-black">Enviar para o carrinho</button>';

        echo '</form>';
    } else {
        echo '<p>Nenhum campo disponível para esta calculadora.</p>';
    }

    wp_die();
}
?>