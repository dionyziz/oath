<?php
    include 'header.php';
    include 'models/take.php';

    error_reporting( E_ALL | E_STRICT );
    ini_set( 'display_errors', 1 );
    
    if ( isset( $_GET[ 'code' ] ) ) {
        $code = $_GET[ 'code' ];
    }
    else {
        die( 'Invalid access token.' );
    }

    $vars = array(
        'client_id'     => '189254704432337',
        'redirect_uri'  => 'http://dionyziz.com/oath/take',
        'client_secret' => '2fecb4f1af9fbcd4c71b9a33f448b0e1',
        'code'          => $code
    );
    $vals = array();
    foreach ( $vars as $key => $var ) {
        $vals[] = $key . '=' . $var;
    }
    $url = 'https://graph.facebook.com/oauth/access_token?' . implode( '&', $vals );
    
    $accesstoken = file_get_contents( $url );
    if ( $accesstoken === false ) {
        die( 'Invalid access token.' );
    }

    $user = json_decode(
        file_get_contents( "https://graph.facebook.com/me?" . $accesstoken )
    );
    $_SESSION[ 'taken' ] = true;

    if ( Sig_Sign( $user->name, $user->id ) != 0 ) {
        /*
        $curl = curl_init();
        $url = 'https://graph.facebook.com/517884464/feed';
        $data = array(
            'access_token' => $accesstoken,
            'message' => "I just took the Engineer's Oath: http://dionyziz.com/oath"
        );
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_USERAGENT, "Mozilla/5.0 Engineer_Oath/1.0" );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_POST, 1 );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
        $data = curl_exec( $curl ); 
        */
    }

    header( 'Location: http://www.dionyziz.com/oath' );
?>
