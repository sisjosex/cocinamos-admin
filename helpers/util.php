<?php

function isMobile() {

    require_once(BASE_PATH . 'helpers/Mobile_Detect.php');

    $mobile = new Mobile_Detect();

    return $mobile->isMobile() || $mobile->isTablet();
}

function redirect($url) {

    header('Location: ' . $url);
}

function toAscii($str, $replace=array(), $delimiter='-') {
    setlocale(LC_ALL, 'en_US.UTF8');
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    }

    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    return $clean;
}

function xml_encode($mixed, $domElement=null, $DOMDocument=null) {
    if (is_null($DOMDocument)) {
        $DOMDocument =new DOMDocument;
        $DOMDocument->formatOutput = true;
        xml_encode($mixed, $DOMDocument, $DOMDocument);
        echo $DOMDocument->saveXML();
    }
    else {
        if (is_array($mixed)) {
            foreach ($mixed as $index => $mixedElement) {
                if (is_int($index)) {
                    if ($index === 0) {
                        $node = $domElement;
                    }
                    else {
                        $node = $DOMDocument->createElement($domElement->tagName);
                        $domElement->parentNode->appendChild($node);
                    }
                }
                else {
                    $plural = $DOMDocument->createElement($index);
                    $domElement->appendChild($plural);
                    $node = $plural;
                    if (!(rtrim($index, 's') === $index)) {
                        $singular = $DOMDocument->createElement(rtrim($index, 's'));
                        $plural->appendChild($singular);
                        $node = $singular;
                    }
                }

                xml_encode($mixedElement, $node, $DOMDocument);
            }
        }
        else {
            $domElement->appendChild($DOMDocument->createTextNode($mixed));
        }
    }
}

function generatePassword($length) {

    //$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

function generateImage($image, $username, $hour, $min, $sec, $distance, $texts, $filename) {

    $path = $filename ? BASE_PATH.'/uploads/'.$filename : '';

    $img = new textPainter(BASE_PATH.'/assets/images/'.$image, '', BASE_PATH.'/assets/fonts/Memphis-ExtraBold.ttf', 20, $path);

    $img->setQuality(100);
    $img->addText($username,54, 80, BASE_PATH.'/assets/fonts/memphisltstd-light-webfont.ttf',25, 255,255,255);
    $img->addText($hour,440, 405, BASE_PATH.'/assets/fonts/Memphis Medium.ttf',18, 255,255,255);
    $img->addText($min,485, 405, BASE_PATH.'/assets/fonts/Memphis Medium.ttf',18, 255,255,255);
    $img->addText($sec,530, 405, BASE_PATH.'/assets/fonts/Memphis Medium.ttf',14, 255,255,255);
    $img->addText($distance,670, 405, BASE_PATH.'/assets/fonts/Memphis Medium.ttf',20, 255,255,255);
    $img->addText('KM',750, 395, BASE_PATH.'/assets/fonts/Memphis Medium.ttf',10, 255,255,255);

    if($texts) {

        foreach($texts as $text) {

            $img->addText($text[0],$text[1], $text[2], $text[3], $text[4],$text[5],$text[6], $text[7]);
        }
    }

    $img->show();
}

function getUrl($ch, $url, $count=0, $fields = '', $kronos_id) {

    if($fields) {

        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    }

    $cookie = tempnam ("/tmp", "CURLCOOKIE");

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');// set where cookies will be stored
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');// from where it will get cookies
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_ENCODING, "" );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 60 );
    curl_setopt( $ch, CURLOPT_TIMEOUT, 60 );
    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 0);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 0);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);

    $data = curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($count >= 1) {
        return $data;
    }

    if (!$data) {
        return false;
    }

    $dataArray = explode("\r\n\r\n", $data, 2);

    if (count($dataArray) != 2) {
        return false;
    }

    list($header, $body) = $dataArray;
    if ($httpCode == 301 || $httpCode == 302) {

        $url = 'http://kronos.com.uy/?Q=resultado&M=evento&ID='.$kronos_id;
        return getUrl($ch, $url, $count + 1, $fields);

    } else {

        return $body;
    }
}

function limitWords($cadena, $longitud, $elipsis = "...") {
    $cadena = trim($cadena);
    $palabras = explode(' ', $cadena);
    if (count($palabras) > $longitud){
        return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
    }else{
        return $cadena;
    }
}

function elapsed_days($fecha_i,$fecha_f)
{
    $fecha_inicio = strtotime($fecha_i);
    $fecha_fin = strtotime($fecha_f);

    $dias = 0;

    if($fecha_fin - $fecha_inicio > 0) {

        $dias	= ($fecha_fin-$fecha_inicio)/(24*3600);
        $dias 	= abs($dias); $dias = floor($dias);
    }

    return $dias;
}

/*function sendMail( $subject, $email, $body )
{
    error_reporting(0);
    $headers		 = "MIME-Version: 1.0\r\n";
    $headers		.= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers		.= "From: ".MAIL_FROM_TITLE." <".MAIL_FROM_ADDRESS.">\r\n";
    $headers		.= "Reply-To: ".MAIL_FROM_ADDRESS."\r\n";
    $headers		.= "Return-path: ".MAIL_FROM_ADDRESS."\r\n";

    mail($email,$subject,$body,$headers);
    error_reporting(E_ALL);
}*/

function sendMail($subject, $email, $body, $from_email = '', $from_name = '')
{
    error_reporting(0);

    date_default_timezone_set('Etc/UTC');

    require_once BASE_PATH . 'helpers/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 0;

    //Set the hostname of the mail server
    $mail->Host = 'vps.motion-server.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "cheff@cocinamosconfino.com";

//Password to use for SMTP authentication
    $mail->Password = "PNCLun8WePFM";

//Set who the message is to be sent from
    $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_TITLE);

    if( !empty($from_email) ) {
//Set an alternative reply-to address
        $mail->addReplyTo($from_email, $from_name);
    }

//Set who the message is to be sent to
    $mail->addAddress($email, '');

//Set the subject line
    $mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->msgHTML($body);

//Replace the plain text body with one created manually
    //$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    error_reporting(E_ALL);

    if (!$mail->send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}

function file_newname($path, $filename){
    if ($pos = strrpos($filename, '.')) {
        $name = substr($filename, 0, $pos);
        $ext = substr($filename, $pos);
    } else {
        $name = $filename;
    }

    $newpath = $path.'/'.$filename;
    $newname = $filename;
    $counter = 0;
    while (file_exists($newpath)) {
        $newname = $name .'_'. $counter . $ext;
        $newpath = $path.'/'.$newname;
        $counter++;
    }

    return $newname;
}
function getUserIP()
{
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}