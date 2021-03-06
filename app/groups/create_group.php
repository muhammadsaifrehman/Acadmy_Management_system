<?php include("../includes/header.php"); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    
    <div class="container-fluid">
      <h3 class="well well-sm" style="border-radius:10px;font-weight: bolder; background-color:#00a65a; color: white; text-align: center;">Create New Group</h3>
      <form method="POST" enctype="multipart/form-data" class="well" style="border-top:1px solid #00a65a;">
      <div class="row">

        <div class="col-md-4 form-group">
          <label for="">Group Name</label>
          <input type="text" name="group_name" class="form-control" placeholder="Enter Name of group"required="" >
          
        </div>
        <div class="col-md-4" form-group>
          <label for="">Group Type</label>
          <select name="group_type" class="form-control">
            <option value="morning">Morning</option>
            <option value="evening">evening</option>
          </select>
        </div>
        <div class="col-md-4" form-group>
          <label for=""> Select the class</label>
          
          <select name="class_id" class="form-control">
            <?php 
              $select_query="SELECT * FROM classes WHERE delete_status='1'";
              $result=mysqli_query($con,$select_query);
              $res=mysqli_num_rows($result);
              if ($res>0) {
                
              
              while ($row=mysqli_fetch_assoc($result)) {
                ?>
                  <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>

                <?php  
              }
              }
              else{
                ?>
                <option>---Create the class first</option>
                <?php
              }
            ?>
            
          </select>
        </div>
      </div>
      <div class="row">
        
        <div class="col-md-4" form-group>
          <label for="">Group Description </label>
          <textarea name="group_description" class="form-control" placeholder=" Group Description " rows="5"required="" ></textarea>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4">
        <button type="submit" class="btn btn-primary" name="submit"><i class="glyphicon glyphicon-save"></i> Save</button>&nbsp;
        <a href="index.php" title="Go to main page" class="btn btn-danger"><i class="glyphicon glyphicon-save"></i>  Cancel</a>
        </div>
      </div>
    </form>
    </div>







<?php
  if(isset($_POST["submit"]))
  {
    $group_name = $_POST["group_name"];
    $group_type = $_POST["group_type"];
    $class_id=$_POST["class_id"];
    $group_description= $_POST["group_description"];
    

    $query_insert = "INSERT INTO groups(group_name,group_type,class_id,group_description,created_by) VALUES ('$group_name','$group_type','$class_id','$group_description','$user')";
    $result   = mysqli_query($con,$query_insert);
    if($result)
      {
        echo "<script type='text/javascript'>window.location='index.php'</script>";
      } 
    }


?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://dexdevs.com/">DEXDEVS</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include"../includes/footer.php"; ?>



