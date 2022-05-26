<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
 <div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover">    
      <thead class="table-warning">
      <tr>
        <th>No.</th>
        <th>docname</th>
        <th>username</th>
        <th>usertype</th>
        <th>usercourse</th>
        <th>request date</th>
        <th>Time</th>
        <th>Approve</th>
        <th>Delete</th>
      </tr>
    </thead>
  
    <tbody>
      <?php if(!empty($students)){
        rsort($students);
      foreach($students as $row){ ?>
        <tr>
          <td><?php echo $row['per_id']; ?></td>
          <!-- <td><?php echo $row['doc_id']; ?></td> -->
          <td><?php echo $row['doc_name']; ?></td>
          <td><?php echo $row['user_name']; ?></td>
          <td><?php echo $row['user_type']; ?></td>
          <td><?php echo $row['user_course'];?></td>
          <td><?php echo substr($row['request_date'], 0, 8); ?></td>
          <td><?php echo substr($row['request_date'], 9); ?></td>
          <td><a href="<?php echo base_url('Welcome/adminGivePermissionForDoc/'.$row['per_id']); ?>">Permission</a></td>
          <td><a href="<?php echo base_url('Welcome/deletePermission/'.$row['per_id']); ?>">Delete</a></td>
       </tr>
      <?php } }else{echo "Table is empty.";}
      ?>
    </tbody>
  </table>
</div>
</div></div></div>