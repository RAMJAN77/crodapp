<?php include "boot.php"?>
<?php 
include("function.php");

$objcrudadmin = new crudapp();

if(isset($_POST['submit'])){
   $returnmsg = $objcrudadmin->add_data($_POST);
}
 $student = $objcrudadmin->display_data();

 if(isset($_POST['u_submit'])){
   $update = $objcrudadmin->updatedata($_POST);

 }
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $delete = $objcrudadmin->delete_data($id);
     if($delete){
         header('Location: index.php');
     }
}

?>
<div class="form-area p-4 shadow">
    <h2 class="text-primary text-center">Darun IT Student Database </h2>
    <form class=" form p-3" style="border:5px dashed #007bff" action="" method="post" enctype="multipart/form-data">
    <?php if(isset($returnmsg)){echo $returnmsg;}?>
    <?php if(isset($delete)){echo $delete;}?>
         <input class="form-control mb-2" type="text"  name="name" placeholder="Entern Your Name" id="">
         <input class="form-control mb-2" name="roll" placeholder="Enter Roll" id="">
         <label class="text-primary" for="Upload Your Image">Upload Your Image</label>
         <input class="form-control mb-2" type="file" name="img" id="Upload Your Image">
         <input class="form-control btn btn-primary my-3" type="submit" name="submit" value="Add Information" id="">
    </form>
</div>
<?php if(isset($_GET['delete'])){echo 'deleted';}?>
<div class="output p-4 shadow">
    <table CLASS="table table-striped text-center table-hover shadow">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ROLL</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
    <?php
            
            while ($row = mysqli_fetch_assoc($student)){
                $id = $row['id'];
                $name = $row['std_name'];
                $roll = $row['std_roll'];
                $img = $row['std_img'];

    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $roll; ?></td>
                 <td><img width="50px" height="50px" src="img/<?php echo $img;?> " alt=""></td>
                <td><a class="btn btn-warning" href="edit.php?status=edit&&id=<?php echo $id;?>">Edit</a>  <a class="btn btn-danger" href="?id=<?php echo $id;?>">Delete</a></td>
            </tr>
            <?php 
         }
            
     ?> 

        </tbody>
    </table>
</div>