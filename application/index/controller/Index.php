<?php
namespace app\index\controller;

use think\Controller;
use think\facade\Request;
use app\index\validate\BaseValidate;
use app\index\model\Mcenter as McenterModel;
use think\facade\Session;

class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    /**
     * 是对用用户的登录进行验证和存储session ,cookic
     * @return mixed会根据用户状态进行页面放返回；
     * @throws \Exception错误会进行错误提醒；
     */
    public function getIndex(){
        if(Request::has("username","post")&&Request::has("password","post")){
            $strName = Request::post("username");//用户名
            $strName = trim($strName);
            $strPassword = Request::post("password");//用户密码
            $strPassword  = md5(md5(trim($strPassword)));
            $validata = new BaseValidate();//实例化验证器
            $arrdate = [
                "username"=>$strName,
                "password"=>$strPassword
            ];
            $result = $validata->check($arrdate);
            if(!$result){
                echo $validata->getError();
            }
            $mcenter = new McenterModel();

            $arrUser = $mcenter->getUseInfo($strName,'*');
            if($arrUser['password'] == $strPassword){
                $strToke = $arrUser.time();
                Session::set("username",$strToke);//存用户名进session
                setcookie("username",$strToke);//存用户名进cookic
                return $this->fetch("main");
            }else{
                exception('密码错误');
            }
        }
        return $this->fetch("login");
    }


}
