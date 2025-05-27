<section class="w-full py-16 flex items-center">
    <div class="max-w-6xl mx-auto flex md:flex-row flex-col-reverse md:gap-5 items-center">
        <div class="md:w-1/2 w-full px-5 md:px-0 md:pr-10">
            <h1 class="md:text-4xl text-2xl font-rockstar mb-5">
                Preencha as medidas e calcule seu material <span class="text-casadoaco-orange">em segundos</span>
            </h1>
            <h2 class="md:text-xl text-base font-noto text-black font-medium mb-5">Peso, volume e quantidade com base no
                tipo e
                formato do metal que você precisa.</h2>
            <p class="md:text-base text-sm text-custom-gray font-noto mb-10">Use nossa calculadora para encontrar as
                especificações
                ideais do material que você precisa. Basta selecionar o tipo, o formato e inserir as medidas. Simples,
                rápido e direto ao ponto.</p>
            <form method="post" class="w-full">
                <div class="flex items-center w-full md:flex-row">
                    <input type="email" name="newsletter_email" placeholder="Inscreva-se com o seu e-mail"
                        class="text-black bg-[#ECF2F7] border border-[#ECF2F7] rounded-xl px-8 py-2 md:w-xs w-full font-noto md:mb-0 mb-5">
                    <button type="button"
                        class="newsletter-btn text-white bg-casadoaco-orange rounded-xl px-4 py-2 cursor-pointer font-noto md:-ml-8 mx-auto transition-all duration-500 hover:bg-black hover:text-white md:mt-0 -mt-5">Assinar</button>
                </div>
            </form>
        </div>
        <div class="md:w-1/2 w-full px-5 md:px-0 flex gap-1 md:mb-0 mb-5">
            <img src="<?php echo get_theme_image('calculadora-hero-1.png') ?>" class="md:w-full w-1/2">
            <img src="<?php echo get_theme_image('calculadora-hero-2.png') ?>" class="md:w-full w-1/2">
        </div>
    </div>
</section>
<section class="w-full md:py-16 py-5">
    <div class="max-w-6xl mx-auto flex md:flex-row flex-col gap-5 relative md:px-0 px-5">
        <div class="md:w-1/4 w-full">
            <div class="w-full shadow-calc bg-white text-center py-5 mb-5">
                <h2 class="font-noto font-normal text-base mb-0 leading-2">Escolha o </h2>
                <p class="font-rockstar text-xl text-casadoaco-orange">Material</p>
            </div>
            <div class="w-full md:overflow-x-hidden overflow-x-auto md:block flex gap-3 flex-nowrap">
                <?php
                $terms = get_terms('categoria_calculadora');
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $slug_sem_hifen = str_replace('-', '', $term->slug);
                        echo '<div id="' . esc_attr($slug_sem_hifen) . '" class="text-center shadow-btn py-3 px-5 mb-5 cursor-pointer cat-calc-btn transition-all duration-300 flex-shrink-0" data-calc-id="' . esc_attr($term->term_id) . '">';
                        echo '<span class="font-noto text-black text-base">' . esc_html($term->name) . '</span>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="md:w-2/4 w-full">
            <div class="w-full shadow-calc bg-white text-center py-5 mb-5">
                <h2 class="font-noto font-normal text-base mb-0 leading-2">Escolha o </h2>
                <p class="font-rockstar text-xl text-casadoaco-orange">Formato</p>
            </div>
            <div id="calcOptions" class="grid grid-cols-3 gap-5 mt-5"></div>
        </div>
        <div class="md:w-1/4 w-full">
            <div class="w-full shadow-calc bg-white text-center py-5 mb-5">
                <h2 class="font-noto font-normal text-base mb-0 leading-2">Calcule por </h2>
                <p class="font-rockstar text-xl text-casadoaco-orange">Medidas</p>
            </div>
            <input type="hidden" id="material" name="material">
            <input type="hidden" id="formato" name="formato">
            <div id="optionsFields"></div>
        </div>
        <!-- Modal de Carrinho -->
        <div class="fixed inset-0 bg-black/50 hidden items-center justify-center z-30 modal-cart px-5 md:px-0">
            <!-- Container -->
            <div class="bg-white shadow-xl w-full max-w-2xl py-6 rounded-md px-10 overflow-y-auto max-h-[90%]">

                <!-- Cabeçalho -->
                <div class="flex justify-between items-center pb-3 mb-4 header-title">
                    <h2 class="text-xl font-bold font-rockstar">Listagem de Produtos</h2>
                    <button class="text-gray-400 hover:text-gray-600 text-xl cursor-pointer"
                        id="closeCart">&times;</button>
                </div>

                <!-- Tabela de produtos -->
                <div class="border-b mb-10 product-table">
                    <div class="grid grid-cols-12 font-bold text-sm border-b pb-2 mb-3">
                        <div class="md:col-span-1 col-span-2 font-noto text-casadoaco-orange text-xs">Qtd</div>
                        <div class="md:col-span-7 col-span-5 font-noto text-casadoaco-orange text-xs">Produtos</div>
                    </div>
                    <div class="w-full" id="cartSession">
                    </div>
                </div>

                <!-- Formulário de envio -->
                <div class="w-full step1">
                    <h3 class="text-xl font-bold uppercase mb-5 font-rockstar">
                        Como devemos enviar a proposta para você?
                    </h3>
                    <div class="flex gap-6 mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="envio" value="email" class="accent-orange-500" checked />
                            <span>Por e-mail</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="envio" value="whatsapp" class="accent-orange-500" />
                            <span>Por WhatsApp</span>
                        </label>
                    </div>

                    <div class="w-full flex justify-between">
                        <button
                            class="bg-casadoaco-orange hover:bg-black text-white font-semibold py-2 px-6 rounded-md transition duration-300 cursor-pointer next-step">
                            Confirmar
                        </button>
                        <button
                            class="bg-black hover:bg-casadoaco-orange text-white font-semibold py-2 px-6 rounded-md transition duration-300 cursor-pointer closeModal">
                            + Adicionar mais produtos
                        </button>
                    </div>
                </div>

                <div class="w-full step2 hidden">
                    <h3 class="text-xl font-bold uppercase mb-4 font-rockstar">Digite seus dados</h3>
                    <input type="text" id="nome" class="block w-full mb-3 p-2 border rounded" placeholder="Nome">
                    <input type="text" id="empresa" class="block w-full mb-3 p-2 border rounded" placeholder="Empresa">
                    <input type="text" id="cnpj" class="block w-full mb-3 p-2 border rounded" placeholder="CNPJ">
                    <input type="text" id="contato" class="block w-full mb-3 p-2 border rounded"
                        placeholder="E-mail ou WhatsApp">
                    <div class="w-full flex justify-between">
                        <button
                            class="bg-casadoaco-orange hover:bg-black text-white font-semibold py-2 px-6 rounded-md transition duration-300 cursor-pointer enviar-proposta">
                            Enviar Proposta
                        </button>
                        <button
                            class="bg-black hover:bg-casadoaco-orange text-white font-semibold py-2 px-6 rounded-md transition duration-300 cursor-pointer prev-step">
                            Voltar
                        </button>
                    </div>
                </div>

                <div class="w-full step3 hidden text-center">
                    <h3 class="text-2xl font-bold uppercase mb-4 font-rockstar text-black">Obrigado!</h3>
                    <p class="text-gray-600 font-noto mb-6">Sua proposta foi enviada com sucesso. Em breve entraremos em
                        contato.</p>
                    <button
                        class="bg-casadoaco-orange hover:bg-black text-white font-semibold py-2 px-6 rounded-md transition-all duration-500 cursor-pointer closeModal">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="cartIcon" class="z-50"></div>
    <div id="quoteBubble"
        class="w-48 text-left fixed bg-casadoaco-orange text-white rounded-full shadow-lg text-xs font-noto px-5 transition-all duration-500 -right-60 opacity-0 bottom-12 p-3 pl-8 z-40">
        Ver meu carrinho
    </div>
</section>
<?php echo do_shortcode('[products_grid]') ?>