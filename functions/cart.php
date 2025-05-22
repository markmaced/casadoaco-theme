<?php
add_action('wp_ajax_enviar_carrinho', 'enviar_carrinho');
add_action('wp_ajax_nopriv_enviar_carrinho', 'enviar_carrinho');

function enviar_carrinho()
{
    if (isset($_POST['cart'])) {
        $cart = json_decode(stripslashes($_POST['cart']), true);

        foreach ($cart as $index => $product) {
            ?>
            <div class="grid grid-cols-12 items-start gap-2 mb-4">
                <div class="md:col-span-1 col-span-2 text-orange-500 font-bold flex items-center gap-1.5">
                    <button type="button" class="decrease-qty text-casadoaco-orange cursor-pointer"
                        data-cartid="<?php echo $product['cartId'] ?>">-</button>
                    <p class="text-black font-noto" id="qtd"><?php echo $product['quantidade'] ?></p>
                    <button type="button" class="increase-qty text-casadoaco-orange cursor-pointer"
                        data-cartid="<?php echo $product['cartId'] ?>">+</button>
                </div>
                <div class="md:col-span-11 col-span-10">
                    <div class="flex">
                        <div class="flex w-[95%] md:items-center md:gap-0 gap-2">
                            <div class="w-[6%] md:block hidden">
                                <img src="<?php echo get_theme_image('edit.png') ?>" class="md:mt-0 mt-1">
                            </div>
                            <div class="md:w-[94%] w-full">
                                <p class="font-semibold font-rockstar">
                                    <?php echo $product['formato'] . ' - ' . $product['material'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="w-[5%] flex justify-end items-center">
                            <img src="<?php echo get_theme_image('lixeira.png')?>" id="removeItem" class="w-3 h-3 object-cover transition-all duration-500 hover:w-[14px] hover:h-[14px] cursor-pointer" data-cartid="<?php echo $product['cartId'] ?>">
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