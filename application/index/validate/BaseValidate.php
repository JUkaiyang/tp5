<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17 0017
 * Time: 14:05
 */

namespace app\index\validate;


use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{


  public function goCheck(){
      $arrParam = Request::param();
      if(!$this->check($arrParam)){

      }

  }

}