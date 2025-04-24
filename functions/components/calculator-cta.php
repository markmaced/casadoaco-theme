<?php

function calculator_cta()
{
?>
    <section class="w-full py-16 bg-casadoaco-orange">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="2/3">
                <h2 class="text-black font-rockstar text-3xl mb-2">Conhece nossa <span class="text-white">calculadora?</span></h2>
                <p class="text-sm font-noto text-black">Lorem ipsum dolor sit amet, constetur adipiscing</p>
            </div>
            <div class="1/3 flex justify-end items-center">
                <button type="button" class="bg-black text-white font-noto py-2 px-5 rounded-md font-bold cursor-no-drop">Em breve</button>
            </div>
        </div>
    </section>
<?php
}

add_shortcode("calculator_cta", "calculator_cta");

?>