<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/11 0011
 * Time: 15:28
 */

namespace app\index\model;


class Mcenter extends \think\Model
{
    /**
     * @param $username 用户名称
     * @param string $field 需要查询的字段
     * @return Mcenter 用户信息组
     */
        public  function getUseInfo($username,$field){
            if(empty($field)){
                $field ="*";
            }
            $arrUser = self::where("user_name",'=',$username)->field($field)->find();
            return $arrUser;
        }
}