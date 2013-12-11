<?php
    define( 'I_TITLE',     0 );
    define( 'I_SWEAR',     1 );
    define( 'I_INTRO',     2 );
    define( 'I_OATH',      3 );
    define( 'I_EPILOGUE0', 4 );
    define( 'I_EPILOGUE1', 5 );
    define( 'I_CC',        6 );
    define( 'I_TAKE',      7 );
    define( 'I_SHARE_FB',  8 );
    define( 'I_SHARE_TW',  9 );
    
    $_ = include "lang/$lang.php";
    
    function format( $array ) {
        foreach ( $array as $key => $item ) {
            if ( is_array( $item ) ) {
                $array[ $key ] = format( $item );
            }
            else {
                $array[ $key ] = preg_replace(
                    array( '/\*([^*]+)\*/', '/\(([^_]+)\)/', '/\n\s*\n/', '/"([^"]+)"/', '/\s{2,}/' ), 
                    array( '<strong>\\1</strong>', '<span>\\1</span>', "<br />\n", '<q>\\1</q>', ' ' ),
                    $item
                );
            }
        }
        return $array;
    }
    
    $_ = format( $_ );
?>
