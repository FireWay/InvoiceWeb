# InvoiceWeb
## 项目说明
1. 概述
    * 本项目为增值税发票识别管理网站
2. 输入
    * 手动输入
    * 发票扫描
    * 二维码识别
    * 语音输入
3. 输出
    * 生成二维码
    * 直接在该网站管理发票信息
4. 用户
    * 注册
    * 登录
    * 信息管理
5. 依赖
    * Bootstrap
    * qrcode.js
    * 百度识别API，百度语音API


## 项目环境
1. CentOS Linux release 7.6.1810
2. Apache 2.4.6
3. MariaDB Ver 15.1 Distrib 5.5.60-MariaDB
4. PHP 7.2.13

## 项目结构说明：

```
项目根目录
├── connectvars.php  //通用文件：数据库信息（最终提交会删除私人信息），部分全局变量等
├── css       //css样式表
│   ├── bootstrap //bootstrap：前端开源框架
│   │   └── ...
│   ├── carousel.css    //bootstrap示例使用的css文件，主干页面直接使用
│   ├── dashboard.css
│   ├── form-validation.css
│   └── signin.css
├── features                //附加功能
│   ├── pictureRecognition //发票图片识别
│   │   ├── aip-php-sdk     //百度文字识别sdk
│   │   │   └── ...
│   │   ├── invoice.html    //掃描發票用
│   │   └── invoice.php     //掃描發票的結果提交至此，並將之送往 in_hand.php
│   ├── qrcodeRecognition  //发票二维码识别
│   │   ├── qrcode.js           //生成二维码
│   │   ├── qrcodemaker.html    //输入字符串创建二维码（测试）
│   │   ├── qrcodemaker.php     //如果有参数在session中，会將之读取
│   │   ├── qrcodescan.html     //掃描，並可以通過提交將信息傳遞給 qrcodesubmit.php,內置簡單的正確判斷
│   │   ├── qrcodesubmit.php    //將信息傳遞給 in_hand.php,沒有任何正確檢測
│   │   └── reqrcode.js         //识别二维码
│   └── speechRrecognition  //发票语音识别
│       ├── AipSpeech.php
│       ├── aip-speech-php-sdk-1.6.0 //百度语音sdk
│       │   └── ...
│       ├── in_voice.php    //语言输入的显示界面
│       ├── lib
│       │   └── ...
│       ├── voiceToText.php //上传声音文件的表单
│       └── voiceupload.php //上传声音文件后操作：更新对应变量，并重定向到输入页面input.php
├── features_manage.php     //发票管家页面：动态显示对应用户数据，并提供删除和生成二维码操作
├── features.php            //功能页面：指向发票管家页面，输入页面，二维码扫描页面，图片识别页面
├── img                     //图片，图标
│   └── ...
├── index.php               //首页，提供登录与注册选项
├── input.php               //输入页面：默认手动输入，同时接受来着其它识别的输入，并提供指向语音的接口
├── js                      //预留的主干js文件夹
├── logout.php              //用于退出账户
├── messageToDelete.php     //发票管家的删除选项：通过url传递的参数确定对应数据并从数据库删除
├── messageToQrocde.php     //发票管家的生成二维码选项：通过url传递的参数确定对应数据并从执行二维码生成页面
├── readme.md               //项目文档
├── registered.html         //注册前台页面
├── registered.php          //注册逻辑页面，在数据库生成对应数据
├── signin.php              //登录页面，确认用户信息，判断是否可以成功登录
├── test                    //一些测试用的文件
│   └── ...
├── userState.php           //账户管理页面：显示用户信息，拥有登出选项
├── userStateUpdate.php     //账户管理页面更新数据后的逻辑页面
└── web_info.sql            //数据库结构文件

75 directories
```
