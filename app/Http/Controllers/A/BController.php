<?php

namespace App\Http\Controllers\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BController extends Controller
{
    public function add(){
        $method='AES-256-CBC';
        $key='1911api';
        $vi='asdfghjklpoiuytr';
        $option=OPENSSL_RAW_DATA;

        echo '<pre>';print_r($_POST);echo '</pre>';echo '</br>';

        $enc=base64_decode($_POST['data']);
        $dec=openssl_decrypt($enc,$method,$key,$option,$vi);
        echo '解密数据:'.$dec;


//        $st1=\request()->post('data');
//        echo 'str1'.$st1; echo '<br>';
//        $str2=base64_decode($st1);
//        echo '秘闻'.$str2;
//        $dec=openssl_decrypt($enc,$method,$key,$option,$vi);
//        $data='nihao shadiao';
//        $enc=openssl_encrypt($data,$method,$key,$option,$vi);

    }
    public function ras(){
        $data='是恐惧和纠纷';
        $content=file_get_contents(storage_path('keys/pub.key'));
        $pub_key=openssl_get_publickey($content);
        openssl_public_encrypt($data,$enc_data,$pub_key);

        $priv_key=openssl_get_privatekey(file_get_contents(storage_path('keys/priv.key')));
        openssl_private_decrypt($enc_data,$dec_data,$priv_key);
        echo '解密:' .$dec_data;

    }
    public function ccontent(){
//        echo '<pre>';print_r($_GET);echo '</pre>';

        $key='1911api';

        //验证签名
        $data=\request()->get('data');
        $sigin=\request()->get('sign');

        //计算签名

        $sign_str=md5($data.$key);

        //判断
        if ($sign_str == $sigin){
            echo '成功';
        }else{
            echo '失败';
        }
    }

    public function header()
    {
        $url= 'http://www.1911.com/test2';
        $uid = adsasagdsgreh;
        $token = Str::random(16);
        //header  传参
        $headers = [
            'uid:'.$uid,
            'token:'.$token,
        ];
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_exec($ch);
        curl_close($ch);
    }

    public function pay(Request $request)
    {
        $oid = $request->get('oid');
        //echo '订单ID： '. $oid;
        //根据订单查询到订单信息  订单号  订单金额

        //调用 支付宝支付接口

        // 1 请求参数
        $param2 = [
            'out_trade_no'      => time().mt_rand(111111,999999),
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
            'total_amount'      => 1.00,
            'subject'           => '测试订单-'.Str::random(16),
        ];

        // 2 公共参数
        $param1 = [
            'app_id'        => '2016092500593666',
            'method'        => 'alipay.trade.page.pay',
            'return_url'    => 'http://1911zyl.comcto.com/alipay/return',   //同步通知地址
            'charset'       => 'utf-8',
            'sign_type'     => 'RSA2',
            'timestamp'     => date('Y-m-d H:i:s'),
            'version'       => '1.00',
            'notify_url'    => 'http://1911www.comcto.com/alipay/notify',   // 异步通知
            'biz_content'   => json_encode($param2),
        ];

        //echo '<pre>';print_r($param1);echo '</pre>';
        // 计算签名
        ksort($param1);
        //echo '<pre>';print_r($param1);echo '</pre>';

        $str = "";
        foreach($param1 as $k=>$v)
        {
            $str .= $k . '=' . $v . '&';
        }

        $str = rtrim($str,'&');     // 拼接待签名的字符串

        $sign = $this->sign($str);
        echo $sign;echo '<hr>';

        //沙箱测试地址__https
        $url = 'https://openapi.alipaydev.com/gateway.do?'.$str.'&sign='.urlencode($sign);
        return redirect($url);
        //echo $url;
    }


    /**
     * @param $data
     * @return string
     */
    protected function sign($data)
    {


        //私钥生成

//        if ($this->checkEmpty($this->rsaPrivateKeyFilePath)) {
//            $priKey = $this->rsaPrivateKey;
//
//            $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
//                wordwrap($priKey,64,"\n",true) .
//                "\n-----END RSA PRIVATE KEY-----";
//        } else {
//            $priKey = file_get_contents($this->rsaPrivateKeyFilePath);
//            $res = openssl_get_privatekey($priKey);
//        }

        $priKey = file_get_contents(storage_path('keys/ali_priv.key'));
        $res = openssl_get_privatekey($priKey);
        var_dump($res);echo '<hr>';

        ($res) or die('私钥格式错误，请检查配置');

        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        openssl_free_key($res);
        $sign = base64_encode($sign);
        return $sign;
    }
}
