<head>
<meta http-equiv="refresh" content="0;URL=http://semantics.bigcat.unimaas.nl/bookSparqler/index.html"> 
</head>
<?php
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require 'openid.php';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('http://semantics.bigcat.unimaas.nl/');
    if(!$openid->mode) {
            $openid->identity = 'https://www.google.com/accounts/o8/id';
            $openid->required = array('namePerson/friendly', 'contact/email');
            $openid->optional = array('namePerson/first');

            header('Location: ' . $openid->authUrl());
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        $openid->validate();
        setcookie("userName", $openid->identity);
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
?>
