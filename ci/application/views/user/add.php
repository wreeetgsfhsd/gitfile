<?php echo validation_errors(); ?>

<?php echo form_open('admin/user/add'); ?>

<label for="name">Name</label>
<input type="input" name="name" /><br />

<label for="sex">Sex</label>
<input type="input" name="sex" /><br />

<label for="age">Age</label>
<input type="input" name="age" /><br />

<input type="submit" name="submit" value="添加" />

</form>