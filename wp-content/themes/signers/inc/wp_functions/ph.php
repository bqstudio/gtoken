<?php
/**
 * Placholder function.
 */
function ph()
{
    $ph = get_field('placeholder', 'options');
    if (!empty($ph)) {
        echo wp_get_attachment_image($ph['ID'], 'large');
    }
}
