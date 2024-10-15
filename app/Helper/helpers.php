<?php


/** Check the product type */

function productType($type)
{
    switch ($type) {
        case 'new_arrival':
            return 'New';
            break;
        case 'featured':
            return 'Featured';
            break;
        case 'top_product':
            return 'Top';
            break;

        case 'best_product':
            return 'Best';
            break;

        default:
            return '';
            break;
    }
}
