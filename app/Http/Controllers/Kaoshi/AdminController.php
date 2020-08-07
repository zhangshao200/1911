<?php

namespace App\Http\Controllers\Kaoshi;

use App\Http\Controllers\Controller;
use App\Model\PGoodsModel;
use Illuminate\Http\Request;
use App\Model\KaoModel;
use App\Model\UserModel;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function login(){
        //渲染页面
        return view('kaoshi.login');
    }
//注册
    public function index(){
        $data=[
            'user_name'=>\request()->input('user_name'),
            'user_email'=>\request()->input('user_email'),
            'user_pwd'=>\request()->input('user_pwd'),
            'time'=>time()
        ];
        $a=KaoModel::insert($data);
        if ($data){
            //成功后加入token
            $app=[
                'token' =>Str::random(32),
                'id' =>$a,
                'time'=>time()+300
            ];
            $add=UserModel::insert($app);

            echo '注册成功,并生成token成功';
            //跳转到商品页面
           // return redirect(url('/kaoshi/user'));
        }else{
            echo '注册失败';
        }
    }

    public function user(){
        return view('kaoshi.user');
    }
    public function token(){
        $token=\request()->input('token');
        if (empty($token)){
            echo '您的token信息有误';
        }
        //查询商品表并渲染页面
        $goods=PGoodsModel::all();
        //传值
        return view('kaoshi.index',['goods'=>$goods]);

    }
}
