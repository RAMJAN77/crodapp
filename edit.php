<?php include('boot.php')?>
<?php 
include('function.php');
$objcrudadmin = new crudapp();

if(isset($_GET['status'])){
   if($_GET['status'] = 'edit'){
      $id = $_GET['id'];
      $editData = $objcrudadmin->edit_data($id);
   }
}
if(isset($_POST['u_submit'])){
   $update = $objcrudadmin->updatedata($_POST);
   if($update){
      header('Location:index.php');
   }
}
?>
<div class="form-area p-4 shadow">
    <h2 class="text-primary text-center">Darun IT Student Database </h2>
    <form class=" form p-3" style="border:5px dashed #007bff" action="" method="post" enctype="multipart/form-data">
    <?php if(isset($update)){echo $update;}?>
         <input class="form-control mb-2" type="text"  name="u_name" value="<?php echo $editData['std_name']?>">
         <input class="form-control mb-2" name="u_roll" value="<?php echo $editData['std_roll']?>">
         <label class="text-primary" for="Upload Your Image">Upload Your Image</label>
         <input class="form-control mb-2" type="file" name="u_img" id="Upload Your Image">
         <input class="form-control btn btn-primary mb-2" type="submit" name="u_submit" value="Update Information" id="">
         <input type="hidden" name="hidden" value=" <?php echo $id;?>">
    </form>
</div>
<h5 class="text-center mt-3"><a class="btn btn-warning" href="index.php">< Back Home Page</a></h5>