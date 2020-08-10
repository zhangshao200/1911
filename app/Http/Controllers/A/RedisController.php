<?php

namespace App\Http\Controllers\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RedisModel;



class RedisController extends Controller
{
    public function index(){

        //接受搜索的值
        $name=\request()->input('name');
        $where=[];
        if ($where){
            $where[]=['goods_name','like',"%$name%"];
        }
        $add=RedisModel::where($where)->orderBy('goods_id','desc')->limit(50)->paginate(4);
        return view('redis.index',['add'=>$add]);
    }
}
