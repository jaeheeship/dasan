<div class="container">
    <div class="well">
<?php echo form_open($this->uri->uri_string()); ?>
            <div class="control-group">
                <label class="control-label">Old Password</label>
                <div class="controls">
                    <input type="password" name="old_password" id="old_password" placeholder="Old Password">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">New Password</label>
                <div class="controls">
                    <input type="password" name="new_password" id="new_password" placeholder="New Password">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Confirm New Password</label>
                <div class="controls">
                    <input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password">
                </div>
            </div>
            <div class="form-actions"> 
                <button class="btn btn-primary" type="submit">비밀번호 수정</button>
            </div>
<?php echo form_close(); ?>
</div>
</div>

