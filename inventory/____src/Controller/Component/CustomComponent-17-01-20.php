<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

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

    function sendEmail($to, $from, $subject, $message, $header = 1, $footer = 1) {
        if ($header) {
            $hdr = '';
        }
        if ($footer) {

            $ftr = '';
        }

        //echo $from;exit;
        $subscripbe = '';
        if ($to) {
            $table = TableRegistry::get('Users');
            $unique = $table->find('all')->select(['unique_id'])->where(['email' => $to])->first()->unique_id;
            $userId = $table->find('all')->select(['unique_id'])->where(['email' => $to])->first()->id;
            $subscripbe = '<a href="' . SITE_NAME . 'unsubscrib?id=' . $unique . '" target="_blank" style="text-algin:center;color:#777777;text-decoration:underline;" >Unsubscribe </a>&nbsp;&nbsp;';
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
        $res = $email->from($from)
                ->to($to)
                //->bcc('bibhu268.phpdeveloper@gmail.com')
                //->bcc('devadash143@gmail.com')
                ->emailFormat('html')
                ->subject($subject)
                ->viewVars(array('$msg' => $message))
                ->send($message);
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

    function paymentEmail($msg, $name, $message, $site_name, $transaction_id = null, $price = null, $submit_date = null, $card_name = null, $last_4_digit = null, $usr_name = null, $full_address = null) {
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
    function getAllMeg($errorCode=null) {
         $msg='';
        if($errorCode=='I00001'){
            return $msg = "Successful";
        }
        else if($errorCode=='I00002'){
            return $msg = "The subscription has already been canceled.";
        }
        else if($errorCode=='I00003'){
            return $msg = "The record has already been deleted.";
        }
        else if($errorCode=='I00004'){
            return $msg = "No records found";
        }
        else if($errorCode=='I00005'){
            return $msg = "he mobile device has been submitted for approval by the account administrator.";
        }
        else if($errorCode=='I00006'){
            return $msg = "The mobile device is approved and ready for use";
        }
        else if($errorCode=='I00007'){
            return $msg = "The Payment Gateway Account service (id=8) has already been accepted.";
        }
        else if($errorCode=='I00008'){
            return $msg = "The Payment Gateway Account service (id=8) has already been declined.";
        }
        else if($errorCode=='I00009'){
            return $msg = "The APIUser already exists.";
        }
        else if($errorCode=='I00010'){
            return $msg = "The merchant is activated successfully";
        }
        else if($errorCode=='I00011'){
            return $msg = "The merchant is not activated.";
        }
        else if($errorCode=='I99999'){
            return $msg = "This feature has not yet been completed. One day it will be but it looks like today is not that day.";
        }
        else if($errorCode=='E00001'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='E00002'){
            return $msg = "The content-type specified is not supported.";
        }
        else if($errorCode=='E00003'){
            return $msg = "An error occurred while parsing the XML request.";
        }
        else if($errorCode=='E00004'){
            return $msg = "The name of the requested API method is invalid.";
        }
        else if($errorCode=='E00005'){
            return $msg = "The transaction key or API key is invalid or not present.";
        }
        else if($errorCode=='E00006'){
            return $msg = "The API user name is invalid or not present.";
        }
        else if($errorCode=='E00007'){
            return $msg = "User authentication failed due to invalid authentication values.";
        }
        else if($errorCode=='E00008'){
            return $msg = "User authentication failed. The account or API user is inactive.";
        }
        else if($errorCode=='E00009'){
            return $msg = "The payment gateway account is in Test Mode. The request cannot be processed.";
        }
        else if($errorCode=='E00010'){
            return $msg = "User authentication failed. You do not have the appropriate permissions";
        }
        else if($errorCode=='E00011'){
            return $msg = "Access denied. You do not have the appropriate permissions.";
        }
        else if($errorCode=='E00012'){
            return $msg = "A duplicate subscription already exists.";
        }
        else if($errorCode=='E00013'){
            return $msg = "The field is invalid";
        }
        else if($errorCode=='E00014'){
            return $msg = "A required field is not present.";
        }
        else if($errorCode=='E00015'){
            return $msg = "The field length is invalid.";
        }
        else if($errorCode=='E00016'){
            return $msg = "The field type is invalid.";
        }
        else if($errorCode=='E00017'){
            return $msg = "The start date cannot occur in the past.";
        }
        else if($errorCode=='E00018'){
            return $msg = "The credit card expires before the subscription start date.";
        }
        else if($errorCode=='E00019'){
            return $msg = "The customer tax id or drivers license information is required.";
        }
        else if($errorCode=='E00020'){
            return $msg = "The payment gateway account is not enabled for eCheck.Net subscriptions";
        }
        else if($errorCode=='E00021'){
            return $msg = "The payment gateway account is not enabled for credit card subscriptions.";
        }
        else if($errorCode=='E00022'){
            return $msg = "The interval length cannot exceed 365 days or 12 months";
        }
        else if($errorCode=='E00023'){
            return $msg = "The subscription duration cannot exceed three years";
        }
        else if($errorCode=='E00024'){
            return $msg = "Trial Occurrences is required when Trial Amount is specified.";
        }
        else if($errorCode=='E00025'){
            return $msg = "Automated Recurring Billing is not enabled.";
        }
        else if($errorCode=='E00026'){
            return $msg = "Both Trial Amount and Trial Occurrences are required.";
        }
        else if($errorCode=='E00027'){
            return $msg = "The transaction was unsuccessful.";
        }
        else if($errorCode=='E00028'){
            return $msg = "Trial Occurrences must be less than Total Occurrences.";
        }
        else if($errorCode=='E00029'){
            return $msg = "Payment information is required.";
        }
        else if($errorCode=='E00030'){
            return $msg = "The payment schedule is required.";
        }
        else if($errorCode=='E00031'){
            return $msg = "The amount is required.";
        }
        else if($errorCode=='E00032'){
            return $msg = "The start date is required.";
        }
        else if($errorCode=='E00033'){
            return $msg = "The start date cannot be changed.";
        }
        else if($errorCode=='E00034'){
            return $msg = "The interval information cannot be changed.";
        }
        else if($errorCode=='E00035'){
            return $msg = "The subscription cannot be found.";
        }
        else if($errorCode=='E00036'){
            return $msg = "The payment type cannot be changed.";
        }
        else if($errorCode=='E00037'){
            return $msg = "The subscription cannot be updated.";
        }
        else if($errorCode=='E00038'){
            return $msg = "The subscription cannot be canceled.";
        }
        else if($errorCode=='E00039'){
            return $msg = "A duplicate record already exists.";
        }
        else if($errorCode=='E00040'){
            return $msg = "The record cannot be found.";
        }
        else if($errorCode=='E00041'){
            return $msg = "One or more fields must contain a value.";
        }
        else if($errorCode=='E00042'){
            return $msg = "You cannot add more than {0} payment profiles.";
        }
        else if($errorCode=='E00043'){
            return $msg = "You cannot add more than {0} shipping addresses.";
        }
        else if($errorCode=='E00044'){
            return $msg = "Customer Information Manager is not enabled.";
        }
        else if($errorCode=='E00045'){
            return $msg = "The root node does not reference a valid XML namespace.";
        }
        else if($errorCode=='E00046'){
            return $msg = "Generic InsertNewMerchant failure.";
        }
        else if($errorCode=='E00047'){
            return $msg = "Merchant Boarding API is not enabled.";
        }
        else if($errorCode=='E00048'){
            return $msg = "At least one payment method must be set in payment types or an echeck service must be provided";
        }
        else if($errorCode=='E00049'){
            return $msg = "The operation timed out before it could be completed.";
        }
        else if($errorCode=='E00050'){
            return $msg = "Sell Rates cannot be less than Buy Rates";
        }
        else if($errorCode=='E00051'){
            return $msg = "The original transaction was not issued for this payment profile.";
        }
        else if($errorCode=='E00052'){
            return $msg = "The maximum number of elements for an array {0} is {1}.";
        }
        else if($errorCode=='E00053'){
            return $msg = "Server too busy";
        }
        else if($errorCode=='E00054'){
            return $msg = "The mobile device is not registered with this merchant account.";
        }
        else if($errorCode=='E00055'){
            return $msg = "The mobile device has already been registered but is pending approval by the account administrator.";
        }
        else if($errorCode=='E00056'){
            return $msg = "The mobile device has been disabled for use with this account.";
        }
        else if($errorCode=='E00057'){
            return $msg = "The user does not have permissions to submit requests from a mobile device.";
        }
        else if($errorCode=='E00058'){
            return $msg = "The merchant has met or exceeded the number of pending mobile devices permitted for this account.";
        }
        else if($errorCode=='E00059'){
            return $msg = "The authentication type is not allowed for this method call.";
        }
        else if($errorCode=='E00060'){
            return $msg = "The transaction type is invalid.";
        }
        else if($errorCode=='E00062'){
            return $msg = "Fatal error when calling web service.";
        }
        else if($errorCode=='E00063'){
            return $msg = "Calling web service return error.";
        }
        else if($errorCode=='E00064'){
            return $msg = "Client authorization denied.";
        }
        else if($errorCode=='E00065'){
            return $msg = "Prerequisite failed.";
        }
        else if($errorCode=='E00066'){
            return $msg = "Invalid value.";
        }
        else if($errorCode=='E00067'){
            return $msg = "An error occurred while parsing the XML request. Too many {0} specified.";
        }
        else if($errorCode=='E00068'){
            return $msg = "An error occurred while parsing the XML request. {0} is invalid.";
        }
        else if($errorCode=='E00069'){
            return $msg = "The Payment Gateway Account service (id=8) has already been accepted. Decline is not allowed.";
        }
        else if($errorCode=='E00070'){
            return $msg = "The Payment Gateway Account service (id=8) has already been declined. Agree is not allowed.";
        }
        else if($errorCode=='E00071'){
            return $msg = "{0} must contain data.";
        }
        else if($errorCode=='E00072'){
            return $msg = "Required node missing.";
        }
        else if($errorCode=='E00073'){
            return $msg = "One of the field values is not valid.";
        }
        else if($errorCode=='E00074'){
            return $msg = "This merchant is not associated with this reseller.";
        }
        else if($errorCode=='E00075'){
            return $msg = "This is the result of an XML parser error. Missing field(s).";
        }
        else if($errorCode=='E00076'){
            return $msg = "Invalid value.";
        }
        else if($errorCode=='E00077'){
            return $msg = "Value too long.";
        }
        else if($errorCode=='E00078'){
            return $msg = "Pending Status (not completed).";
        }
        else if($errorCode=='E00079'){
            return $msg = "The impersonation login ID is invalid or not present.";
        }
        else if($errorCode=='E00080'){
            return $msg = "The impersonation API Key is invalid or not present.";
        }
        else if($errorCode=='E00081'){
            return $msg = "Partner account is not authorized to impersonate the login account.";
        }
        else if($errorCode=='E00082'){
            return $msg = "Country is not valid.";
        }
        else if($errorCode=='E00083'){
            return $msg = "Bank payment method is not accepted for the selected business country.";
        }
        else if($errorCode=='E00084'){
            return $msg = "Credit card payment method is not accepted for the selected business country.";
        }
        else if($errorCode=='E00085'){
            return $msg = "State for {0} is not valid.";
        }
        else if($errorCode=='E00086'){
            return $msg = "Merchant has declined authorization to resource.";
        }
        else if($errorCode=='E00087'){
            return $msg = "No subscriptions found for the given request.";
        }
        else if($errorCode=='E00088'){
            return $msg = "ProfileIds cannot be sent when requesting CreateProfile";
        }
        else if($errorCode=='E00089'){
            return $msg = "Payment data is required when requesting CreateProfile.";
        }
        else if($errorCode=='E00090'){
            return $msg = "PaymentProfile and PaymentData are mutually exclusive, only one of them can be provided at a time.";
        }
        else if($errorCode=='E00091'){
            return $msg = "PaymentProfileId cannot be sent with payment data.";
        }
        else if($errorCode=='E00092'){
            return $msg = "ShippingProfileId cannot be sent with ShipTo data.";
        }
        else if($errorCode=='E00093'){
            return $msg = "PaymentProfile cannot be sent with billing data.";
        }
        else if($errorCode=='E00094'){
            return $msg = "Paging Offset exceeds the maximum allowed value";
        }
        else if($errorCode=='E00095'){
            return $msg = "ShippingProfileId is not provided within Customer Profile.";
        }
        else if($errorCode=='E00096'){
            return $msg = "Finger Print value is not valid.";
        }
        else if($errorCode=='E00097'){
            return $msg = "Finger Print can't be generated.";
        }
        else if($errorCode=='E00098'){
            return $msg = "Customer Profile ID or Shipping Profile ID not found.";
        }
        else if($errorCode=='E00099'){
            return $msg = "Customer profile creation failed. This transaction ID is invalid.";
        }
        else if($errorCode=='E00100'){
            return $msg = "Customer profile creation failed. This transaction type does not support profile creation.";
        }
        else if($errorCode=='E00101'){
            return $msg = "Customer profile creation failed.";
        }
        else if($errorCode=='E00102'){
            return $msg = "Customer Info is missing.";
        }
        else if($errorCode=='E00103'){
            return $msg = "Customer profile creation failed. This payment method does not support profile creation";
        }
        else if($errorCode=='E00104'){
            return $msg = "Server in maintenance. Please try again later.";
        }
        else if($errorCode=='E00105'){
            return $msg = "The specified payment profile is associated with an active or suspended subscription and cannot be deleted.";
        }
        else if($errorCode=='E00106'){
            return $msg = "The specified customer profile is associated with an active or suspended subscription and cannot be deleted";
        }
        else if($errorCode=='E00107'){
            return $msg = "The specified shipping profile is associated with an active or suspended subscription and cannot be deleted.";
        }
        else if($errorCode=='E00108'){
            return $msg = "CustomerProfileId cannot be sent with customer data";
        }
        else if($errorCode=='E00109'){
            return $msg = "CustomerAddressId cannot be sent with shipTo data.";
        }
        else if($errorCode=='E00110'){
            return $msg = "CustomerPaymentProfileId is not provided within Customer Profile.";
        }
        else if($errorCode=='E00111'){
            return $msg = "The original subscription was not created with this Customer Profile.";
        }
        else if($errorCode=='E00112'){
            return $msg = "The specified month should not be in the future.";
        }
        else if($errorCode=='E00113'){
            return $msg = "Invalid OTS Token Data.";
        }
        else if($errorCode=='E00114'){
            return $msg = "Invalid OTS Token.";
        }
        else if($errorCode=='E00115'){
            return $msg = "Expired OTS Token.";
        }
        else if($errorCode=='E00116'){
            return $msg = "OTS Token access violation";
        }
        else if($errorCode=='E00117'){
            return $msg = "OTS Service Error '{0}'";
        }
        else if($errorCode=='E00118'){
            return $msg = "The transaction has been declined.";
        }
        else if($errorCode=='E00119'){
            return $msg = "Payment information should not be sent to Hosted Payment Page request.";
        }
        else if($errorCode=='E00120'){
            return $msg = "Payment and Shipping Profile IDs cannot be specified when creating new profiles.";
        }
        else if($errorCode=='E00121'){
            return $msg = "No default payment/shipping profile found.";
        }
        else if($errorCode=='E00122'){
            return $msg = "Please use Merchant Interface settings (API Credentials and Keys) to generate a signature key.";
        }
        else if($errorCode=='E00123'){
            return $msg = "The provided access token has expired";
        }
        else if($errorCode=='E00124'){
            return $msg = "The provided access token is invalid";
        }
        else if($errorCode=='E00125'){
            return $msg = "Hash doesnâ€™t match";
        }
        else if($errorCode=='E00126'){
            return $msg = "Failed shared key validation";
        }
        else if($errorCode=='E00127'){
            return $msg = "Invoice does not exist";
        }
        else if($errorCode=='E00128'){
            return $msg = "Requested action is not allowed";
        }
        else if($errorCode=='E00129'){
            return $msg = "Failed sending email";
        }
        else if($errorCode=='E00130'){
            return $msg = "Valid Customer Profile ID or Email is required";
        }
        else if($errorCode=='E00131'){
            return $msg = "Invoice created but not processed completely";
        }
        else if($errorCode=='E00132'){
            return $msg = "Invoicing or CIM service is not enabled.";
        }
        else if($errorCode=='E00133'){
            return $msg = "Server error.";
        }
        else if($errorCode=='E00134'){
            return $msg = "Due date is invalid";
        }
        else if($errorCode=='E00135'){
            return $msg = "Merchant has not provided processor information.";
        }
        else if($errorCode=='E00136'){
            return $msg = "Processor account is still in process, please try again later.";
        }
        else if($errorCode=='E00137'){
            return $msg = "Multiple payment types are not allowed.";
        }
        else if($errorCode=='E00138'){
            return $msg = "Payment and Shipping Profile IDs cannot be specified when requesting a hosted payment page.";
        }
        else if($errorCode=='E00139'){
            return $msg = "Access denied. Access Token does not have correct permissions for this API.";
        }
        else if($errorCode=='E00140'){
            return $msg = "Reference Id not found";
        }
        else if($errorCode=='E00141'){
            return $msg = "Payment Profile creation with this OpaqueData descriptor requires transactionMode to be set to liveMode.";
        }
        else if($errorCode=='E00142'){
            return $msg = "RecurringBilling setting is a required field for recurring tokenized payment transactions.";
        }
        else if($errorCode=='E00143'){
            return $msg = "Failed to parse MerchantId to integer";
        }
        else if($errorCode=='E00144'){
            return $msg = "We are currently holding the last transaction for review. Before you reactivate the subscription, review the transaction.";
        }
        else if($errorCode=='E00145'){
            return $msg = "This invoice has been canceled by the sender. Please contact the sender directly if you have questions. ";
        }
        else if($errorCode=='0'){
            return $msg = "Unknown Error";
        }
        else if($errorCode=='1'){
            return $msg = "This transaction has been approved.";
        }
        else if($errorCode=='2'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='3'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='4'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='5'){
            return $msg = "A valid amount is required.";
        }
        else if($errorCode=='6'){
            return $msg = "The credit card number is invalid.";
        }
        else if($errorCode=='7'){
            return $msg = "Credit card expiration date is invalid.";
        }
        else if($errorCode=='8'){
            return $msg = "The credit card has expired";
        }
        else if($errorCode=='9'){
            return $msg = "The ABA code is invalid";
        }
        else if($errorCode=='10'){
            return $msg = "The account number is invalid";
        }
        else if($errorCode=='11'){
            return $msg = "A duplicate transaction has been submitted.";
        }
        else if($errorCode=='12'){
            return $msg = "An authorization code is required but not present.";
        }
        else if($errorCode=='13'){
            return $msg = "The merchant login ID or password is invalid or the account is inactive. 	";
        }
        else if($errorCode=='14'){
            return $msg = "The referrer, relay response or receipt link URL is invalid.";
        }
        else if($errorCode=='15'){
            return $msg = "The transaction ID is invalid or not present.";
        }
        else if($errorCode=='16'){
            return $msg = "The transaction cannot be found.";
        }
        else if($errorCode=='17'){
            return $msg = "The merchant does not accept this type of credit card.";
        }
        else if($errorCode=='18'){
            return $msg = "ACH transactions are not accepted by this merchant.";
        }
        else if($errorCode=='19'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='20'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='21'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='22'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='23'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='24'){
            return $msg = "The Elavon bank number or terminal ID is incorrect. Call Merchant Service Provider.";
        }
        else if($errorCode=='25'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='26'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='27'){
            return $msg = "The transaction has been declined because of an AVS mismatch. The address provided does not match billing address of cardholder.";
        }
        else if($errorCode=='28'){
            return $msg = "The merchant does not accept this type of credit card.";
        }
        else if($errorCode=='29'){
            return $msg = "The Paymentech identification numbers are incorrect. Call Merchant Service Provider.";
        }
        else if($errorCode=='30'){
            return $msg = "The configuration with processor is invalid. Call Merchant Service Provider.";
        }
        else if($errorCode=='31'){
            return $msg = "The FDC Merchant ID or Terminal ID is incorrect. Call Merchant Service Provider.";
        }
        else if($errorCode=='32'){
            return $msg = "The merchant password is invalid or not present.";
        }
        else if($errorCode=='33'){
            return $msg = "%s cannot be left blank.";
        }
        else if($errorCode=='34'){
            return $msg = "The VITAL identification numbers are incorrect. Call Merchant Service Provider.";
        }
        else if($errorCode=='35'){
            return $msg = "An error occurred during processing. Call Merchant Service Provider.";
        }
        else if($errorCode=='36'){
            return $msg = "The authorization was approved but settlement failed.";
        }
        else if($errorCode=='37'){
            return $msg = "The credit card number is invalid.";
        }
        else if($errorCode=='38'){
            return $msg = "The Global Payment System identification numbers are incorrect. Call Merchant Service Provider.";
        }
        else if($errorCode=='39'){
            return $msg = "The supplied currency code is either invalid, not supported, not allowed for this merchant or doesnt have an exchange rate.";
        }
        else if($errorCode=='40'){
            return $msg = "This transaction must be encrypted.";
        }
        else if($errorCode=='41'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='42'){
            return $msg = "There is missing or invalid information in a required field.";
        }
        else if($errorCode=='43'){
            return $msg = "The merchant was incorrectly set up at the processor. Call Merchant Service Provider.";
        }
        else if($errorCode=='44'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='45'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='46'){
            return $msg = "Your session has expired or does not exist. You must log in again to continue working.";
        }
        else if($errorCode=='47'){
            return $msg = "The amount requested for settlement cannot be greater than the original amount authorized.";
        }
        else if($errorCode=='48'){
            return $msg = "This processor does not accept partial reversals.";
        }
        else if($errorCode=='49'){
            return $msg = "The transaction amount submitted was greater than the maximum amount allowed.";
        }
        else if($errorCode=='50'){
            return $msg = "This transaction is awaiting settlement and cannot be refunded.";
        }
        else if($errorCode=='51'){
            return $msg = "The sum of all credits against this transaction is greater than the original transaction amount.";
        }
        else if($errorCode=='52'){
            return $msg = "The transaction was authorized but the client could not be notified; it will not be settled.";
        }
        else if($errorCode=='53'){
            return $msg = "The transaction type is invalid for ACH transactions.";
        }
        else if($errorCode=='54'){
            return $msg = "The referenced transaction does not meet the criteria for issuing a credit.";
        }
        else if($errorCode=='55'){
            return $msg = "The sum of credits against the referenced transaction would exceed original debit amount.";
        }
        else if($errorCode=='56'){
            return $msg = "Credit card transactions are not accepted by this merchant.";
        }
        else if($errorCode=='57'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='58'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='59'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='60'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='61'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='62'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='63'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='64'){
            return $msg = "The referenced transaction was not approved.";
        }
        else if($errorCode=='65'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='66'){
            return $msg = "This transaction cannot be accepted for processing.";
        }
        else if($errorCode=='67'){
            return $msg = "This transaction cannot be accepted for processing.";
        }
        else if($errorCode=='68'){
            return $msg = "The version parameter is invalid";
        }
        else if($errorCode=='69'){
            return $msg = "The transaction type is invalid";
        }
        else if($errorCode=='70'){
            return $msg = "The transaction method is invalid.";
        }
        else if($errorCode=='71'){
            return $msg = "The bank account type is invalid.";
        }
        else if($errorCode=='72'){
            return $msg = "The authorization code is invalid.";
        }
        else if($errorCode=='73'){
            return $msg = "The drivers license date of birth is invalid.";
        }
        else if($errorCode=='74'){
            return $msg = "The duty amount is invalid.";
        }
        else if($errorCode=='75'){
            return $msg = "The freight amount is invalid.";
        }
        else if($errorCode=='76'){
            return $msg = "The tax amount is invalid.";
        }
        else if($errorCode=='77'){
            return $msg = "The SSN or tax ID is invalid.";
        }
        else if($errorCode=='78'){
            return $msg = "The card code is invalid.";
        }
        else if($errorCode=='79'){
            return $msg = "The drivers license number is invalid.";
        }
        else if($errorCode=='80'){
            return $msg = "The drivers license state is invalid.";
        }
        else if($errorCode=='81'){
            return $msg = "The requested form type is invalid.";
        }
        else if($errorCode=='82'){
            return $msg = "Scripts are only supported in version 2.5.";
        }
        else if($errorCode=='83'){
            return $msg = "The requested script is either invalid or no longer supported.";
        }
        else if($errorCode=='84'){
            return $msg = "The device type is invalid or missing.";
        }
        else if($errorCode=='85'){
            return $msg = "The market type is invalid";
        }
        else if($errorCode=='86'){
            return $msg = "The Response Format is invalid";
        }
        else if($errorCode=='87'){
            return $msg = "Transactions of this market type cannot be processed on this system.";
        }
        else if($errorCode=='88'){
            return $msg = "Track1 data is not in a valid format.";
        }
        else if($errorCode=='89'){
            return $msg = "Track2 data is not in a valid format.";
        }
        else if($errorCode=='90'){
            return $msg = "ACH transactions cannot be accepted by this system.";
        }
        else if($errorCode=='91'){
            return $msg = "Version 2.5 is no longer supported.";
        }
        else if($errorCode=='92'){
            return $msg = "The gateway no longer supports the requested method of integration.";
        }
        else if($errorCode=='93'){
            return $msg = "A valid country is required.";
        }
        else if($errorCode=='94'){
            return $msg = "The shipping state or country is invalid.";
        }
        else if($errorCode=='95'){
            return $msg = "A valid state is required.";
        }
        else if($errorCode=='96'){
            return $msg = "This country is not authorized for buyers.";
        }
        else if($errorCode=='97'){
            return $msg = "This transaction cannot be accepted.";
        }
        else if($errorCode=='98'){
            return $msg = "This transaction cannot be accepted.";
        }
        else if($errorCode=='99'){
            return $msg = "This transaction cannot be accepted.";
        }
        else if($errorCode=='100'){
            return $msg = "The eCheck type parameter is invalid.";
        }
        else if($errorCode=='101'){
            return $msg = "The given name on the account and/or the account type does not match the actual account.";
        }
        else if($errorCode=='102'){
            return $msg = "This request cannot be accepted.";
        }
        else if($errorCode=='103'){
            return $msg = "This transaction cannot be accepted.";
        }
        else if($errorCode=='104'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='105'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='106'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='107'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='108'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='109'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='110'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='111'){
            return $msg = "A valid billing country is required.";
        }
        else if($errorCode=='112'){
            return $msg = "A valid billing state/province is required.";
        }
        else if($errorCode=='113'){
            return $msg = "The commercial card type is invalid.";
        }
        else if($errorCode=='114'){
            return $msg = "The merchant account is in test mode. This automated payment will not be processed.";
        }
        else if($errorCode=='115'){
            return $msg = "The merchant account is not active. This automated payment will not be processed.";
        }
        else if($errorCode=='116'){
            return $msg = "The authentication indicator is invalid.";
        }
        else if($errorCode=='117'){
            return $msg = "The cardholder authentication value is invalid.";
        }
        else if($errorCode=='118'){
            return $msg = "The combination of card type, authentication indicator and cardholder authentication value is invalid.";
        }
        else if($errorCode=='119'){
            return $msg = "Transactions having cardholder authentication values cannot be marked as recurring.";
        }
        else if($errorCode=='120'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='121'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='122'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='123'){
            return $msg = "This account has not been given the permission(s) required for this request.";
        }
        else if($errorCode=='124'){
            return $msg = "This processor does not accept recurring transactions.";
        }
        else if($errorCode=='125'){
            return $msg = "The surcharge amount is invalid.";
        }
        else if($errorCode=='126'){
            return $msg = "The Tip amount is invalid.";
        }
        else if($errorCode=='127'){
            return $msg = "The transaction resulted in an AVS mismatch. The address provided does not match billing address of cardholder.";
        }
        else if($errorCode=='128'){
            return $msg = "This transaction cannot be processed.";
        }
       
        else if($errorCode=='130'){
            return $msg = "This merchant account has been closed.";
        }
        else if($errorCode=='131'){
            return $msg = "This transaction cannot be accepted at this time.";
        }
        else if($errorCode=='132'){
            return $msg = "This transaction cannot be accepted at this time.";
        }
        
         else if($errorCode=='141'){
            return $msg = "This transaction has been declined.";
        }
        
        else if($errorCode=='145'){
            return $msg = "This transaction has been declined.";
        }
        
        else if($errorCode=='153'){
            return $msg = "There was an error processing the payment data.";
        }
        else if($errorCode=='154'){
            return $msg = "Processing Apple Payments is not enabled for this merchant account";
        }
        else if($errorCode=='155'){
            return $msg = "This processor does not support this method of submitting payment data.";
        }
        else if($errorCode=='156'){
            return $msg = "The cryptogram is either invalid or cannot be used in combination with other parameters.";
        }
        else if($errorCode=='157'){
            return $msg = "";
        }
        else if($errorCode=='158'){
            return $msg = "";
        }
        else if($errorCode=='159'){
            return $msg = "";
        }
        else if($errorCode=='160'){
            return $msg = "";
        }
        else if($errorCode=='161'){
            return $msg = "";
        }
        else if($errorCode=='162'){
            return $msg = "";
        }
        else if($errorCode=='163'){
            return $msg = "";
        }
        else if($errorCode=='164'){
            return $msg = "";
        }
        else if($errorCode=='165'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='166'){
            return $msg = "";
        }
        else if($errorCode=='167'){
            return $msg = "";
        }
        else if($errorCode=='168'){
            return $msg = "";
        }
        else if($errorCode=='169'){
            return $msg = "";
        }
        else if($errorCode=='170'){
            return $msg = "An error occurred during processing. Please contact the merchant.";
        }
        else if($errorCode=='171'){
            return $msg = "An error occurred during processing. Please contact the merchant.";
        }
        else if($errorCode=='172'){
            return $msg = "An error occurred during processing. Please contact the merchant.";
        }
        else if($errorCode=='173'){
            return $msg = "An error occurred during processing. Please contact the merchant.";
        }
        else if($errorCode=='174'){
            return $msg = "The transaction type is invalid. Please contact the merchant.";
        }
        else if($errorCode=='175'){
            return $msg = "This processor does not allow voiding of credits.";
        }
        else if($errorCode=='176'){
            return $msg = "";
        }
        else if($errorCode=='177'){
            return $msg = "";
        }
        else if($errorCode=='178'){
            return $msg = "";
        }
        else if($errorCode=='179'){
            return $msg = "";
        }
        else if($errorCode=='180'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='181'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='182'){
            return $msg = "One or more of the sub-merchant values are invalid.";
        }
        else if($errorCode=='183'){
            return $msg = "One or more of the required sub-merchant values are missing.";
        }
        else if($errorCode=='184'){
            return $msg = "Invalid Token Requestor Name.";
        }
        else if($errorCode=='185'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='186'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='187'){
            return $msg = "Invalid Token Requestor ECI Length.";
        }
        else if($errorCode=='188'){
            return $msg = "";
        }
        else if($errorCode=='189'){
            return $msg = "";
        }
        else if($errorCode=='190'){
            return $msg = "";
        }
        else if($errorCode=='191'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='192'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='193'){
            return $msg = "The transaction is currently under review.";
        }
        else if($errorCode=='194'){
            return $msg = "";
        }
        else if($errorCode=='195'){
            return $msg = "One or more of the HTML type configuration fields do not appear to be safe.";
        }
        else if($errorCode=='196'){
            return $msg = "";
        }
        else if($errorCode=='197'){
            return $msg = "";
        }
        else if($errorCode=='198'){
            return $msg = "";
        }
        else if($errorCode=='199'){
            return $msg = "";
        }
        else if($errorCode=='200'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='201'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='202'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='203'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='204'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='205'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='206'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='207'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='208'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='209'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='210'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='211'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='212'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='213'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='214'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='215'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='216'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='217'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='218'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='219'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='220'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='221'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='222'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='223'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='224'){
            return $msg = "This transaction has been declined";
        }
        else if($errorCode=='225'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='226'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='227'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='228'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='229'){
            return $msg = "Conversion rate for this card is available.";
        }
        else if($errorCode=='230'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='231'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='232'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='233'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='234'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='235'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='236'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='237'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='238'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='239'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='240'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='241'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='242'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='243'){
            return $msg = "Recurring billing is not allowed for this eCheck.Net type.";
        }
        else if($errorCode=='244'){
            return $msg = "This eCheck.Net type is not allowed for this Bank Account Type.";
        }
        else if($errorCode=='245'){
            return $msg = "This eCheck.Net type is not allowed when using the payment gateway hosted payment form.";
        }
        else if($errorCode=='246'){
            return $msg = "This eCheck.Net type is not allowed.";
        }
        else if($errorCode=='247'){
            return $msg = "This eCheck.Net type is not allowed.";
        }
        else if($errorCode=='248'){
            return $msg = "The check number is invalid.";
        }
        else if($errorCode=='250'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='251'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='252'){
            return $msg = "Your order has been received. Thank you for your business!";
        }
        else if($errorCode=='253'){
            return $msg = "Your order has been received. Thank you for your business!";
        }
        else if($errorCode=='254'){
            return $msg = "This transaction has been declined.";
        }
        else if($errorCode=='260'){
            return $msg = "Reversal not supported for this transaction type.";
        }
        else if($errorCode=='261'){
            return $msg = "An error occurred during processing. Please try again.";
        }
        else if($errorCode=='265'){
            return $msg = "The PayformMask is invalid.";
        }
        else if($errorCode=='270'){
            return $msg = "Line item %1 is invalid.";
        }
        else if($errorCode=='271'){
            return $msg = "The number of line items submitted is not allowed. A maximum of %1 line items can be submitted.";
        }
        else if($errorCode=='280'){
            return $msg = "The auction platform name is invalid.";
        }
        else if($errorCode=='281'){
            return $msg = "The auction platform ID is invalid.";
        }
        else if($errorCode=='282'){
            return $msg = "The auction listing type is invalid.";
        }
        else if($errorCode=='283'){
            return $msg = "The auction listing ID is invalid.";
        }
        else if($errorCode=='283'){
            return $msg = "The auction seller ID is invalid.";
        }
        else if($errorCode=='285'){
            return $msg = "The auction buyer ID is invalid.";
        }
        else if($errorCode=='286'){
            return $msg = "One or more required auction values were not submitted.";
        }
        else if($errorCode=='287'){
            return $msg = "The combination of auction platform ID and auction platform name is invalid.";
        }
        else if($errorCode=='288'){
            return $msg = "This transaction cannot be accepted.";
        }
        else if($errorCode=='289'){
            return $msg = "This processor does not accept zero dollar authorization for this card type.";
        }
        else if($errorCode=='290'){
            return $msg = "There is one or more missing or invalid required fields.";
        }
        else if($errorCode=='295'){
            return $msg = "The amount of this request was only partially approved on the given prepaid card. An additional payment is required to fulfill the balance of this transaction.";
        }
        else if($errorCode=='296'){
            return $msg = "The specified SplitTenderID is invalid.";
        }
        else if($errorCode=='297'){
            return $msg = "Transaction ID and Split Tender ID cannot both be used in the same request.";
        }
        else if($errorCode=='298'){
            return $msg = "This order has already been released or voided therefore new transaction associations cannot be accepted.";
        }
        else if($errorCode=='300'){
            return $msg = "The device ID is invalid.";
        }
        else if($errorCode=='301'){
            return $msg = "The device batch ID is invalid.";
        }
        else if($errorCode=='302'){
            return $msg = "The reversal flag is invalid.";
        }
        else if($errorCode=='303'){
            return $msg = "The device batch is full. Please close the batch.";
        }
        else if($errorCode=='304'){
            return $msg = "The original transaction is in a closed batch.";
        }
        else if($errorCode=='305'){
            return $msg = "The merchant is configured for auto-close.";
        }
        else if($errorCode=='306'){
            return $msg = "The batch is already closed.";
        }
        else if($errorCode=='307'){
            return $msg = "The reversal was processed successfully.";
        }
        else if($errorCode=='308'){
            return $msg = "Original transaction for reversal not found.";
        }
        else if($errorCode=='309'){
            return $msg = "The device has been disabled.";
        }
        else if($errorCode=='310'){
            return $msg = "This transaction has already been voided.";
        }
        else if($errorCode=='311'){
            return $msg = "This transaction has already been captured.";
        }
        else if($errorCode=='312'){
            return $msg = "The specified security code was invalid.";
        }
        else if($errorCode=='313'){
            return $msg = "A new security code was requested.";
        }
        else if($errorCode=='314'){
            return $msg = "This transaction cannot be processed.";
        }
        else if($errorCode=='315'){
            return $msg = "The credit card number is invalid.";
        }
        else if($errorCode=='316'){
            return $msg = "Credit card expiration date is invalid.";
        }
        else if($errorCode=='317'){
            return $msg = "The credit card has expired.";
        }
        else if($errorCode=='318'){
            return $msg = "A duplicate transaction has been submitted.";
        }
        else if($errorCode=='319'){
            return $msg = "The transaction cannot be found.";
        }
        else if($errorCode=='320'){
            return $msg = "The device identifier is either not registered or not enabled.";
        }
        else if($errorCode=='325'){
            return $msg = "The request data did not pass the required fields check for this application.";
        }
        else if($errorCode=='326'){
            return $msg = "The request field(s) are either invalid or missing.";
        }
        else if($errorCode=='327'){
            return $msg = "The void request failed. Either the original transaction type does not support void, or the transaction is in the process of being settled.";
        }
        else if($errorCode=='328'){
            return $msg = "A validation error occurred at the processor.";
        }
        else if($errorCode=='330'){
            return $msg = "V.me transactions are not accepted by this merchant.";
        }
        else if($errorCode=='331'){
            return $msg = "The x_call_id value is missing.";
        }
        else if($errorCode=='332'){
            return $msg = "The x_call_id value is not found or invalid.";
        }
        else if($errorCode=='333'){
            return $msg = "A validation error was returned from V.me.";
        }
        else if($errorCode=='334'){
            return $msg = "The V.me transaction is in an invalid state.";
        }
        else if($errorCode=='339'){
            return $msg = "Use x_method to specify method or send only x_call_id or card/account information.";
        }
        else if($errorCode=='340'){
            return $msg = "V.me by Visa does not support voids on captured or credit transactions. Please allow the transaction to settle, then process a refund for the captured transaction.";
        }
        else if($errorCode=='341'){
            return $msg = "The x_discount value is invalid.";
        }
        else if($errorCode=='342'){
            return $msg = "The x_giftwrap value is invalid.";
        }
        else if($errorCode=='343'){
            return $msg = "The x_subtotal value is invalid.";
        }
        else if($errorCode=='344'){
            return $msg = "The x_misc value is invalid.";
        }
        else if($errorCode=='350'){
            return $msg = "Country must be a valid two or three-character value if specified.";
        }
        else if($errorCode=='351'){
            return $msg = "Employee ID must be 1 to %x characters in length.";
        }
        else if($errorCode=='355'){
            return $msg = "An error occurred while parsing the EMV data.";
        }
        else if($errorCode=='356'){
            return $msg = "EMV-based transactions are not currently supported for this processor and card type.";
        }
        else if($errorCode=='357'){
            return $msg = "Opaque Descriptor is required.";
        }
        else if($errorCode=='358'){
            return $msg = "EMV data is not supported with this transaction type.";
        }
        else if($errorCode=='359'){
            return $msg = "EMV data is not supported with this market type.";
        }
        else if($errorCode=='360'){
            return $msg = "An error occurred while decrypting the EMV data.";
        }
        else if($errorCode=='361'){
            return $msg = "The EMV version is invalid.";
        }
        else if($errorCode=='362'){
            return $msg = "The EMV version is required.";
        }
        else if($errorCode=='363'){
            return $msg = "The POS Entry Mode value is invalid.";
        }
        else if($errorCode=='370'){
            return $msg = "Signature data is too large.";
        }
        else if($errorCode=='371'){
            return $msg = "Signature must be PNG formatted data.";
        }
        else if($errorCode=='375'){
            return $msg = "Terminal/lane number must be numeric.";
        }
        else if($errorCode=='380'){
            return $msg = "KSN is duplicated.";
        }
        else if($errorCode=='901'){
            return $msg = "This transaction cannot be accepted at this time due to system maintenance. Please try again later.";
        }
        else if($errorCode=='2000'){
            return $msg = "Need payer consent.";
        }
        else if($errorCode=='2001'){
            return $msg = "PayPal transactions are not accepted by this merchant.";
        }
        else if($errorCode=='2002'){
            return $msg = "PayPal transactions require x_version of at least 3.1.";
        }
        else if($errorCode=='2003'){
            return $msg = "Request completed successfully";
        }
        else if($errorCode=='2004'){
            return $msg = "Success URL is required.";
        }
        else if($errorCode=='2005'){
            return $msg = "Cancel URL is required.";
        }
        else if($errorCode=='2006'){
            return $msg = "Payer ID is required.";
        }
        else if($errorCode=='2007'){
            return $msg = "This processor does not accept zero dollar authorizations.";
        }
        else if($errorCode=='2008'){
            return $msg = "The referenced transaction does not meet the criteria for issuing a Continued Authorization.";
        }
        else if($errorCode=='2009'){
            return $msg = "The referenced transaction does not meet the criteria for issuing a Continued Authorization w/ Auto Capture.";
        }
        else if($errorCode=='2100'){
            return $msg = "PayPal transactions require valid URL for success_url";
        }
        else if($errorCode=='2101'){
            return $msg = "PayPal transactions require valid URL for cancel_url";
        }
        else if($errorCode=='2102'){
            return $msg = "Payment not authorized. Payment has not been authorized by the user.";
        }
        else if($errorCode=='2103'){
            return $msg = "This transaction has already been authorized.";
        }
        else if($errorCode=='2104'){
            return $msg = "The totals of the cart item amounts do not match order amounts. Be sure the total of the payment detail item parameters add up to the order total.";
        }
        else if($errorCode=='2105'){
            return $msg = "PayPal has rejected the transaction.Invalid Payer ID.";
        }
        else if($errorCode=='2106'){
            return $msg = "PayPal has already captured this transaction.";
        }
        else if($errorCode=='2107'){
            return $msg = "PayPal has rejected the transaction. This Payer ID belongs to a different customer.";
        }
        else if($errorCode=='2108'){
            return $msg = "PayPal has rejected the transaction. x_paypal_hdrimg exceeds maximum allowable length.";
        }
        else if($errorCode=='2109'){
            return $msg = "PayPal has rejected the transaction. x_paypal_payflowcolor must be a 6 character hexadecimal value.";
        }
        else if($errorCode=='2200'){
            return $msg = "The amount requested for settlement cannot be different than the original amount authorized. Please void transaction if required";
        }
        return $msg;
    }
     function Refunded($msg,  $price, $transctionsId, $name, $email,$rdate, $sitename,$message=null,$last_4_digit=null) {
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
    
    function uploadAvatarImage($tmp_name, $name, $path, $imgWidth) {
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
                    $time = time();
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

}
