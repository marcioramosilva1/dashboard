
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
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!---Add new catagories start-->
        <div class="row">
           <div class="col-lg-6 col-12">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add new catagories</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 <div class="card-body"> 

                 <form action="" method="post" >
                   <div class="form-group">
                    <label for="exampleInputEmail1">Catagory name</label>
                    <input type="text" class="form-control" autocomplete="off" required="required" name="name" >
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Catagory Discription</label>
                    <textarea name="description" class="form-control" cols="10" rows="4"></textarea>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Catagory status[active/inactive]</label>
                    <select  class="form-control" name="status">
                      <option value="0">Inactive</option>
                      <option value="1">Active</option>
                    </select>
                   </div>

                   <div class="form-group">
                    <input type="submit" name=" submit" class="btn btn-primary btn-sm" value="add new catagory" >
                   </div>


                 </form>
                  
                 <?php
                   if(isset($_POST['submit'])){

                    $name        = $_POST['name'];
                    $description = $_POST['description'];
                    $status      = $_POST['status'];

                    $sql = "INSERT INTO catagories( cat_name,cat_disc, cat_status ) VALUES('$name','$description','$status') ";

                    $add_cat = mysqli_query($db,$sql);

                    if($add_cat){
                      header("location:catagory.php");
                    }
                    else{
                      die("Query filed" . mysqli_error($db));
                    }


                   }
                 ?>

                 </div>
                 <!---cardbody--->

             </div>

            
             <?php 
              // edit catagory php code start

               if(isset( $_GET['edit'] )){

                $the_edit_id = $_GET['edit'];
                $sql = "SELECT * FROM catagories WHERE cat_id =  ' $the_edit_id '";
                $selected_cat = mysqli_query($db , $sql);

                while( $row = mysqli_fetch_assoc($selected_cat)){

                  $cat_id     = $row['cat_id'];
                  $cat_name   = $row['cat_name'];
                  $cat_disc   = $row['cat_disc'];
                  $cat_status = $row['cat_status'];

                  ?>
                   <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit  catagories</h3>
                  </div>
                  <!-- /.card-header -->
                  <!--edit catagory form start -->
                 <div class="card-body"> 

                 <form action="" method="post" >
                   <div class="form-group">
                    <label for="exampleInputEmail1">Catagory name</label>
                    <input type="text" class="form-control" autocomplete="off" required="required" name="name" value = "<?php echo $cat_name ;?>" >
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Catagory Discription</label>
                    <textarea name="description" class="form-control" cols="10" rows="4" ><?php echo $cat_disc ;?></textarea>
                   </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Catagory status[active/inactive]</label>
                    <select  class="form-control" name="status">
                      <option value="0" <?php if( $cat_status== 0){ 
                        echo "selected";}?>>Inactive</option>
                      <option value="1" <?php if( $cat_status== 1){ 
                        echo "selected";}?> >Active</option>
                    </select>
                   </div>

                   <div class="form-group">
                    <input type="submit" name="Update" class="btn btn-primary btn-sm" value="updatee" >
                   </div>


                 </form>

                 <?php  
                   if(isset($_POST['Update'])){
                    $name        = $_POST['name'];
                    $description = $_POST['description'];
                    $status      = $_POST['status'];

                    $sql = "UPDATE catagories SET cat_name = ' $name'  , cat_disc = ' $description'  ,cat_status = ' $status' WHERE cat_id = ' $the_edit_id' " ;

                    $update_cat = mysqli_query($db,$sql);

                    if($update_cat){
                      header("location:catagory.php");
                    }
                    else{
                      die("Query filed" . mysqli_error($db));
                    }

                   }
                 
                 ?>
               </div>
               <!-- edit catagory cardbody -->
             </div>

                  <?php

                }
               }
               
             ?>


           </div>

           <!--Add new catagories end--->

           <!--All catagories start--->

           <div class="col-lg-6 col-12">
              <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">All catagories</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 <div class="card-body">
                 <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">S1</th>
                          <th scope="col">Cat Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                        //catagory information form table
                        $sql = "SELECT * FROM catagories ";
                        $all_cat = mysqli_query($db,$sql);
                        $i=0;


                        while( $row =mysqli_fetch_assoc($all_cat)){
                          $cat_id     = $row['cat_id'];
                          $cat_name   = $row['cat_name'];
                          $cat_disc   = $row['cat_disc'];
                          $cat_status = $row['cat_status'];
                          $i++;

                          ?>
                        <tr>
                          <th scope="row"><?php echo "$i"; ?> </th>
                          <td><?php echo "$cat_name"; ?></td>
                          <td>
                             <?php
                              if($cat_status ==1){
                                echo '<div class="badge badge-success">Active</div>';
                              }
                              else{
                                echo '<div class="badge badge-danger">Inactive</div>';
                              }

                             ?>
                            
                          </td>
                          <td>
                            <div class="btn-group">
                              <a href="catagory.php?edit= 
                              
                              <?php echo $cat_id;?>" >
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="" data-toggle="modal" data-target="#delet<?php echo $cat_id;?>">
                                <i class="fas fa-trash" ></i>
                              </a>
                              <!-- delet code start here -->

                              <div class="modal fade" id="delet<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you delet this catagory?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <a href="catagory.php?delet=<?php echo $cat_id;?>" class="btn btn-danger" >YES</a>
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

                <!-- delet code start here -->
                <?php 
                  if(isset($_GET['delet'])){
                    $the_delet_id = $_GET['delet'];
                    $sql = " DELETE  FROM catagories WHERE cat_id =  ' $the_delet_id '";
                    $delet_cat = mysqli_query($db , $sql);

                    if($delet_cat){
                      header("location:catagory.php");
                    }
                    else{
                      die("Query filed" . mysqli_error($db));
                    }
                   }

                   
                ?>


             </div>
           </div>

            <!--All catagories end--->

         </div>
      </div>
     </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include "include/footer.php";?>