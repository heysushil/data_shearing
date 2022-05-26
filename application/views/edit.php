<hr>
<h1>Edit Student Details</h1>
<hr>
<br>
<form action="<?php echo base_url(); ?>welcome/studentEditUpdate" name="StudentRegistration" method="post" onsubmit="return(validate());">
  <table>
    <input type="hidden" name="id" value="<?php echo $students_data[0]['id']; ?>">
    <tr class="tr">
    <td><input type='text' name='name' value="<?php echo $students_data[0]['name']; ?>"></td>  
    <td><select name="course">
        <option value="<?php echo $students_data[0]['course']; ?>"><?php echo $students_data[0]['course']; ?></option>
        <option>Select Your Course</option>
        <option>B.Tech</option>
        <option>BCA</option>
        <option>MCA</option>
      </select>
      </td>
      <td>
      <select name="year">
        <option><?php echo $students_data[0]['year']; ?></option>
        <option>Select Year</option>
        <option>2019</option>
        <option>2020</option>
        <option>2021</option>
        <option>2022</option>
      </select>
      </td>
    <td><input type='text' name='email' value="<?php echo $students_data[0]['email']; ?>"></td>
    <td><input type='text' name='pass' value="<?php echo $students_data[0]['pass']; ?>"></td>
   <!-- <td>image</td>
    <td><input type="file" name="image" value="<?php echo $students_data[0]['pass']; ?>"/></td>-->
    <td><input type="submit" name="submit"/></td>
    </tr> 
  </table>
</form>

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
        <th>year</th>
        <th>Email</th>
        <th>password</th>
                <th>Edit</th>   
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php if(! empty($allStudents)) {
        $i=1;
      foreach($allStudents as $row){

       ?>
        <tr>
          <td><?php echo $i;$i++; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['course']; ?></td>
           <td><?php echo $row['year']; ?></td>

          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['pass']; ?></td>

          <td><a href="<?php echo base_url();?>welcome/studentedit/<?php echo $row['id']; ?>">Edit</a></td>
           <td><a href="<?php echo base_url();?>welcome/studentDelete/<?php echo $row['id']; ?>">Delete</a></td>
        </tr>

      <?php } }
      else{
        echo "table not found";
      }

         ?>
    </tbody>
    </tbody>
  </table>
  <span class="pagination"><?php echo $links; ?></span>
</div>
</div>
</div>
</div>


</center>