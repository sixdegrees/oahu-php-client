<h2>Pub Accounts</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Name</th>
    <th>URL</th>
  </tr>
  <?php foreach($pub_accounts as $account): ?>
  <tr>
    <td><a href="<?php echo url_for("/pub_accounts/" . $account->_id) ?>"><?php echo $account->_id ?></a></td>
    <td><?php echo $account->_type ?></td>
    <td><?php echo $account->name ?></td>
    <td><a href="<?php echo $account->profile_url ?>"><?php echo $account->profile_url ?></a></td>
  </tr>
  <?php endforeach ?>
</table>
