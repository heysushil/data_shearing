<hr>
<h1>Student Registration Form<i></b></center></h1>
<hr>
  <form action="<?php echo base_url(); ?>welcome/studentAddData"  method="POST">
      <input type="text" id="name" placeholder="Enter name" name="name">
      <select name="course">
        <option>Select Your Course</option>
        <option>B.Tech</option>
        <option>BCA</option>
        <option>MCA</option>
      </select>

      <select name="year">
        <option>Select Year</option>
        <option>2019</option>
        <option>2020</option>
        <option>2021</option>
        <option>2022</option>
      </select>
      <input type="email" id="email" placeholder="Enter email" name="email">
      <input type="password" id="pwd" placeholder="Enter password" name="pass"> 
      <input type="submit" name="submit" value="Submit">
  </form> 

<hr>
<h1>List of all student</h1>
<hr>
<div class="container-fluid">
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
      <?php if(! empty($students)){ 
        // rsort($students);
        $i=1;
      foreach($students as $row){ ?>
        <tr>
          <td><?php echo $i;$i++; ?></td>
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

</center>

      