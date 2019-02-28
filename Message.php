<?php
/**
 * Created by PhpStorm.
 * User: saber
 * Date: 2018/10/22
 * Time: 18:29
 */

namespace App\Http\Controllers\Extend\sendmessage;


class Message
{
    /**
     * 生成签名并发起请求
     *
     * @param $phone string 手机号
     * @param $data Array 发送的内容变量
     * @param $TemplateCode string 模板id
     */
    public static function send($phone,$data,$TemplateCode)
    {
        $params = array ();


        $security = false;


        $params["PhoneNumbers"] = $phone;

        $params["TemplateCode"] = $TemplateCode;

        //======================需填写部分====================================
        $accessKeyId = "";

        $accessKeySecret = "";

        $params["SignName"] = "";
        // 判断不同模板，填写不同变量类型，模板变量=>值
        // 验证码短信
        if ($TemplateCode == 'xxxx') {
            $params['TemplateParam'] = [
                "xxx" => $data['xxx']
            ];
        }
        // =========================================================
        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }
        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            )),
            $security
        );
        return $content;
    }
}
