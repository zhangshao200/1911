<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminModel;


class IndexController extends Controller
{
        public function col(){
            $data=[
                'user_name' =>\request()->input('user_name'),
                'user_email' => \request()->input('user_email'),
                'ke'  =>\request()->input('ke'),
                'textarea'=>\request()->get('textarea'),
                'time'=>time()
            ];
            //加入数据库
            $a=AdminModel::insert($data);
            if ($a){
                return redirect(url('http://www.1911.com/index/index'));
            }else{
                return redirect(url('http://www.1911.com/index/index'));
            }
        }
}
