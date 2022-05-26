<hr>
<h1>Document Uploading</h1>
<hr>
<form action="<?php echo base_url(); ?>welcome/document" method="post" enctype="multipart/form-data">
  <input type="file" name="doc" />
  <select name="course">
    <option>Choose Course to Shear</option>
    <option>B.Tech</option>
    <option>BCA</option>
    <option>MCA</option>
  </select>
  <input type="submit" value="Upload" name="upload">
</form>


<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
 <div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover">    
      <thead class="table-dark">
      <tr>
        <th>doc_id</th>
        <th>docName</th>
        <th>docSize</th>
        <th>docType</th>
        <th>docPath</th>
        <th>User Name</th>
        <th>download</th>
              </tr>
    </thead>
    <tbody>
      <?php if(! empty($students)) 
      foreach($students as $row){ ?>
        <tr>
          <td><?php echo $row['doc_id']; ?></td>
          <td><?php echo substr($row['docName'], 12); ?></td>
          <td><?php echo $row['docSize']; ?></td>
          <td><?php echo $row['docType']; ?></td>
          <td><?php echo $row['docPath']; ?></td>
          <td><?php echo $row['name'] . ' (' . $row['user_type'] . ')'; ?></td>
          <td><a href="<?php echo base_url('Welcome/downloadDoc/'.$row['doc_id']); ?>">DOWNLOAD</a></td>
       </tr>
      <?php }
      else{
        echo "table not found";
      } ?>
    </tbody>
  </table>
  <!-- <span class="pagination"><?php echo $links; ?></span> -->
</div>
</div></div></div>
