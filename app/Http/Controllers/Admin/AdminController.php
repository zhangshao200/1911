<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PGoodsModel;
use Illuminate\Http\Request;
use App\Model\NameModel;
use Psy\Util\Str;
use App\Model\TokenModel;

class AdminController extends Controller
{
    public function index()
    {

        //接受值

        $username = request()->input('username');
        $password = request()->input('password');

        //查看是否有该用户

        $a = NameModel::where(['name' => $username])->first();
        if ($a) {
            //生成token、
            $token = \Illuminate\Support\Str::random(32);

            //把数据写成数组
            $data = [
                'token' => $token,
                'uid' => $a->id,
                'expire' => time() + 36000,
            ];
//            print_r($data);
            $user = TokenModel::insert($data);
            if ($user) {
                echo '登录成功';
                return redirect(url('http://www.1911.com/index/index'));
            } else {
                echo '登录失败';

            }


        }

//print_r($data) ;die;


    }

//    注册
    public function reg()
    {

        //接受值
        $data = [
            'name' => \request()->input('username'),
            'pass' =>password_hash(\request()->input('password'),PASSWORD_BCRYPT),
            'email' => \request()->input('user_email'),

        ];
        $a = NameModel::insert($data);

        if ($a){
            echo '注册成功';
            redirect('http://www.1911.com/login/login');
        }else{
            echo '注册失败';
            redirect('http://www.1911.com/login/reg');
        }

    }

    //首页查数据
    public function cha(){
          $a= PGoodsModel::all();
          print_r($a);die;
    }


}
