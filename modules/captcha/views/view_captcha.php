<tbody>
<tr>
<td><?php echo form_label('Security Image'); ?></td>
<td>
    <div style="float:left;padding-right: 10px;" id="captcha_image"><?php echo $image;?></div>
    <div style="font-size:10px;"><a href="javascript:void(0);" onclick="refresh_captcha();">Refresh Image</a></div>
</td>
</tr>

<tr>
<td></td>
<td><font size="1">Please enter above the numbers to below the field.</font></td>
</tr>

<tr>
<td></td>
<td>
    <?php echo form_error('captcha_answer', '<div class="input-error">', '</div>'); ?>
    <?php echo form_input('captcha_answer', '', ' maxlength="5" id="captcha_answer"  '); ?>
</td>
</tr>
</tbody>