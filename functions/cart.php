<?php
add_action('wp_ajax_enviar_carrinho', 'enviar_carrinho');
add_action('wp_ajax_nopriv_enviar_carrinho', 'enviar_carrinho');

function enviar_carrinho()
{
    if (isset($_POST['cart'])) {
        $cart = json_decode(stripslashes($_POST['cart']), true); // Decodifica JSON

        foreach ($cart as $index => $product) {
            ?>
            <div class="grid grid-cols-12 items-start gap-2 mb-4">
                <div class="col-span-1 text-orange-500 font-bold flex items-center gap-1">
                    <button type="button" class="decrease-qty text-casadoaco-orange cursor-pointer" data-cartid="<?php echo $product['cartId']?>">-</button>
                    <p class="text-black font-noto" id="qtd"><?php echo $product['quantidade']?></p>
                    <button type="button" class="increase-qty text-casadoaco-orange cursor-pointer" data-cartid="<?php echo $product['cartId']?>">+</button>
                </div>
                <div class="col-span-11">
                    <div class="flex">
                        <div class="w-[6%]">
                            <img src="<?php echo get_theme_image('edit.png') ?>">
                        </div>
                        <div class="w-[94%]">
                            <p class="font-semibold font-rockstar"><?php echo $product['formato'] . ' - ' . $product['material'] ?>
                            </p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 font-noto">
                        <?php
                        echo "Medidas: ";
                        foreach ($product['medidas'] as $medida) {
                            if (!empty($medida['value'])) {
                                echo '<strong>' . esc_html($medida['label']) . "</strong>: " . esc_html($medida['value']) . " ";
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <?php
        }
    }
    wp_die();
}