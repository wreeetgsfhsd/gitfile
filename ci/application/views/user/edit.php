<?php echo validation_errors(); ?>

<?php echo form_open('admin/user/update/' . $user["id"]); ?>

<input type="hidden" value="<?php echo $user['id'] ?>" name="id">
<label for="name">Name</label>
<input type="input" name="name" value="<?php echo $user['name'] ?>" /><br />

<label for="sex">Sex</label>
<input type="input" name="sex" value="<?php echo $user['sex'] ?>" /><br />

<label for="age">Age</label>
<input type="input" name="age" value="<?php echo $user['age'] ?>" /><br />

<input type="submit" name="submit" value="修改" />

</form>