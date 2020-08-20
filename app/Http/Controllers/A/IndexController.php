<?php

namespace App\Http\Controllers\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\NameModel;
use App\Model\UserName;
use App\Model\TokenModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use App\Model\UserNameModel;
class IndexController extends Controller
{
    public function add(){
        $a='zhang';
        $s='asd';
       redis::sadd($a,'zhang','yu','lei');
       redis::sadd($s,'zhang','a','b');
    }
    public function index(){
        $app=\request()->all();
//        print_r($app);die;
        $add=UserName::insert($app);
        if ($add){
            $data=[
                'code' => 00000,
                'msg' =>'成功'
            ];
        }
    }
    public function user(){
        $app=\request()->all();
//        print_r($app);die;
        $add=UserNameModel::insert($app);
    }
    public function list(){
        $add=UserNameModel::get();
        if ($add){
            echo json_encode(['code'=>'00000','msg'=>'ok','data'=>$add->toArray()]);
        }
    }
    public function imgs(){
        return view('imgs.imgs');
    }
    public function adds(){
        $add=\request()->all();
        print_r($add);
    }
    public function word(){
        return view('imgs.add');
    }
}
