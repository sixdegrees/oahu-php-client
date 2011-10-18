<h2>Publications</h2>
<table width="100%" border="1">
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Status</th>
    <th>Title</th>
    <th>Created At</th>
    <th>Updated At</th>
  </tr>
  <?php foreach($publications as $publication) : ?>
  <tr>
    <td><?php echo $publication->_id ?></td>
    <td><?php echo $publication->_type ?></td>
    <td><?php echo $publication->status ?></td>
    <td><?php echo $publication->title ?></td>
    <td><?php echo $publication->created_at ?></td>
    <td><?php echo $publication->updated_at ?></td>
  </tr>
<?php endforeach ?>
</table>

