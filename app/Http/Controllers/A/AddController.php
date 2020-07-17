<?php

namespace App\Http\Controllers\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\NameModel;
use App\Model\TokenModel;
use Illuminate\Support\Str;



class AddController extends Controller
{
    //测试
//    public function add(Request $request){
//           $a=$request->input('a');
//    }
    public function index(){
        $data=[
            'name'=>\request()->input('name'),
            'pass'=>password_hash(\request()->input('pass'),PASSWORD_BCRYPT),
            'time'=>time()
        ];
//        $data['pass']=password_hash(date['pass'],)
//        dd($data['pass']);die;
      $a=NameModel::insert($data);
      if ($a){
          echo '注册成功';
      }else{
          echo '您填写的信息可能不正确';
      }
    }

    //登录
    public function app(){
        //接受传过来的值
        $name=\request()->input('name');
        $pass=\request()->input('pass');
        //查看数据库里面是否有该用户
       $u= NameModel::where(['name'=>$name])->first();
       //验证密码是否正确
        if ($u){
            //生成token接口在把token存入数据库
            $token=Str::random(32);

            $data=[
                'token'=>$token,
                'uid'=>$u->id,
                'expire' => time()+7200
            ];
               $tid= TokenModel::insertGetId($data);



            //验证密码是否正确
            if (password_verify($pass,$u->pass)){
                $res=[
                    'error'=>0,
                    'msg'=> 'OK',
                    'data' => [
                          'token' => $token
                    ]
                ];


            }else{
                $res=[
                    'error'=>500001,
                    'msg'=> '密码错误请重新填写'
                ];
            }

            //返回用户的信息


        }else{
            $res=[
                'error'=>400001,
                'msg'=> '您填写的用户信息不存在'
            ];
        }
        return $res;

//        $data=[
//            'name'=>\request()->input('name'),
//            'pass'=>\request()->input('pass'),
//        ];
//        $a=NameModel::where(['name',$data['name']])->first();

    }

    /**
     * 用户中心
     */
    public function add(){
            //验证token是否存在
            $token=\request()->get('token');
            if (empty($token)){
                $res=[
                    'error'=>400001,
                    'msg'=> '这个用户的token不存在'
                ];
                return $res;
            }
            //验证token是否存在有效
        $a=TokenModel::where(['token'=>$token])->first();
        if (empty($a)){
            $res=[
                'error'=>400001,
                'msg'=> 'token不存在'
            ];
            return $res;
        }
        $user=NameModel::find($a->uid);
        $res=[
            'error'=>0,
            'msg' => 'ok',
            'data' =>[
                'user'=>$user
            ]
            ];
        return $res;
    }
}
