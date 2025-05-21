<?php
add_action('wp_ajax_enviar_carrinho', 'enviar_carrinho');
add_action('wp_ajax_nopriv_enviar_carrinho', 'enviar_carrinho');

function enviar_carrinho() {
    if(isset($_POST['cart'])) {
        $cart = json_decode(stripslashes($_POST['cart']), true); // Decodifica JSON

        foreach($cart as $index => $product) {
            $numero = $index + 1;
            ?>
            <div class="grid grid-cols-12 items-start gap-2 mb-4">
                <div class="col-span-1 text-orange-500 font-bold"><?php echo $numero; ?> -</div>
                <div class="col-span-11">
                    <div class="flex">
                        <div class="w-[6%]">
                            <img src="<?php echo get_theme_image('edit.png') ?>">
                        </div>
                        <div class="w-[94%]">
                            <p class="font-semibold font-rockstar">Produto #<?php echo $numero; ?></p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 font-noto">
                        <?php
                        echo "Material: " . esc_html($product['material']) . "<br>";
                        echo "Formato: " . esc_html($product['formato']) . "<br>";

                        echo "Medidas:<br>";
                        foreach($product['medidas'] as $medida) {
                            echo esc_html($medida['label']) . ": " . esc_html($medida['value']) . "<br>";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <?php
        }
    }
    wp_die(); // Importante para terminar a requisição
}