<?php
include 'her1.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Welcome to Document Sharing Portal</h1>
    </div>
  </div>
</div>

  <form action="<?php echo base_url(); ?>welcome/document" method="post" enctype="multipart/form-data">
  <input type="file" name="doc" />
      <button class="btn btn-success btn-xs active">UPLOAD</button></h3>
  </form>

 <div>
<div class="container">
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table table-bordered table-condensed table-hover">
      <thead class="thead-dark">
        <tr>
          <th>d_no.</th>
          <th>docName</th>
          <th>docSize</th>
          <th>Uploaded Date</th>
          <th>Uploaded Time</th>
          <th>Uploaded By</th>
          <th>Download</th>
                </tr>
      </thead>
      <tbody>
        <?php if(!empty($students)){
          $i = 1; rsort($students);
        foreach($students as $row){ ?>
          <tr>
            <td><?php echo $i; $i++; ?></td>
            <td><?php echo substr($row['docName'], 12); ?></td>
            <td><?php echo $row['docSize']; ?></td>
            <td><?php echo substr($row['uploadDate'], 0, 8); ?></td>
            <td><?php echo substr($row['uploadDate'], 9); ?></td>
            <td><?php echo $row['name'] .' ( ' . $row['course_type'] . ' ) '; ?></td>
            <td><a href="<?php echo base_url(); ?>welcome/downloadDoc/<?php echo $row['doc_id']; ?>">download</a></td>
         </tr>
        <?php } }else{echo "Table is empty.";}
        ?>
      </tbody>
      </table>
    </div>
  </div>
</div>

<?php include 'footer1.php'; ?>