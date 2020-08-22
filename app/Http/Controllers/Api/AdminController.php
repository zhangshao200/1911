<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function index(){
        $user_name=\request()->input('user_name');
        $user_pwd=\request()->input('user_pwd');
        if (empty($user_name)){
            echo json_encode(['code'=>'00001','msg'=>'用户名不能为空']);die;
        }
        if (empty($user_pwd)){
            echo json_encode(['code'=>'00001','msg'=>'密码不能为空']);die;
        }
        $data=[
            'user_name'=>$user_name,
            'user_pwd' => encrypt($user_pwd),
        ];
//        dd($data);die;
        $res=AdminModel::insert($data);
        if ($res){
            return redirect('http://api.com/api/admin/add');
        }
    }
    public function add(){
        return view('token.login');
    }
}
