<?php 
include ('profile-head.php'); 
include ('navbar.php'); 
?>


<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
             
              <a href="profile.php" class="panel-title"><?php echo $_SESSION['username']; ?></a>
              <a href="edit-profile.php" class="panel-title pull-right">Edit Profile</a>
              
            </div>
   
            <div class="panel-body">
              <div class="row">
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src= <?php 
                    if ($_SESSION['img']!=null) {
                      echo "images/profile/".$_SESSION['img'];
                    }
                    else {
                      echo "images/default-profile.png";
                    }
                ?> class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                <?php include('errors.php'); ?>
                  <table class="table table-user-information">
                  <form method="post" action="edit-profile.php"  enctype="multipart/form-data" >

                    <tbody>
                        <tr>
                            <td>
                            Upload Profile Photo:
                            </td>
                            <td>
                            <input type="file" name="img" >
                            </td>
                        </tr>
                        <tr>
                            <td>User Name:</td>
                            <td>
                            <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Password:</td>
                            <td>
                            <input type="password" name="password1" >
                            </td>
                        </tr>

                        <tr>
                            <td>Confirm Password:</td>
                            <td>
                            <input type="password" name="password2" >
                            </td>
                        </tr>

                      <tr>
                        <td>First Name:</td>
                        <td>
                        <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                        </td>
                      </tr>

                        <tr>
                            <td>Last Name:</td>
                            <td>
                            <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
                            </td>
                        </tr>

                      <tr>
                        <td>Profession:</td>
                        <td>
                            <input type="text" name="profession" value="<?php echo $_SESSION['profession']; ?>">                        
                        </td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>
                            <input type="date" name="birthdate"  > 
                        </td>
                      </tr>
                                        
                      <tr>
                        <td>Gender</td>
                        <td>
                            <input type="text" name="gender" value="<?php echo $_SESSION['gender']; ?>"> 
                        </td>
                      </tr>
                      <tr>
                        <td>Home Address</td>
                        <td>
                            <input type="text" name="location" value="<?php echo $_SESSION['location'] ?>">   
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>">                        
                        </td>
                      </tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="mobile" value="<?php echo $_SESSION['mobile']; ?>">
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  <!--  <button type="submit" name="update" class="btn btn-primary">Update</button> -->
                    <input type="submit" id="submit-form" name="update" class="hidden" />
                    </form>
                  </table>
                    
                  <label class="btn btn-primary" for="submit-form" tabindex="0">Update</label>          
                  <!-- <a href="#" class="btn btn-primary">Entries</a> -->
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit-profile.php" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>

<?php include ('footer.php') ?>