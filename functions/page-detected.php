<?php

function page_detected()
{
    if (is_front_page()) {
        $page = 'home';
    } elseif (is_page('cda')) {
        $page = 'cda';
    } elseif (is_page('produtos')) {
        $page = 'produtos';
    } elseif (is_page('calculadora')) {
        $page = 'calculadora';
    } else {
        $page = '';
    }

    return $page;
}