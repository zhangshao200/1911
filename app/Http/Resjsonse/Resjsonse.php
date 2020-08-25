<?php
namespace App\Http\Resjsonse;

class Resjsonse {
    public function JsonData($code,$msg){
        return $this->JsonRespense('00000','success',$msg);
    }

    public function JsonSuccess($data){
        $this->JsonRespense('00000','success',$data);
    }


    public function JsonRespense($code,$message,$data=[]){
        $content=[
            'code'=>$code,
            'msg'=>$message,
            'data' => $data
        ];
        echo json_encode($content);
    }
}
