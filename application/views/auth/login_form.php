<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>다산여행</title>
<?echo common_css_asset('bootstrap/css/bootstrap.css')?>
<?echo common_css_asset('bootstrap/css/bootstrap-responsive.css')?>
<?echo common_css_asset('jquery/css/smoothness/jquery-ui-1.8.22.custom.css')?>
<?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
<?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
<?echo common_js_asset('bootstrap/js/bootstrap.js')?>
</head>
<body>
<div class="container">
    <div class="well">
<?php echo form_open($this->uri->uri_string()); ?>
            <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                    <input type="text" name="login" id="login">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input type="password" name="password" id="password">
                </div>
            </div>
            <div class="form-actions"> 
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>
