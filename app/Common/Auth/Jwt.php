<?php
namespace App\Common\Auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;

class Jwt{
    private $token;
    private $iss='http://api.com';
    private $aud='api_1912_app';
    private $uid;
    private $scerect='sebfhjefbjse';
    private static $instance;
    private function __construct()
    {
    }
    private function __clone(){

    }
    public static function instance(){
        if (is_null(self::$instance)){
            self::$instance=new  self();
        }
        return self::$instance;
    }
    public function encode(){
        $time=time();
            $this->token=(new Builder())->setHeader('alg','HS256')
                   ->issuedBy($this->iss)
                   ->permittedFor($this->aud)
                   ->identifiedBy('4f1g23a12aa',true)
                   ->issuedAt($time)
                   ->canOnlyBeUsedAfter($time + 60)
                   ->expiresAt($time + 3600)
                   ->withClaim('id',$this->uid)
                   ->sign(new Sha256(),$this->scerect)
                   ->getToken();
        return $this->token;
    }
    public function setuid($uid){
        $this->uid=$uid;
        return $this;
    }
    public function getToken(){
        return(string)$this->encode();
    }
    public function setToken($token){
        $this->token=$token;
       // dd($this->token);
        return $token;
    }
    //将字符串token转换成token实例
    public function decode(){
        $token=(new Parser())->parse((string)$this->token);
        dd($token);
    }
    //验证token令牌
    public function verify(){
        $signer= new Sha256();
        $res=$this->decode()->verify($signer,$this->scerect);
        return $res;
    }
    public function Validate(){
        $data=new ValidationData();
        $data->setIssuer($this->iss);
        $data->setAudience($this->aud);
        $data->setId('4f1g23a12aa');
        $res=$this->decode()->validate($data);
        return $res;
    }
}

