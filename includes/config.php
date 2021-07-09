<?php

// //
// define('JAZZCASH_MERCHANT_ID', 'MC18444');
// define('JAZZCASH_PASSWORD', 'ug19t2f090');
//  define('JAZZCASH_INTEGERITY_SALT', '9wz84g2331');
// define('JAZZCASH_CORRENCY_CODE', 'PKR');
// define('JAZZCASH_LANGUAGE', 'EN');
// define('JAZZCASH_API_VERSION_1', '1.1');
// define('JAZZCASH_API_VERSION_2', '1.2');
// define('JAZZCASH_RETURN_URL', 'https://solutions.techstep.com');
// define('JAZZCASH_HTTP_POST_URL', 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/Payment/DoTransaction');





define('JAZZCASH_MERCHANT_ID', 'MC18444');
define('JAZZCASH_PASSWORD', 'ug19t2f090');
define('JAZZCASH_INTEGERITY_SALT', '9wz84g2331');
define('JAZZCASH_HTTP_POST_URL', 'https://sandbox.jazzcash.com.pk/ApplicationAPI/API/Payment/DoTransaction');
class Jazz
{
    private $merchant_id;
    private $password;
    private $integrity_salt;
    private $post_url;
    public function __construct()
    {
        $this->merchant_id = JAZZCASH_MERCHANT_ID;
        $this->password = JAZZCASH_PASSWORD;
        $this->integrity_salt = JAZZCASH_INTEGERITY_SALT;
        $this->post_url = JAZZCASH_HTTP_POST_URL;
    }
    public function createCharge($form_data)
    {
        date_default_timezone_set('Asia/Karachi');
        $DateTime = new DateTime();
        $pp_TxnDateTime = $DateTime->format('YmdHis');
        $ExpiryDateTime = $DateTime;
        $ExpiryDateTime->modify('+' . 1 . 'hours');
        $pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');
        $pp_TxnRefNo = 'T' . $pp_TxnDateTime;
        $temp_amount = $form_data['total'] * 100;
        $amount_array = explode(' . ', $temp_amount);
        $app_Amount = $amount_array[0];

        $data_array = array(
            "pp_Version" => "1.1",
            "pp_TxnType" => "MWALLET",
            "pp_Language" => "EN",
            "pp_MerchantID" => $this->merchant_id,
            "pp_SubMerchantID" => "",
            "pp_Password" => $this->password,
            "pp_BankID" => "",
            "pp_ProductID" => "",
            "pp_TxnRefNo" => $pp_TxnRefNo,
            "pp_Amount" => $app_Amount,
            "pp_TxnCurrency" => "PKR",
            "pp_TxnDateTime" => $pp_TxnDateTime,
            "pp_BillReference" => "billRef",
            "pp_Description" => "Description",
            "pp_TxnExpiryDateTime" =>  $pp_TxnExpiryDateTime,
            "pp_ReturnURL" => "https://solutions.techstep.com",
            "pp_SecureHash" => "",
            "ppmpf_1" => $form_data['phone'],
            "ppmpf_2" => "",
            "ppmpf_3" => "",
            "ppmpf_4" => "",
            "ppmpf_5" => "",
            //  "pp_MobileNumber" =>$form_data['phone'],

        );
        $pp_SecureHash = $this->get_SecureHash($data_array);
        $data_array['pp_SecureHash'] = $pp_SecureHash;
        $make_call = $this->callAPI(json_encode($data_array));


        $make_call = json_decode($make_call);


        return $make_call;
    }
    private function get_SecureHash($data_array)
    {
        ksort($data_array);
        $str = '';
        foreach ($data_array as $key => $value) {
            if (!empty($value)) {
                $str = $str . '&' . $value;
            }
        }
        $str = $this->integrity_salt . $str;
        $pp_SecureHash = hash_hmac('sha256', $str, $this->integrity_salt);
        return $pp_SecureHash;
    }



    private function callAPI($data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $this->post_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Error");
        }
        return $result;
    }
}


$servername="localhost";
$username="root";
$password="";
$db_name="ecommerce";
$connection=mysqli_connect($servername, $username, $password, $db_name);


?>