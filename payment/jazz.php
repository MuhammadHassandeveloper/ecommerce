<?php
class jazzcashapi
{
    private $merchant_id;
    private $password;
     private $integrity_salt;
    private $currency;
    private $language;
 private $version;
    private $post_url;
    public function __construct()
    {
        $this->merchant_id=JAZZCASH_MERCHANT_ID;
        $this->password=JAZZCASH_PASSWORD;
         $this->integrity_salt=JAZZCASH_INTEGERITY_SALT;
        $this->currency=JAZZCASH_CORRENCY_CODE;
        $this->language=JAZZCASH_LANGUAGE;
        $this->post_url=JAZZCASH_HTTP_POST_URL;
        $this->version=JAZZCASH_API_VERSION_1;
    }
    public function createCharge($form_data)
    {
        date_default_timezone_set('Asia/Karachi');
        $DateTime=new DateTime();
        $pp_TxnDateTime=$DateTime->format('YmdHis');
        $ExpiryDateTime=$DateTime;
        $ExpiryDateTime->modify('+'. 1 .'hours');
        $pp_TxnExpiryDateTime=$ExpiryDateTime->format('YmdHis');
        $pp_TxnRefNo='T'.$pp_TxnDateTime;
        $temp_amount=$form_data['total']*100;
        $amount_array=explode(' . ', $temp_amount);
        $app_Amount=$amount_array[0];
           
        //  transaction array
        // if ($form_data['paymentMethod'=="jazzCash"]) {
        // } elseif ($form_data['paymentMethod'=="jazzcard"]) {
        // }


        $data_array=array(
            "pp_Version"=>$this->version,
             "pp_Language" => $this->language,
             "pp_MerchantID" => $this->merchant_id,
             "pp_SubMerchantID" =>"",
             "pp_Password" => $this->password,
             "pp_BankID" => "",
             "pp_TxnType"=>$form_data['paymentMethod'],
             "pp_ProductID" =>"",
             "pp_TxnRefNo" => $pp_TxnRefNo,
             "pp_Amount" => $app_Amount,
             "pp_TxnCurrency" => $this->currency,
             "pp_TxnDateTime" => $pp_TxnDateTime,
             "pp_BillReference" =>"billRef",
             "pp_Description" => "Description",
             "pp_TxnExpiryDateTime"=>$pp_TxnExpiryDateTime,
             ""=>"",
             "ppmpf_1"=>"",
             "ppmpf_2"=>"",
             "ppmpf_3"=>"",
             "ppmpf_4"=>"",
             "ppmpf_5"=>"",
            "pp_SecureHash"=>"",
             "pp_MobileNumber" =>$form_data['phone'],
            //  "pp_CNIC" =>$form_data['cnic'],
        );
        $pp_SecureHash=$this->get_SecureHash($data_array);
        $data_array['pp_SecureHash']=$pp_SecureHash;
        $make_call=$this->callAPI(json_encode($data_array));
        $make_call=json_decode($make_call);
        return $make_call;
    }
    private function get_SecureHash($data_array)
    {
        ksort($data_array);
        $str='';
        foreach ($data_array as $key => $value) {
            if (!empty($value)) {
                $str=$str.'&'.$value;
            }
        }
        // $str=$this->integrity_salt.$str;
        $pp_SecureHash=hash_hmac('sha256', $str, $this->integrity_salt);
        return $pp_SecureHash;
    }



    private function callAPI($data)
    {
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, $this->post_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $result=curl_exec($curl);
        if (!$result) {
            die("Connection Error");
        }
        return $result;
    }

    // private function get_mobile_payment_array($data, $additional_data)
    // {
    // }
}