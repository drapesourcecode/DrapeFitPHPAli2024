<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class CustomComponent extends Component {

    function __construct($prompt = null) {
        
    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    function formatText($value) {
        $value = str_replace("“", "\"", $value);
        $value = str_replace("�?", "\"", $value);
        //$value = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $value);
        $value = stripslashes($value);
        $value = html_entity_decode($value, ENT_QUOTES);
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        $value = strtr($value, $trans);
        $value = stripslashes(trim($value));
        return $value;
    }

    function shortLength($value, $len) {
        $value_format = $this->formatText($value);
        $value_raw = html_entity_decode($value_format, ENT_QUOTES);

        if (strlen($value_raw) > $len) {
            $value_strip = substr($value_raw, 0, $len);
            $value_strip = $this->formatText($value_strip);
            $lengthvalue = "<span title='" . $value_format . "' rel='tooltip'>" . $value_strip . "...</span>";
        } else {
            $lengthvalue = $value_format;
        }
        return $lengthvalue;
    }

    function makeSeoUrl($url) {
        if ($url) {
            $url = trim($url);
            $value = preg_replace("![^a-z0-9]+!i", "-", $url);
            $value = trim($value, "-");
            return strtolower($value);
        }
    }

    function generateUniqNumber($id = NULL) {
        $uniq = uniqid(rand());
        if ($id) {
            return md5($uniq . time() . $id);
        } else {
            return md5($uniq . time());
        }
    }

    function getRealIpAddress() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function get_ip_address() {
        if (isSet($_SERVER)) {
            if (isSet($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } elseif (isSet($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }

        return $realip;
    }

    function uploadImage($tmp_name, $name, $large, $medium, $thumb) {
        if ($name) {
            $image = strtolower($name);
            //          $extname = substr(strrchr($image, "."), 1);
            $extname = $this->getExtension($image);
            if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }

                list($width, $height) = getimagesize($tmp_name);


                $newwidth = 500;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);

                $newwidth1 = 291;
                $newheight1 = ($height / $width) * $newwidth1;
                $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                $newwidth2 = 100;
                $newheight2 = ($height / $width) * $newwidth2;
                $tmp2 = imagecreatetruecolor($newwidth2, $newheight2);
                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
                imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $newwidth2, $newheight2, $width, $height);
                $time = time();
                $filepath = md5($time) . "." . $extname;
                $filename = $large . $filepath;
                $filename1 = $medium . "medium_" . $filepath;
                $filename2 = $thumb . "thumb_" . $filepath;
                imagejpeg($tmp, $filename, 100);

                imagejpeg($tmp1, $filename1, 100);

                imagejpeg($tmp2, $filename2, 100);

                imagedestroy($src);
                imagedestroy($tmp);
                imagedestroy($tmp1);
                imagedestroy($tmp2);

                return $filepath;
            }
        }
    }

    function uploadImageBanner($tmp_name, $name, $path, $imgWidth) {
        if ($name) {
            $image = strtolower($name);
            $extname = $this->getExtension($image); //$extname = substr(strrchr($image, "."), 1);
            if (($extname != 'jfif') && ($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "jfif" || $extname == "JFIF") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }

                list($width, $height) = getimagesize($tmp_name);
                if ($extname == 'gif' || $width <= $imgWidth) {
                    $time = time() . rand(100, 999);
                    $filepath = md5($time) . "." . $extname;
                    $targetpath = $path . $filepath;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $targetpath);
                    return $filepath;
                } else {
                    $newwidth = $imgWidth;
                    $newheight = ($height / $width) * $newwidth;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $time = time();
                    $filepath = md5($time) . "." . $extname;
                    $filename = $path . $filepath;
                    imagejpeg($tmp, $filename, 100);
                    imagedestroy($src);
                    imagedestroy($tmp);
                    return $filepath;
                }
            }
        }
    }
    
    function uploadBlogImage($tmp_name, $name, $path, $imgWidth) {
        if ($name) {
            $image = strtolower($name);
            $extname = $this->getExtension($image); //$extname = substr(strrchr($image, "."), 1);
            if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                } else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }
                list($width, $height) = getimagesize($tmp_name);

                if ($extname == 'gif' || $width <= $imgWidth) {
                    $time = time() . rand(100, 999);
                    $filepath = md5($time) . "." . $extname;
                    $targetpath = $path . $filepath;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $targetpath);
                    return $filepath;
                } else {
                    $newwidth = $imgWidth;
                    $newheight = ($height / $width) * $newwidth;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $time = time();
                    $filepath = md5($time) . "." . $extname;
                    $filename = $path . $filepath;
                    imagejpeg($tmp, $filename, 100);

                    imagedestroy($src);
                    imagedestroy($tmp);
                    return $filepath;
                }
            }
        }
    }
    
    function uploadAvatarImage($tmp_name, $name, $path, $imgWidth,$new_name=null) {
        if ($name) {
            $image = strtolower($name);
            $extname = $this->getExtension($image); //$extname = substr(strrchr($image, "."), 1);
            if (($extname != 'jfif') && ($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
                return false;
            } else {
                if ($extname == "jpg" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                }
                else if ($extname == "jfif" || $extname == "jpeg") {
                    $src = imagecreatefromjpeg($tmp_name);
                }
                
                else if ($extname == "png") {
                    $src = imagecreatefrompng($tmp_name);
                } else {
                    $src = imagecreatefromgif($tmp_name);
                }
                list($width, $height) = getimagesize($tmp_name);

                if ($extname == 'gif' || $width <= $imgWidth) {
                    $time = (!empty($new_name))?$new_name:time() . rand(100, 999);
                    $filepath = md5($time).'1' . "." . $extname;
                    $targetpath = $path . $filepath;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $targetpath);
                    return $filepath;
                } else {
                    $newwidth = $imgWidth;
                    $newheight = ($height / $width) * $newwidth;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $time = (!empty($new_name))?$new_name:time();
                    $filepath = md5($time).'1' . "." . $extname;
                    $filename = $path . $filepath;
                    imagejpeg($tmp, $filename, 100);

                    imagedestroy($src);
                    imagedestroy($tmp);
                    return $filepath;
                }
            }
        }
    }

    function lastValue($string) {
        $explode = explode('-', $string);
        $lastArrayValue = end($explode);
        return $lastArrayValue;
    }

    function number_pad($number, $n = 4) {
        $number = intval($number, 10);
        $number = (string) $number;
        return str_pad((int) $number, $n, "0", STR_PAD_LEFT);
    }

    function emailText($value) {
        $value = stripslashes(trim($value));
        $value = str_replace('"', "\"", $value);
        $value = str_replace('"', "\"", $value);
        $value = preg_replace('/[^(\x20-\x7F)\x0A]*/', '', $value);
        return stripslashes($value);
    }

    function paymentCanceLTemplete($msg, $name, $ticket, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[TICKET_NO]")) {
            $msg = str_replace("[TICKET_NO]", $ticket, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function paymentSuccessTemplete($msg, $name, $ticket, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[TICKET_NO]")) {
            $msg = str_replace("[TICKET_NO]", $ticket, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function contactUs($msg, $name, $email, $phone, $subject, $body_subject, $uMessage, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PHONE]")) {
            $msg = str_replace("[PHONE]", $phone, $msg);
        }
        if (strstr($msg, "[SUBJECT]")) {
            $msg = str_replace("[SUBJECT]", $subject, $msg);
        }
        if (strstr($msg, "[BODY_SUBJECT]")) {
            $msg = str_replace("[BODY_SUBJECT]", $body_subject, $msg);
        }
        if (strstr($msg, "[UMSG]")) {
            $msg = str_replace("[UMSG]", $uMessage, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }
    function customerContactUs($msg, $name, $email, $phone, $subject1, $body_subject, $uMessage, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PHONE]")) {
            $msg = str_replace("[PHONE]", $phone, $msg);
        }
        if (strstr($msg, "[SUBJECT]")) {
            $msg = str_replace("[SUBJECT]", $subject1, $msg);
        }
        if (strstr($msg, "[BODY_SUBJECT]")) {
            $msg = str_replace("[BODY_SUBJECT]", $body_subject, $msg);
        }
        if (strstr($msg, "[UMSG]")) {
            $msg = str_replace("[UMSG]", $uMessage, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", $sitename, $msg);
        }
        return $msg;
    }

    function sendEmail($to, $from, $subject, $message, $header = 1, $footer = 1,$attachment=null) {

//        if ($header) {

        $hdr = '';
//        }
//        if ($footer) {



        $ftr = '';
//        }
        //echo $from;exit;

        $subscripbe = '';

        if ($to) {

            $table = TableRegistry::get('Users');

            @$unique = $table->find('all')->where(['email' => $to])->first()->unique_id;

            @$userId = $table->find('all')->where(['email' => $to])->first()->id;

            $subscripbe = '<a href="' . SITE_NAME . 'unsubscrib?id=' . @$unique . '" target="_blank" style="text-algin:center;color:#777777;text-decoration:underline;" >Unsubscribe </a>&nbsp;&nbsp;';
        }

        if (strstr($message, "[SUBCRIBE]")) {

            $message = str_replace("[SUBCRIBE]", $subscripbe, $message);
        }







        $message = $hdr . $message . $ftr;

        $to = $this->emailText($to);

        $subject = $this->emailText($subject);

        $message = $this->emailText($message);
        $message = str_replace("<script>", "&lt;script&gt;", $message);
        $message = str_replace("</script>", "&lt;/script&gt;", $message);

        $message = str_replace("<SCRIPT>", "&lt;script&gt;", $message);

        $message = str_replace("</SCRIPT>", "&lt;/script&gt;", $message);
        //$message=str_replace(".","8228",$message);
        //   // $email = new Email('default');
        //     $email = new Email();
        //     //$email->transport('default');
        //     $res = $email->from($from)
        //             ->to($to)
        //             ->emailFormat('html')
        //             ->subject($subject)
        //             ->viewVars(array('$msg' => $message))
        //             ->send($message);
        // $headers = "From: support@drapefittest.com" . "\r\n"."CC: debmicrofinet@gmail.com";
        // // $headers = 'MIME-Version: 1.0' . "\r\n";
        // // $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // // $headers.= 'From:' . $from . "\r\n";
        // if (mail($to, 'subject', 'hello', $headers)) {
        //     return true;
        // } else {
        //     return false;
        // }
        //$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        ////$headers.= 'From: Drepefittest<' . $from . "> \r\n";
        //  $headers .= 'Content-type: text/html; UTF-8' . "";
        // $headers = 'From: Drepefittest<' . $from . "> \r\n";
        // $headers .= "Reply-To: " . $from . "\r\n";
        // $headers .= "Return-Path: " . $from . "\r\n";
        // $headers .= "CC: suprakash8906@gmail.com\r\n";
        // $headers .= "BCC: suprakash8906@gmail.com\r\n";
        // $headers .= 'Content-type: text/html; UTF-8' . "";
        // $headers .= "X-Priority: 3\r\n";
        // $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
        // if (mail($to, $subject, $message, $headers, ' -f' . $from)) {
        //     return true;
        // } else {
        //     return false;
        // }
        $email = new Email();
        $email->transport('mailjet');
        //$email->transport('default');
        if(!empty($attachment)){
            $res = $email->from($from)
                ->to($to)
                ->emailFormat('html')
                ->subject($subject)
                ->attachments($attachment)
                ->viewVars(array('$msg' => $message))
                ->send($message);
        }else{
        $res = $email->from($from)
                ->to($to)
                ->emailFormat('html')
                ->subject($subject)
                ->viewVars(array('$msg' => $message))
                ->send($message);
        }
        return $res;

        return true;
    }

    function filterData($data) {
        /* this function is meant for filtering whole data received from the screen */
        $filteredData = array_map(function($v) {
            if (is_array($v)) {
                return $this->filterData($v);
            } else {
                return trim(strip_tags($v));
            }
        }, $data);

        return $filteredData;
    }

    function formatForgetPassword($msg, $name, $email, $link, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[LINK]")) {
            $msg = str_replace("[LINK]", $link, $msg);
        }
        if (strstr($msg, "[SITELINK]")) {
            $msg = str_replace("[SITELINK]", HTTP_ROOT, $msg);
        }
        if (strstr($msg, "[SITENAME]")) {
            $msg = str_replace("[SITENAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function helpformat($msg, $name, $email, $message, $date) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[MSG]")) {
            $msg = str_replace("[MSG]", $message, $msg);
        }

        if (strstr($msg, "[DATE]")) {
            $msg = str_replace("[DATE]", $date, $msg);
        }
        return $msg;
    }
    function helpclientformat($msg, $name, $email, $message, $date) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[MSG]")) {
            $msg = str_replace("[MSG]", $message, $msg);
        }

        if (strstr($msg, "[DATE]")) {
            $msg = str_replace("[DATE]", $date, $msg);
        }
        return $msg;
    }
    
    function helpCustomerformat($msg, $name, $email, $message, $date) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[MSG]")) {
            $msg = str_replace("[MSG]", $message, $msg);
        }

        if (strstr($msg, "[DATE]")) {
            $msg = str_replace("[DATE]", $date, $msg);
        }
        return $msg;
    }

    function createAdminFormat($msg, $name, $email, $pwd, $site_name, $url_link = null) {

        if (strstr($msg, "[NAME]")) {

            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[EMAIL]")) {

            $msg = str_replace("[EMAIL]", $email, $msg);
        }

        if (strstr($msg, "[PASSWORD]")) {

            $msg = str_replace("[PASSWORD]", $pwd, $msg);
        }

        if (strstr($msg, "[LINK]")) {

            $msg = str_replace("[LINK]", $url_link, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {

            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }

        return $msg;
    }

    function kidProfileStart($msg, $name, $kidname, $sitename, $kidlink) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }       
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        if (strstr($msg, "[LINK]")) {
            $msg = str_replace("[LINK]", $kidlink, $msg);
        }
        return $msg;
    }

    function kidProfileComplete($msg, $name, $kidname, $sitename,$kidlink) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        if (strstr($msg, "[LINK]")) {
            $msg = str_replace("[LINK]", $kidlink, $msg);
        }
        return $msg;
    }
    
    function yourSubscription($msg, $name, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }              
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }        
        return $msg;
    }
    
    function yourKidsSubscription($msg, $name, $kidname, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }       
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }       
        return $msg;
    }
    
    

    function paymentEmail($msg, $name, $message, $site_name, $transaction_id = null, $price = null, $submit_date = null, $card_name = null, $last_4_digit = null, $usr_name = null, $full_address = null,$feeprice = null) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }
        if (strstr($msg, "[TRANSACTION_ID]")) {
            $msg = str_replace("[TRANSACTION_ID]", $transaction_id, $msg);
        }
        if (strstr($msg, "[AMOUNT]")) {
            $msg = str_replace("[AMOUNT]", $price, $msg);
        }
        if (strstr($msg, "[SUBMITTED_DATE]")) {
            $msg = str_replace("[SUBMITTED_DATE]", $submit_date, $msg);
        }
        if (strstr($msg, "[CARD_NAME]")) {
            $msg = str_replace("[CARD_NAME]", $card_name, $msg);
        }
        if (strstr($msg, "[LAST_FOUR_DIGIT]")) {
            $msg = str_replace("[LAST_FOUR_DIGIT]", $last_4_digit, $msg);
        }
        if (strstr($msg, "[USER_NAME]")) {
            $msg = str_replace("[USER_NAME]", $usr_name, $msg);
        }
        if (strstr($msg, "[USER_ADDRESS]")) {
            $msg = str_replace("[USER_ADDRESS]", $full_address, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        if (strstr($msg, "[STYLEFEE]")) {
            $msg = str_replace("[STYLEFEE]", $feeprice, $msg);
        }
        return $msg;
    }

    function paymentEmailCount($msg, $name, $message, $site_name, $paymentCount) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }
        if (strstr($msg, "[COUNT]")) {
            $msg = str_replace("[COUNT]", $paymentCount, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function referenceEmail($msg, $name, $message, $site_name, $refer) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }

        if (strstr($msg, "[REFER_NAME]")) {
            $msg = str_replace("[REFER_NAME]", "<a href='" . HTTP_ROOT . 'refer/' . $refer . "'>Click here </a>", $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function create_image($name) {
        $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 0);  // yellow
        imagepng($im, BARCODE . $name);
        imagedestroy($im);
    }

    function create_profile_image($name) {
        $im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 0);  // yellow
        imagepng($im, BARCODE_PROFILE . $name);
        imagedestroy($im);
    }

    function getKidsId($userId = null) {
        $table = TableRegistry::get('Products');
        $query = $table->find('all')->where(['Products.user_id' => $userId, 'Products.kid_id !=' => 0])->select(['Products.kid_id']);
//        pj($query);exit;
        return $query;
    }

    function order($msg, $name, $site_name, $productData, $total, $subtotal, $style_fit,$kip_al) {
        if (strstr($msg, "[CUSTOMER_NAME]")) {
            $msg = str_replace("[CUSTOMER_NAME]", $name, $msg);
        }

        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        if (strstr($msg, "[PRODUCTDATA]")) {
            $msg = str_replace("[PRODUCTDATA]", $productData, $msg);
        }
        if (strstr($msg, "[TOTAL]")) {
            $msg = str_replace("[TOTAL]", $total, $msg);
        }
        if (strstr($msg, "[SUBTOTAL]")) {
            $msg = str_replace("[SUBTOTAL]", number_format($subtotal, 2), $msg);
        }
        if (strstr($msg, "[KEEP_ALL]")) {
            $msg = str_replace("[KEEP_ALL]", $kip_al, $msg);
        }
        if (strstr($msg, "[STYLE_FIT]")) {
            $msg = str_replace("[STYLE_FIT]", $style_fit, $msg);
        }
        return $msg;
    }

    function promocodesend($msg, $promocode, $price, $comment, $sitename,$expiry=null) {
        if (strstr($msg, "[PROMOCODE]")) {
            $msg = str_replace("[PROMOCODE]", $promocode, $msg);
        }
        if (strstr($msg, "[PRICE]")) {
            $msg = str_replace("[PRICE]", $price, $msg);
        }
        if (strstr($msg, "[COMMENT]")) {
            $msg = str_replace("[COMMENT]", $comment, $msg);
        }
        if (strstr($msg, "[EXPIRY_DATE]")) {
            $msg = str_replace("[EXPIRY_DATE]", $expiry, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function giftcodesend($msg, $giftcode, $price, $comment, $sitename,$expiry=null) {
        if (strstr($msg, "[GIFTCODE]")) {
            $msg = str_replace("[GIFTCODE]", $giftcode, $msg);
        }
        if (strstr($msg, "[PRICE]")) {
            $msg = str_replace("[PRICE]", $price, $msg);
        }
        if (strstr($msg, "[COMMENT]")) {
            $msg = str_replace("[COMMENT]", $comment, $msg);
        }
        if (strstr($msg, "[EXPIRY_DATE]")) {
            $msg = str_replace("[EXPIRY_DATE]", $expiry, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function orderK($msg, $name, $site_name, $customer_data, $kid_data, $detailsKid, $total, $subtotal, $sales_tax) {

        $usersData = '';
        $style_pick_total = 0;
        $i = 1;
        //pj($detailsKid); exit;
        foreach ($customer_data as $customer_data_review) {

            if ($customer_data_review->keep_status == 3) {
                $price = $customer_data_review->sell_price;
            } else {
                $price = 0;
            }

            if ($customer_data_review->keep_status == 3) {
                $keep = 'Keeps';
            } elseif ($customer_data_review->keep_status == 2) {
                $keep = 'Exchange';
            } else {
                $keep = 'Return';
            }
            $style_pick_total += (double) $customer_data_review->sell_price;
            $usersData .= "<tr style='border-bottom: 1px solid black;text-align: left;'>
                        <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               #or " . $i++ . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $customer_data_review->product_image . "' style='width: 100px;'/>
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $customer_data_review->product_name_one . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $customer_data_review->product_name_two . "
                            </td>
                           <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                                " . $keep . "
                            </td> 
                            
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $customer_data_review->size . "
                            </td>                  
                                                      
                            <td style='text-align: center;padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               $" . number_format($price, 2) . "
                            </td>
                    </tr>";
        }

        $style_pick_totalkids = 0;
        $i = 1;
        $namek = '';
        foreach ($kid_data as $customer_data_review) {
            $namek .= "<tr><th colspan='5' style = 'text-align: center;'>
                       Kids Name:- " . $customer_data_review->kids_detail->kids_first_name .
                    " </th></tr>";
            $s = 1;
            foreach ($detailsKid[$customer_data_review->kid_id] as $kidsp) {

                if ($kidsp->keep_status == 3) {
                    $keep = 'Keeps';
                } elseif ($kidsp->keep_status == 2) {
                    $keep = 'Exchange';
                } else {
                    $keep = 'Return';
                }

                if ($kidsp->keep_status == 3) {
                    $price = $kidsp->sell_price;
                } else {
                    $price = 0;
                }


                $namek .= "<tr style='border-bottom: 1px solid black;text-align: left;'>
                        <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               # " . $s . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                              <img src='" . HTTP_ROOT . PRODUCT_IMAGES . $kidsp->product_image . "' style='width: 100px;'/>
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $kidsp->product_name_one . "
                            </td>
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $kidsp->product_name_two . "
                            </td>
                           <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                                " . $keepkid . "
                            </td> 
                            
                            <td style='padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               " . $kidsp->size . "
                            </td>                  
                                                       
                            <td style='text-align: center;padding: 10px 0px;border-bottom: 1px solid #ddd;'>
                               $" . number_format($kidsp->sell_price, 2) . "
                            </td>
                        </tr>";

                $s++;
            }
            $i++;
        }









        $msg = "<div style='width: 100%;text-align: center;'>
    <h5 style='color:#5a5656;'>Your check out receipt</h5>
    <table align='center' style='width:90%;'>
        <thead>
            <tr>
                <th style='padding: 10px 0px;font-size:30px;border-bottom: 1px solid #ddd;border-top: 1px solid #ddd;background: #000;'>
                    <span style='font-weight: 100;color: #fff;'>DrapeFit</span>
                </th>
            </tr>
            <tr>
                <th>
                    <h2 style='padding-top: 30px;margin:0;font-size: 30px;color:#d64ade'>Checkout Receipt</h2>
                    <h4 style='font-size: 13px;color:#5a5656;'>Here's the receipt</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table style='width: 100%;text-align: right;'>
                        <tr >
                            <th  colspan='6' style='text-align: center;'>
                                Your Stylist Picks
                            </th>
                        </tr>
                        <tr style='border: 1px solid black;text-align: left;'>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Sno
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Image
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Product name 1
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Product name 2
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                KEEPING
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Size
                            </th>
                            <th style='padding: 10px 10px;border-bottom: 1px solid #434141;'>
                                Cost
                            </th>
                        </tr>
                         <tr>
                            <th colspan='5'  style = 'text-align: center;'>
                                Customer Name:- " . $name . "
                            </th>


                        </tr>" . $usersData . "  
                         
                        
                        " . $namek . "


                        <tr>
                            <td colspan='5' style='text-align: right;padding-bottom: 20px;'>
                                Stylist Picks Subtotal
                            </td>
                            <td style='text-align: center;padding-bottom: 30px;padding-top: 10px;'>
                                $" . $subtotal . "
                            </td>
                        </tr>



                        <tr>
                            <td colspan='5' style='text-align: right;padding-bottom: 10px;'>
                                order Subtotal
                            </td>
                            <td style='text-align: center;padding-bottom: 10px;'>
                                $" . $subtotal . "
                            </td>
                        </tr>	
                        <tr>
                            <td colspan='5' style='text-align: right;padding-bottom: 10px;'>
                                Sales tax
                            </td>
                            <td style='text-align: center;padding-bottom: 10px;'>
                                $" . $sales_tax . "
                            </td>
                        </tr>	
                        <tr>
                            <td colspan='5 style='text-align: right;padding-bottom: 10px;border-bottom: 1px solid #ddd;'>
                                <strong>order total</strong>
                            </td>
                            <td style='text-align: center;padding-bottom: 10px;border-bottom: 1px solid #ddd;'>
                                $" . $total . "
                            </td>
                        </tr>
                        <tr>
                            <td colspan='5' style='text-align: center;padding-bottom: 120px;border-bottom: 1px solid #ddd;'>
                                <em><strong style='font-size: 13px;'>Thanks for letting us style you.</strong></em>
                            </td>
                        </tr>	
                    </table>	
                </td>
            </tr>
        </tbody>
    </table>	
</div>";

        return $msg;
    }

    function timeElapsedString($datetime) {
        $now = date_create(date("Y-m-d H:i:s"));  //current date
        $your_date = date_create($datetime);   //Your Date
        $datediff = date_diff($now, $datetime);

        if ($datediff->format('%d') == 0) {
            $date = date_format($datetime, "H:i:s A");
        } else {
            $date = date_format($your_date, "M j, y");
        }
        return $date;
    }

    function EmployeeAssignedFormat($msg, $profile_name, $name, $site_name) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[PNAME]")) {
            $msg = str_replace("[PNAME]", $profile_name, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }
    function EmployeeAssignedKidFormat($msg, $profile_name, $name, $site_name, $kidname) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[PNAME]")) {
            $msg = str_replace("[PNAME]", $profile_name, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }
        return $msg;
    }
    function kidName($id) {
        $table = TableRegistry::get('KidsDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = '';
        if (!empty($query->kids_first_name)) {
            $name = $query->kids_first_name;
        }
        
        return $name;
    }

    function productFinalize($msg, $profile_name, $name, $site_name, $track_number = null, $purchase_date = null, $address1 = null, $address2 = null, $address3 = null) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[PNAME]")) {
            $msg = str_replace("[PNAME]", $profile_name, $msg);
        }

        if (strstr($msg, "[TRACK_NUMBER]")) {
            $msg = str_replace("[TRACK_NUMBER]", $track_number, $msg);
        }

        if (strstr($msg, "[ARRIVE_DATE]")) {
            $msg = str_replace("[ARRIVE_DATE]", $purchase_date, $msg);
        }

        if (strstr($msg, "[ADDRESS1]")) {
            $msg = str_replace("[ADDRESS1]", $address1, $msg);
        }
        if (strstr($msg, "[ADDRESS]")) {
            $msg = str_replace("[ADDRESS]", $address3, $msg);
        }

        if (strstr($msg, "[STATE_PIN_COUNTRY]")) {
            $msg = str_replace("[STATE_PIN_COUNTRY]", $address2, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function encrypt_decrypt($action=null, $string=null) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'Debendra11dfg89we@wre#wejew12#gfsdg#gvxdc$hdbff%sjhd.swsw9760122';
        $secret_iv = 'debendraT22df67his@vcv89cvcvc#dsd12&ccv$v90ve12t%vbiv';
        // hash
        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    function loginRedirectAjax($userId) {
        $table = TableRegistry::get('Users');
        $table2 = TableRegistry::get('UserDetails');
        $afterLoginCheck = $table->find('all')->where(['id' => $userId])->first();
        $afterLoginCheck2 = $table2->find('all')->where(['user_id' => $userId])->first();

        if ($afterLoginCheck->is_redirect == 0 && $afterLoginCheck2->is_progressbar != 100) {
            $url = 'welcome/style/';
        } elseif ($afterLoginCheck->is_redirect == 0 && $afterLoginCheck2->is_progressbar == 100) {

            $url = 'welcome/schedule/';
        } elseif ($afterLoginCheck->is_redirect == 1) {
            $url = 'welcome/schedule/';
        } elseif ($afterLoginCheck->is_redirect == 2) {
            $url = 'not-yet-shipped';
        } elseif ($afterLoginCheck->is_redirect == 3) {
            $url = 'profile-review/';
        } elseif ($afterLoginCheck->is_redirect == 4) {
            $url = 'order_review/';
        } elseif ($afterLoginCheck->is_redirect == 5) {
            $url = 'calendar-sechedule/';
        } elseif ($afterLoginCheck->is_redirect == 6) {
            $url = 'customer-order-review';
        }
        return $url;
    }

    function notifications($userId, $kid_id, $msg) {
        $notifications = TableRegistry::get('Notifications');
        $notificationsTable = $notifications->newEntity();
        $notificationsTable->user_id = $userId;
        $notificationsTable->$msg = $msg;
        $notificationsTable->is_read = 0;
        $notificationsTable->created = data('Y-m-d H:i:s');
        $notificationsTable->kid_id = $kid_id;
        $this->$notifications->save($notificationsTable);
        return 1;
    }

    function getAllMeg($errorCode = null) {
        $msg = '';
        if ($errorCode == 'I00001') {
            return $msg = "Successful";
        } else if ($errorCode == 'I00002') {
            return $msg = "The subscription has already been canceled.";
        } else if ($errorCode == 'I00003') {
            return $msg = "The record has already been deleted.";
        } else if ($errorCode == 'I00004') {
            return $msg = "No records found";
        } else if ($errorCode == 'I00005') {
            return $msg = "he mobile device has been submitted for approval by the account administrator.";
        } else if ($errorCode == 'I00006') {
            return $msg = "The mobile device is approved and ready for use";
        } else if ($errorCode == 'I00007') {
            return $msg = "The Payment Gateway Account service (id=8) has already been accepted.";
        } else if ($errorCode == 'I00008') {
            return $msg = "The Payment Gateway Account service (id=8) has already been declined.";
        } else if ($errorCode == 'I00009') {
            return $msg = "The APIUser already exists.";
        } else if ($errorCode == 'I00010') {
            return $msg = "The merchant is activated successfully";
        } else if ($errorCode == 'I00011') {
            return $msg = "The merchant is not activated.";
        } else if ($errorCode == 'I99999') {
            return $msg = "This feature has not yet been completed. One day it will be but it looks like today is not that day.";
        } else if ($errorCode == 'E00001') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == 'E00002') {
            return $msg = "The content-type specified is not supported.";
        } else if ($errorCode == 'E00003') {
            return $msg = "An error occurred while parsing the XML request.";
        } else if ($errorCode == 'E00004') {
            return $msg = "The name of the requested API method is invalid.";
        } else if ($errorCode == 'E00005') {
            return $msg = "The transaction key or API key is invalid or not present.";
        } else if ($errorCode == 'E00006') {
            return $msg = "The API user name is invalid or not present.";
        } else if ($errorCode == 'E00007') {
            return $msg = "User authentication failed due to invalid authentication values.";
        } else if ($errorCode == 'E00008') {
            return $msg = "User authentication failed. The account or API user is inactive.";
        } else if ($errorCode == 'E00009') {
            return $msg = "The payment gateway account is in Test Mode. The request cannot be processed.";
        } else if ($errorCode == 'E00010') {
            return $msg = "User authentication failed. You do not have the appropriate permissions";
        } else if ($errorCode == 'E00011') {
            return $msg = "Access denied. You do not have the appropriate permissions.";
        } else if ($errorCode == 'E00012') {
            return $msg = "A duplicate subscription already exists.";
        } else if ($errorCode == 'E00013') {
            return $msg = "The field is invalid";
        } else if ($errorCode == 'E00014') {
            return $msg = "A required field is not present.";
        } else if ($errorCode == 'E00015') {
            return $msg = "The field length is invalid.";
        } else if ($errorCode == 'E00016') {
            return $msg = "The field type is invalid.";
        } else if ($errorCode == 'E00017') {
            return $msg = "The start date cannot occur in the past.";
        } else if ($errorCode == 'E00018') {
            return $msg = "The credit card expires before the subscription start date.";
        } else if ($errorCode == 'E00019') {
            return $msg = "The customer tax id or drivers license information is required.";
        } else if ($errorCode == 'E00020') {
            return $msg = "The payment gateway account is not enabled for eCheck.Net subscriptions";
        } else if ($errorCode == 'E00021') {
            return $msg = "The payment gateway account is not enabled for credit card subscriptions.";
        } else if ($errorCode == 'E00022') {
            return $msg = "The interval length cannot exceed 365 days or 12 months";
        } else if ($errorCode == 'E00023') {
            return $msg = "The subscription duration cannot exceed three years";
        } else if ($errorCode == 'E00024') {
            return $msg = "Trial Occurrences is required when Trial Amount is specified.";
        } else if ($errorCode == 'E00025') {
            return $msg = "Automated Recurring Billing is not enabled.";
        } else if ($errorCode == 'E00026') {
            return $msg = "Both Trial Amount and Trial Occurrences are required.";
        } else if ($errorCode == 'E00027') {
            return $msg = "The transaction was unsuccessful.";
        } else if ($errorCode == 'E00028') {
            return $msg = "Trial Occurrences must be less than Total Occurrences.";
        } else if ($errorCode == 'E00029') {
            return $msg = "Payment information is required.";
        } else if ($errorCode == 'E00030') {
            return $msg = "The payment schedule is required.";
        } else if ($errorCode == 'E00031') {
            return $msg = "The amount is required.";
        } else if ($errorCode == 'E00032') {
            return $msg = "The start date is required.";
        } else if ($errorCode == 'E00033') {
            return $msg = "The start date cannot be changed.";
        } else if ($errorCode == 'E00034') {
            return $msg = "The interval information cannot be changed.";
        } else if ($errorCode == 'E00035') {
            return $msg = "The subscription cannot be found.";
        } else if ($errorCode == 'E00036') {
            return $msg = "The payment type cannot be changed.";
        } else if ($errorCode == 'E00037') {
            return $msg = "The subscription cannot be updated.";
        } else if ($errorCode == 'E00038') {
            return $msg = "The subscription cannot be canceled.";
        } else if ($errorCode == 'E00039') {
            return $msg = "A duplicate record already exists.";
        } else if ($errorCode == 'E00040') {
            return $msg = "The record cannot be found.";
        } else if ($errorCode == 'E00041') {
            return $msg = "One or more fields must contain a value.";
        } else if ($errorCode == 'E00042') {
            return $msg = "You cannot add more than {0} payment profiles.";
        } else if ($errorCode == 'E00043') {
            return $msg = "You cannot add more than {0} shipping addresses.";
        } else if ($errorCode == 'E00044') {
            return $msg = "Customer Information Manager is not enabled.";
        } else if ($errorCode == 'E00045') {
            return $msg = "The root node does not reference a valid XML namespace.";
        } else if ($errorCode == 'E00046') {
            return $msg = "Generic InsertNewMerchant failure.";
        } else if ($errorCode == 'E00047') {
            return $msg = "Merchant Boarding API is not enabled.";
        } else if ($errorCode == 'E00048') {
            return $msg = "At least one payment method must be set in payment types or an echeck service must be provided";
        } else if ($errorCode == 'E00049') {
            return $msg = "The operation timed out before it could be completed.";
        } else if ($errorCode == 'E00050') {
            return $msg = "Sell Rates cannot be less than Buy Rates";
        } else if ($errorCode == 'E00051') {
            return $msg = "The original transaction was not issued for this payment profile.";
        } else if ($errorCode == 'E00052') {
            return $msg = "The maximum number of elements for an array {0} is {1}.";
        } else if ($errorCode == 'E00053') {
            return $msg = "Server too busy";
        } else if ($errorCode == 'E00054') {
            return $msg = "The mobile device is not registered with this merchant account.";
        } else if ($errorCode == 'E00055') {
            return $msg = "The mobile device has already been registered but is pending approval by the account administrator.";
        } else if ($errorCode == 'E00056') {
            return $msg = "The mobile device has been disabled for use with this account.";
        } else if ($errorCode == 'E00057') {
            return $msg = "The user does not have permissions to submit requests from a mobile device.";
        } else if ($errorCode == 'E00058') {
            return $msg = "The merchant has met or exceeded the number of pending mobile devices permitted for this account.";
        } else if ($errorCode == 'E00059') {
            return $msg = "The authentication type is not allowed for this method call.";
        } else if ($errorCode == 'E00060') {
            return $msg = "The transaction type is invalid.";
        } else if ($errorCode == 'E00062') {
            return $msg = "Fatal error when calling web service.";
        } else if ($errorCode == 'E00063') {
            return $msg = "Calling web service return error.";
        } else if ($errorCode == 'E00064') {
            return $msg = "Client authorization denied.";
        } else if ($errorCode == 'E00065') {
            return $msg = "Prerequisite failed.";
        } else if ($errorCode == 'E00066') {
            return $msg = "Invalid value.";
        } else if ($errorCode == 'E00067') {
            return $msg = "An error occurred while parsing the XML request. Too many {0} specified.";
        } else if ($errorCode == 'E00068') {
            return $msg = "An error occurred while parsing the XML request. {0} is invalid.";
        } else if ($errorCode == 'E00069') {
            return $msg = "The Payment Gateway Account service (id=8) has already been accepted. Decline is not allowed.";
        } else if ($errorCode == 'E00070') {
            return $msg = "The Payment Gateway Account service (id=8) has already been declined. Agree is not allowed.";
        } else if ($errorCode == 'E00071') {
            return $msg = "{0} must contain data.";
        } else if ($errorCode == 'E00072') {
            return $msg = "Required node missing.";
        } else if ($errorCode == 'E00073') {
            return $msg = "One of the field values is not valid.";
        } else if ($errorCode == 'E00074') {
            return $msg = "This merchant is not associated with this reseller.";
        } else if ($errorCode == 'E00075') {
            return $msg = "This is the result of an XML parser error. Missing field(s).";
        } else if ($errorCode == 'E00076') {
            return $msg = "Invalid value.";
        } else if ($errorCode == 'E00077') {
            return $msg = "Value too long.";
        } else if ($errorCode == 'E00078') {
            return $msg = "Pending Status (not completed).";
        } else if ($errorCode == 'E00079') {
            return $msg = "The impersonation login ID is invalid or not present.";
        } else if ($errorCode == 'E00080') {
            return $msg = "The impersonation API Key is invalid or not present.";
        } else if ($errorCode == 'E00081') {
            return $msg = "Partner account is not authorized to impersonate the login account.";
        } else if ($errorCode == 'E00082') {
            return $msg = "Country is not valid.";
        } else if ($errorCode == 'E00083') {
            return $msg = "Bank payment method is not accepted for the selected business country.";
        } else if ($errorCode == 'E00084') {
            return $msg = "Credit card payment method is not accepted for the selected business country.";
        } else if ($errorCode == 'E00085') {
            return $msg = "State for {0} is not valid.";
        } else if ($errorCode == 'E00086') {
            return $msg = "Merchant has declined authorization to resource.";
        } else if ($errorCode == 'E00087') {
            return $msg = "No subscriptions found for the given request.";
        } else if ($errorCode == 'E00088') {
            return $msg = "ProfileIds cannot be sent when requesting CreateProfile";
        } else if ($errorCode == 'E00089') {
            return $msg = "Payment data is required when requesting CreateProfile.";
        } else if ($errorCode == 'E00090') {
            return $msg = "PaymentProfile and PaymentData are mutually exclusive, only one of them can be provided at a time.";
        } else if ($errorCode == 'E00091') {
            return $msg = "PaymentProfileId cannot be sent with payment data.";
        } else if ($errorCode == 'E00092') {
            return $msg = "ShippingProfileId cannot be sent with ShipTo data.";
        } else if ($errorCode == 'E00093') {
            return $msg = "PaymentProfile cannot be sent with billing data.";
        } else if ($errorCode == 'E00094') {
            return $msg = "Paging Offset exceeds the maximum allowed value";
        } else if ($errorCode == 'E00095') {
            return $msg = "ShippingProfileId is not provided within Customer Profile.";
        } else if ($errorCode == 'E00096') {
            return $msg = "Finger Print value is not valid.";
        } else if ($errorCode == 'E00097') {
            return $msg = "Finger Print can't be generated.";
        } else if ($errorCode == 'E00098') {
            return $msg = "Customer Profile ID or Shipping Profile ID not found.";
        } else if ($errorCode == 'E00099') {
            return $msg = "Customer profile creation failed. This transaction ID is invalid.";
        } else if ($errorCode == 'E00100') {
            return $msg = "Customer profile creation failed. This transaction type does not support profile creation.";
        } else if ($errorCode == 'E00101') {
            return $msg = "Customer profile creation failed.";
        } else if ($errorCode == 'E00102') {
            return $msg = "Customer Info is missing.";
        } else if ($errorCode == 'E00103') {
            return $msg = "Customer profile creation failed. This payment method does not support profile creation";
        } else if ($errorCode == 'E00104') {
            return $msg = "Server in maintenance. Please try again later.";
        } else if ($errorCode == 'E00105') {
            return $msg = "The specified payment profile is associated with an active or suspended subscription and cannot be deleted.";
        } else if ($errorCode == 'E00106') {
            return $msg = "The specified customer profile is associated with an active or suspended subscription and cannot be deleted";
        } else if ($errorCode == 'E00107') {
            return $msg = "The specified shipping profile is associated with an active or suspended subscription and cannot be deleted.";
        } else if ($errorCode == 'E00108') {
            return $msg = "CustomerProfileId cannot be sent with customer data";
        } else if ($errorCode == 'E00109') {
            return $msg = "CustomerAddressId cannot be sent with shipTo data.";
        } else if ($errorCode == 'E00110') {
            return $msg = "CustomerPaymentProfileId is not provided within Customer Profile.";
        } else if ($errorCode == 'E00111') {
            return $msg = "The original subscription was not created with this Customer Profile.";
        } else if ($errorCode == 'E00112') {
            return $msg = "The specified month should not be in the future.";
        } else if ($errorCode == 'E00113') {
            return $msg = "Invalid OTS Token Data.";
        } else if ($errorCode == 'E00114') {
            return $msg = "Invalid OTS Token.";
        } else if ($errorCode == 'E00115') {
            return $msg = "Expired OTS Token.";
        } else if ($errorCode == 'E00116') {
            return $msg = "OTS Token access violation";
        } else if ($errorCode == 'E00117') {
            return $msg = "OTS Service Error '{0}'";
        } else if ($errorCode == 'E00118') {
            return $msg = "The transaction has been declined.";
        } else if ($errorCode == 'E00119') {
            return $msg = "Payment information should not be sent to Hosted Payment Page request.";
        } else if ($errorCode == 'E00120') {
            return $msg = "Payment and Shipping Profile IDs cannot be specified when creating new profiles.";
        } else if ($errorCode == 'E00121') {
            return $msg = "No default payment/shipping profile found.";
        } else if ($errorCode == 'E00122') {
            return $msg = "Please use Merchant Interface settings (API Credentials and Keys) to generate a signature key.";
        } else if ($errorCode == 'E00123') {
            return $msg = "The provided access token has expired";
        } else if ($errorCode == 'E00124') {
            return $msg = "The provided access token is invalid";
        } else if ($errorCode == 'E00125') {
            return $msg = "Hash doesnâ€™t match";
        } else if ($errorCode == 'E00126') {
            return $msg = "Failed shared key validation";
        } else if ($errorCode == 'E00127') {
            return $msg = "Invoice does not exist";
        } else if ($errorCode == 'E00128') {
            return $msg = "Requested action is not allowed";
        } else if ($errorCode == 'E00129') {
            return $msg = "Failed sending email";
        } else if ($errorCode == 'E00130') {
            return $msg = "Valid Customer Profile ID or Email is required";
        } else if ($errorCode == 'E00131') {
            return $msg = "Invoice created but not processed completely";
        } else if ($errorCode == 'E00132') {
            return $msg = "Invoicing or CIM service is not enabled.";
        } else if ($errorCode == 'E00133') {
            return $msg = "Server error.";
        } else if ($errorCode == 'E00134') {
            return $msg = "Due date is invalid";
        } else if ($errorCode == 'E00135') {
            return $msg = "Merchant has not provided processor information.";
        } else if ($errorCode == 'E00136') {
            return $msg = "Processor account is still in process, please try again later.";
        } else if ($errorCode == 'E00137') {
            return $msg = "Multiple payment types are not allowed.";
        } else if ($errorCode == 'E00138') {
            return $msg = "Payment and Shipping Profile IDs cannot be specified when requesting a hosted payment page.";
        } else if ($errorCode == 'E00139') {
            return $msg = "Access denied. Access Token does not have correct permissions for this API.";
        } else if ($errorCode == 'E00140') {
            return $msg = "Reference Id not found";
        } else if ($errorCode == 'E00141') {
            return $msg = "Payment Profile creation with this OpaqueData descriptor requires transactionMode to be set to liveMode.";
        } else if ($errorCode == 'E00142') {
            return $msg = "RecurringBilling setting is a required field for recurring tokenized payment transactions.";
        } else if ($errorCode == 'E00143') {
            return $msg = "Failed to parse MerchantId to integer";
        } else if ($errorCode == 'E00144') {
            return $msg = "We are currently holding the last transaction for review. Before you reactivate the subscription, review the transaction.";
        } else if ($errorCode == 'E00145') {
            return $msg = "This invoice has been canceled by the sender. Please contact the sender directly if you have questions. ";
        } else if ($errorCode == '0') {
            return $msg = "Unknown Error";
        } else if ($errorCode == '1') {
            return $msg = "This transaction has been approved.";
        } else if ($errorCode == '2') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '3') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '4') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '5') {
            return $msg = "A valid amount is required.";
        } else if ($errorCode == '6') {
            return $msg = "The credit card number is invalid.";
        } else if ($errorCode == '7') {
            return $msg = "Credit card expiration date is invalid.";
        } else if ($errorCode == '8') {
            return $msg = "The credit card has expired";
        } else if ($errorCode == '9') {
            return $msg = "The ABA code is invalid";
        } else if ($errorCode == '10') {
            return $msg = "The account number is invalid";
        } else if ($errorCode == '11') {
            return $msg = "A duplicate transaction has been submitted.";
        } else if ($errorCode == '12') {
            return $msg = "An authorization code is required but not present.";
        } else if ($errorCode == '13') {
            return $msg = "The merchant login ID or password is invalid or the account is inactive. 	";
        } else if ($errorCode == '14') {
            return $msg = "The referrer, relay response or receipt link URL is invalid.";
        } else if ($errorCode == '15') {
            return $msg = "The transaction ID is invalid or not present.";
        } else if ($errorCode == '16') {
            return $msg = "The transaction cannot be found.";
        } else if ($errorCode == '17') {
            return $msg = "The merchant does not accept this type of credit card.";
        } else if ($errorCode == '18') {
            return $msg = "ACH transactions are not accepted by this merchant.";
        } else if ($errorCode == '19') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '20') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '21') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '22') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '23') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '24') {
            return $msg = "The Elavon bank number or terminal ID is incorrect. Call Merchant Service Provider.";
        } else if ($errorCode == '25') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '26') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '27') {
            return $msg = "The transaction has been declined because of an AVS mismatch. The address provided does not match billing address of cardholder.";
        } else if ($errorCode == '28') {
            return $msg = "The merchant does not accept this type of credit card.";
        } else if ($errorCode == '29') {
            return $msg = "The Paymentech identification numbers are incorrect. Call Merchant Service Provider.";
        } else if ($errorCode == '30') {
            return $msg = "The configuration with processor is invalid. Call Merchant Service Provider.";
        } else if ($errorCode == '31') {
            return $msg = "The FDC Merchant ID or Terminal ID is incorrect. Call Merchant Service Provider.";
        } else if ($errorCode == '32') {
            return $msg = "The merchant password is invalid or not present.";
        } else if ($errorCode == '33') {
            return $msg = "%s cannot be left blank.";
        } else if ($errorCode == '34') {
            return $msg = "The VITAL identification numbers are incorrect. Call Merchant Service Provider.";
        } else if ($errorCode == '35') {
            return $msg = "An error occurred during processing. Call Merchant Service Provider.";
        } else if ($errorCode == '36') {
            return $msg = "The authorization was approved but settlement failed.";
        } else if ($errorCode == '37') {
            return $msg = "The credit card number is invalid.";
        } else if ($errorCode == '38') {
            return $msg = "The Global Payment System identification numbers are incorrect. Call Merchant Service Provider.";
        } else if ($errorCode == '39') {
            return $msg = "The supplied currency code is either invalid, not supported, not allowed for this merchant or doesnt have an exchange rate.";
        } else if ($errorCode == '40') {
            return $msg = "This transaction must be encrypted.";
        } else if ($errorCode == '41') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '42') {
            return $msg = "There is missing or invalid information in a required field.";
        } else if ($errorCode == '43') {
            return $msg = "The merchant was incorrectly set up at the processor. Call Merchant Service Provider.";
        } else if ($errorCode == '44') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '45') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '46') {
            return $msg = "Your session has expired or does not exist. You must log in again to continue working.";
        } else if ($errorCode == '47') {
            return $msg = "The amount requested for settlement cannot be greater than the original amount authorized.";
        } else if ($errorCode == '48') {
            return $msg = "This processor does not accept partial reversals.";
        } else if ($errorCode == '49') {
            return $msg = "The transaction amount submitted was greater than the maximum amount allowed.";
        } else if ($errorCode == '50') {
            return $msg = "This transaction is awaiting settlement and cannot be refunded.";
        } else if ($errorCode == '51') {
            return $msg = "The sum of all credits against this transaction is greater than the original transaction amount.";
        } else if ($errorCode == '52') {
            return $msg = "The transaction was authorized but the client could not be notified; it will not be settled.";
        } else if ($errorCode == '53') {
            return $msg = "The transaction type is invalid for ACH transactions.";
        } else if ($errorCode == '54') {
            return $msg = "The referenced transaction does not meet the criteria for issuing a credit.";
        } else if ($errorCode == '55') {
            return $msg = "The sum of credits against the referenced transaction would exceed original debit amount.";
        } else if ($errorCode == '56') {
            return $msg = "Credit card transactions are not accepted by this merchant.";
        } else if ($errorCode == '57') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '58') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '59') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '60') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '61') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '62') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '63') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '64') {
            return $msg = "The referenced transaction was not approved.";
        } else if ($errorCode == '65') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '66') {
            return $msg = "This transaction cannot be accepted for processing.";
        } else if ($errorCode == '67') {
            return $msg = "This transaction cannot be accepted for processing.";
        } else if ($errorCode == '68') {
            return $msg = "The version parameter is invalid";
        } else if ($errorCode == '69') {
            return $msg = "The transaction type is invalid";
        } else if ($errorCode == '70') {
            return $msg = "The transaction method is invalid.";
        } else if ($errorCode == '71') {
            return $msg = "The bank account type is invalid.";
        } else if ($errorCode == '72') {
            return $msg = "The authorization code is invalid.";
        } else if ($errorCode == '73') {
            return $msg = "The drivers license date of birth is invalid.";
        } else if ($errorCode == '74') {
            return $msg = "The duty amount is invalid.";
        } else if ($errorCode == '75') {
            return $msg = "The freight amount is invalid.";
        } else if ($errorCode == '76') {
            return $msg = "The tax amount is invalid.";
        } else if ($errorCode == '77') {
            return $msg = "The SSN or tax ID is invalid.";
        } else if ($errorCode == '78') {
            return $msg = "The card code is invalid.";
        } else if ($errorCode == '79') {
            return $msg = "The drivers license number is invalid.";
        } else if ($errorCode == '80') {
            return $msg = "The drivers license state is invalid.";
        } else if ($errorCode == '81') {
            return $msg = "The requested form type is invalid.";
        } else if ($errorCode == '82') {
            return $msg = "Scripts are only supported in version 2.5.";
        } else if ($errorCode == '83') {
            return $msg = "The requested script is either invalid or no longer supported.";
        } else if ($errorCode == '84') {
            return $msg = "The device type is invalid or missing.";
        } else if ($errorCode == '85') {
            return $msg = "The market type is invalid";
        } else if ($errorCode == '86') {
            return $msg = "The Response Format is invalid";
        } else if ($errorCode == '87') {
            return $msg = "Transactions of this market type cannot be processed on this system.";
        } else if ($errorCode == '88') {
            return $msg = "Track1 data is not in a valid format.";
        } else if ($errorCode == '89') {
            return $msg = "Track2 data is not in a valid format.";
        } else if ($errorCode == '90') {
            return $msg = "ACH transactions cannot be accepted by this system.";
        } else if ($errorCode == '91') {
            return $msg = "Version 2.5 is no longer supported.";
        } else if ($errorCode == '92') {
            return $msg = "The gateway no longer supports the requested method of integration.";
        } else if ($errorCode == '93') {
            return $msg = "A valid country is required.";
        } else if ($errorCode == '94') {
            return $msg = "The shipping state or country is invalid.";
        } else if ($errorCode == '95') {
            return $msg = "A valid state is required.";
        } else if ($errorCode == '96') {
            return $msg = "This country is not authorized for buyers.";
        } else if ($errorCode == '97') {
            return $msg = "This transaction cannot be accepted.";
        } else if ($errorCode == '98') {
            return $msg = "This transaction cannot be accepted.";
        } else if ($errorCode == '99') {
            return $msg = "This transaction cannot be accepted.";
        } else if ($errorCode == '100') {
            return $msg = "The eCheck type parameter is invalid.";
        } else if ($errorCode == '101') {
            return $msg = "The given name on the account and/or the account type does not match the actual account.";
        } else if ($errorCode == '102') {
            return $msg = "This request cannot be accepted.";
        } else if ($errorCode == '103') {
            return $msg = "This transaction cannot be accepted.";
        } else if ($errorCode == '104') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '105') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '106') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '107') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '108') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '109') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '110') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '111') {
            return $msg = "A valid billing country is required.";
        } else if ($errorCode == '112') {
            return $msg = "A valid billing state/province is required.";
        } else if ($errorCode == '113') {
            return $msg = "The commercial card type is invalid.";
        } else if ($errorCode == '114') {
            return $msg = "The merchant account is in test mode. This automated payment will not be processed.";
        } else if ($errorCode == '115') {
            return $msg = "The merchant account is not active. This automated payment will not be processed.";
        } else if ($errorCode == '116') {
            return $msg = "The authentication indicator is invalid.";
        } else if ($errorCode == '117') {
            return $msg = "The cardholder authentication value is invalid.";
        } else if ($errorCode == '118') {
            return $msg = "The combination of card type, authentication indicator and cardholder authentication value is invalid.";
        } else if ($errorCode == '119') {
            return $msg = "Transactions having cardholder authentication values cannot be marked as recurring.";
        } else if ($errorCode == '120') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '121') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '122') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '123') {
            return $msg = "This account has not been given the permission(s) required for this request.";
        } else if ($errorCode == '124') {
            return $msg = "This processor does not accept recurring transactions.";
        } else if ($errorCode == '125') {
            return $msg = "The surcharge amount is invalid.";
        } else if ($errorCode == '126') {
            return $msg = "The Tip amount is invalid.";
        } else if ($errorCode == '127') {
            return $msg = "The transaction resulted in an AVS mismatch. The address provided does not match billing address of cardholder.";
        } else if ($errorCode == '128') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '130') {
            return $msg = "This merchant account has been closed.";
        } else if ($errorCode == '131') {
            return $msg = "This transaction cannot be accepted at this time.";
        } else if ($errorCode == '132') {
            return $msg = "This transaction cannot be accepted at this time.";
        } else if ($errorCode == '141') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '145') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '153') {
            return $msg = "There was an error processing the payment data.";
        } else if ($errorCode == '154') {
            return $msg = "Processing Apple Payments is not enabled for this merchant account";
        } else if ($errorCode == '155') {
            return $msg = "This processor does not support this method of submitting payment data.";
        } else if ($errorCode == '156') {
            return $msg = "The cryptogram is either invalid or cannot be used in combination with other parameters.";
        } else if ($errorCode == '157') {
            return $msg = "";
        } else if ($errorCode == '158') {
            return $msg = "";
        } else if ($errorCode == '159') {
            return $msg = "";
        } else if ($errorCode == '160') {
            return $msg = "";
        } else if ($errorCode == '161') {
            return $msg = "";
        } else if ($errorCode == '162') {
            return $msg = "";
        } else if ($errorCode == '163') {
            return $msg = "";
        } else if ($errorCode == '164') {
            return $msg = "";
        } else if ($errorCode == '165') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '166') {
            return $msg = "";
        } else if ($errorCode == '167') {
            return $msg = "";
        } else if ($errorCode == '168') {
            return $msg = "";
        } else if ($errorCode == '169') {
            return $msg = "";
        } else if ($errorCode == '170') {
            return $msg = "An error occurred during processing. Please contact the merchant.";
        } else if ($errorCode == '171') {
            return $msg = "An error occurred during processing. Please contact the merchant.";
        } else if ($errorCode == '172') {
            return $msg = "An error occurred during processing. Please contact the merchant.";
        } else if ($errorCode == '173') {
            return $msg = "An error occurred during processing. Please contact the merchant.";
        } else if ($errorCode == '174') {
            return $msg = "The transaction type is invalid. Please contact the merchant.";
        } else if ($errorCode == '175') {
            return $msg = "This processor does not allow voiding of credits.";
        } else if ($errorCode == '176') {
            return $msg = "";
        } else if ($errorCode == '177') {
            return $msg = "";
        } else if ($errorCode == '178') {
            return $msg = "";
        } else if ($errorCode == '179') {
            return $msg = "";
        } else if ($errorCode == '180') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '181') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '182') {
            return $msg = "One or more of the sub-merchant values are invalid.";
        } else if ($errorCode == '183') {
            return $msg = "One or more of the required sub-merchant values are missing.";
        } else if ($errorCode == '184') {
            return $msg = "Invalid Token Requestor Name.";
        } else if ($errorCode == '185') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '186') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '187') {
            return $msg = "Invalid Token Requestor ECI Length.";
        } else if ($errorCode == '188') {
            return $msg = "";
        } else if ($errorCode == '189') {
            return $msg = "";
        } else if ($errorCode == '190') {
            return $msg = "";
        } else if ($errorCode == '191') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '192') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '193') {
            return $msg = "The transaction is currently under review.";
        } else if ($errorCode == '194') {
            return $msg = "";
        } else if ($errorCode == '195') {
            return $msg = "One or more of the HTML type configuration fields do not appear to be safe.";
        } else if ($errorCode == '196') {
            return $msg = "";
        } else if ($errorCode == '197') {
            return $msg = "";
        } else if ($errorCode == '198') {
            return $msg = "";
        } else if ($errorCode == '199') {
            return $msg = "";
        } else if ($errorCode == '200') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '201') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '202') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '203') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '204') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '205') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '206') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '207') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '208') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '209') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '210') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '211') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '212') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '213') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '214') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '215') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '216') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '217') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '218') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '219') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '220') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '221') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '222') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '223') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '224') {
            return $msg = "This transaction has been declined";
        } else if ($errorCode == '225') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '226') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '227') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '228') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '229') {
            return $msg = "Conversion rate for this card is available.";
        } else if ($errorCode == '230') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '231') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '232') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '233') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '234') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '235') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '236') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '237') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '238') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '239') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '240') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '241') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '242') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '243') {
            return $msg = "Recurring billing is not allowed for this eCheck.Net type.";
        } else if ($errorCode == '244') {
            return $msg = "This eCheck.Net type is not allowed for this Bank Account Type.";
        } else if ($errorCode == '245') {
            return $msg = "This eCheck.Net type is not allowed when using the payment gateway hosted payment form.";
        } else if ($errorCode == '246') {
            return $msg = "This eCheck.Net type is not allowed.";
        } else if ($errorCode == '247') {
            return $msg = "This eCheck.Net type is not allowed.";
        } else if ($errorCode == '248') {
            return $msg = "The check number is invalid.";
        } else if ($errorCode == '250') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '251') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '252') {
            return $msg = "Your order has been received. Thank you for your business!";
        } else if ($errorCode == '253') {
            return $msg = "Your order has been received. Thank you for your business!";
        } else if ($errorCode == '254') {
            return $msg = "This transaction has been declined.";
        } else if ($errorCode == '260') {
            return $msg = "Reversal not supported for this transaction type.";
        } else if ($errorCode == '261') {
            return $msg = "An error occurred during processing. Please try again.";
        } else if ($errorCode == '265') {
            return $msg = "The PayformMask is invalid.";
        } else if ($errorCode == '270') {
            return $msg = "Line item %1 is invalid.";
        } else if ($errorCode == '271') {
            return $msg = "The number of line items submitted is not allowed. A maximum of %1 line items can be submitted.";
        } else if ($errorCode == '280') {
            return $msg = "The auction platform name is invalid.";
        } else if ($errorCode == '281') {
            return $msg = "The auction platform ID is invalid.";
        } else if ($errorCode == '282') {
            return $msg = "The auction listing type is invalid.";
        } else if ($errorCode == '283') {
            return $msg = "The auction listing ID is invalid.";
        } else if ($errorCode == '283') {
            return $msg = "The auction seller ID is invalid.";
        } else if ($errorCode == '285') {
            return $msg = "The auction buyer ID is invalid.";
        } else if ($errorCode == '286') {
            return $msg = "One or more required auction values were not submitted.";
        } else if ($errorCode == '287') {
            return $msg = "The combination of auction platform ID and auction platform name is invalid.";
        } else if ($errorCode == '288') {
            return $msg = "This transaction cannot be accepted.";
        } else if ($errorCode == '289') {
            return $msg = "This processor does not accept zero dollar authorization for this card type.";
        } else if ($errorCode == '290') {
            return $msg = "There is one or more missing or invalid required fields.";
        } else if ($errorCode == '295') {
            return $msg = "The amount of this request was only partially approved on the given prepaid card. An additional payment is required to fulfill the balance of this transaction.";
        } else if ($errorCode == '296') {
            return $msg = "The specified SplitTenderID is invalid.";
        } else if ($errorCode == '297') {
            return $msg = "Transaction ID and Split Tender ID cannot both be used in the same request.";
        } else if ($errorCode == '298') {
            return $msg = "This order has already been released or voided therefore new transaction associations cannot be accepted.";
        } else if ($errorCode == '300') {
            return $msg = "The device ID is invalid.";
        } else if ($errorCode == '301') {
            return $msg = "The device batch ID is invalid.";
        } else if ($errorCode == '302') {
            return $msg = "The reversal flag is invalid.";
        } else if ($errorCode == '303') {
            return $msg = "The device batch is full. Please close the batch.";
        } else if ($errorCode == '304') {
            return $msg = "The original transaction is in a closed batch.";
        } else if ($errorCode == '305') {
            return $msg = "The merchant is configured for auto-close.";
        } else if ($errorCode == '306') {
            return $msg = "The batch is already closed.";
        } else if ($errorCode == '307') {
            return $msg = "The reversal was processed successfully.";
        } else if ($errorCode == '308') {
            return $msg = "Original transaction for reversal not found.";
        } else if ($errorCode == '309') {
            return $msg = "The device has been disabled.";
        } else if ($errorCode == '310') {
            return $msg = "This transaction has already been voided.";
        } else if ($errorCode == '311') {
            return $msg = "This transaction has already been captured.";
        } else if ($errorCode == '312') {
            return $msg = "The specified security code was invalid.";
        } else if ($errorCode == '313') {
            return $msg = "A new security code was requested.";
        } else if ($errorCode == '314') {
            return $msg = "This transaction cannot be processed.";
        } else if ($errorCode == '315') {
            return $msg = "The credit card number is invalid.";
        } else if ($errorCode == '316') {
            return $msg = "Credit card expiration date is invalid.";
        } else if ($errorCode == '317') {
            return $msg = "The credit card has expired.";
        } else if ($errorCode == '318') {
            return $msg = "A duplicate transaction has been submitted.";
        } else if ($errorCode == '319') {
            return $msg = "The transaction cannot be found.";
        } else if ($errorCode == '320') {
            return $msg = "The device identifier is either not registered or not enabled.";
        } else if ($errorCode == '325') {
            return $msg = "The request data did not pass the required fields check for this application.";
        } else if ($errorCode == '326') {
            return $msg = "The request field(s) are either invalid or missing.";
        } else if ($errorCode == '327') {
            return $msg = "The void request failed. Either the original transaction type does not support void, or the transaction is in the process of being settled.";
        } else if ($errorCode == '328') {
            return $msg = "A validation error occurred at the processor.";
        } else if ($errorCode == '330') {
            return $msg = "V.me transactions are not accepted by this merchant.";
        } else if ($errorCode == '331') {
            return $msg = "The x_call_id value is missing.";
        } else if ($errorCode == '332') {
            return $msg = "The x_call_id value is not found or invalid.";
        } else if ($errorCode == '333') {
            return $msg = "A validation error was returned from V.me.";
        } else if ($errorCode == '334') {
            return $msg = "The V.me transaction is in an invalid state.";
        } else if ($errorCode == '339') {
            return $msg = "Use x_method to specify method or send only x_call_id or card/account information.";
        } else if ($errorCode == '340') {
            return $msg = "V.me by Visa does not support voids on captured or credit transactions. Please allow the transaction to settle, then process a refund for the captured transaction.";
        } else if ($errorCode == '341') {
            return $msg = "The x_discount value is invalid.";
        } else if ($errorCode == '342') {
            return $msg = "The x_giftwrap value is invalid.";
        } else if ($errorCode == '343') {
            return $msg = "The x_subtotal value is invalid.";
        } else if ($errorCode == '344') {
            return $msg = "The x_misc value is invalid.";
        } else if ($errorCode == '350') {
            return $msg = "Country must be a valid two or three-character value if specified.";
        } else if ($errorCode == '351') {
            return $msg = "Employee ID must be 1 to %x characters in length.";
        } else if ($errorCode == '355') {
            return $msg = "An error occurred while parsing the EMV data.";
        } else if ($errorCode == '356') {
            return $msg = "EMV-based transactions are not currently supported for this processor and card type.";
        } else if ($errorCode == '357') {
            return $msg = "Opaque Descriptor is required.";
        } else if ($errorCode == '358') {
            return $msg = "EMV data is not supported with this transaction type.";
        } else if ($errorCode == '359') {
            return $msg = "EMV data is not supported with this market type.";
        } else if ($errorCode == '360') {
            return $msg = "An error occurred while decrypting the EMV data.";
        } else if ($errorCode == '361') {
            return $msg = "The EMV version is invalid.";
        } else if ($errorCode == '362') {
            return $msg = "The EMV version is required.";
        } else if ($errorCode == '363') {
            return $msg = "The POS Entry Mode value is invalid.";
        } else if ($errorCode == '370') {
            return $msg = "Signature data is too large.";
        } else if ($errorCode == '371') {
            return $msg = "Signature must be PNG formatted data.";
        } else if ($errorCode == '375') {
            return $msg = "Terminal/lane number must be numeric.";
        } else if ($errorCode == '380') {
            return $msg = "KSN is duplicated.";
        } else if ($errorCode == '901') {
            return $msg = "This transaction cannot be accepted at this time due to system maintenance. Please try again later.";
        } else if ($errorCode == '2000') {
            return $msg = "Need payer consent.";
        } else if ($errorCode == '2001') {
            return $msg = "PayPal transactions are not accepted by this merchant.";
        } else if ($errorCode == '2002') {
            return $msg = "PayPal transactions require x_version of at least 3.1.";
        } else if ($errorCode == '2003') {
            return $msg = "Request completed successfully";
        } else if ($errorCode == '2004') {
            return $msg = "Success URL is required.";
        } else if ($errorCode == '2005') {
            return $msg = "Cancel URL is required.";
        } else if ($errorCode == '2006') {
            return $msg = "Payer ID is required.";
        } else if ($errorCode == '2007') {
            return $msg = "This processor does not accept zero dollar authorizations.";
        } else if ($errorCode == '2008') {
            return $msg = "The referenced transaction does not meet the criteria for issuing a Continued Authorization.";
        } else if ($errorCode == '2009') {
            return $msg = "The referenced transaction does not meet the criteria for issuing a Continued Authorization w/ Auto Capture.";
        } else if ($errorCode == '2100') {
            return $msg = "PayPal transactions require valid URL for success_url";
        } else if ($errorCode == '2101') {
            return $msg = "PayPal transactions require valid URL for cancel_url";
        } else if ($errorCode == '2102') {
            return $msg = "Payment not authorized. Payment has not been authorized by the user.";
        } else if ($errorCode == '2103') {
            return $msg = "This transaction has already been authorized.";
        } else if ($errorCode == '2104') {
            return $msg = "The totals of the cart item amounts do not match order amounts. Be sure the total of the payment detail item parameters add up to the order total.";
        } else if ($errorCode == '2105') {
            return $msg = "PayPal has rejected the transaction.Invalid Payer ID.";
        } else if ($errorCode == '2106') {
            return $msg = "PayPal has already captured this transaction.";
        } else if ($errorCode == '2107') {
            return $msg = "PayPal has rejected the transaction. This Payer ID belongs to a different customer.";
        } else if ($errorCode == '2108') {
            return $msg = "PayPal has rejected the transaction. x_paypal_hdrimg exceeds maximum allowable length.";
        } else if ($errorCode == '2109') {
            return $msg = "PayPal has rejected the transaction. x_paypal_payflowcolor must be a 6 character hexadecimal value.";
        } else if ($errorCode == '2200') {
            return $msg = "The amount requested for settlement cannot be different than the original amount authorized. Please void transaction if required";
        }
        return $msg;
    }

    function Refunded($msg, $price, $transctionsId, $name, $email, $rdate, $sitename, $message = null, $last_4_digit = null) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }

        if (strstr($msg, "[PRICE]")) {
            $msg = str_replace("[PRICE]", $price, $msg);
        }
        if (strstr($msg, "[TRANS]")) {
            $msg = str_replace("[TRANS]", $transctionsId, $msg);
        }
        if (strstr($msg, "[RDATE]")) {
            $msg = str_replace("[RDATE]", $rdate, $msg);
        }
        if (strstr($msg, "[PRICE]")) {
            $msg = str_replace("[PRICE]", $price, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }

        if (strstr($msg, "[MESSAGE]")) {
            $msg = str_replace("[MESSAGE]", $message, $msg);
        }
        if (strstr($msg, "[LAST_4_DIGIT]")) {
            $msg = str_replace("[LAST_4_DIGIT]", $last_4_digit, $msg);
        }

        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }

    function SubscriptionCancelationEmail($msg, $name, $email, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }
    
    function SubscriptionActivatedEmail($msg, $name, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }              
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }        
        return $msg;
    }
    
    function KIdsSubscriptionActivatedEmail($msg, $name, $kidname, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[KIDNAME]")) {
            $msg = str_replace("[KIDNAME]", $kidname, $msg);
        }       
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }       
        return $msg;
    }

    function paymentFailedSupport($msg, $name, $email, $sitename) {
        if (strstr($msg, "[NAME]")) {
            $msg = str_replace("[NAME]", $name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[SITE_NAME]")) {
            $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
        }
        return $msg;
    }
    function styleFitFee() {
        $table = TableRegistry::get('Settings');
        $query = $table->find('all')->where(['name' => 'style_fee'])->first();
        $name = 0;
        if (!empty($query->value)) {
            $name = $query->value;
        }
        
        return $name;
    }
    function getPromoCode($paymentId=null){
        $table = TableRegistry::get('UserAppliedCodeOrderReview');
        $query = $table->find('all')->where(['payment_id' => $paymentId])->order(['id'=>'ASC']);                
        return $query;
    }
    function careersform($msg, $first_name,$last_name, $email,$phone,$location,$school,$degree,$discipline,$linkedin,$hearabt_job,$employee_referral,$compensation,$authorized_usa,$sponsorship_usa,$work_morning,$during_datetime,$work_evening,$work_weekend,$fulltime_capacity,$gender,$hispanic_latino,$veteran_status,$disability_status, $date) {
        if (strstr($msg, "[FIRSTNAME]")) {
            $msg = str_replace("[FIRSTNAME]", $first_name, $msg);
        }
        if (strstr($msg, "[LASTNAME]")) {
            $msg = str_replace("[LASTNAME]", $last_name, $msg);
        }
        if (strstr($msg, "[EMAIL]")) {
            $msg = str_replace("[EMAIL]", $email, $msg);
        }
        if (strstr($msg, "[PHONE]")) {
            $msg = str_replace("[PHONE]", $phone, $msg);
        }
        if (strstr($msg, "[LOCATION]")) {
            $msg = str_replace("[LOCATION]", $location, $msg);
        }
        if (strstr($msg, "[SCHOOL]")) {
            $msg = str_replace("[SCHOOL]", $school, $msg);
        }
        if (strstr($msg, "[DEGREE]")) {
            $msg = str_replace("[DEGREE]", $degree, $msg);
        }
        if (strstr($msg, "[DISCIPLINE]")) {
            $msg = str_replace("[DISCIPLINE]", $discipline, $msg);
        }
        if (strstr($msg, "[LINKEDIN]")) {
            $msg = str_replace("[LINKEDIN]", $linkedin, $msg);
        }
        if (strstr($msg, "[HRTABTJOB]")) {
            $msg = str_replace("[HRTABTJOB]", $hearabt_job, $msg);
        }
        if (strstr($msg, "[EMPLYREFRAL]")) {
            $msg = str_replace("[EMPLYREFRAL]", $employee_referral, $msg);
        }
        if (strstr($msg, "[AUTHUSA]")) {
            $msg = str_replace("[AUTHUSA]", $authorized_usa, $msg);
        }
        if (strstr($msg, "[SPNSUSA]")) {
            $msg = str_replace("[SPNSUSA]", $sponsorship_usa, $msg);
        }
        if (strstr($msg, "[MORNINGTIME]")) {
            $msg = str_replace("[MORNINGTIME]", $work_morning, $msg);
        }
        if (strstr($msg, "[DAYGTIME]")) {
            $msg = str_replace("[DAYGTIME]", $during_datetime, $msg);
        }
        if (strstr($msg, "[EVENINGTIME]")) {
            $msg = str_replace("[EVENINGTIME]", $work_evening, $msg);
        }
        if (strstr($msg, "[ONWEEKEND]")) {
            $msg = str_replace("[ONWEEKEND]", $work_weekend, $msg);
        }
        if (strstr($msg, "[INTERFULLTIME]")) {
            $msg = str_replace("[INTERFULLTIME]", $fulltime_capacity, $msg);
        }
        if (strstr($msg, "[GENDER]")) {
            $msg = str_replace("[GENDER]", $gender, $msg);
        }
        if (strstr($msg, "[HISLAT]")) {
            $msg = str_replace("[HISLAT]", $hispanic_latino, $msg);
        }
        if (strstr($msg, "[VETESTAT]")) {
            $msg = str_replace("[VETESTAT]", $veteran_status, $msg);
        }
        if (strstr($msg, "[DISBSTAT]")) {
            $msg = str_replace("[DISBSTAT]", $disability_status, $msg);
        }
        if (strstr($msg, "[DATE]")) {
            $msg = str_replace("[DATE]", $date, $msg);
        }
        return $msg;
    }
    
    function dtls($profile = null, $brand = null, $rack = null, $ptype = null, $size = null, $qty = null) {
        $btable = TableRegistry::get('InUsers');
        $brandName = $btable->find('all')->where(['id' => $brand])->first()->name;
        $rtable = TableRegistry::get('InRack');
        $rackName = $rtable->find('all')->where(['id' => $rack])->first()->rack_number;
        $ptable = TableRegistry::get('InProductType');
        $ptypeName = $ptable->find('all')->where(['id' => $ptype])->first()->product_type;
//        $skname = $profile . '-' . trim(strtoupper(substr($brandName, 0, 3))) . '-' .$ptypeName . '-'.  trim(strtoupper($rackName)) . '-' . $size.'-'. $qty;
        $skname = $profile .  trim(strtoupper($ptypeName)) .  trim(strtoupper($rackName)) . '-' . $size;
        return $skname;
    }
    
    function inventoryReportExcel($data_list, $fileName) {
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $style = [
            'alignment' => [
                'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($style);
        foreach (range('A', 'F') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        $head = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        $count = 0;
        ///SetHeading//
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Name");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Men");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Men total");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Women");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Women total");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Boy");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Boy total");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Girl");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Girl total");

        //Set Content
        $rowCount = 2;
        $total = count($data_list);
        for ($i = 0; $i < $total; $i++) {
            $count = -1;
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['men']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['men_total']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['women']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['women_total']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['boy']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['boy_total']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['girl']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $data_list[$i]['girl_total']);
            $objPHPExcel->getActiveSheet()->getStyle('F' . $rowCount)->getAlignment()->setWrapText(true);
//            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);
            $rowCount++;
        }
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $filename = 'Drapfit-' . $fileName . ".xlsx";
        $objWriter->save("files/temp_excel/$filename");
        return $filename;
    }
    
    function menMatching($uId) {
        $MenStats = TableRegistry::get('MenStats');
        $InProducts = TableRegistry::get('InProducts');
        $products = TableRegistry::get('Products');
        $TypicallyWearMen = TableRegistry::get('TypicallyWearMen');
        $TypicallyWearMenData = $TypicallyWearMen->find('all')->where(['user_id' => $uId])->first();

        $style_sphere_selection = TableRegistry::get('MenStyleSphereSelections')->find('all')->where(['user_id' => $uId])->first();
        $men_fit_data = TableRegistry::get('MenFit')->find('all')->where(['user_id' => $uId])->first();
        $men_stats = $MenStats->find('all')->where(['user_id' => $uId])->first();
        $matching = [];

        $products = $products->find('all')->where(['user_id' => $uId]);
        //pj($products); exit;
        $product_Id = [];
        foreach ($products as $pd) {
            $product_Id[] = $pd->id;
        }
        $prev_products = !empty($products) ? Hash::extract($products->toArray(), '{n}.prod_id') : [];
        $prev_products = array_filter($prev_products);
        $new_cnd_match = [];
        if (!empty($prev_products)) {
            $new_cnd_match['prod_id NOT IN'] = $prev_products;
        }
//echo "<pre>";
        //print_r($product_Id);  exit;
        //echo $men_stats->tall_feet;        
        if (!empty($men_stats->tall_feet)) {
            $in_products = $InProducts->find('all')->where(['profile_type' => 1, 'tall_feet' => $men_stats->tall_feet, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            //pj($in_products);

            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (@!in_array($ip->prodcut_id, @$product_Id)) {
                        // echo "<br>";
                        // echo $ip->prodcut_id;
                        $productId = $ip->id;
                        $matching[$ip->id]['tall_feet'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }

        if (!empty($men_stats->tell_inch)) {
            $in_products_inch = $InProducts->find('all')->where(['profile_type' => 1, 'tall_inch' => $men_stats->tell_inch, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_inch as $inch) {
                if (!empty($inch->id)) {
                    // echo $inch->prodcut_id; 
                    //echo "<br>";
                    if (@!in_array(@$inch->prodcut_id, $product_Id)) {
                        // echo $inch->prodcut_id; 
                        // echo "<br>";
                        $productId = $inch->id;
                        $matching[$inch->id]['tall_inch'] = 1;
                        $matching[$inch->id]['product_id'] = $inch->prodcut_id;
                    }
                }
            }
        }

        if (!empty($men_stats->weight_lb)) {
            $in_products_weight = $InProducts->find('all')->where(['profile_type' => 1, 'best_fit_for_weight' => $men_stats->weight_lb, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_weight as $weight) {
                if (!empty($weight->id)) {
                    if (!in_array(@$weight->prodcut_id, $product_Id)) {
                        //echo $weight->prodcut_id; 
                        $productId = $weight->id;
                        $matching[$weight->id]['best_fit_for_weight'] = 1;
                        $matching[$weight->id]['product_id'] = $weight->prodcut_id;
                    }
                }
            }
            //exit;
        }


        if (!empty($TypicallyWearMenData->waist)) {
            $in_products_typically = $InProducts->find('all')->where(['profile_type' => 1, 'waist_size' => $TypicallyWearMenData->waist, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_typically as $typically) {
                if (!empty($typically->id)) {

                    if (!in_array(@$typically->prodcut_id, $product_Id)) {
                        $productId = $typically->id;
                        //echo $typically->prodcut_id;
                        // echo "<br>";
                        $matching[$typically->id]['waist_size'] = 1;
                        $matching[$typically->id]['product_id'] = $typically->prodcut_id;
                    }
                }
            }
        }

        if (!empty($TypicallyWearMenData->size)) {
            $in_products_size = $InProducts->find('all')->where(['profile_type' => 1, 'shirt_size' => $TypicallyWearMenData->size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_size as $size) {
                if (!empty($size->id)) {
                    if (!in_array(@$size->prodcut_id, $product_Id)) {
                        $productId = $size->id;
                        $matching[$size->id]['size'] = 1;
                        $matching[$size->id]['product_id'] = $size->prodcut_id;
                    }
                }
            }
        }

        if (!empty($TypicallyWearMenData->shirt)) {
            $in_products_size = $InProducts->find('all')->where(['profile_type' => 1, 'shirt_size_run' => $TypicallyWearMenData->shirt, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_size as $size) {
                if (!empty($size->id)) {
                    if (!in_array(@$size->prodcut_id, $product_Id)) {
                        $productId = $size->id;
                        $matching[$size->id]['shirt_size_run'] = 1;
                        $matching[$size->id]['product_id'] = $size->prodcut_id;
                    }
                }
            }
        }

        if (!empty($TypicallyWearMenData->inseam)) {
            $in_products_inseam = $InProducts->find('all')->where(['profile_type' => 1, 'inseam_size' => $TypicallyWearMenData->inseam, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_inseam as $inseam) {
                if (!empty($inseam->id)) {
                    //echo $inseam->prodcut_id;
                    if (!in_array(@$inseam->prodcut_id, $product_Id)) {
                        //echo $inseam->prodcut_id;
                        $productId = $inseam->id;
                        $matching[$inseam->id]['inseam'] = 1;
                        $matching[$inseam->id]['product_id'] = $inseam->prodcut_id;
                    }
                }
            }
            //exit;
        }

        if (!empty($TypicallyWearMenData->men_bottom)) {
            $in_products_men_bottom = $InProducts->find('all')->where(['profile_type' => 1, 'men_bottom' => $TypicallyWearMenData->men_bottom, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_men_bottom as $men_bottom) {
                if (!empty($men_bottom->id)) {
                    //echo $men_bottom->prodcut_id;
                    if (!in_array(@$men_bottom->prodcut_id, $product_Id)) {
                        //echo $men_bottom->prodcut_id;
                        $productId = $men_bottom->id;
                        $matching[$men_bottom->id]['men_bottom'] = 1;
                        $matching[$men_bottom->id]['product_id'] = $men_bottom->prodcut_id;
                    }
                }
            }
            //exit;
        }

        if (!empty($TypicallyWearMenData->shoe)) {
            $in_products_shoe = $InProducts->find('all')->where(['profile_type' => 1, 'shoe_size' => $TypicallyWearMenData->shoe, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shoe as $shoe) {
                if (!empty($shoe->id)) {
                    if (!in_array(@$shoe->prodcut_id, $product_Id)) {
                        //echo $shoe->prodcut_id;
                        $productId = $shoe->id;
                        $matching[$shoe->id]['shoe'] = 1;
                        $matching[$shoe->id]['product_id'] = $shoe->prodcut_id;
                    }
                }
            }
        }

        //Match free size product
        $in_products = $InProducts->find('all')->where(['profile_type' => 1, 'primary_size' => 'free_size', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
        foreach ($in_products as $ip_li) {
            if (!empty($ip_li->id)) {
                if (!in_array($ip_li->prodcut_id, $product_Id)) {
                    $productId = $ip_li->id;
                    $matching[$ip_li->id]['free_size'] = 1;
                    $matching[$ip_li->id]['product_id'] = $ip_li->prodcut_id;
                }
            }
        }

        if (!empty($matching)) {
            $new_cnd_match['id IN'] = array_unique(array_keys($matching));
        }


        if (!empty($TypicallyWearMenData->waist_size_run)) {
            $in_products_typically = $InProducts->find('all')->where(['profile_type' => 1, 'waist_size_run' => $TypicallyWearMenData->waist_size_run, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_typically as $waist_size_run) {
                if (!empty($waist_size_run->id)) {

                    if (!in_array(@$waist_size_run->prodcut_id, $product_Id)) {
                        $productId = $waist_size_run->id;
                        $matching[$waist_size_run->id]['waist_size_run'] = 1;
                        $matching[$waist_size_run->id]['product_id'] = $waist_size_run->prodcut_id;
                    }
                }
            }
        }

        if (!empty($style_sphere_selection->style_sphere_selections_v2) || !empty($men_fit_data->take_note_of)) {
            $in_products_lists = $InProducts->find('all')->where(['profile_type' => 1, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_lists as $prod_li) {
                $tww = [];
                if (!empty($style_sphere_selection->style_sphere_selections_v2)) {
                    $tww = explode(',', $style_sphere_selection->style_sphere_selections_v2);
                    if (!empty($prod_li->work_type) && !empty($tww)) {
                        foreach ($tww as $tw_li) {
                            if (in_array($tw_li, json_decode($prod_li->work_type, true))) {
                                $productId = $prod_li->id;
                                $matching[$prod_li->id]['work_type'] = 1;
                                $matching[$prod_li->id]['product_id'] = $prod_li->prodcut_id;
                            }
                        }
                    }
                }
                $tntof = [];
                if (!empty($men_fit_data->take_note_of)) {
                    $tntof = explode(',', $men_fit_data->take_note_of);
                    if (!empty($prod_li->take_note_of) && !empty($tntof)) {
                        foreach ($tntof as $tw_li) {
                            if (in_array($tw_li, json_decode($prod_li->take_note_of, true))) {
                                $productId = $prod_li->id;
                                $matching[$prod_li->id]['take_note_of'] = 1;
                                $matching[$prod_li->id]['product_id'] = $prod_li->prodcut_id;
                            }
                        }
                    }
                }
            }
        }

        /* -------------------CND --------------------------- */
        if (!empty($TypicallyWearMenData->shoe_medium)) {
            $in_products_shoe = $InProducts->find('all')->where(['profile_type' => 1, 'shoe_size_run' => $TypicallyWearMenData->shoe_medium, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shoe as $shoe_size_run) {
                if (!empty($shoe_size_run->id)) {
                    if (!in_array(@$shoe_size_run->prodcut_id, $product_Id)) {
                        $productId = $shoe_size_run->id;
                        $matching[$shoe_size_run->id]['shoe_size_run'] = 1;
                        $matching[$shoe_size_run->id]['product_id'] = $shoe_size_run->prodcut_id;
                    }
                }
            }
        }

        if (!empty($TypicallyWearMenData->body_type)) {
            $in_products_better_body_shape = $InProducts->find('all')->where(['profile_type' => 1, 'better_body_shape' => $TypicallyWearMenData->body_type, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_better_body_shape as $better_body_shape) {
                if (!empty($better_body_shape->id)) {
                    //echo $better_body_shape->prodcut_id; 
                    //echo "<pre>";
                    //print_r($productId); 
                    if (!in_array(@$better_body_shape->prodcut_id, $product_Id)) {
                        //echo $better_body_shape->prodcut_id; 
                        $productId = $better_body_shape->id;
                        $matching[$better_body_shape->id]['better_body_shape'] = 1;
                        $matching[$better_body_shape->id]['product_id'] = $better_body_shape->prodcut_id;
                    }
                }
            }
            //exit;
        }

        if (!empty($TypicallyWearMenData->skin_tone)) {
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'skin_tone' => $TypicallyWearMenData->skin_tone, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $skin_tone) {
                if (!empty($skin_tone->id)) {
                    //echo $skin_tone->prodcut_id;
                    if (@!in_array(@$skin_tone->prodcut_id, $product_Id)) {
                        $productId = $skin_tone->id;
                        $matching[$skin_tone->id]['skin_tone'] = 1;
                        $matching[$skin_tone->id]['product_id'] = $skin_tone->prodcut_id;
                    }
                }
            }
        }

        if (!empty($style_sphere_selection->style_sphere_selections_v2)) {
            $wear_to_work = explode(',', $style_sphere_selection->style_sphere_selections_v2);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'work_type IN' => $wear_to_work, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['wear_to_work'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($style_sphere_selection->style_sphere_selections_v3)) {
            $shirt_fit_arr = explode(',', $style_sphere_selection->style_sphere_selections_v3);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'casual_shirts_type IN' => $shirt_fit_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['casual_shirts_fit'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($style_sphere_selection->style_sphere_selections_v4)) {
            $button_up_shirt_fit_arr = explode(',', $style_sphere_selection->style_sphere_selections_v4);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'bottom_up_shirt_fit IN' => $button_up_shirt_fit_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['button_up_shirt_fit'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($men_fit_data->jeans_to_fit)) {
            $jeans_to_fit_arr = explode(',', $men_fit_data->jeans_to_fit);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'jeans_Fit IN' => $jeans_to_fit_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['jeans_to_fit'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($men_fit_data->your_pants_to_fit)) {
            $your_pants_to_fit_arr = explode(',', $men_fit_data->your_pants_to_fit);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'men_bottom_prefer IN' => $your_pants_to_fit_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['your_pants_to_fit'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($men_fit_data->prefer_your_shorts)) {
            $prefer_your_shorts_arr = explode(',', $men_fit_data->prefer_your_shorts);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'shorts_long IN' => $prefer_your_shorts_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['prefer_your_shorts'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($men_fit_data->prefer_color) && ($men_fit_data->prefer_color != "null") && (strlen($men_fit_data->prefer_color) > 2 )) {
            $prefer_your_shorts_arr = json_decode($men_fit_data->prefer_color, true);
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 1, 'color IN' => $prefer_your_shorts_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skin_tone as $wear_to_work_li) {
                if (!empty($wear_to_work_li->id)) {
                    if (@!in_array($wear_to_work_li->prodcut_id, $product_Id)) {
                        $productId = $wear_to_work_li->id;
                        $matching[$wear_to_work_li->id]['color'] = 1;
                        $matching[$wear_to_work_li->id]['product_id'] = $wear_to_work_li->prodcut_id;
                    }
                }
            }
        }




        //echo "<pre>";
        //print_r($matching); exit;

        return $matching;
    }

    function womenMatching($uId) {
        $stat = TableRegistry::get('PersonalizedFix');
        $stats = $stat->find('all')->where(['user_id' => $uId])->first();
        $InProducts = TableRegistry::get('InProducts');
        $products = TableRegistry::get('Products');
        $women_style_tbl = TableRegistry::get('WomenStyle');
        $sizeChart = TableRegistry::get('SizeChart');
        $womenInformations = TableRegistry::get('WomenInformation');
        $styleSphereSelections = TableRegistry::get('WemenStyleSphereSelections');
        $WomenJeansStyle = TableRegistry::get('WomenJeansStyle');

        $matching = [];
        $products = $products->find('all')->where(['user_id' => $uId]);
        $women_style_data = $women_style_tbl->find('all')->where(['user_id' => $uId])->first();
        $sizeChartData = $sizeChart->find('all')->where(['user_id' => $uId])->first();
        $womenInformationsData = $womenInformations->find('all')->where(['user_id' => $uId])->first();
        $styleSphereSelectionsData = $styleSphereSelections->find('all')->where(['user_id' => $uId])->first();
        $WomenJeansStyleData = $WomenJeansStyle->find('all')->where(['user_id' => $uId])->first();
        $product_Id = [];

        $women_age = $this->ageCal(date('Y-m-d', strtotime($women_style_data->birthday)), date('Y-m-d'));

        foreach ($products as $pd) {
            $product_Id[] = $pd->id;
        }

        $prev_products = !empty($products) ? Hash::extract($products->toArray(), '{n}.prod_id') : [];
        $prev_products = array_filter($prev_products);
        $new_cnd_match = [];
        if (!empty($prev_products)) {
//            echo "<pre style='margin-left:233px;'>";
//            print_r("Prev. Prod");
//            print_r($prev_products);
//            echo "</pre>";
            $new_cnd_match['prod_id NOT IN'] = $prev_products;
        }

        if (!empty($women_age)) {
            $in_products = $InProducts->find('all')->where(['profile_type' => 2, 'age1 >=' => $women_age, 'age2 <=' => $women_age, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (!in_array($ip->prodcut_id, @$product_Id)) {
                        $productId = $ip->id;
                        $matching[$ip->id]['age'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }
        if (!empty($stats->tell_in_feet)) {
            $in_products = $InProducts->find('all')->where(['profile_type' => 2, 'tall_feet >=' => $stats->tell_in_feet, 'tall_feet2 <=' => $stats->tell_in_feet, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (!in_array($ip->prodcut_id, @$product_Id)) {
                        $productId = $ip->id;
                        $matching[$ip->id]['tall_feet'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }

        if (!empty($stats->tell_in_feet) && !empty($stats->tell_in_inch)) {
            $in_products_inch = $InProducts->find('all')->where(['profile_type' => 2, 'tall_feet >=' => $stats->tell_in_feet, 'tall_feet2 <=' => $stats->tell_in_feet, 'tall_inch' => $stats->tell_in_inch, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_inch as $inch) {
                if (!empty($inch->id)) {
                    if (!in_array(@$inch->prodcut_id, $product_Id)) {
                        $productId = $inch->id;
                        $matching[$inch->id]['tall_inch'] = 1;
                        $matching[$inch->id]['product_id'] = $inch->prodcut_id;
                    }
                }
            }
        }
        if (!empty($stats->weight_lbs)) {
            $in_products_weight = $InProducts->find('all')->where(['profile_type' => 2, 'best_fit_for_weight >=' => $stats->weight_lbs, 'best_fit_for_weight2 <=' => $stats->weight_lbs, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_weight as $weight) {
                if (!empty($weight->id)) {
                    if (@!in_array(@$weight->prodcut_id, $product_Id)) {
                        $productId = $weight->id;
                        $matching[$weight->id]['best_fit_for_weight'] = 1;
                        $matching[$weight->id]['product_id'] = $weight->prodcut_id;
                    }
                }
            }
        }



        if (($sizeChartData->pants == 0) || ($sizeChartData->pants == 00) || !empty($sizeChartData->pants)) {
            $in_products_size = $InProducts->find('all')->where(['profile_type' => 2, 'pants' => $sizeChartData->pants, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_size as $size) {
                if (!empty($size->id)) {
                    if (!in_array(@$size->prodcut_id, $product_Id)) {

                        $productId = $size->id;
                        $matching[$size->id]['pants'] = 1;
                        $matching[$size->id]['product_id'] = $size->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->bra)) {
            $in_products_bra = $InProducts->find('all')->where(['profile_type' => 2, 'bra' => $sizeChartData->bra, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_bra as $bra) {
                if (!empty($bra->id)) {
                    if (!in_array(@$bra->prodcut_id, $product_Id)) {
                        $productId = $bra->id;
                        $matching[$bra->id]['bra'] = 1;
                        $matching[$bra->id]['product_id'] = $bra->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->bra_recomend)) {
            $in_products_bra = $InProducts->find('all')->where(['profile_type' => 2, 'bra_recomend' => $sizeChartData->bra_recomend, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_bra as $bra_recomend) {
                if (!empty($bra_recomend->id)) {
                    if (@!in_array($bra_recomend->prodcut_id, $product_Id)) {
                        $productId = $bra_recomend->id;
                        $matching[$bra_recomend->id]['bra_recomend'] = 1;
                        $matching[$bra_recomend->id]['product_id'] = $bra_recomend->prodcut_id;
                    }
                }
            }
        }



        if (!empty($sizeChartData->skirt)) {

            if (in_array($sizeChartData->skirt, ['XL', '1X'])) {
                $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'skirt IN' => ['XL', '1X'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else if (in_array($sizeChartData->skirt, ['XXL', '2X'])) {
                $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'skirt IN' => ['XXL', '2X'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else {
                $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'skirt' => $sizeChartData->skirt, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            }


            foreach ($in_products_skirt as $skirt) {
                if (!empty($skirt->id)) {
                    if (@!in_array(@$skirt->prodcut_id, $product_Id)) {
                        $productId = $skirt->id;
                        $matching[$skirt->id]['skirt'] = 1;
                        $matching[$skirt->id]['product_id'] = $skirt->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->shirt_blouse)) {
            $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'shirt_blouse' => $sizeChartData->shirt_blouse, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skirt as $shirt_blouse) {
                if (!empty($shirt_blouse->id)) {
                    if (@!in_array($shirt_blouse->prodcut_id, $product_Id)) {
                        $productId = $shirt_blouse->id;
                        $matching[$shirt_blouse->id]['shirt_blouse'] = 1;
                        $matching[$shirt_blouse->id]['product_id'] = $shirt_blouse->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->shirt_blouse_recomend)) {
            if (in_array($sizeChartData->shirt_blouse_recomend, ['XL (14)', '1X (14W-16W)'])) {
                $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'shirt_blouse_recomend IN' => ['XL (14)', '1X (14W-16W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else if (in_array($sizeChartData->shirt_blouse_recomend, ['XXL (16)', '2X (18W-20W)'])) {
                $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'shirt_blouse_recomend IN' => ['XXL (16)', '2X (18W-20W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else {
                $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'shirt_blouse_recomend' => $sizeChartData->shirt_blouse_recomend, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            }



            foreach ($in_products_skirt as $shirt_blouse_recomend) {
                if (!empty($shirt_blouse_recomend->id)) {
                    if (@!in_array($shirt_blouse_recomend->prodcut_id, $product_Id)) {
                        $productId = $shirt_blouse_recomend->id;
                        $matching[$shirt_blouse_recomend->id]['shirt_blouse_recomend'] = 1;
                        $matching[$shirt_blouse_recomend->id]['product_id'] = $shirt_blouse_recomend->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->pantsr1)) {
            $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'pantsr1' => $sizeChartData->pantsr1, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skirt as $pantsr1) {
                if (!empty($pantsr1->id)) {
                    if (@!in_array($pantsr1->prodcut_id, $product_Id)) {
                        $productId = $pantsr1->id;
                        $matching[$pantsr1->id]['pantsr1'] = 1;
                        $matching[$pantsr1->id]['product_id'] = $pantsr1->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->pantsr2)) {
            $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'pantsr2' => $sizeChartData->pantsr2, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skirt as $pantsr2) {
                if (!empty($pantsr2->id)) {
                    if (@!in_array($pantsr2->prodcut_id, $product_Id)) {
                        $productId = $pantsr2->id;
                        $matching[$pantsr2->id]['pantsr2'] = 1;
                        $matching[$pantsr2->id]['product_id'] = $pantsr2->prodcut_id;
                    }
                }
            }
        }

        if (($sizeChartData->jeans == 0) || ($sizeChartData->jeans == 00) || !empty($sizeChartData->jeans)) {
            $in_products_skirt = $InProducts->find('all')->where(['profile_type' => 2, 'jeans' => $sizeChartData->jeans, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_skirt as $jeans) {
                if (!empty($jeans->id)) {
                    if (@!in_array($jeans->prodcut_id, $product_Id)) {
                        $productId = $jeans->id;
                        $matching[$jeans->id]['jeans'] = 1;
                        $matching[$jeans->id]['product_id'] = $jeans->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->active_wr)) {
            $in_products_active_wr = $InProducts->find('all')->where(['profile_type' => 2, 'active_wr' => $sizeChartData->active_wr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_active_wr as $active_wr) {
                if (!empty($active_wr->id)) {
                    if (@!in_array($active_wr->prodcut_id, $product_Id)) {
                        $productId = $active_wr->id;
                        $matching[$active_wr->id]['active_wr'] = 1;
                        $matching[$active_wr->id]['product_id'] = $active_wr->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->wo_jackect_size)) {
            if (in_array($sizeChartData->wo_jackect_size, ['XL(14)', '1X(14W-16W)'])) {
                $in_products_jackect_size = $InProducts->find('all')->where(['profile_type' => 2, 'wo_jackect_size IN' => ['XL(14)', '1X(14W-16W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else if (in_array($sizeChartData->wo_jackect_size, ['XXL (16)', '2X(18W-20W)'])) {
                $in_products_jackect_size = $InProducts->find('all')->where(['profile_type' => 2, 'wo_jackect_size IN' => ['XXL (16)', '2X(18W-20W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else {
                $in_products_jackect_size = $InProducts->find('all')->where(['profile_type' => 2, 'wo_jackect_size' => $sizeChartData->wo_jackect_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            }
            foreach ($in_products_jackect_size as $wo_jackect_size) {
                if (!empty($wo_jackect_size->id)) {
                    if (@!in_array($wo_jackect_size->prodcut_id, $product_Id)) {
                        $productId = $wo_jackect_size->id;
                        $matching[$wo_jackect_size->id]['wo_jackect_size'] = 1;
                        $matching[$wo_jackect_size->id]['product_id'] = $wo_jackect_size->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->wo_bottom)) {

            if (in_array($sizeChartData->wo_bottom, ['XL(14)', '1X(14W-16W)'])) {
                $in_products_wo_bottom = $InProducts->find('all')->where(['profile_type' => 2, 'wo_bottom IN' => ['XL(14)', '1X(14W-16W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else if (in_array($sizeChartData->wo_bottom, ['XXL(16)', '2X(18W-20W)'])) {
                $in_products_wo_bottom = $InProducts->find('all')->where(['profile_type' => 2, 'wo_bottom IN' => ['XXL(16)', '2X(18W-20W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else {
                $in_products_wo_bottom = $InProducts->find('all')->where(['profile_type' => 2, 'wo_bottom' => $sizeChartData->wo_bottom, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            }


            foreach ($in_products_wo_bottom as $wo_bottom) {
                if (!empty($wo_bottom->id)) {
                    if (@!in_array($wo_bottom->prodcut_id, $product_Id)) {

                        $productId = $wo_bottom->id;
                        $matching[$wo_bottom->id]['wo_bottom'] = 1;
                        $matching[$wo_bottom->id]['product_id'] = $wo_bottom->prodcut_id;
                    }
                }
            }
        }



        if (!empty($sizeChartData->shoe)) {
            $in_products_shoe = $InProducts->find('all')->where(['profile_type' => 2, 'shoe_size' => $sizeChartData->shoe, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shoe as $shoe) {
                if (!empty($shoe->id)) {
                    if (@!in_array(@$shoe->prodcut_id, $product_Id)) {
                        $productId = $shoe->id;
                        $matching[$shoe->id]['shoe'] = 1;
                        $matching[$shoe->id]['product_id'] = $shoe->prodcut_id;
                    }
                }
            }
        }
        if (!empty($sizeChartData->dress)) {
            $in_products_dress = $InProducts->find('all')->where(['profile_type' => 2, 'dress' => $sizeChartData->dress, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_dress as $dress) {
                if (!empty($dress->id)) {
                    if (@!in_array(@$dress->prodcut_id, $product_Id)) {
                        $productId = @$dress->id;
                        $matching[$dress->id]['dress'] = 1;
                        $matching[$dress->id]['product_id'] = $dress->prodcut_id;
                    }
                }
            }
        }
        if (!empty($sizeChartData->dress_recomended)) {

            if (in_array($sizeChartData->dress_recomended, ['XL (14)', '1X (14W-16W)'])) {
                $in_products_dress = $InProducts->find('all')->where(['profile_type' => 2, 'dress_recomended IN' => ['XL (14)', '1X (14W-16W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else if (in_array($sizeChartData->dress_recomended, ['XXL (16)', '2X (18W-20W)'])) {
                $in_products_dress = $InProducts->find('all')->where(['profile_type' => 2, 'dress_recomended IN' => ['XXL (16)', '2X (18W-20W)'], 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            } else {
                $in_products_dress = $InProducts->find('all')->where(['profile_type' => 2, 'dress_recomended' => $sizeChartData->dress_recomended, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            }


            foreach ($in_products_dress as $dress_recomended) {
                if (!empty($dress_recomended->id)) {
                    if (@!in_array($dress_recomended->prodcut_id, $product_Id)) {
                        $productId = @$dress_recomended->id;
                        $matching[$dress_recomended->id]['dress_recomended'] = 1;
                        $matching[$dress_recomended->id]['product_id'] = $dress_recomended->prodcut_id;
                    }
                }
            }
        }

        //Match free size product
        $in_products = $InProducts->find('all')->where(['profile_type' => 2, 'primary_size' => 'free_size', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
        foreach ($in_products as $ip_li) {
            if (!empty($ip_li->id)) {
                if (!in_array($ip_li->prodcut_id, @$product_Id)) {
                    $productId = $ip_li->id;
                    $matching[$ip_li->id]['free_size'] = 1;
                    $matching[$ip_li->id]['product_id'] = $ip_li->prodcut_id;
                }
            }
        }

        if (!empty($matching)) {
            $new_cnd_match['id IN'] = array_unique(array_keys($matching));
        }

        /* -------- NEED TO MATCH WITH PREVIOUS PRODUCT IDS --------- */

        if (!empty($styleSphereSelectionsData->style_sphere_selections_v3) && ($styleSphereSelectionsData->style_sphere_selections_v3 != 5)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v3', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v3'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($styleSphereSelectionsData->style_sphere_selections_v4) && ($styleSphereSelectionsData->style_sphere_selections_v4 != 5)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v4', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v4'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }
        if (!empty($styleSphereSelectionsData->style_sphere_selections_v5) && ($styleSphereSelectionsData->style_sphere_selections_v5 != 5)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v5', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v5'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }
        if (!empty($styleSphereSelectionsData->style_sphere_selections_v6) && ($styleSphereSelectionsData->style_sphere_selections_v6 != 6)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v6', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v6'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }
        if (!empty($styleSphereSelectionsData->style_sphere_selections_v7) && ($styleSphereSelectionsData->style_sphere_selections_v7 != 5)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v7', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v7'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }
        if (!empty($styleSphereSelectionsData->style_sphere_selections_v8) && ($styleSphereSelectionsData->style_sphere_selections_v8 != 5)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v8', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v8'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }
        if (!empty($styleSphereSelectionsData->style_sphere_selections_v9) && ($styleSphereSelectionsData->style_sphere_selections_v9 != 5)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v9', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v9'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }
        if (!empty($styleSphereSelectionsData->style_sphere_selections_v11) && ($styleSphereSelectionsData->style_sphere_selections_v11 != 10)) {
            $in_products_sss = $InProducts->find('all')->where(['profile_type' => 2, 'outfit_prefer' => 'style_sphere_selections_v11', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_sss as $sss_li) {
                if (!empty($sss_li->id)) {
                    if (@!in_array($sss_li->prodcut_id, $product_Id)) {
                        $productId = $sss_li->id;
                        $matching[$sss_li->id]['style_sphere_selections_v11'] = 1;
                        $matching[$sss_li->id]['product_id'] = $sss_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($styleSphereSelectionsData->missing_from_your_fIT)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->missing_from_your_fIT);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'missing_from_your_fIT IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['missing_from_your_fIT'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }
        if (!empty($WomenJeansStyleData->jeans_style)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $WomenJeansStyleData->jeans_style);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'missing_from_your_fIT IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['jeans_style'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }



        if (!empty($womenInformationsData->skin_tone)) {
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 2, 'skin_tone LIKE' => '%"' . $womenInformationsData->skin_tone . '"%', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');

            foreach ($in_products_skin_tone as $skin_tone) {
                if (!empty($skin_tone->id)) {
                    if (@!in_array(@$skin_tone->prodcut_id, $product_Id)) {
                        $productId = $skin_tone->id;
                        $matching[$skin_tone->id]['skin_tone'] = 1;
                        $matching[$skin_tone->id]['product_id'] = $skin_tone->prodcut_id;
                    }
                }
            }
        }

        if (!empty($womenInformationsData->occupation_v2)) {
            $in_products_occupation = $InProducts->find('all')->where(['profile_type' => 2, 'profession LIKE' => '%"' . $womenInformationsData->skin_tone . '"%', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');

            foreach ($in_products_occupation as $ocp_li) {
                if (!empty($ocp_li->id)) {
                    if (@!in_array($ocp_li->prodcut_id, $product_Id)) {
                        $productId = $ocp_li->id;
                        $matching[$ocp_li->id]['occupation'] = 1;
                        $matching[$ocp_li->id]['product_id'] = $ocp_li->prodcut_id;
                    }
                }
            }
        }

        if (!empty($womenInformationsData->body_type)) {
            $in_products_better_body_shape = $InProducts->find('all')->where(['profile_type' => 2, 'better_body_shape LIKE' => '%"' . $womenInformationsData->body_type . '"%', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_better_body_shape as $better_body_shape) {
                if (!empty($better_body_shape->id)) {
                    if (@!in_array(@$better_body_shape->prodcut_id, $product_Id)) {
                        $productId = $better_body_shape->id;
                        $matching[$better_body_shape->id]['better_body_shape'] = 1;
                        $matching[$better_body_shape->id]['product_id'] = $better_body_shape->prodcut_id;
                    }
                }
            }
        }

        /* if (!empty($styleSphereSelectionsData->style_sphere_selections_v2)) {
          $da_li = $in_style_insp = $ss_li = [];
          $da_li = explode(',', $styleSphereSelectionsData->style_sphere_selections_v2);
          $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_style_insp IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
          foreach ($in_style_insp as $ss_li) {
          if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
          $productId = $ss_li->id;
          $matching[$ss_li->id]['wo_style_insp'] = 1;
          $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
          }
          }
          } */

        if (!empty($styleSphereSelectionsData->wo_dress_length)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_dress_length);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_dress_length IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_dress_length'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->following_occasions)) {

            $in_occasional_dress = $InProducts->find('all')->where(['profile_type' => 2, 'occasional_dress LIKE' => '%"' . $styleSphereSelectionsData->following_occasions . '"%', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_occasional_dress as $icd_li) {
                if ((!empty($icd_li->id)) && !in_array($icd_li->prodcut_id, $product_Id)) {
                    $productId = $icd_li->id;
                    $matching[$icd_li->id]['occasional_dress'] = 1;
                    $matching[$icd_li->id]['product_id'] = $icd_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_top_half) || !empty($styleSphereSelectionsData->style_sphere_selections_v2) || !empty($women_style_data->distressed_denim_non) || !empty($women_style_data->distressed_denim_minimally) || !empty($women_style_data->distressed_denim_fairly) || !empty($women_style_data->distressed_denim_heavily)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_top_half);

            $styl_insp_dt = [];
            $styl_insp_dt = explode(',', $styleSphereSelectionsData->style_sphere_selections_v2);

            $wo_dnm_sty = [];
            if (!empty($women_style_data->distressed_denim_non) && in_array($women_style_data->distressed_denim_non, ['Maybe', 'Yes'])) {
                $wo_dnm_sty[] = 'distressed_denim_non';
            }
            if (!empty($women_style_data->distressed_denim_minimally) && in_array($women_style_data->distressed_denim_minimally, ['Maybe', 'Yes'])) {
                $wo_dnm_sty[] = 'distressed_denim_minimally';
            }
            if (!empty($women_style_data->distressed_denim_fairly) && in_array($women_style_data->distressed_denim_fairly, ['Maybe', 'Yes'])) {
                $wo_dnm_sty[] = 'distressed_denim_fairly';
            }
            if (!empty($women_style_data->distressed_denim_heavily) && in_array($women_style_data->distressed_denim_heavily, ['Maybe', 'Yes'])) {
                $wo_dnm_sty[] = 'distressed_denim_heavily';
            }


            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, /* 'wo_top_half IN' => $da_li, */ 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if (!empty($da_li) && !empty($ss_li->id) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    foreach ($da_li as $wth_li) {
                        if (!empty($ss_li->wo_top_half) && in_array($wth_li, json_decode($ss_li->wo_top_half, true))) {
                            $productId = $ss_li->id;
                            $matching[$ss_li->id]['wo_top_half'] = 1;
                            $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                        }
                    }
                }

                if (!empty($styl_insp_dt) && !empty($ss_li->id) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    foreach ($styl_insp_dt as $sty_inp_li) {
                        if (!empty($ss_li->wo_style_insp) && in_array($sty_inp_li, json_decode($ss_li->wo_style_insp, true))) {
                            $productId = $ss_li->id;
                            $matching[$ss_li->id]['wo_style_insp'] = 1;
                            $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                        }
                    }
                }

                if (!empty($wo_dnm_sty) && !empty($ss_li->id) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    foreach ($wo_dnm_sty as $wds_li) {
                        if (!empty($ss_li->denim_styles) && in_array($wds_li, json_decode($ss_li->denim_styles, true))) {
                            $productId = $ss_li->id;
                            $matching[$ss_li->id]['denim_styles'] = 1;
                            $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                        }
                    }
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_pant_length)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_pant_length);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_pant_length IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_pant_length'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_pant_rise)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_pant_rise);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_pant_rise IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_pant_rise'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_pant_style)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_pant_style);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_pant_style IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_pant_style'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_appare)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_appare);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_appare IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_appare'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_bottom_style)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_bottom_style);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_bottom_style IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_bottom_style'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->wo_top_style)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->wo_top_style);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_top_style IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');

            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['wo_top_style'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        if (!empty($styleSphereSelectionsData->color_prefer) && ($styleSphereSelectionsData->color_prefer != "null") && (strlen($styleSphereSelectionsData->color_prefer) > 2 )) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = json_decode($styleSphereSelectionsData->color_prefer, true);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'color IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');

            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    $matching[$ss_li->id]['color'] = 1;
                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }

        /* if (!empty($sizeChartData->wo_bottom)) {
          $in_products_wo_bottom = $InProducts->find('all')->where(['profile_type' => 2, 'wo_bottom' => $sizeChartData->wo_bottom, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
          foreach ($in_products_wo_bottom as $wo_bottom) {
          if (!empty($wo_bottom->id)) {

          if (($wo_bottom->budget_type == "wo_bottoms_budg") && (!empty($women_style_data) && ($women_style_data->bottoms != $wo_bottom->budget_value))) {
          unset($matching[$wo_bottom->id]);
          }
          }
          }
          } */



        if (!empty($styleSphereSelectionsData->style_sphere_selections_v10)) {
            $da_li = $in_style_insp = $ss_li = [];
            $da_li = explode(',', $styleSphereSelectionsData->style_sphere_selections_v10);
            $in_style_insp = $InProducts->find('all')->where(['profile_type' => 2, 'wo_patterns IN' => $da_li, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_style_insp as $ss_li) {
                if ((!empty($ss_li->id)) && !in_array($ss_li->prodcut_id, $product_Id)) {
                    $productId = $ss_li->id;
                    unset($matching[$ss_li->id]);
//                    $matching[$ss_li->id]['wo_patterns'] = 1;
//                    $matching[$ss_li->id]['product_id'] = $ss_li->prodcut_id;
                }
            }
        }
//        echo "<pre>";
//        print_r($matching);
//        echo "</pre>";

        return $matching;
    }

    function girlsMatching($uId, $kidId) {
        $stat = TableRegistry::get('KidsDetails');
        $stats = $stat->find('all')->where(['user_id' => $uId, 'id' => $kidId])->first();
        $InProducts = TableRegistry::get('InProducts');
        $products = TableRegistry::get('Products');
        $matching = [];
        $products = $products->find('all')->where(['user_id' => $uId, 'kid_id' => $kidId]);
        $product_Id = [];
        foreach ($products as $pd) {
            $product_Id[] = $pd->id;
        }


        $prev_products = !empty($products) ? Hash::extract($products->toArray(), '{n}.prod_id') : [];
        $prev_products = array_filter($prev_products);
        $new_cnd_match = [];
        if (!empty($prev_products)) {
            $new_cnd_match['prod_id NOT IN'] = $prev_products;
        }


        if (!empty($stats->tall_feet)) {
            $in_products = $InProducts->find('all')->where(['profile_type' => 4, 'tall_feet' => $stats->tall_feet, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (@!in_array($ip->prodcut_id, @$product_Id)) {
                        $productId = $ip->id;
                        $matching[$ip->id]['tall_feet'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }

        if (!empty($stats->tell_inch)) {
            $in_products_inch = $InProducts->find('all')->where(['profile_type' => 4, 'tall_inch' => $stats->tell_inch, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_inch as $inch) {
                if (!empty($inch->id)) {
                    if (@!in_array(@$inch->prodcut_id, $product_Id)) {
                        $productId = $inch->id;
                        $matching[$inch->id]['tall_inch'] = 1;
                        $matching[$inch->id]['product_id'] = $inch->prodcut_id;
                    }
                }
            }
        }
        if (!empty($stats->weight_lb)) {
            $in_products_weight = $InProducts->find('all')->where(['profile_type' => 4, 'best_fit_for_weight' => $stats->weight_lb, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_weight as $weight) {
                if (!empty($weight->id)) {
                    if (@!in_array(@$weight->prodcut_id, $product_Id)) {
                        $productId = $weight->id;
                        $matching[$weight->id]['best_fit_for_weight'] = 1;
                        $matching[$weight->id]['product_id'] = $weight->prodcut_id;
                    }
                }
            }
        }

        $sizeChart = TableRegistry::get('KidsSizeFit');
        $sizeChartData = $sizeChart->find('all')->where(['user_id' => $uId, 'kid_id' => $kidId])->first();
        if (!empty($sizeChartData->top_size)) {
            $in_products_size = $InProducts->find('all')->where(['profile_type' => 4, 'top_size' => $sizeChartData->top_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_size as $size) {
                if (!empty($size->id)) {
                    if (@!in_array(@$size->prodcut_id, $product_Id)) {
                        $productId = $size->id;
                        $matching[$size->id]['top_size'] = 1;
                        $matching[$size->id]['product_id'] = $size->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->bottom_size)) {
            $in_products_bottom = $InProducts->find('all')->where(['profile_type' => 4, 'bottom_size' => $sizeChartData->bottom_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_bottom as $bt) {
                if (!empty($bra->id)) {
                    if (@!in_array($bt->prodcut_id, $product_Id)) {
                        $productId = $bt->id;
                        $matching[$bra->id]['bottom_size'] = 1;
                        $matching[$bra->id]['product_id'] = $bt->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->shoe_size)) {
            $in_products_shoe = $InProducts->find('all')->where(['profile_type' => 4, 'shoe_size' => $sizeChartData->shoe_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shoe as $shoe) {
                if (!empty($shoe->id)) {
                    if (@!in_array(@$shoe->prodcut_id, $product_Id)) {
                        $productId = $shoe->id;
                        $matching[$shoe->id]['shoe'] = 1;
                        $matching[$shoe->id]['product_id'] = $shoe->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->t_shirts)) {
            $in_products_shirts = $InProducts->find('all')->where(['profile_type' => 4, 'shirt_size' => $sizeChartData->t_shirts, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shirts as $shirts) {
                if (!empty($shirts->id)) {
                    if (@!in_array(@$shirts->prodcut_id, $product_Id)) {
                        $productId = @$shirts->id;
                        $matching[$shirts->id]['dress'] = 1;
                        $matching[$shirts->id]['product_id'] = $shirts->prodcut_id;
                    }
                }
            }
        }


        if (!empty($sizeChartData->paint)) {
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 4, 'pants' => $sizeChartData->paint, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_paint as $paint) {
                if (!empty($paint->id)) {
                    if (@!in_array(@$$paint->prodcut_id, $product_Id)) {
                        $productId = $paint->id;
                        $matching[$paint->id]['skin_tone'] = 1;
                        $matching[$paint->id]['product_id'] = $paint->prodcut_id;
                    }
                }
            }
        }

        //Match free size product
        $in_products = $InProducts->find('all')->where(['profile_type' => 4, 'primary_size' => 'free_size', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
        foreach ($in_products as $ip_li) {
            if (!empty($ip_li->id)) {
                if (!in_array($ip_li->prodcut_id, @$product_Id)) {
                    $productId = $ip_li->id;
                    $matching[$ip_li->id]['free_size'] = 1;
                    $matching[$ip_li->id]['product_id'] = $ip_li->prodcut_id;
                }
            }
        }

        if (!empty($matching)) {
            $new_cnd_match['id IN'] = array_unique(array_keys($matching));
        }
        /* ---------------- CND ------------------- */
        if (!empty($stats->prefer_color) && ($stats->prefer_color != "null") && (strlen($stats->prefer_color) > 2 )) {
            $prefer_color_arr = json_decode($stats->prefer_color, true);
            $in_products = $InProducts->find('all')->where(['profile_type' => 4, 'color IN' => $prefer_color_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (@!in_array($ip->prodcut_id, @$product_Id)) {
                        $productId = $ip->id;
                        $matching[$ip->id]['color'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->body_shape)) {
            $in_products_better_body_shape = $InProducts->find('all')->where(['profile_type' => 4, 'better_body_shape' => $sizeChartData->body_shape, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_better_body_shape as $better_body_shape) {
                if (!empty($better_body_shape->id)) {
                    if (@!in_array(@$better_body_shape->prodcut_id, $product_Id)) {
                        $productId = $better_body_shape->id;
                        $matching[$better_body_shape->id]['better_body_shape'] = 1;
                        $matching[$better_body_shape->id]['product_id'] = $better_body_shape->prodcut_id;
                    }
                }
            }
        }



        if (!empty($sizeChartData->skirt)) {
            $in_products_better_body_skrit = $InProducts->find('all')->where(['profile_type' => 4, 'skirt' => $sizeChartData->skirt, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_better_body_skrit as $better_skirt) {
                if (!empty($better_skirt->id)) {
                    if (@!in_array(@$better_skirt->prodcut_id, $product_Id)) {
                        $productId = $better_skirt->id;
                        $matching[$better_skirt->id]['skirt'] = 1;
                        $matching[$better_skirt->id]['product_id'] = $better_skirt->prodcut_id;
                    }
                }
            }
        }

        return $matching;
    }

    function boyMatching($uId, $kidId) {

        $stat = TableRegistry::get('KidsDetails');
        $stats = $stat->find('all')->where(['user_id' => $uId, 'id' => $kidId])->first();
        $InProducts = TableRegistry::get('InProducts');
        $products = TableRegistry::get('Products');
        $matching = [];
        $products = $products->find('all')->where(['user_id' => $uId, 'kid_id' => $kidId]);
        $product_Id = [];
        foreach ($products as $pd) {
            $product_Id[] = $pd->id;
        }

        $prev_products = !empty($products) ? Hash::extract($products->toArray(), '{n}.prod_id') : [];
        $prev_products = array_filter($prev_products);
        $new_cnd_match = [];
        if (!empty(array_unique($prev_products))) {
            $new_cnd_match['prod_id NOT IN'] = $prev_products;
        }

        if (!empty($stats->tall_feet)) {
            $in_products = $InProducts->find('all')->where(['profile_type' => 3, 'tall_feet' => $stats->tall_feet, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (@!in_array($ip->prodcut_id, @$product_Id)) {
                        $productId = $ip->id;
                        $matching[$ip->id]['tall_feet'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }

        if (!empty($stats->tell_inch)) {
            $in_products_inch = $InProducts->find('all')->where(['profile_type' => 3, 'tall_inch' => $stats->tell_inch, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_inch as $inch) {
                if (!empty($inch->id)) {
                    if (@!in_array(@$inch->prodcut_id, $product_Id)) {
                        $productId = $inch->id;
                        $matching[$inch->id]['tall_inch'] = 1;
                        $matching[$inch->id]['product_id'] = $inch->prodcut_id;
                    }
                }
            }
        }

        if (!empty($stats->weight_lb)) {
            $in_products_weight = $InProducts->find('all')->where(['profile_type' => 3, 'best_fit_for_weight' => $stats->weight_lb, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_weight as $weight) {
                if (!empty($weight->id)) {
                    if (@!in_array(@$weight->prodcut_id, $product_Id)) {
                        $productId = $weight->id;
                        $matching[$weight->id]['best_fit_for_weight'] = 1;
                        $matching[$weight->id]['product_id'] = $weight->prodcut_id;
                    }
                }
            }
        }

        $sizeChart = TableRegistry::get('KidsSizeFit');
        $sizeChartData = $sizeChart->find('all')->where(['user_id' => $uId, 'kid_id' => $kidId])->first();
        if (!empty($sizeChartData->top_size)) {
            $in_products_size = $InProducts->find('all')->where(['profile_type' => 3, 'top_size' => $sizeChartData->top_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
//            echo "<pre>";
//            print_r($sizeChartData);
//            print_r($in_products_size);
//            exit;
            foreach ($in_products_size as $size) {
                if (!empty($size->id)) {
                    if (@!in_array(@$size->prodcut_id, $product_Id)) {
                        $productId = $size->id;
                        $matching[$size->id]['top_size'] = 1;
                        $matching[$size->id]['product_id'] = $size->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->bottom_size)) {
            $in_products_bottom = $InProducts->find('all')->where(['profile_type' => 3, 'bottom_size' => $sizeChartData->bottom_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_bottom as $bt) {
                if (!empty($bt->id)) {
                    if (@!in_array($bt->prodcut_id, $product_Id)) {
                        $productId = $bt->id;
                        $matching[$bt->id]['bottom_size'] = 1;
                        $matching[$bt->id]['product_id'] = $bt->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->shoe_size)) {
            $in_products_shoe = $InProducts->find('all')->where(['profile_type' => 3, 'shoe_size' => $sizeChartData->shoe_size, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shoe as $shoe) {
                if (!empty($shoe->id)) {
                    if (@!in_array(@$shoe->prodcut_id, $product_Id)) {
                        $productId = $shoe->id;
                        $matching[$shoe->id]['shoe'] = 1;
                        $matching[$shoe->id]['product_id'] = $shoe->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->t_shirts)) {
            $in_products_shirts = $InProducts->find('all')->where(['profile_type' => 3, 'shirt_size' => $sizeChartData->t_shirts, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_shirts as $shirts) {
                if (!empty($shirts->id)) {
                    if (@!in_array(@$shirts->prodcut_id, $product_Id)) {
                        $productId = @$shirts->id;
                        $matching[$shirts->id]['dress'] = 1;
                        $matching[$shirts->id]['product_id'] = $shirts->prodcut_id;
                    }
                }
            }
        }

        if (!empty($sizeChartData->paint)) {
            $in_products_skin_tone = $InProducts->find('all')->where(['profile_type' => 3, 'pants' => $sizeChartData->paint, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_paint as $paint) {
                if (!empty($paint->id)) {
                    if (@!in_array(@$$paint->prodcut_id, $product_Id)) {
                        $productId = $paint->id;
                        $matching[$paint->id]['skin_tone'] = 1;
                        $matching[$paint->id]['product_id'] = $paint->prodcut_id;
                    }
                }
            }
        }

        //Match free size product
        $in_products = $InProducts->find('all')->where(['profile_type' => 3, 'primary_size' => 'free_size', 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
        foreach ($in_products as $ip_li) {
            if (!empty($ip_li->id)) {
                if (!in_array($ip_li->prodcut_id, @$product_Id)) {
                    $productId = $ip_li->id;
                    $matching[$ip_li->id]['free_size'] = 1;
                    $matching[$ip_li->id]['product_id'] = $ip_li->prodcut_id;
                }
            }
        }

        if (!empty($matching)) {
            $new_cnd_match['id IN'] = array_unique(array_keys($matching));
        }
        /* ---------------- CND ------------------- */

        if (!empty($stats->prefer_color) && ($stats->prefer_color != "null") && (strlen($stats->prefer_color) > 2 )) {
            $prefer_color_arr = json_decode($stats->prefer_color, true);
            $in_products = $InProducts->find('all')->where(['profile_type' => 3, 'color IN' => $prefer_color_arr, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products as $ip) {
                if (!empty($ip->id)) {
                    if (@!in_array($ip->prodcut_id, @$product_Id)) {
                        $productId = $ip->id;
                        $matching[$ip->id]['color'] = 1;
                        $matching[$ip->id]['product_id'] = $ip->prodcut_id;
                    }
                }
            }
        }


        if (!empty($sizeChartData->body_shape)) {
            $in_products_better_body_shape = $InProducts->find('all')->where(['profile_type' => 3, 'better_body_shape' => $sizeChartData->body_shape, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_better_body_shape as $better_body_shape) {
                if (!empty($better_body_shape->id)) {
                    if (@!in_array(@$better_body_shape->prodcut_id, $product_Id)) {
                        $productId = $better_body_shape->id;
                        $matching[$better_body_shape->id]['better_body_shape'] = 1;
                        $matching[$better_body_shape->id]['product_id'] = $better_body_shape->prodcut_id;
                    }
                }
            }
        }



        if (!empty($sizeChartData->skirt)) {
            $in_products_better_body_skrit = $InProducts->find('all')->where(['profile_type' => 3, 'skirt' => $sizeChartData->skirt, 'available_status' => 1, 'match_status' => 2, $new_cnd_match])->group('prod_id');
            foreach ($in_products_better_body_skrit as $better_skirt) {
                if (!empty($better_skirt->id)) {
                    if (@!in_array(@$better_skirt->prodcut_id, $product_Id)) {
                        $productId = $better_skirt->id;
                        $matching[$better_skirt->id]['skirt'] = 1;
                        $matching[$better_skirt->id]['product_id'] = $better_skirt->prodcut_id;
                    }
                }
            }
        }



//echo "<pre>";
//print_r($matching);
//exit;
        return $matching;
    }
    
    public function getSeason($city_name) {
        $weather_info = TableRegistry::get('WeatherInfo');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/' . $city_name . ',usa?key=F67YH53PHE9EWCGEGJNHJREBM',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($response, true);
        $temp = $result["days"][6]["temp"];

        $all_datas = $weather_info->find('all')->where(['min_temp <=' => $temp, 'max_temp >=' => $temp]);
        $related_seasons = !empty($all_datas) ? Hash::extract($all_datas->toArray(), '{n}.name') : [];

        return json_encode($related_seasons);
//        return json_encode([$city_name,$temp, $all_datas,$related_seasons]);
    }

    public function getStripeKey() {
        $payment_mode_tb = TableRegistry::get('Paymentmode');
        $cofig_keys_tb = TableRegistry::get('CofigKeys');

        $get_payment_mode = $payment_mode_tb->find('all')->first();
        if($get_payment_mode->value == 1 ){
            $stripe_key = $cofig_keys_tb->find('all')->where(['name' => 'stripe_live_key'])->first();
        }else{
            $stripe_key = $cofig_keys_tb->find('all')->where(['name' => 'stripe_test_key'])->first();
        }

        $stripe_api_key = json_decode($stripe_key->key_val, true);
        return $stripe_api_key;

    }

    function ageCal($start_date, $end_date = null) {
        $date1 = date('Y-m-d', strtotime($end_date));
        $date2 = !empty($end_date) ? date('Y-m-d', strtotime($end_date)) : date('Y-m-d');

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
//printf("%d years, %d months, %d days\n", $years, $months, $days);
//        printf("%d years, %d months, %d days\n", $years, $months, $days);
        return $years;
    }

}
