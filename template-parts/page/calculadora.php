<section class="w-full py-16 flex items-center">
    <div class="max-w-6xl mx-auto flex gap-5 items-center">
        <div class="w-1/2 md:pr-10">
            <h1 class="md:text-4xl text-base font-rockstar mb-5">
                Preencha as medidas e calcule seu material <span class="text-casadoaco-orange">em segundos</span>
            </h1>
            <h2 class="text-xl font-noto text-black font-medium mb-5">Peso, volume e quantidade com base no tipo e
                formato do metal que você precisa.</h2>
            <p class="text-base text-custom-gray font-noto mb-10">Use nossa calculadora para encontrar as especificações
                ideais do material que você precisa. Basta selecionar o tipo, o formato e inserir as medidas. Simples,
                rápido e direto ao ponto.</p>
            <form method="post" class="w-full">
                <div class="flex items-center w-full md:flex-row flex-col">
                    <input type="email" name="newsletter_email" placeholder="Inscreva-se com o seu e-mail"
                        class="text-black bg-[#ECF2F7] border border-[#ECF2F7] rounded-xl px-8 py-2 md:w-xs w-full font-noto md:mb-0 mb-5">
                    <button type="button"
                        class="newsletter-btn text-white bg-casadoaco-orange rounded-xl px-4 py-2 cursor-pointer font-noto md:-ml-8 mx-auto transition-all duration-500 hover:bg-black hover:text-white">Assinar</button>
                </div>
            </form>
        </div>
        <div class="w-1/2 flex gap-5">
            <img src="<?php echo get_theme_image('calculadora-hero-1.png') ?>">
            <img src="<?php echo get_theme_image('calculadora-hero-2.png') ?>">
        </div>
    </div>
</section>
<section class="w-full py-16">
    <div class="max-w-6xl mx-auto flex gap-5 relative">
        <div class="w-1/4">
            <div class="w-full shadow-calc bg-white text-center py-5 mb-5">
                <h2 class="font-noto font-normal text-base mb-0 leading-2">Escolha o </h2>
                <p class="font-rockstar text-xl text-casadoaco-orange">Material</p>
            </div>
            <?php
            $terms = get_terms('categoria_calculadora');
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $slug_sem_hifen = str_replace('-', '', $term->slug);
                    echo '<div id="' . esc_attr($slug_sem_hifen) . '" class="text-center shadow-btn w-full py-3 mb-5 cursor-pointer cat-calc-btn transition-all duration-300" data-calc-id="' . esc_attr($term->term_id) . '">';
                    echo '<span class="font-noto text-black text-base">' . esc_html($term->name) . '</span>';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <div class="w-2/4">
            <div class="w-full shadow-calc bg-white text-center py-5 mb-5">
                <h2 class="font-noto font-normal text-base mb-0 leading-2">Escolha o </h2>
                <p class="font-rockstar text-xl text-casadoaco-orange">Formato</p>
            </div>
            <div id="calcOptions" class="grid grid-cols-3 gap-5 mt-5"></div>
        </div>
        <div class="w-1/4">
            <div class="w-full shadow-calc bg-white text-center py-5 mb-5">
                <h2 class="font-noto font-normal text-base mb-0 leading-2">Calcule por </h2>
                <p class="font-rockstar text-xl text-casadoaco-orange">Medidas</p>
            </div>
            <input type="hidden" id="material" name="material">
            <input type="hidden" id="formato" name="formato">
            <div id="optionsFields"></div>
        </div>
        <!-- Modal de Carrinho -->
        <div class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 modal-cart">
            <!-- Container -->
            <div class="bg-white shadow-xl w-full max-w-2xl py-6 rounded-md px-10">

                <!-- Cabeçalho -->
                <div class="flex justify-between items-center pb-3 mb-4">
                    <h2 class="text-xl font-bold font-rockstar">Listagem de Produtos</h2>
                    <button class="text-gray-400 hover:text-gray-600 text-xl cursor-pointer"
                        id="closeCart">&times;</button>
                </div>

                <!-- Tabela de produtos -->
                <div class="border-b mb-10">
                    <div class="grid grid-cols-12 font-bold text-sm border-b pb-2 mb-3">
                        <div class="col-span-1 font-noto text-casadoaco-orange text-xs">Qtd</div>
                        <div class="col-span-7 font-noto text-casadoaco-orange text-xs">Produtos</div>
                        <div class="col-span-4 font-noto text-right">
                            <a href="#" class="text-[10px] text-[#919497] font-normal font-noto">Adicionar mais
                                produtos</a>
                        </div>
                    </div>
                    <div class="w-full" id="cartSession">
                    </div>
                </div>

                <!-- Formulário de envio -->
                <div class="w-full">
                    <h3 class="text-xl font-bold uppercase mb-2 font-rockstar">Como devemos enviar a proposta para você?
                    </h3>
                    <p class="text-sm text-gray-600 mb-4 font-noto">Lorem ipsum dolor sit amet consectetur. Laoreet
                        rhoncus faucibus aliquet faucibus aliquam nibh elementum nunc. Augue aenean egestas Lorem ipsum
                        dolor sit amet consectetur. Laoreet rhoncus faucibus aliquet faucibus aliquam nibh elementum
                        nunc. Augue aenean egestas</p>

                    <div class="flex gap-6 mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="envio" class="accent-orange-500" checked />
                            <span>Por e-mail</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="envio" class="accent-orange-500" />
                            <span>Por WhatsApp</span>
                        </label>
                    </div>

                    <!-- Botão -->
                    <div class="w-full">
                        <button
                            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-md transition duration-300">
                            Confirmar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>