<table border="1" width="600px">
    <tr>
        <th width="20%">ID</th>
        <th width="20%">name</th>
        <th width="20%">sex</th>
        <th width="20%">age</th>
        <th width="20%">操作</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['sex']; ?></td>
        <td><?php echo $user['age']; ?></td>
        <td>
            <input type="button" value="修改" onclick="location.href='<?php echo base_url("admin/user/update/".$user["id"]); ?>'">
            <input type="button" value="删除" onclick="location.href='<?php echo base_url("admin/user/del/".$user["id"]); ?>'">
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<input type="button" value="添加" onclick="location.href='<?php echo base_url("admin/user/add"); ?>'">