<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\UserModel;

class UserApiController extends Controller
{
    /**get*/
    public function CurlGet(){
        $url = "http://vm.1809a_api.com/api/user?uid=1";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);  //需要获取的 URL 地址，也可以在curl_init() 初始化会话的时候。
        curl_setopt($ch,CURLOPT_HEADER,0);   //	启用时会将头文件的信息作为数据流输出。

        $info = curl_exec($ch);
        $code = curl_errno($ch);
        var_dump($code);

        curl_close($ch);
    }
    /**post*/
    function CurlPost(){
        $url = "http://vm.1809a_api.com/api/reg";
        $post_arr = [
            'name' => 'lisi',
            'email' => 'lisi@qq.com'
        ];

        $post_str = "name=sunsan&email=sunsan@qq.com";

        $post_json = json_encode($post_arr);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);  //需要获取的 URL 地址，也可以在curl_init() 初始化会话的时候。
        curl_setopt($ch, CURLOPT_HEADER, 0);   //	启用时会将头文件的信息作为数据流输出。
        curl_setopt($ch, CURLOPT_POST, 1);    //发送post请求
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //禁止浏览器输出


        curl_setopt($ch,CURLOPT_POSTFIELDS,$post_json);
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type:text/plain']);


        //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_arr);   //如果value是一个数组，Content-Type头将会被设置成multipart/form-data


        //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
        $info = curl_exec($ch);
        //$code = curl_errno($ch);
        //var_dump($code);
        curl_close($ch);
        return $info;
    }
    //CURLOPT_HTTPHEADER   //post发送原生json数据


    public function testMiddle(){
        echo "1111";
    }





}
