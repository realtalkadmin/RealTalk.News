<?php
/**
 * Customizer specific functions
 *
 * @package Goodz Magazine
 */

// List all categories in dropdown
function goodz_magazine_get_categories_select() {
    $teh_cats = get_categories();
    $results;

    $count = count( $teh_cats );
    $results['default'] = __( '-- Select --', 'goodz-magazine' );

    for ( $i=0; $i < $count; $i++ ) {
        if ( isset( $teh_cats[$i] ) )
            $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
        else
            $count++;
    }
    return $results;
}

// List 1 - 10
function goodz_magazine_number_of_slides() {
    $results;

    for ( $i=1; $i <= 10; $i++ ) {
        $results[ $i ] = $i;
    }

    return $results;
}

/**
 * Populate select box for Map Zoom Factor in Customizer
 */
function goodz_magazine_map_zoom_select() {

    for ( $i = 1; $i <= 21; $i++ ) {
        $results[$i] = $i;
    }

    return $results;

}