
 <?php include "include/header.php";?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"> Home</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

   <?php 
      $do = isset($_GET['do']) ? $_GET['do'] : 'management';

        if( $do == "management"){
        ?>
      <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12 col-12">
                   <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">All users Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">S.I</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                               
                               $sql = "SELECT * FROM users";
                               $all_users = mysqli_query ($db,$sql);
                               $i = 0 ;

                               while( $row = mysqli_fetch_assoc(  $all_users)){

                                $id        = $row['id'];
                                $name      = $row['name'];
                                $username  = $row['username'];
                                $email     = $row['email'];
                                $phone     = $row['phone'];
                                $address   = $row['address'];
                                $role      = $row['role'];
                                $img       = $row['img'];
                                $i++;
                                ?>
                                  <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td>
                                        <?php 
                                          if(empty($img)){
                                         ?>
                                           <img src="dist/img/users/default.jpg" alt="" class="avatar-img">

                                         <?php
                                          }
                                          else{
                                            ?>
                                            <img src="dist/img/users/<?php echo $img; ?>" alt="" class="avatar-img">
 
                                          <?php
                                          }
                                        ?>
                                    </td>
                                    <td><?php  echo $name;?></td>
                                    <td><?php  echo $username;?></td>
                                    <td><?php  echo $email;?></td>
                                    <td>
                                        <?php  
                                         if(empty($address)){
                                            echo "Empty";

                                        }
                                        else{
                                            echo $address;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                     <?php
                                        if(empty($phone)){
                                            echo "Empty";

                                        }
                                        else{
                                            echo $phone;
                                        }
                                    
                                    
                                     ?>
                                    </td>
                                    <td>
                                        <?php  
                                        if($role==1){
                                            ?>
                                            <span class="badge badge-success">Super admin</span>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <span class="badge badge-danger">Editor</span>
                                            <?php
                                        }
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="users.php?do=edit&id=<?php echo $id;?>" >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" data-toggle="modal" data-target="#delet<?php echo $id;?>">
                                            <i class="fas fa-trash" ></i>
                                        </a>
                                        <!-- delet code start here -->

                                        <div class="modal fade" id="delet<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you delet this users?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="users.php?do=delet&deletuser=<?php echo $id;?>" class="btn btn-danger" >YES</a>
                                                <a href="" class="btn btn-primary" data-dismiss="modal">NO</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- delet code  end here -->
                                
                                        </div>
                                    </td>
                                </tr>
                                <?php
                               }
                            
                             ?>
                              
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        <a href="users.php?do=Add" class="btn btn-success btn-block">Add new users</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>
        <?php

        }
        else if( $do == "Add"){
           ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-12">
                       <div class="card card-success">
                           <div class="card-header">
                               <h3>Register User Here</h3>
                           </div>
                           <div class="card-body">
                               <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="">User Name</label>
                                              <input type="text" class="form-control" name="username" autocomplete="off" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Full Name</label>
                                              <input type="text" class="form-control" name="name" autocomplete="off" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Email Address</label>
                                              <input type="email" class="form-control" name="email" autocomplete="off" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Phone</label>
                                              <input type="text" class="form-control" name="phone" autocomplete="off" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Address</label>
                                              <input type="text" class="form-control" name="address" autocomplete="off" >
                                          </div>

                                      </div>
                                      <div class="col-md-6">

                                         <div class="form-group">
                                              <label for="">Password</label>
                                              <input type="text" class="form-control" name="password" autocomplete="off" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Retype password</label>
                                              <input type="text" class="form-control" name="repassword" autocomplete="off" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">User Role</label>
                                              <select class="form-control" name="role" id="">
                                                  <option value="0">Plz select user role</option>
                                                  <option value="1">Super Admin</option>
                                                  <option value="2">Editor</option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label for="">Upload User Avatar Image</label>
                                              <input type="file" class="form-control-file" name="image"  >
                                          </div>

                                          <div class="form-group">
                                              <input type="submit" class="btn btn-primary" value="Register User" name="register"  >
                                          </div>

                                         


                                      </div>
                                  </div>
                               </form>
                           </div>
                       </div>
                    </div>
                    </div>
                </div>
            </section>
           <?php
        }
        else if( $do == "Insert"){
          if(isset($_POST['register'])){
            $username    = $_POST['username'];
            $name        = $_POST['name'];
            $email       = $_POST['email'];
            $phone       = $_POST['phone'];
            $address     = $_POST['address'];
            $password    = $_POST['password'];
            $repassword  = $_POST['repassword'];
            $role        = $_POST['role'];

            $img            = $_FILES['image']['name'];
            $img_tmp        =$_FILES['image']['tmp_name'];

            if($password == $repassword ){
                //encrypted passwored
                $hassedPass = sha1($password);

                //image file name change and move

                $random_number = rand(0,100000);
                $imagefile = $random_number.$img;

                move_uploaded_file($img_tmp,"dist/img/users/" . $imagefile);

                $sql = "INSERT INTO users ( name, username, password, email , address,phone,role, img ) VALUES ('$name','$username',' $hassedPass','$email','$address',' $phone',' $role','$imagefile')";

                $registerUser = mysqli_query($db,$sql);

                if($registerUser){
                    header ("Location: users.php?do=management");
                }
                else{
                    die("Query Filed" . mysqli_error($db));
                }


            }
          }
           
        }
        else if( $do == "edit"){
          
            if(isset($_GET['id'])){

                $the_edit_id = $_GET['id'];
                $sql = "SELECT * FROM users WHERE id ='$the_edit_id'";
                $the_user = mysqli_query($db,$sql);

                while( $row = mysqli_fetch_assoc( $the_user) ){
                    $edit_id        = $row['id'];
                    $name      = $row['name'];
                    $username  = $row['username'];
                    $email     = $row['email'];
                   
                    $phone     = $row['phone'];
                    $address   = $row['address'];
                    $role      = $row['role'];
                    $img       = $row['img'];
                    ?>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-12">
                       <div class="card card-success">
                           <div class="card-header">
                               <h3>Edit information Here</h3>
                           </div>
                           <div class="card-body">
                               <form action="users.php?do=update" method="POST" enctype="multipart/form-data">

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="">User Name</label>
                                              <input type="text" class="form-control" name="username" autocomplete="off" value = " <?php echo $username; ?>" readonly >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Full Name</label>
                                              <input type="text" class="form-control" name="name" autocomplete="off" value = " <?php echo $name; ?>"  >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Email Address</label>
                                              <input type="email" class="form-control" name="email" autocomplete="off" value = " <?php echo $email; ?>"  >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Phone</label>
                                              <input type="text" class="form-control" name="phone" autocomplete="off" value = " <?php echo $phone; ?>" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Address</label>
                                              <input type="text" class="form-control" name="address" autocomplete="off" value = " <?php echo $address; ?>">
                                          </div>

                                      </div>
                                      <div class="col-md-6">

                                         <div class="form-group">
                                              <label for="">Password</label>
                                              <input type="text" class="form-control" name="password"   autocomplete="off" placeholder="Enter Your New Password" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">Retype password</label>
                                              <input type="text" class="form-control" name=" repassword"   autocomplete="off" placeholder="Enter Your Retype Password" >
                                          </div>

                                          <div class="form-group">
                                              <label for="">User Role</label>
                                              <select class="form-control" name="role" id="">
                                                  <option value="0">Plz select user role</option>
                                                  <option value="1" <?php if( $role==1 ){ echo "selected";} ?>>Super Admin</option>
                                                  <option value="2" <?php if( $role==2 ){ echo "selected";} ?>>Editor</option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label for="">Upload User Avatar Image</label>
                                               <?php
                                                 if(!empty($img)){
                                                    ?>
                                                    <img src="dist/img/users/<?php echo $img; ?>" alt="" style=" width: 75px; display:block;" >

                                                    <?php
                                                 }
                                                 else{
                                                    ?>
                                                    <img src="dist/img/users/default.jpg" alt="" style=" width: 75px; display:block;" >

                                                    <?php
                                                 }
                                               ?>

                                              <input type="file" class="form-control-file" name="image"  >
                                          </div>

                                          <div class="form-group">
                                          <input type="hidden" name="update" value="<?php echo $edit_id; ?>" >
                                              <input type="submit" class="btn btn-primary" value="update user info" name="save"  >
                                          </div>

                                         


                                      </div>
                                  </div>
                               </form>
                           </div>
                       </div>
                    </div>
                    </div>
                </div>
            </section>

                    <?php
                }
            }
        }
        else if( $do == "update"){

           
            if(isset($_POST['update'])){
               $the_update_id = $_POST['update'];
               $name         = $_POST['name'];
               $email        = $_POST['email'];
               $phone        = $_POST['phone'];
               $address     = $_POST['address'];
                $password    = $_POST['password'];
                $repassword  = $_POST['repassword'];
                $role        = $_POST['role'];

                $img            = $_FILES['image']['name'];
                $img_tmp        =$_FILES['image']['tmp_name'];

                //update password code here

              

                if( !empty($password)){

                    if($password == $repassword ){
                        //encrypted passwored
                        $hassedPass = sha1($password);
                        $sql = " UPDATE users SET password = ' $hassedPass' WHERE id = ' $the_update_id'";
    
                        $update_pass = mysqli_query($db,$sql);

                        
                    }
                    
                }

               
               
               //update image code here

               if(!empty($img)){

                //delet img from folder
                $the_delet_id = $_GET['deletuser'];

                $sql = "SELECT * FROM users WHERE id = '$the_delet_id'";
                $del_user = mysqli_query($db,$sql);

                while( $row = mysqli_fetch_assoc( $del_user)){
                    $user_img = $row['img']; 
                }

                unlink ("dist/img/users/$user_img");

                //img file name and random number

                $the_img_rand = rand(0,100000);
                $imagefile = $the_img_rand.$img;

                move_uploaded_file($img_tmp,"dist/img/users/" . $imagefile);

                $sql ="UPDATE users SET name = '$name', email = '$email', phone ='$phone', address = '$address', role ='$role', img =  '$imagefile' WHERE id = ' $the_update_id'";

                $update_info = mysqli_query($db,$sql);
                if( $update_info){
                    header("location:users.php?do=management");
                }
                else{
                    die("QUERY filed " . mysqli_error($db));
                }

               }
               else{
                $sql ="UPDATE users SET name = '$name', email = '$email',phone ='$phone', address = '$address', role ='$role' WHERE id = ' $the_update_id'";

                $update_info = mysqli_query($db,$sql);
                if( $update_info){
                    header("location:users.php?do=management");
                }
                else{
                    die("QUERY filed " . mysqli_error($db));
                }
               }
            }
        }
        else if( $do == "delet"){
           if(isset($_GET['deletuser'])){
            $the_delet_id = $_GET['deletuser'];

            $sql = "SELECT * FROM users WHERE id = '$the_delet_id'";
            $del_user = mysqli_query($db,$sql);

            while( $row = mysqli_fetch_assoc( $del_user)){
                $user_img = $row['img']; 
            }

            unlink ("dist/img/users/$user_img");

            //delet users from database

            $delet_data = "DELETE FROM users WHERE id = '$the_delet_id'";
            $del_the_user = mysqli_query($db,$delet_data);

            if($del_the_user){
                header("location:users.php?do=management");

            }
            else{
                die("QUERY filed" .mysqli_error($db));
            }

           }
        }
     
   ?>


      <!-- Main content -->
      <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-12">
              <h1>Your content goes here</h1>
          </div>
        </div>
      </div>
      </section> -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "include/footer.php";?>