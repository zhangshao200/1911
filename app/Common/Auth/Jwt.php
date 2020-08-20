<?php
namespace App\Common\Auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Rsa\Sha256;

class Jwt{
    private $token;
    private $iss='http://api.com';
    private $aud='api_1912_app';
    private $uid;
    private $scerect='asdfghjklpoiuytr';
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
}

