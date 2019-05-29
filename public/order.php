<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="bizhuang">
        <title>order</title>

        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- Plugin CSS -->
        <link href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            body {
                padding-top: 70px; margin-bottom: 15px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                font-family: "Roboto", "SF Pro SC", "SF Pro Display", "SF Pro Icons", "PingFang SC", BlinkMacSystemFont, -apple-system, "Segoe UI", "Microsoft Yahei", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
                font-weight: 400;
            }
            h2        { font-size: 1.6em; }
            hr        { margin-top: 10px; }
            .tab-pane { padding-top: 10px; }
            .mt0      { margin-top: 0px; }
            .footer   { font-size: 12px; color: #666; }
            .label    { display: inline-block; min-width: 65px; padding: 0.3em 0.6em 0.3em; }
            .string   { color: green; }
            .number   { color: darkorange; }
            .boolean  { color: blue; }
            .null     { color: magenta; }
            .key      { color: red; }
            .popover  { max-width: 400px; max-height: 400px; overflow-y: auto;}
            .list-group.panel > .list-group-item {
            }
            .list-group-item:last-child {
                border-radius:0;
            }
            h4.panel-title a {
                font-weight:normal;
                font-size:14px;
            }
            h4.panel-title a .text-muted {
                font-size:12px;
                font-weight:normal;
                font-family: 'Verdana';
            }
            #sidebar {
                width: 220px;
                position: fixed;
                margin-left: -240px;
                overflow-y:auto;
            }
            #sidebar > .list-group {
                margin-bottom:0;
            }
            #sidebar > .list-group > a{
                text-indent:0;
            }
            #sidebar .child {
                border:1px solid #ddd;
                border-bottom:none;
            }
            #sidebar .child > a {
                border:0;
            }
            #sidebar .list-group a.current {
                background:#f5f5f5;
            }
            @media (max-width: 1620px){
                #sidebar {
                    margin:0;
                }
                #accordion {
                    padding-left:235px;
                }
            }
            @media (max-width: 768px){
                #sidebar {
                    display: none;
                }
                #accordion {
                    padding-left:0px;
                }
            }
            .label-primary {
                background-color: #248aff;
            }

        </style>
    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://www.fastadmin.net" target="_blank">order</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            Token:
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" data-toggle="tooltip" title="Token在会员注册或登录后都会返回,WEB端同时存在于Cookie中" placeholder="token" id="token" />
                        </div>
                        <div class="form-group">
                            Apiurl:
                        </div>
                        <div class="form-group">
                            <input id="apiUrl" type="text" class="form-control input-sm" data-toggle="tooltip" title="API接口URL" placeholder="https://api.mydomain.com" value="" />
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="点击保存后Token和Api url都将保存在本地Localstorage中" id="save_data">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container">
            <!-- menu -->
            <div id="sidebar">
                <div class="list-group panel">
                                        <a href="#公共接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">公共接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="公共接口">
                                                <a href="javascript:;" data-id="0" class="list-group-item">加载初始化</a>
                                                <a href="javascript:;" data-id="1" class="list-group-item">上传文件</a>
                                            </div>
                                        <a href="#示例接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">示例接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="示例接口">
                                                <a href="javascript:;" data-id="2" class="list-group-item">测试名称</a>
                                                <a href="javascript:;" data-id="3" class="list-group-item">无需登录的接口</a>
                                                <a href="javascript:;" data-id="4" class="list-group-item">需要登录的接口</a>
                                                <a href="javascript:;" data-id="5" class="list-group-item">需要登录且需要验证有相应组的权限</a>
                                            </div>
                                        <a href="#邮箱验证码接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">邮箱验证码接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="邮箱验证码接口">
                                                <a href="javascript:;" data-id="6" class="list-group-item">发送验证码</a>
                                                <a href="javascript:;" data-id="7" class="list-group-item">检测验证码</a>
                                            </div>
                                        <a href="#首页接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">首页接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="首页接口">
                                                <a href="javascript:;" data-id="8" class="list-group-item">首页</a>
                                            </div>
                                        <a href="#手机短信接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">手机短信接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="手机短信接口">
                                                <a href="javascript:;" data-id="9" class="list-group-item">发送验证码</a>
                                                <a href="javascript:;" data-id="10" class="list-group-item">检测验证码</a>
                                            </div>
                                        <a href="#Token接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">Token接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="Token接口">
                                                <a href="javascript:;" data-id="11" class="list-group-item">检测Token是否过期</a>
                                                <a href="javascript:;" data-id="12" class="list-group-item">刷新Token</a>
                                            </div>
                                        <a href="#会员接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">会员接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="会员接口">
                                                <a href="javascript:;" data-id="13" class="list-group-item">会员中心</a>
                                                <a href="javascript:;" data-id="14" class="list-group-item">会员登录</a>
                                                <a href="javascript:;" data-id="15" class="list-group-item">手机验证码登录</a>
                                                <a href="javascript:;" data-id="16" class="list-group-item">注册会员</a>
                                                <a href="javascript:;" data-id="17" class="list-group-item">注销登录</a>
                                                <a href="javascript:;" data-id="18" class="list-group-item">修改会员个人信息</a>
                                                <a href="javascript:;" data-id="19" class="list-group-item">修改邮箱</a>
                                                <a href="javascript:;" data-id="20" class="list-group-item">修改手机号</a>
                                                <a href="javascript:;" data-id="21" class="list-group-item">第三方登录</a>
                                                <a href="javascript:;" data-id="22" class="list-group-item">重置密码</a>
                                            </div>
                                        <a href="#验证接口" class="list-group-item" data-toggle="collapse" data-parent="#sidebar">验证接口  <i class="fa fa-caret-down"></i></a>
                    <div class="child collapse" id="验证接口">
                                                <a href="javascript:;" data-id="23" class="list-group-item">检测邮箱</a>
                                                <a href="javascript:;" data-id="24" class="list-group-item">检测用户名</a>
                                                <a href="javascript:;" data-id="25" class="list-group-item">检测手机</a>
                                                <a href="javascript:;" data-id="26" class="list-group-item">检测手机</a>
                                                <a href="javascript:;" data-id="27" class="list-group-item">检测邮箱</a>
                                                <a href="javascript:;" data-id="28" class="list-group-item">检测手机验证码</a>
                                                <a href="javascript:;" data-id="29" class="list-group-item">检测邮箱验证码</a>
                                            </div>
                                    </div>
            </div>
            <div class="panel-group" id="accordion">
                                <h2>公共接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-0">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion0" href="#collapseOne0"> 加载初始化 <span class="text-muted">/api/common/init</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne0" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab0">
                                <li class="active"><a href="#info0" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox0" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample0" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info0">
                                    <div class="well">
                                        加载初始化                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>version</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>版本号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>lng</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>经度</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>lat</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>纬度</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox0">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/common/init" method="get" name="form0" id="form0">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="version">version</label>
                                                            <input type="string" class="form-control input-sm" id="version" required placeholder="版本号" name="version">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="lng">lng</label>
                                                            <input type="string" class="form-control input-sm" id="lng" required placeholder="经度" name="lng">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="lat">lat</label>
                                                            <input type="string" class="form-control input-sm" id="lat" required placeholder="纬度" name="lat">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="0">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="0">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers0"></pre>
                                                            <pre id="response0"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response0">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-1">
                        <h4 class="panel-title">
                            <span class="label label-primary">POST</span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"> 上传文件 <span class="text-muted">/api/common/upload</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne1" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab1">
                                <li class="active"><a href="#info1" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox1" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample1" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info1">
                                    <div class="well">
                                        上传文件                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>file</td>
                                                        <td>File</td>
                                                        <td>是</td>
                                                        <td>文件流</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox1">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/common/upload" method="POST" name="form1" id="form1">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="file">file</label>
                                                            <input type="File" class="form-control input-sm" id="file" required placeholder="文件流" name="file">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="1">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="1">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers1"></pre>
                                                            <pre id="response1"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response1">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>示例接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-2">
                        <h4 class="panel-title">
                            <span class="label label-primary">POST</span>
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2"> 测试名称 <span class="text-muted">/api/demo/test/id/{id}/name/{name}</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne2" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab2">
                                <li class="active"><a href="#info2" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox2" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample2" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info2">
                                    <div class="well">
                                        测试描述信息                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>token</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>请求的Token</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>id</td>
                                                        <td>integer</td>
                                                        <td>是</td>
                                                        <td>会员ID</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>name</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>用户名</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>data</td>
                                                        <td>object</td>
                                                        <td>是</td>
                                                        <td>扩展数据</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox2">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>Headers</strong></div>
                                                <div class="panel-body">
                                                    <div class="headers">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="token">token</label>
                                                            <input type="string" class="form-control input-sm" id="token" required placeholder="请求的Token - Ex: " name="token">
                                                        </div>
                                                                                                            </div>
                                                </div>
                                            </div>
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/demo/test/id/{id}/name/{name}" method="POST" name="form2" id="form2">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="id">id</label>
                                                            <input type="integer" class="form-control input-sm" id="id" required placeholder="会员ID" name="id">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="name">name</label>
                                                            <input type="string" class="form-control input-sm" id="name" required placeholder="用户名" name="name">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="data">data</label>
                                                            <input type="object" class="form-control input-sm" id="data" required placeholder="扩展数据 - 例: {'user_id':'int','user_name':'string','profile':{'email':'string','age':'integer'}}" name="data">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="2">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="2">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers2"></pre>
                                                            <pre id="response2"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>名称</th>
                                                                <th>类型</th>
                                                                <th>描述</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                                                                        <tr>
                                                                <td>code</td>
                                                                <td>integer</td>
                                                                <td></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td>msg</td>
                                                                <td>string</td>
                                                                <td></td>
                                                            </tr>
                                                                                                                        <tr>
                                                                <td>data</td>
                                                                <td>object</td>
                                                                <td>扩展数据返回</td>
                                                            </tr>
                                                                                                                    </tbody>
                                                    </table>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response2">{
         'code':'1',
         'msg':'返回成功'
        }</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-3">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3"> 无需登录的接口 <span class="text-muted">/api/demo/test1</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne3" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab3">
                                <li class="active"><a href="#info3" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox3" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample3" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info3">
                                    <div class="well">
                                        无需登录的接口                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox3">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/demo/test1" method="get" name="form3" id="form3">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="3">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="3">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers3"></pre>
                                                            <pre id="response3"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response3">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-4">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion4" href="#collapseOne4"> 需要登录的接口 <span class="text-muted">/api/demo/test2</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne4" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab4">
                                <li class="active"><a href="#info4" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox4" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample4" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info4">
                                    <div class="well">
                                        需要登录的接口                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox4">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/demo/test2" method="get" name="form4" id="form4">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="4">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="4">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers4"></pre>
                                                            <pre id="response4"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response4">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-5">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion5" href="#collapseOne5"> 需要登录且需要验证有相应组的权限 <span class="text-muted">/api/demo/test3</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne5" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab5">
                                <li class="active"><a href="#info5" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox5" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample5" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info5">
                                    <div class="well">
                                        需要登录且需要验证有相应组的权限                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox5">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/demo/test3" method="get" name="form5" id="form5">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="5">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="5">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers5"></pre>
                                                            <pre id="response5"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response5">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>邮箱验证码接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-6">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion6" href="#collapseOne6"> 发送验证码 <span class="text-muted">/api/ems/send</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne6" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab6">
                                <li class="active"><a href="#info6" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox6" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample6" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info6">
                                    <div class="well">
                                        发送验证码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>event</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>事件名称</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox6">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/ems/send" method="get" name="form6" id="form6">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="邮箱" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="event">event</label>
                                                            <input type="string" class="form-control input-sm" id="event" required placeholder="事件名称" name="event">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="6">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="6">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers6"></pre>
                                                            <pre id="response6"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response6">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-7">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion7" href="#collapseOne7"> 检测验证码 <span class="text-muted">/api/ems/check</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne7" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab7">
                                <li class="active"><a href="#info7" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox7" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample7" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info7">
                                    <div class="well">
                                        检测验证码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>event</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>事件名称</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox7">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/ems/check" method="get" name="form7" id="form7">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="邮箱" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="event">event</label>
                                                            <input type="string" class="form-control input-sm" id="event" required placeholder="事件名称" name="event">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="7">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="7">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers7"></pre>
                                                            <pre id="response7"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample7">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response7">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>首页接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-8">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion8" href="#collapseOne8"> 首页 <span class="text-muted">/api/index/index</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne8" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab8">
                                <li class="active"><a href="#info8" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox8" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample8" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info8">
                                    <div class="well">
                                        首页                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox8">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/index/index" method="get" name="form8" id="form8">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="8">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="8">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers8"></pre>
                                                            <pre id="response8"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response8">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>手机短信接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-9">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion9" href="#collapseOne9"> 发送验证码 <span class="text-muted">/api/sms/send</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne9" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab9">
                                <li class="active"><a href="#info9" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox9" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample9" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info9">
                                    <div class="well">
                                        发送验证码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>event</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>事件名称</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox9">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/sms/send" method="get" name="form9" id="form9">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="event">event</label>
                                                            <input type="string" class="form-control input-sm" id="event" required placeholder="事件名称" name="event">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="9">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="9">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers9"></pre>
                                                            <pre id="response9"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response9">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-10">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion10" href="#collapseOne10"> 检测验证码 <span class="text-muted">/api/sms/check</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne10" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab10">
                                <li class="active"><a href="#info10" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox10" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample10" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info10">
                                    <div class="well">
                                        检测验证码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>event</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>事件名称</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox10">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/sms/check" method="get" name="form10" id="form10">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="event">event</label>
                                                            <input type="string" class="form-control input-sm" id="event" required placeholder="事件名称" name="event">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="10">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="10">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers10"></pre>
                                                            <pre id="response10"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response10">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>Token接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-11">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion11" href="#collapseOne11"> 检测Token是否过期 <span class="text-muted">/api/token/check</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne11" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab11">
                                <li class="active"><a href="#info11" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox11" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample11" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info11">
                                    <div class="well">
                                        检测Token是否过期                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox11">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/token/check" method="get" name="form11" id="form11">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="11">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="11">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers11"></pre>
                                                            <pre id="response11"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample11">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response11">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-12">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion12" href="#collapseOne12"> 刷新Token <span class="text-muted">/api/token/refresh</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne12" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab12">
                                <li class="active"><a href="#info12" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox12" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample12" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info12">
                                    <div class="well">
                                        刷新Token                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox12">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/token/refresh" method="get" name="form12" id="form12">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="12">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="12">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers12"></pre>
                                                            <pre id="response12"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response12">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>会员接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-13">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion13" href="#collapseOne13"> 会员中心 <span class="text-muted">/api/user/index</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne13" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab13">
                                <li class="active"><a href="#info13" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox13" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample13" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info13">
                                    <div class="well">
                                        会员中心                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox13">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/index" method="get" name="form13" id="form13">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="13">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="13">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers13"></pre>
                                                            <pre id="response13"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample13">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response13">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-14">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion14" href="#collapseOne14"> 会员登录 <span class="text-muted">/api/user/login</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne14" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab14">
                                <li class="active"><a href="#info14" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox14" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample14" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info14">
                                    <div class="well">
                                        会员登录                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>account</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>账号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>password</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>密码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox14">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/login" method="get" name="form14" id="form14">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="account">account</label>
                                                            <input type="string" class="form-control input-sm" id="account" required placeholder="账号" name="account">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="password">password</label>
                                                            <input type="string" class="form-control input-sm" id="password" required placeholder="密码" name="password">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="14">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="14">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers14"></pre>
                                                            <pre id="response14"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample14">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response14">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-15">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion15" href="#collapseOne15"> 手机验证码登录 <span class="text-muted">/api/user/mobilelogin</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne15" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab15">
                                <li class="active"><a href="#info15" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox15" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample15" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info15">
                                    <div class="well">
                                        手机验证码登录                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox15">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/mobilelogin" method="get" name="form15" id="form15">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="15">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="15">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers15"></pre>
                                                            <pre id="response15"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample15">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response15">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-16">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion16" href="#collapseOne16"> 注册会员 <span class="text-muted">/api/user/register</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne16" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab16">
                                <li class="active"><a href="#info16" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox16" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample16" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info16">
                                    <div class="well">
                                        注册会员                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>username</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>用户名</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>password</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>密码</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox16">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/register" method="get" name="form16" id="form16">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="username">username</label>
                                                            <input type="string" class="form-control input-sm" id="username" required placeholder="用户名" name="username">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="password">password</label>
                                                            <input type="string" class="form-control input-sm" id="password" required placeholder="密码" name="password">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="邮箱" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="16">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="16">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers16"></pre>
                                                            <pre id="response16"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample16">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response16">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-17">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion17" href="#collapseOne17"> 注销登录 <span class="text-muted">/api/user/logout</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne17" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab17">
                                <li class="active"><a href="#info17" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox17" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample17" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info17">
                                    <div class="well">
                                        注销登录                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox17">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/logout" method="get" name="form17" id="form17">
                                                                                                                <div class="form-group">
                                                            无
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="17">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="17">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers17"></pre>
                                                            <pre id="response17"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample17">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response17">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-18">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion18" href="#collapseOne18"> 修改会员个人信息 <span class="text-muted">/api/user/profile</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne18" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab18">
                                <li class="active"><a href="#info18" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox18" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample18" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info18">
                                    <div class="well">
                                        修改会员个人信息                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>avatar</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>头像地址</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>username</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>用户名</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>nickname</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>昵称</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>bio</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>个人简介</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox18">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/profile" method="get" name="form18" id="form18">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="avatar">avatar</label>
                                                            <input type="string" class="form-control input-sm" id="avatar" required placeholder="头像地址" name="avatar">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="username">username</label>
                                                            <input type="string" class="form-control input-sm" id="username" required placeholder="用户名" name="username">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="nickname">nickname</label>
                                                            <input type="string" class="form-control input-sm" id="nickname" required placeholder="昵称" name="nickname">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="bio">bio</label>
                                                            <input type="string" class="form-control input-sm" id="bio" required placeholder="个人简介" name="bio">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="18">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="18">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers18"></pre>
                                                            <pre id="response18"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample18">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response18">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-19">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion19" href="#collapseOne19"> 修改邮箱 <span class="text-muted">/api/user/changeemail</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne19" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab19">
                                <li class="active"><a href="#info19" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox19" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample19" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info19">
                                    <div class="well">
                                        修改邮箱                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox19">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/changeemail" method="get" name="form19" id="form19">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="邮箱" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="19">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="19">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers19"></pre>
                                                            <pre id="response19"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample19">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response19">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-20">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion20" href="#collapseOne20"> 修改手机号 <span class="text-muted">/api/user/changemobile</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne20" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab20">
                                <li class="active"><a href="#info20" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox20" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample20" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info20">
                                    <div class="well">
                                        修改手机号                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox20">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/changemobile" method="get" name="form20" id="form20">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="手机号" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="20">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="20">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers20"></pre>
                                                            <pre id="response20"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample20">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response20">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-21">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion21" href="#collapseOne21"> 第三方登录 <span class="text-muted">/api/user/third</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne21" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab21">
                                <li class="active"><a href="#info21" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox21" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample21" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info21">
                                    <div class="well">
                                        第三方登录                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>platform</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>平台名称</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>code</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>Code码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox21">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/third" method="get" name="form21" id="form21">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="platform">platform</label>
                                                            <input type="string" class="form-control input-sm" id="platform" required placeholder="平台名称" name="platform">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="code">code</label>
                                                            <input type="string" class="form-control input-sm" id="code" required placeholder="Code码" name="code">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="21">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="21">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers21"></pre>
                                                            <pre id="response21"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample21">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response21">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-22">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion22" href="#collapseOne22"> 重置密码 <span class="text-muted">/api/user/resetpwd</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne22" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab22">
                                <li class="active"><a href="#info22" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox22" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample22" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info22">
                                    <div class="well">
                                        重置密码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>newpassword</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>新密码</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox22">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/user/resetpwd" method="get" name="form22" id="form22">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="newpassword">newpassword</label>
                                                            <input type="string" class="form-control input-sm" id="newpassword" required placeholder="新密码" name="newpassword">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="22">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="22">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers22"></pre>
                                                            <pre id="response22"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample22">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response22">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <h2>验证接口</h2>
                <hr>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-23">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion23" href="#collapseOne23"> 检测邮箱 <span class="text-muted">/api/validate/check_email_available</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne23" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab23">
                                <li class="active"><a href="#info23" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox23" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample23" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info23">
                                    <div class="well">
                                        检测邮箱                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>id</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>排除会员ID</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox23">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_email_available" method="get" name="form23" id="form23">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="邮箱" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="id">id</label>
                                                            <input type="string" class="form-control input-sm" id="id" required placeholder="排除会员ID" name="id">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="23">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="23">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers23"></pre>
                                                            <pre id="response23"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample23">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response23">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-24">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion24" href="#collapseOne24"> 检测用户名 <span class="text-muted">/api/validate/check_username_available</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne24" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab24">
                                <li class="active"><a href="#info24" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox24" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample24" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info24">
                                    <div class="well">
                                        检测用户名                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>username</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>用户名</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>id</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>排除会员ID</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox24">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_username_available" method="get" name="form24" id="form24">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="username">username</label>
                                                            <input type="string" class="form-control input-sm" id="username" required placeholder="用户名" name="username">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="id">id</label>
                                                            <input type="string" class="form-control input-sm" id="id" required placeholder="排除会员ID" name="id">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="24">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="24">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers24"></pre>
                                                            <pre id="response24"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample24">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response24">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-25">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion25" href="#collapseOne25"> 检测手机 <span class="text-muted">/api/validate/check_mobile_available</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne25" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab25">
                                <li class="active"><a href="#info25" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox25" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample25" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info25">
                                    <div class="well">
                                        检测手机                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>id</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>排除会员ID</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox25">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_mobile_available" method="get" name="form25" id="form25">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="id">id</label>
                                                            <input type="string" class="form-control input-sm" id="id" required placeholder="排除会员ID" name="id">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="25">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="25">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers25"></pre>
                                                            <pre id="response25"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample25">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response25">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-26">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion26" href="#collapseOne26"> 检测手机 <span class="text-muted">/api/validate/check_mobile_exist</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne26" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab26">
                                <li class="active"><a href="#info26" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox26" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample26" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info26">
                                    <div class="well">
                                        检测手机                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox26">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_mobile_exist" method="get" name="form26" id="form26">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="26">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="26">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers26"></pre>
                                                            <pre id="response26"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample26">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response26">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-27">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion27" href="#collapseOne27"> 检测邮箱 <span class="text-muted">/api/validate/check_email_exist</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne27" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab27">
                                <li class="active"><a href="#info27" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox27" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample27" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info27">
                                    <div class="well">
                                        检测邮箱                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox27">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_email_exist" method="get" name="form27" id="form27">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="邮箱" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="27">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="27">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers27"></pre>
                                                            <pre id="response27"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample27">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response27">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-28">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion28" href="#collapseOne28"> 检测手机验证码 <span class="text-muted">/api/validate/check_sms_correct</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne28" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab28">
                                <li class="active"><a href="#info28" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox28" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample28" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info28">
                                    <div class="well">
                                        检测手机验证码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>mobile</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>手机号</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>event</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>事件</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox28">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_sms_correct" method="get" name="form28" id="form28">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="mobile">mobile</label>
                                                            <input type="string" class="form-control input-sm" id="mobile" required placeholder="手机号" name="mobile">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="event">event</label>
                                                            <input type="string" class="form-control input-sm" id="event" required placeholder="事件" name="event">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="28">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="28">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers28"></pre>
                                                            <pre id="response28"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample28">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response28">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                                <div class="panel panel-default">
                    <div class="panel-heading" id="heading-29">
                        <h4 class="panel-title">
                            <span class="label label-success">GET</span>
                            <a data-toggle="collapse" data-parent="#accordion29" href="#collapseOne29"> 检测邮箱验证码 <span class="text-muted">/api/validate/check_ems_correct</span></a>
                        </h4>
                    </div>
                    <div id="collapseOne29" class="panel-collapse collapse">
                        <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="doctab29">
                                <li class="active"><a href="#info29" data-toggle="tab">基础信息</a></li>
                                <li><a href="#sandbox29" data-toggle="tab">在线测试</a></li>
                                <li><a href="#sample29" data-toggle="tab">返回示例</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active" id="info29">
                                    <div class="well">
                                        检测邮箱验证码                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Headers</strong></div>
                                        <div class="panel-body">
                                                                                        无
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>参数</strong></div>
                                        <div class="panel-body">
                                                                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>名称</th>
                                                        <th>类型</th>
                                                        <th>必选</th>
                                                        <th>描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                                                        <tr>
                                                        <td>email</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>邮箱</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>captcha</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>验证码</td>
                                                    </tr>
                                                                                                        <tr>
                                                        <td>event</td>
                                                        <td>string</td>
                                                        <td>是</td>
                                                        <td>事件</td>
                                                    </tr>
                                                                                                    </tbody>
                                            </table>
                                                                                    </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><strong>正文</strong></div>
                                        <div class="panel-body">
                                            无                                        </div>
                                    </div>
                                </div><!-- #info -->

                                <div class="tab-pane" id="sandbox29">
                                    <div class="row">
                                        <div class="col-md-12">
                                                                                        <div class="panel panel-default">
                                                <div class="panel-heading"><strong>参数</strong></div>
                                                <div class="panel-body">
                                                    <form enctype="application/x-www-form-urlencoded" role="form" action="/api/validate/check_ems_correct" method="get" name="form29" id="form29">
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="email">email</label>
                                                            <input type="string" class="form-control input-sm" id="email" required placeholder="邮箱" name="email">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="captcha">captcha</label>
                                                            <input type="string" class="form-control input-sm" id="captcha" required placeholder="验证码" name="captcha">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <label class="control-label" for="event">event</label>
                                                            <input type="string" class="form-control input-sm" id="event" required placeholder="事件" name="event">
                                                        </div>
                                                                                                                <div class="form-group">
                                                            <button type="submit" class="btn btn-success send" rel="29">提交</button>
                                                            <button type="reset" class="btn btn-info" rel="29">重置</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>响应输出</strong></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12" style="overflow-x:auto">
                                                            <pre id="response_headers29"></pre>
                                                            <pre id="response29"></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><strong>返回参数</strong></div>
                                                <div class="panel-body">
                                                                                                        无
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- #sandbox -->

                                <div class="tab-pane" id="sample29">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <pre id="sample_response29">无</pre>
                                        </div>
                                    </div>
                                </div><!-- #sample -->

                            </div><!-- .tab-content -->
                        </div>
                    </div>
                </div>
                            </div>

            <hr>

            <div class="row mt0 footer">
                <div class="col-md-6" align="left">
                    Generated on 2019-05-16 19:01:01                </div>
                <div class="col-md-6" align="right">
                    <a href="https://www.fastadmin.net" target="_blank">FastAdmin</a>
                </div>
            </div>

        </div> <!-- /container -->

        <!-- jQuery -->
        <script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            function syntaxHighlight(json) {
                if (typeof json != 'string') {
                    json = JSON.stringify(json, undefined, 2);
                }
                json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                    var cls = 'number';
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'key';
                        } else {
                            cls = 'string';
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'boolean';
                    } else if (/null/.test(match)) {
                        cls = 'null';
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                });
            }

            function prepareStr(str) {
                try {
                    return syntaxHighlight(JSON.stringify(JSON.parse(str.replace(/'/g, '"')), null, 2));
                } catch (e) {
                    return str;
                }
            }
            var storage = (function () {
                var uid = new Date;
                var storage;
                var result;
                try {
                    (storage = window.localStorage).setItem(uid, uid);
                    result = storage.getItem(uid) == uid;
                    storage.removeItem(uid);
                    return result && storage;
                } catch (exception) {
                }
            }());

            $.fn.serializeObject = function ()
            {
                var o = {};
                var a = this.serializeArray();
                $.each(a, function () {
                    if (!this.value) {
                        return;
                    }
                    if (o[this.name] !== undefined) {
                        if (!o[this.name].push) {
                            o[this.name] = [o[this.name]];
                        }
                        o[this.name].push(this.value || '');
                    } else {
                        o[this.name] = this.value || '';
                    }
                });
                return o;
            };

            $(document).ready(function () {

                if (storage) {
                    $('#token').val(storage.getItem('token'));
                    $('#apiUrl').val(storage.getItem('apiUrl'));
                }

                $('[data-toggle="tooltip"]').tooltip({
                    placement: 'bottom'
                });

                $(window).on("resize", function(){
                    $("#sidebar").css("max-height", $(window).height()-80);
                });

                $(window).trigger("resize");

                $(document).on("click", "#sidebar .list-group > .list-group-item", function(){
                    $("#sidebar .list-group > .list-group-item").removeClass("current");
                    $(this).addClass("current");
                });
                $(document).on("click", "#sidebar .child a", function(){
                    var heading = $("#heading-"+$(this).data("id"));
                    if(!heading.next().hasClass("in")){
                        $("a", heading).trigger("click");
                    }
                    $("html,body").animate({scrollTop:heading.offset().top-70});
                });

                $('code[id^=response]').hide();

                $.each($('pre[id^=sample_response],pre[id^=sample_post_body]'), function () {
                    if ($(this).html() == 'NA') {
                        return;
                    }
                    var str = prepareStr($(this).html());
                    $(this).html(str);
                });

                $("[data-toggle=popover]").popover({placement: 'right'});

                $('[data-toggle=popover]').on('shown.bs.popover', function () {
                    var $sample = $(this).parent().find(".popover-content"),
                            str = $(this).data('content');
                    if (typeof str == "undefined" || str === "") {
                        return;
                    }
                    var str = prepareStr(str);
                    $sample.html('<pre>' + str + '</pre>');
                });

                $('body').on('click', '#save_data', function (e) {
                    if (storage) {
                        storage.setItem('token', $('#token').val());
                        storage.setItem('apiUrl', $('#apiUrl').val());
                    } else {
                        alert('Your browser does not support local storage');
                    }
                });

                $('body').on('click', '.send', function (e) {
                    e.preventDefault();
                    var form = $(this).closest('form');
                    //added /g to get all the matched params instead of only first
                    var matchedParamsInRoute = $(form).attr('action').match(/[^{]+(?=\})/g);
                    var theId = $(this).attr('rel');
                    //keep a copy of action attribute in order to modify the copy
                    //instead of the initial attribute
                    var url = $(form).attr('action');
                    var method = $(form).prop('method').toLowerCase() || 'get';

                    var formData = new FormData();

                    $(form).find('input').each(function (i, input) {
                        if ($(input).attr('type').toLowerCase() == 'file') {
                            formData.append($(input).attr('name'), $(input)[0].files[0]);
                            method = 'post';
                        } else {
                            formData.append($(input).attr('name'), $(input).val())
                        }
                    });

                    var index, key, value;

                    if (matchedParamsInRoute) {
                        var params = {};
                        formData.forEach(function(value, key){
                            params[key] = value;
                        });
                        for (index = 0; index < matchedParamsInRoute.length; ++index) {
                            try {
                                key = matchedParamsInRoute[index];
                                value = params[key];
                                if (typeof value == "undefined")
                                    value = "";
                                url = url.replace("\{" + key + "\}", value);
                                formData.delete(key);
                            } catch (err) {
                                console.log(err);
                            }
                        }
                    }

                    var headers = {};

                    var token = $('#token').val();
                    if (token.length > 0) {
                        headers['token'] = token;
                    }

                    $("#sandbox" + theId + " .headers input[type=text]").each(function () {
                        val = $(this).val();
                        if (val.length > 0) {
                            headers[$(this).prop('name')] = val;
                        }
                    });

                    $.ajax({
                        url: $('#apiUrl').val() + url,
                        data: method == 'get' ? $(form).serialize() : formData,
                        type: method,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        headers: headers,
                        xhrFields: {
                            withCredentials: true
                        },
                        success: function (data, textStatus, xhr) {
                            if (typeof data === 'object') {
                                var str = JSON.stringify(data, null, 2);
                                $('#response' + theId).html(syntaxHighlight(str));
                            } else {
                                $('#response' + theId).html(data || '');
                            }
                            $('#response_headers' + theId).html('HTTP ' + xhr.status + ' ' + xhr.statusText + '<br/><br/>' + xhr.getAllResponseHeaders());
                            $('#response' + theId).show();
                        },
                        error: function (xhr, textStatus, error) {
                            try {
                                var str = JSON.stringify($.parseJSON(xhr.responseText), null, 2);
                            } catch (e) {
                                var str = xhr.responseText;
                            }
                            $('#response_headers' + theId).html('HTTP ' + xhr.status + ' ' + xhr.statusText + '<br/><br/>' + xhr.getAllResponseHeaders());
                            $('#response' + theId).html(syntaxHighlight(str));
                            $('#response' + theId).show();
                        }
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>
