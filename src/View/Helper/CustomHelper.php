<?php

namespace Cake\View\Helper;

use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class CustomHelper extends Helper {

    public function parseEmotions($text = null) {
        $table = TableRegistry::get('ChatCategoryImages');
        preg_match_all('/:(\\S+)/im', $text, $matches);
        $length = count($matches[1]);
        $shortcut = array();
        foreach ($matches[1] as $match) {
            $shortcut[] = "'" . $match . "'";
        }
        if (count($shortcut)) {

            $sql = $this->$table->find('all');
            foreach ($sql as $img) {
                if ($img['status']) {
                    $oldText = ':' . $img->shortcut;
                    if ($img->chat_category_id == 0) {
                        $newText = '<img title=":' . $img->shortcut . '"   src="' . $img->image_url . '" class="chat-emotions"  style="max-height:40px;" >';
                    }
                    $text = str_replace($oldText, $newText, $text);
                }
            }
        }
        return $text;
    }

    function dateDisplay($datetime) {
        if ($datetime != "" && $datetime != "NULL" && $datetime != "0000-00-00 00:00:00") {
            return date("M d, Y", strtotime($datetime));
        } else {
            return false;
        }
    }

    function dateDisplayTime($datetime) {
        if ($datetime != "" && $datetime != "NULL" && $datetime != "0000-00-00 00:00:00") {
            return date("M d, Y H:i:s", strtotime($datetime));
        } else {
            return false;
        }
    }

    public function shortLength($x, $length) {
        if (strlen($x) <= $length) {
            return $x;
        } else {
            $y = substr($x, 0, $length) . '...';
            return $y;
        }
    }

    public function bubbleSort(array $arr) {
        $n = sizeof($arr);
        $totalWidth = 0;
        for ($i = 0; $i < $n; $i++) {
            list($width) = getimagesize(POST_IMAGES . $arr[$i]['image']);
            $totalWidth = $totalWidth + $width;
        }
        for ($i = 1; $i < $n; $i++) {
            for ($j = $n - 1; $j >= $i; $j--) {
                list($width1) = getimagesize(POST_IMAGES . $arr[$j - 1]['image']);
                list($width2) = getimagesize(POST_IMAGES . $arr[$j]['image']);
                if ($width1 < $width2) {
                    $tmp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return ['arr' => $arr, 'total_width' => $totalWidth, 'count' => $n];
    }

    public static function makeSeoUrl($url) {
        if ($url) {
            $url = trim($url);
            $value = preg_replace("![^a-z0-9]+!i", "-", $url);
            $value = trim($value, "-");
            return strtolower($value);
        }
    }

    public static function getPostType($userType = null) {
        if ($userType == 4) { //For kid
            return [0 => 'Public', 1 => 'Private'];
        } else { //For School
            return [0 => 'Public', 1 => 'Private', 2 => 'Followers'];
        }
    }

    public static function getCommentTime($date) {
        $time = date("M d Y", $date) . " at " . date("H:i A ", $date);
        return $time;
    }

    public static function timeAgo($time_ago) {
        if (!is_numeric($time_ago)) {
            $time_ago = strtotime($time_ago);
        }
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);

        if ($seconds <= 60) {  // Seconds
            echo "$seconds seconds ago";
        } else if ($minutes <= 60) { //Minutes
            if ($minutes == 1) {
                echo "one minute ago";
            } else {
                echo "$minutes minutes ago";
            }
        } else if ($hours <= 24) { //Hours
            if ($hours == 1) {
                echo "an hour";
            } else {
                echo "$hours hours ago";
            }
        } else if ($days <= 7) { //Days
            if ($days == 1) {
                echo "yesterday";
            } else {
                echo "$days days ago";
            }
        } else if ($weeks <= 4.3) { //Weeks
            if ($weeks == 1) {
                echo "a week ago";
            } else {
                echo "$weeks weeks ago";
            }
        } else if ($months <= 12) { //Months
            if ($months == 1) {
                echo "a month ";
            } else {
                echo "$months months ago";
            }
        } else { //Years
            if ($years == 1) {
                echo "one year ago";
            } else {
                echo "$years years ago";
            }
        }
    }

    function defaultImage($image) {

        return $image;
    }

    function getStatus($status) {
        $status = "Enabled";
        if ($status == 0) {
            $status = "Disabled";
        }
        return $status;
    }

/////////////////////////////ENCRYPTION AND DECRYPTION CODE/////////////////////////////////////
    public function encryptor($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'chinu';
        $secret_iv = 'uk';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    function dateDisplaysaprate($datetime) {

        if ($datetime != "" && $datetime != "NULL" && $datetime != "0000-00-00 00:00:00") {

            return date("M-d-Y, H:i:s", strtotime($datetime));
        } else {

            return false;
        }
    }

    function holidayDateDisplay($datetime) {
        if ($datetime != "" && $datetime != "NULL" && $datetime != "0000-00-00 00:00:00") {
            return date("l, M jS. Y", strtotime($datetime));
        } else {
            return false;
        }
    }

    function eventDateDisplay($datetime) {
        if ($datetime != "" && $datetime != "NULL" && $datetime != "0000-00-00 00:00:00") {
            return date("jS M Y, l", strtotime($datetime));
        } else {
            return false;
        }
    }

    function getYoutubeId($url) {
        if ($url) {
            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            $url = $my_array_of_vars['v'];
            return $url;
        }
    }

    function downloadReport($payments, $fileDetail) {

        $customFields = json_decode($fileDetail->custom_fields);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $style = [
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($style);
//    $objPHPExcel->getActiveSheet()->getColumnDimension("A1:J1")->setAutoSize(true);

        foreach (range('A', 'J') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }



        ///SetHeading//

        $head = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S'];
        $count = 0;
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Name");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Email");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Phone");
        foreach ($customFields as $key => $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', $value);
        }
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Total");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Due Date");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Status");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Payment Date");
        //Set Content
        $rowCount = 2;
        $total = count($payments);
        for ($i = 0; $i < $total; $i++) {
            $count = -1;
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, " " . $payments[$i]['phone']);
            $customFieldValues = json_decode($payments[$i]['custom_fields']);
            foreach ($customFields as $key => $value) {
                $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $customFieldValues->$key);
            }
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['total_fee']);

            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['due_date']);
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);

            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, ($payments[$i]['status'] == 1) ? 'Paid' : 'Unpaid');
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);

            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, !empty($payments[$i]['payment_date']) ? $payments[$i]['payment_date'] : "");
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);

            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $filename = "Payemnt-report.xlsx";
        $objWriter->save("temp_excel/$filename");
        return $filename;
    }

    function downloadCustomerReport($payments, $fileDetail) {

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $style = [
            'alignment' => [
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ]
        ];

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($style);
        foreach (range('A', 'F') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }


        $head = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S'];
        $count = 0;

        ///SetHeading//
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Ticket Id");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Name");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Phone");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Purchase Dt.");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Qty.");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Total");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Mode");
        $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Status");
        //Set Content
        $rowCount = 2;
        $total = count($payments);
        for ($i = 0; $i < $total; $i++) {
            $count = -1;
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['ticket']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['phone']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['purchase_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['qty']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['total']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['mode']);
            $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['status']);
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);
            $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $filename = "encore-report.xlsx";
        $objWriter->save("files/temp_excel/$filename");
        return $filename;
    }

    function kidName($id) {
        $table = TableRegistry::get('KidsDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = '';
        if (!empty($query->kids_first_name)) {
            $name = $query->kids_first_name;
        } else {
            if (@$query->kid_count == '1') {
                echo 'First Child';
            }
            if (@$query->kid_count == '2') {
                echo 'Second Child';
            }
            if (@$query->kid_count == '3') {
                echo 'Third Child';
            }
            if (@$query->kid_count == '4') {
                echo 'Four Child';
            }
        }

        return $name;
    }

    function rowCount($table) {
        $tablename = TableRegistry::get($table);
        $count = 0;
        $count = $tablename->find('all')->count();
        if (!empty($count)) {
            $count = $count;
        }

        return $count;
    }

    function notification($kidId) {
        $tablename = TableRegistry::get('Notifications');
        $count = 0;
        $count = $tablename->find('all')->where(['kid_id' => $kidId, 'is_read' => 0])->count();
        if (!empty($count)) {
            $count = $count;
        }

        return $count;
    }

    function notificationUser($Id) {
        $tablename = TableRegistry::get('Notifications');
        $count = 0;
        $count = $tablename->find('all')->where(['user_id' => $Id, 'kid_id' => 0, 'is_read' => 0])->count();
        if (!empty($count)) {
            $count = $count;
        }

        return $count;
    }

    function removeDoller($string = null) {
        if (!empty($string)) {

            if ($string == 'I want the best') {

                return "";
            } else {
                return "$";
            }
        }

        return "";
    }

    function previousStyleistName($userId = null, $paymenId = null, $count = null) {
        $table = TableRegistry::get('PaymentGetways');
        $user = TableRegistry::get('Users');

        $query1 = $table->find('all')->where(['user_id' => $userId, 'id' => $paymenId, 'count' => $count])->first();
        $c = $count - 1;
        if ($query1->kid_id != '') {
            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => $query1->kid_id])->first()->emp_id;
        } else {

            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => '0'])->first()->emp_id;
        }

        $name = $user->find('all')->where(['id' => $query])->first()->name;
        if ($name != '') {
            return $name;
        } else {
            return "No yet";
        }
    }
    
    function previousQaName($userId = null, $paymenId = null, $count = null) {
        $table = TableRegistry::get('PaymentGetways');
        $user = TableRegistry::get('Users');

        $query1 = $table->find('all')->where(['user_id' => $userId, 'id' => $paymenId, 'count' => $count])->first();
        $c = $count - 1;
        if ($query1->kid_id != '') {
            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => $query1->kid_id])->first()->qa_id;
        } else {

            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => '0'])->first()->qa_id;
        }

        $name = $user->find('all')->where(['id' => $query])->first()->name;
        if ($name != '') {
            return $name;
        } else {
            return "No yet";
        }
    }
    
    function previousInvName($userId = null, $paymenId = null, $count = null) {
        $table = TableRegistry::get('PaymentGetways');
        $user = TableRegistry::get('Users');

        $query1 = $table->find('all')->where(['user_id' => $userId, 'id' => $paymenId, 'count' => $count])->first();
        $c = $count - 1;
        if ($query1->kid_id != '') {
            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => $query1->kid_id])->first()->inv_id;
        } else {

            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => '0'])->first()->inv_id;
        }

        $name = $user->find('all')->where(['id' => $query])->first()->name;
        if ($name != '') {
            return $name;
        } else {
            return "No yet";
        }
    }
    
    function previousSupportName($userId = null, $paymenId = null, $count = null) {
        $table = TableRegistry::get('PaymentGetways');
        $user = TableRegistry::get('Users');

        $query1 = $table->find('all')->where(['user_id' => $userId, 'id' => $paymenId, 'count' => $count])->first();
        $c = $count - 1;
        if ($query1->kid_id != '') {
            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => $query1->kid_id])->first()->support_id;
        } else {

            $query = $table->find('all')->where(['user_id' => $userId, 'status' => 1, 'count' => $c, 'payment_type' => 1, 'kid_id' => '0'])->first()->support_id;
        }

        $name = $user->find('all')->where(['id' => $query])->first()->name;
        if ($name != '') {
            return $name;
        } else {
            return "No yet";
        }
    }

    function getPaymentGetwayStatus($id) {
        $tablename = TableRegistry::get('PaymentGetways');
        $getstatus = $tablename->find('all')->where(['user_id' => $id])->extract('status')->toArray();
        return $getstatus;
    }

    function junkPaymentGetwayStatus($id) {
        $tablename = TableRegistry::get('PaymentGetways');
        $getstatus = $tablename->find('all')->where(['user_id' => $id])->extract('status')->toArray();
        return $getstatus;
    }

    function customerName($id) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = '';
        if (!empty($query->name)) {
            $name = $query->name;
        }

        return $name;
    }

    function customerEmail($id) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $id])->first();
        $email = '';
        if (!empty($query->email)) {
            $email = $query->email;
        }

        return $email;
    }

    function CardDetails($id) {
        $table = TableRegistry::get('PaymentCardDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        //pj($query); exit;
        $card_number = '';
        if (!empty($query->card_number)) {
            $card_number = $query->card_number;
        }

        return $card_number;
    }

    function requestDate($id = null) {

        $table = TableRegistry::get('DeliverDate');
        $query = $table->find('all')->where(['id' => $id])->first()->date_in_time;
        return $query;
    }

    function payment_count_status($id) {
        $tablename = TableRegistry::get('PaymentGetways');
        $paidCount = $tablename->find('all')->where(['user_id' => $id, 'status' => 1])->count();
        $unpaidCount = $tablename->find('all')->where(['user_id' => $id, 'status' => 0])->count();
        $getstatus = "Paid:-" . $paidCount . ' Unpaid:-' . $unpaidCount;
        return $getstatus;
    }

    function emailperference($userId = null, $kid_id = null) {
        $table = TableRegistry::get('EmailPreferences');
        if ($kid_id == 0) {
            $query = $table->find('all')->where(['user_id' => $userId, 'kid_id' => 0])->first()->preferences;
        } else {
            $query = $table->find('all')->where(['user_id' => $userId, 'kid_id' => $kid_id])->first()->preferences;
        }
        return $query;
    }

    function categoryName($id) {
        $table = TableRegistry::get('BlogCategory');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->category_name;
    }

    function BlogName($id) {
        $table = TableRegistry::get('Blogs');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->blog_title;
    }

    function BlogRating($id) {
        $table = TableRegistry::get('BlogRating');
        $query = $table->find('all')->where(['blog_id' => $id]);
        $count = $table->find('all')->where(['blog_id' => $id])->count();
        $credit_balance = $table->find('all')->Select(['blog_rating' => 'SUM(rating)'])->where(['blog_id' => $id])->first();
        $total_value = $credit_balance->blog_rating;
        $avarating = $total_value / $count;
        return $avarating;
    }

    function comntReply($cmtId = null) {
        $table = TableRegistry::get('CommentsReply');
        $query = $table->find('all')->where(['comment_id' => $cmtId])->order(['id' => 'DESC']);
        return $query;
    }

    function comntscReply($relyId = null) {
        $table = TableRegistry::get('CommentScndreply');
        $query = $table->find('all')->where(['reply_id' => $relyId])->order(['id' => 'DESC']);
        return $query;
    }

    function UserName($id) {
        $table = TableRegistry::get('UserDetails');
        $query = $table->find('all')->where(['user_id' => $id])->first();
        return $query->first_name . ' ' . $query->last_name;
    }

    function userCreated($id) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->created_dt;
    }

    function userCreatedKid($id) {
        $table = TableRegistry::get('KidsDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->created_dt;
    }

    function UserGender($id) {
        $table = TableRegistry::get('UserDetails');
        $query = $table->find('all')->where(['user_id' => $id])->first();
        return $query->gender;
    }

    function BrandsName($id) {
        $table = TableRegistry::get('InUsers');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->brand_name;
    }

    function email($id) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->email;
    }

    function ChcckPaid($user_id) {
        $result = 0;
        $table = TableRegistry::get('PaymentGetways');
        $data = $table->find('all')->where(['user_id' => $user_id, 'payment_type' => 1, 'status' => 1, 'count' => 1, 'kid_id' => 0])->first();
        if (@$data->user_id != '') {
            $result = $data->user_id;
        } else {
            $result = 0;
        }
        return $result;
    }

    function ChcckPaidKid($kid_id) {
        $id = 0;
        $table = TableRegistry::get('PaymentGetways');
        $data = $table->find('all')->where(['payment_type' => 1, 'status' => 1, 'count' => 1, 'kid_id' => $kid_id])->first();
        if (@$data->kid_id != '') {
            $id = $data->kid_id;
        } else {
            $id = '0';
        }
        return $id;
    }

    function havingKid($user_id) {
        $table = TableRegistry::get('KidsDetails');
        $data = $table->find('all')->where(['user_id' => $user_id])->first();
        if (@$data->id == '') {
            $result = 0;
        } else {
            $result = 1;
        }
        return $result;
    }

    function massKidProductCount($id) {
        $table = TableRegistry::get('Products');
        $mass_kid_product_count = $table->find('all')->where(['payment_id' => $id, 'Products.kid_id !=' => 0])->count();
        return $mass_kid_product_count;
    }

    function emaplyeName($id) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->name;
    }

    function productCountPrice($id) {
        $table = TableRegistry::get('Products');
        $table1 = TableRegistry::get('PaymentGetways');
        $data = $table1->find('all')->where(['id' => $id])->first();
        $product_count = $table->find('all')->where(['payment_id' => $data->parent_id])->count();
        return $product_count;
    }

    function productPrice($id) {

        $table = TableRegistry::get('Products');
        $product_ls = $table->find('all')->where(['payment_id' => $id]);
        $paymentGetwayAmount = 0;
        foreach ($product_ls as $ls) {
            $paymentGetwayAmount += $ls->sell_price;
        }
        return $paymentGetwayAmount;
    }

    function getAllcard($id) {
        $table = TableRegistry::get('PaymentCardDetails');
        $data = $table->find('all')->where(['user_id' => $id]);
        return $data;
    }

    function ToOrdinal($n) {
        $ordinal = "";
        if ($n >= 0 && $n <= 999)
            null;
        else {
            null;
            return;
        }
        $u = $n % 10;
        $t = floor(($n / 10) % 10);
        $h = floor($n / 100);
        if ($h > 0) {
            $ordinal .= ToCardinalUnits($h);
            $ordinal .= " hundred";
            if ($t == 0 && $u == 0) {
                $ordinal .= "th";
            } else {
                $ordinal .= " ";
            }
        }
        if ($t >= 2 && $u != 0) {
            switch ($t) {
                case 2:
                    $ordinal .= "twenty-";
                    break;
                case 3:
                    $ordinal .= "thirty-";
                    break;
                case 4:
                    $ordinal .= "forty-";
                    break;
                case 5:
                    $ordinal .= "fifty-";
                    break;
                case 6:
                    $ordinal .= "sixty-";
                    break;
                case 7:
                    $ordinal .= "seventy-";
                    break;
                case 8:
                    $ordinal .= "eighty-";
                    break;
                case 9:
                    $ordinal .= "ninety-";
                    break;
            }
        }
        if ($t >= 2 && $u == 0) {
            switch ($t) {
                case 2:
                    $ordinal .= "twentieth";
                    break;
                case 3:
                    $ordinal .= "thirtieth";
                    break;
                case 4:
                    $ordinal .= "fortieth";
                    break;
                case 5:
                    $ordinal .= "fiftieth";
                    break;
                case 6:
                    $ordinal .= "sixtieth";
                    break;
                case 7:
                    $ordinal .= "seventieth";
                    break;
                case 8:
                    $ordinal .= "eightieth";
                    break;
                case 9:
                    $ordinal .= "ninetieth";
                    break;
            }
        }
        if ($t == 1) {
            switch ($u) {
                case 0:
                    $ordinal .= "tenth";
                    break;
                case 1:
                    $ordinal .= "eleventh";
                    break;
                case 2:
                    $ordinal .= "twelfth";
                    break;
                case 3:
                    $ordinal .= "thirteenth";
                    break;
                case 4:
                    $ordinal .= "fourteenth";
                    break;
                case 5:
                    $ordinal .= "fifteenth";
                    break;
                case 6:
                    $ordinal .= "sixteenth";
                    break;
                case 7:
                    $ordinal .= "seventeenth";
                    break;
                case 8:
                    $ordinal .= "eighteenth";
                    break;
                case 9:
                    $ordinal .= "nineteenth";
                    break;
            }
        }

        if ($t != 1) {
            switch ($u) {
                case 0:
                    if ($n == 0)
                        $ordinal .= "zeroth";
                    break;
                case 1:
                    $ordinal .= "first";
                    break;
                case 2:
                    $ordinal .= "second";
                    break;
                case 3:
                    $ordinal .= "third";
                    break;
                case 4:
                    $ordinal .= "fourth";
                    break;
                case 5:
                    $ordinal .= "fifth";
                    break;
                case 6:
                    $ordinal .= "sixth";
                    break;
                case 7:
                    $ordinal .= "seventh";
                    break;
                case 8:
                    $ordinal .= "eighth";
                    break;
                case 9:
                    $ordinal .= "ninth";
                    break;
            }
        }
        return $ordinal;
    }

    function GenderName($id) {
        $table = TableRegistry::get('UserDetails');
        $query = $table->find('all')->where(['user_id' => $id])->first();
        if (!empty($query->gender)) {
            if ($query->gender == 1) {
                $gender = 'Men';
            }
            if ($query->gender == 2) {
                $gender = 'Women';
            }
            if ($query->gender == 3) {
                $gender = 'Kid';
            }
            return $gender;
        }
    }

    function getStylistName($id = null) {
        $table = TableRegistry::get('CustomerStylist');
        $Utable = TableRegistry::get('Users');
        @$getEmpId = $table->find('all')->where(['user_id' => @$id])->first()->employee_id;
        if (@$getEmpId != '') {
            $name = $Utable->find('all')->where(['id' => @$getEmpId])->first()->name;
        } else {
            $name = "Not assigne";
        }

        return $name;
    }

    function paidStatus($id = null) {
        $tablename = TableRegistry::get('PaymentGetways');
        $getPaidStatusCount = $tablename->find('all')->where(['user_id' => $id, 'status' => 1])->count();
        if ($getPaidStatusCount != 0) {
            $status = "PAID";
            return $status;
        } else {
            $getPaidNotStatusCount = $tablename->find('all')->where(['user_id' => $id, 'status' => 0])->count();
            if ($getPaidNotStatusCount == 0) {
                $status = 'Not paid';
                return $status;
            }
        }
    }

    function countKid($user_id) {
        $table = TableRegistry::get('KidsDetails');
        $data = $table->find('all')->where(['user_id' => $user_id])->count();
        if (@$data == '') {
            $data = 0;
        }
        return $data;
    }

    function paymentProfile($type) {
        if ($type == '1') {
            $data = 'Men';
        }
        if ($type == '2') {
            $data = 'Women';
        }
        if ($type == '3') {
            $data = 'Kid';
        }
        return $data;
    }

    function paymentProfileCount($type) {
        if ($type == 1) {
            $ptype = 'st';
        } elseif ($type == 2) {
            $ptype = 'nd';
        } elseif ($type == 3) {
            $ptype = 'rd';
        } else {
            $ptype = 'th';
        }
        return $type . $ptype;
    }

    function toRefund($user_id) {
        $table = TableRegistry::get('KidsDetails');
        $data = $table->find('all')->where(['user_id' => $user_id])->count();
        if (@$data == '') {
            $data = 0;
        }
        return $data;
    }

    function orderfinalprice($id) {
        $table = TableRegistry::get('PaymentGetways');
        $data = $table->find('all')->where(['parent_id' => $id, 'status' => 1, 'payment_type' => 2]);
        $price = 0;
        foreach ($data as $dt) {
            $price += $dt->price;
        }
        return number_format($price, 2);
    }

    function workStatus($status) {
        if (@$status == '0') {
            $data = 'not assign';
        }
        if (@$status == '2') {
            $data = 'Previous work list';
        }
        if (@$status == '1') {
            $data = 'currentworklist';
        }
        return @$data;
    }

    function InBrandsName($id) {
        $table2 = TableRegistry::get('InProducts');
        $query1 = $table2->find('all')->where(['id' => $id])->first();
        $table = TableRegistry::get('InUsers');
        $query = $table->find('all')->where(['id' => $query1->brand_id])->first();
        return $query->brand_name;
    }

    function InPruductId($id) {
        $table2 = TableRegistry::get('InProducts');
        $query1 = $table2->find('all')->where(['id' => $id])->first();
        return $query1->prodcut_id;
    }

    function Inproductnameone($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query;
    }

    function InproductImage($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->product_image;
    }

    function InproductPrice($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->purchase_price;
    }

    function InproductsalePrice($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->sale_price;
    }

    function tallFeet($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->tall_feet;
    }

    function tallInch($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->tall_inch;
    }

    function bodyweight($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->best_fit_for_weight;
    }

    function imgpath($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();

        if (($query->product_id == '') || ($query->product_id == '0')) {
            return HTTP_ROOT . 'inventory/';
        } else {
            return HTTP_ROOT;
        }
    }

    function InproductQty($id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->quantity;
    }
    
    function rackName($id) {
        $table = TableRegistry::get('InRack');
        $query = $table->find('all')->where(['id' => $id])->first();
        return $query->rack_name;
    }
    
    function productQuantity($prod_id) {
        $table = TableRegistry::get('InProducts');
        $query = $table->find('all')->where(['prod_id' => $prod_id, 'match_status' => 2])->count();
        return $query;
    }
    
    function inColor() {
        $table = TableRegistry::get('InColors');
        $query = $table->find('all');
        $clor = [];
        foreach ($query as $inx => $clr) {
            $clor[$clr->id] = $clr->name;
        }
        return $clor;
    }
    
    function birthDayMen($id) {
        $table = TableRegistry::get('MenStats');
        $query = $table->find('all')->where(['user_id' => $id])->first();
        return @$query->birthday;
    }

    function birthDayWomenMen($id) {
        $table = TableRegistry::get('WomenInformation');
        $query = $table->find('all')->where(['user_id' => $id])->first();

        return @$query->birthday;
    }

    function kidBirthDay($id) {
        $table = TableRegistry::get('kidsDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        return @$query->kids_birthdate;
    }

}
