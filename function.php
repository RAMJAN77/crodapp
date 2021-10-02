<?php 

Class crudapp{
    private $conn;
    public function __construct()
    {
       $dbhost = 'localhost';
       $dbuser = 'root';
       $dbpass = '';
       $dbname = 'project';
       $this->conn = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);
       if(!$this->conn){
           die("Could not connect database");
       }
    }
    public function add_data($data){
        $std_name = $data['name'];
        $std_roll = $data['roll'];
        $std_img = $_FILES['img'];
        $std_img_name = $std_img['name'];
        $std_tmp_name = $std_img['tmp_name'];

        $query = "INSERT INTO crud_info (std_name, std_roll, std_img) VALUES ('$std_name', $std_roll, '$std_img_name')";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($std_tmp_name, "img/".$std_img_name);
            return "Information Added Seccesfull";
        }
      
    }
    public function display_data()
    {
        $query = "SELECT * FROM crud_info";
        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            return $returndata;
        }
    }
        public function edit_data($id)
    {
        $query = "SELECT * FROM crud_info WHERE id = $id";
        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            $std_data = mysqli_fetch_array($returndata);
            return $std_data;
        }
    }
    public function updatedata($data)
    {
        $std_name = $data['u_name'];
        $std_roll = $data['u_roll'];
        $std_id = $data['hidden'];
        $std_img = $_FILES['u_img'];
        $img_name = $std_img['name'];
        $tmp_name = $std_img['tmp_name'];

        $query = "UPDATE crud_info SET std_name='$std_name', std_roll=$std_roll, std_img='$img_name' WHERE id = $std_id";

        if(mysqli_query($this->conn, $query)){
             move_uploaded_file($tmp_name, "img/".$img_name);
            return "Information Updete Seccesfully";
        }
    }
    public function delete_data($id)
    {
       $query = "DELETE FROM crud_info WHERE id = $id";
       if(mysqli_query($this->conn, $query)){
           return "Data Deleted";
       }
    }
}


?>