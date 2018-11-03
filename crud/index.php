<?php

include("action.php");


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="jumbotron"> 
        <h1 class="text-center">Php Object Oriented CRUD functionalities.</h1>
     </div>
   <div class="container">
     <div class="row">
      <div class="col-md-6">  
        <div class="card">
          <div class="card-header">
            Data Input
          </div>
          <div class="card-body">


      <!-- Update form section -->

          <?php
            if(isset($_GET['update'])){

              $id = $_GET['id'] ?? null;

              $where = array("id"=>$id);

             $row= $obj -> select_record('user',$where);
              
              ?>
             <form method="POST" action="action.php">
                  <table class="table">

                   <tr>
                      <td><input type="hidden"  name="id" value="<?php echo $id;?>" ></td>
                    </tr>
                    <tr>
                      <td>First Name</td>
                      <td><input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'];?>" required></td>
                    </tr>
                    <tr>
                      <td>Enter Last Name</td>
                      <td><input type="text" class="form-control" value="<?php echo $row['Last_name'];?>" name="last_name"  required></td>
                    </tr>
                    <tr>
                      <td>Emploment Status</td>
                      <td>
                        <Select name="status" class="form-control">
                          <option value="Unemployed">Unemployed</option>
                          <option value="Employed">Employed</option>
                        </select>
                    </tr>
                    <tr>
                      <td colspan="2"><input type="submit" class="form-control btn btn-info" name="update" value="update" ></td>
                    </tr>

                  </table>
                </form>


             <?php
            }
            
            // Save form section 
            else{
              ?>
                  <form method="POST" action="action.php">
                    <table class="table">
                      <tr>
                        <td>First Name</td>
                        <td><input type="text" class="form-control" name="first_name"  placeholder="Enter First Name" required></td>
                      </tr>
                      <tr>
                        <td>Enter Last Name</td>
                        <td><input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required></td>
                      </tr>
                      <tr>
                        <td>Emploment Status</td>
                        <td>
                          <Select name="status" class="form-control">
                            <option value="Unemployed">Unemployed</option>
                            <option value="Employed">Employed</option>
                          </select>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="submit" class="form-control btn btn-primary" name="submit" value="submit" ></td>
                      </tr>

                    </table>
                  </form>              
              
              
              <?php
            }




          ?>
            
          </div>
        </div>
      </div>   
      <div class="col-md-6"> 
      <table class="table table-border">
             <th>S/N</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Status</th>
             <th>Action</th>
            

             <?php
              $myrow = $obj ->fetch_record("user");
              foreach($myrow as $row){
                ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['Last_name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="index.php?update=1&id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">Update</a>
                          <a href="action.php?delete=1&id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </td>
                    <td></td>
                  </tr>
                <?php
              }         


            ?>
             
           </table> 
      </div>      
     </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>