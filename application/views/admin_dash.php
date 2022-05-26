<style type="text/css">
  .table-responsive{
    height: 600px;
  }
</style>


<div class="container-fluid">
  <hr>
  <CENTER><h1><b>ALL SHARED DOCUMENT</b></h1></CENTER><hr>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
         <table class="table table-bordered table-condensed table-hover">    
          <thead class="table-dark">
            <tr>
              <th>No.</th>
              <th>Doc Name</th>
              <th>Doc Size</th>
              <th>Doc Type</th>
              <th>Uploaded Date</th>
              <th>Uploaded Time</th>
              <th>Uploaded By</th>
              <th>Download</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php if(! empty($documents)){
            $i = 1;
            rsort($documents);
            foreach($documents as $row){ ?>
              <tr>
                <td><?php echo $i; $i++; ?></td>
                <td ><?php echo substr($row['docName'], 12); ?></td>
                <td><?php echo $row['docSize']; ?></td>
                <td><?php echo $row['docType']; ?></td>
                <td><?php echo substr($row['uploadDate'], 0, 8); ?></td>
                <td><?php echo substr($row['uploadDate'], 9); ?></td>
                <td><?php echo $row['name'] .' ( ' . $row['course_type'] . ' ) '; ?></td>
                <td><a href="<?php echo base_url('Welcome/downloadDoc/'.$row['doc_id']); ?>">DOWNLOAD</a></td>
                <td><a href="<?php echo base_url('Welcome/deleteDoc/'.$row['doc_id']); ?>">Delete</a></td>
             </tr>
            <?php } }
            else{
              echo "No documents found.";
            } ?>
          </tbody>
        </table>
        <span class="pagination"><?php echo $docLinks; ?></span>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <hr><CENTER><h1><b>ALL USER LIST</b></h1></CENTER><hr>
  <div class="row">
    <div class="col-md-12">
 <div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover">    
      <thead class="table-dark">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>course</th>
        <th>Year</th>
        <th>Email</th>
        <th>password</th>           
        <th>Edit</th>   
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php       
      if(! empty($students)){
      rsort($students);
      $i=1; 
      foreach($students as $row){ ?>
        <tr>
          <td><?php echo $i; $i++; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['course']; ?></td>
          <td><?php echo $row['year']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['pass']; ?></td>
       
          <td><a href="<?php echo base_url();?>welcome/studentEdit/<?php echo $row['id']; ?>">Edit</a></td>
           <td><a href="<?php echo base_url();?>welcome/studentDelete/<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
      <?php }
      }else{
        echo "Table is empty. Need to add some Data.";
      }

         ?>
    </tbody>
  </table>
  <span class="pagination"><?php echo $links; ?></span>
</div>
</div>
</div>
</div>

</body>
