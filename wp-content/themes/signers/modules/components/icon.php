<?php
$icon = $args['icon'] ? $args['icon'] : '' ;
if ( !empty($icon) ) {
    $iconurl = get_template_directory().'/images/icons/'.$icon.'.svg';
    if ( file_exists($iconurl) ) {
        ob_start();
        include($iconurl);
        $svg = ob_get_clean();
        echo '<span class="icon icon-'.$icon.'">'.palermo_escape_svg( $svg ).'</span>';
    }
}