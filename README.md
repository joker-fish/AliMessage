# AliMessage
阿里短信发送api

打开 *message.php* 文件修改
##### 1、命名空间
##### 2、*$accessKeyId*
##### 3、*$accessKeySecret*
##### 4、*$params["SignName"]*
##### 5、
    // $TemplateCode(模板id)
    // "xxx" 模板变量
    // $data['xxx'] 模板变量对应的值

    if ($TemplateCode == 'xxxx') {
        $params['TemplateParam'] = [
            "xxx" => $data['xxx']
        ];
    }
