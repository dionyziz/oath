<?php
    include 'header.php';
    
    $langs = array(
        'en' => 'English',
        'el' => 'Ελληνικά',
        'de' => 'Deutsch',
        'sv' => 'Svenska',
        'it' => 'Italiano',
        'ru' => 'Русский',
        'nl' => 'Nederlands',
        'fr' => 'Français',
        'es' => 'Español',
        'ar' => 'العربية'
    );
    $params = explode( '?', $_SERVER[ 'REQUEST_URI' ] );
    if ( isset( $params[ 1 ] ) && isset( $langs[ $params[ 1 ] ] ) ) {
        $lang = $params[ 1 ];
    }
    else {
        $lang = 'en';
    }
    include 'models/i18n.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml"
      lang="<?php
      echo $lang;
      ?>">
    <head>
        <title><?= $_[ I_TITLE ] ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="oath,pledge,covenant,engineering,engineer,software,programmer,programming,hacker" />
        <meta name="description" content="The oath of a software engineer to respect knowledge, people, and ethics." />
        <link type="text/css" rel="stylesheet" href="typography.css" />
        <link rel="shortcut icon" href="script.png" />
    </head>
    <body>
        <a href="https://github.com/dionyziz/oath"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
        <div class="world">
            <h1><?= $_[ I_TITLE ] ?></h1>
            <p class="introduction">
                <span class="blackletter"><?= $_[ I_SWEAR ] ?></span>
                <em><?= $_[ I_INTRO ] ?></em>
            </p>
            <ul class="oath">
                <?php foreach ( $_[ I_OATH ] as $covenant ): ?>
                
                <li><?= $covenant ?></li>
                <?php endforeach; ?>
                
            </ul>
            <p class="epilogue">
                <?= $_[ I_EPILOGUE0 ] ?>
                
            </p>
            <p class="epilogue">
                <?= $_[ I_EPILOGUE1 ] ?>
                
            </p>
            
            <div class="footer">
                <a class="cc" rel="license" href="https://creativecommons.org/licenses/by/3.0/" title="<?= $_[ I_CC ] ?>">
                    <img alt="<?= $_[ I_CC ] ?>" src="https://i.creativecommons.org/l/by/3.0/80x15.png" />
                </a>
                <ul><?php
                    foreach ( $langs as $code => $language ):
                        ?><li<?php
                        if ( $code == $lang ) {
                            ?> class="selected"<?php
                        }
                        ?>><a href="?<?= $code ?>"><?= $language ?></a></li><?php
                    endforeach;
                ?><li><a href="help.php">Help Translate</a></li></ul>
            </div>
        </div>
    </body>
</html>
