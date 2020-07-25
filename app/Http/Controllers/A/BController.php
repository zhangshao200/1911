<?php

namespace App\Http\Controllers\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
