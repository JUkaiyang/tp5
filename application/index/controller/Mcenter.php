<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/11 0011
 * Time: 15:27
 */

namespace app\index\controller;


use think\Controller;
use app\index\model\Mcenter as McenterModel;
class Mcenter extends Controller
{

    //查询指定会员信息
    public function userInfo($id){
        $mcenter = new McenterModel();//实例化数据库
        $arrUser = $mcenter->where("user_id","=",$id)->field("user_name,mobile")->find();
        return $arrUser;
    }
}