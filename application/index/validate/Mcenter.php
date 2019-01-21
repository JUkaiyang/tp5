<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/18 0018
 * Time: 17:17
 */

namespace app\index\validate;


class Mcenter extends BaseValidate
{
    protected $rule = [
        "username"=>"require|chsAlpha",
        "password"=>"require"
    ];

    protected  $msg = [
        "name_require"=>"姓名必须填写",
        "name_chs"=>"姓名必须是汉字,字母",
        "password_require"=>"姓名不能为空"
    ];
}