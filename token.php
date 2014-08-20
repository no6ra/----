<?php
function create_token(){
    $ipad = getenv('REMOTE_ADDR');
    $time = time();
    $rand = mt_rand();
    
    $ipad = hash( 'sha256', $ipad );
    $time = hash( 'md5', $time );
    $rand = hash( 'md5', $rand );

    $no_token = $ipad.$time.$rand;

    $token = hash( 'sha256', $no_token );

    return $token;
}

function get_harf_token(){
    $original_token = create_token();
    $harf = substr( $original_token, 0, 10 );
    $_SESSION['harf_token'] = substr( $original_token, 10 );
    $_SESSION['original_token'] = $original_token;
    return $harf;
    }
    
