<?php

function calculator_cta()
{
?>
    <section class="w-full py-16 bg-casadoaco-orange md:px-0 px-5">
        <div class="max-w-6xl mx-auto md:flex justify-between items-center">
            <div class="md:2/3 w-full md:mb-0 mb-5">
                <h2 class="text-black font-rockstar md:text-3xl text-xl mb-2">Já conhece nossa <span class="text-white">calculadora?</span></h2>
                <p class="text-sm font-noto text-black">Calcule o peso e o volume dos seus materiais direto no nosso site!</p>
            </div>
            <div class="md:w-1/3 w-full flex justify-end items-center">
                <button type="button" class="bg-black text-white font-noto py-2 px-5 rounded-md font-bold cursor-no-drop">Em breve</button>
            </div>
        </div>
    </section>
<?php
}

add_shortcode("calculator_cta", "calculator_cta");

?>