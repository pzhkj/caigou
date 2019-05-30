<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"F:\PhpStudy\PHPTutorial\WWW\caigou\public/../application/admin\view\purchase\edit.html";i:1558002950;s:77:"F:\PhpStudy\PHPTutorial\WWW\caigou\application\admin\view\layout\default.html";i:1557482264;s:74:"F:\PhpStudy\PHPTutorial\WWW\caigou\application\admin\view\common\meta.html";i:1557482264;s:76:"F:\PhpStudy\PHPTutorial\WWW\caigou\application\admin\view\common\script.html";i:1557482264;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Purchase_er'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-purchase_er" data-rule="required" class="form-control selectpicker" name="row[purchase_er]">
                <option value="0">请选择</option>
                <?php if(is_array($accounts) || $accounts instanceof \think\Collection || $accounts instanceof \think\Paginator): if( count($accounts)==0 ) : echo "" ;else: foreach($accounts as $key=>$vo): if($vo['type'] == 1): ?>
                <option value="<?php echo $vo['id']; ?>" <?php if(in_array(($vo['id']), is_array($row['purchase_er'])?$row['purchase_er']:explode(',',$row['purchase_er']))): ?>selected<?php endif; ?>><?php echo $vo['nickname']; ?></option>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Product_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-product_name" data-rule="required" class="form-control" name="row[product_name]" type="text" value="<?php echo htmlentities($row['product_name']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Qty'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-qty" data-rule="required" class="form-control" name="row[qty]" type="number" value="<?php echo htmlentities($row['qty']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Product_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-product_image" data-rule="" class="form-product_image" size="50" name="row[product_image]" type="text" value="<?php echo $row['product_image']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-Product_image" class="btn btn-danger plupload" data-input-id="c-product_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-product_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-Product_image" class="btn btn-primary fachoose" data-input-id="c-product_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-product_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-product_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Order_sn'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-order_sn" class="form-control" name="row[order_sn]" type="text" value="<?php echo htmlentities($row['order_sn']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Create_at'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-create_at" data-rule="required" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[create_at]" type="text" value="<?php echo $row['create_at']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Delivery_at'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-delivery_at" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[delivery_at]" type="text" value="<?php echo $row['delivery_at']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Remarks'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-remarks" class="form-control" name="row[remarks]" type="text" value="<?php echo htmlentities($row['remarks']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('In_system_at'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-in_system_at" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[in_system_at]" type="text" value="<?php echo $row['in_system_at']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Product_sku'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-product_sku" class="form-control" name="row[product_sku]" type="text" value="<?php echo htmlentities($row['product_sku']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('In_system_qty'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-in_system_qty" class="form-control" name="row[in_system_qty]" type="number" value="<?php echo htmlentities($row['in_system_qty']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('In_system_account_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-in_system_account_id" class="form-control selectpicker" name="row[in_system_account_id]">
                <option value="0">请选择</option>
                <?php if(is_array($accounts) || $accounts instanceof \think\Collection || $accounts instanceof \think\Paginator): if( count($accounts)==0 ) : echo "" ;else: foreach($accounts as $key=>$vo): if($vo['type'] == 2): ?>
                <option value="<?php echo $vo['id']; ?>"  <?php if(in_array(($vo['id']), is_array($row['in_system_account_id'])?$row['in_system_account_id']:explode(',',$row['in_system_account_id']))): ?>selected<?php endif; ?>><?php echo $vo['nickname']; ?></option>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Out_system_at'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-out_system_at" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[out_system_at]" type="text" value="<?php echo $row['out_system_at']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Out_system_qty'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-out_system_qty" class="form-control" name="row[out_system_qty]" type="number" value="<?php echo htmlentities($row['out_system_qty']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Out_system_account_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-out_system_account_id" class="form-control selectpicker" name="row[out_system_account_id]">
                <option value="0">请选择</option>
                <?php if(is_array($accounts) || $accounts instanceof \think\Collection || $accounts instanceof \think\Paginator): if( count($accounts)==0 ) : echo "" ;else: foreach($accounts as $key=>$vo): if($vo['type'] == 3): ?>
                <option value="<?php echo $vo['id']; ?>" <?php if(in_array(($vo['id']), is_array($row['out_system_account_id'])?$row['out_system_account_id']:explode(',',$row['out_system_account_id']))): ?>selected<?php endif; ?>><?php echo $vo['nickname']; ?></option>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>