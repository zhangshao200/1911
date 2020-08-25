<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TextModel;
use App\Model\AdminModel;
use App\Common\Auth\Jwt;
use mysql_xdevapi\Exception;

class TextController extends Controller
{
    public function brand(){
        $brand=TextModel::get();
      echo json_encode(['code'=>'00000','msg'=>'ok','data'=>$brand]);
    }
   public function login(){
        return view('token.login');
   }
   public function add(Request $reuest){


       $user_name=$reuest->user_name;
       if (empty($user_name)){
           echo json_encode(['code'=>'10001','msg'=>'用户名不能为空']);die;
       }
       $user_pwd=$reuest->user_pwd;
       if (empty($user_pwd)){
           echo json_encode(['code'=>'10001','msg'=>'用户名不能为空']);die;
       }
//       echo $user_pwd;
       $user=AdminModel::where('user_name',$user_name)->first();
//       dd($user);die;
       //进行数据匹配
       if (!$user){
           echo json_encode(['code'=>'10001','msg'=>'用户名或者密码错误']);die;
       }
       if (decrypt($user->user_pwd)!=$user_pwd){
           echo json_encode(['code'=>'10001','msg'=>'用户名或者密码错误']);die;
       }
       $uid=$user->id;
        $Jwt=Jwt::instance();
        $token=$Jwt->setuid($uid)->getToken();
        dd($token);
   }
   public function user(){
        $user=AdminModel::get()->toArray();
        echo json_encode(['code'=>'00000','msg'=>'ojbk','data'=>$user]);die;
   }
}
