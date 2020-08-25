<?php
namespace App\Error\error;
class Error {
    const   SUCCESS=['00000','ojbk'];
    const UNKNOWN=['00001','请求失败,请联系管理员'];

    //用户接口
    const NO_USER=['10000','请求成功'];
    const NO_USER_PWD=['10001','用户名或者密码错误'];
    const NO_USER_NAME=['10000','用户名或者密码错误'];

    //接口常用
    const NO_PAD=['20001','参数无效，缺少token'];
    const NO_PAD_A=['20002','参数无效，token错误'];
    const NO_PAD_B=['20003','参数无效，token已过期'];

}
