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
              <a href="edit.html" class="panel-title pull-right">Edit Profile</a>
              
            </div>
   
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/default-profile.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>
                          <?php
                              
                              if ($_SESSION['name']==null) {
                                  echo "New User";
                              }
                              else {
                                  echo $_SESSION['name'];
                              }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Profession:</td>
                        <td>
                          <?php
                                if ($_SESSION['profession']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['profession'];
                                }
                          ?>                        
                        </td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>
                        <?php
                                if ($_SESSION['birthdate']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['birthdate'];
                                }
                          ?>
                        </td>
                      </tr>
                                        
                      <tr>
                        <td>Gender</td>
                        <td>
                          <?php
                                if ($_SESSION['gender']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['gender'];
                                }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Home Address</td>
                        <td>
                        <?php
                                if ($_SESSION['location']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['location'];
                                }
                          ?>  
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php
                                if ($_SESSION['email']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['email'];
                                }
                          ?>">
                        <?php
                                if ($_SESSION['email']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['email'];
                                }
                          ?>   
                        </a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>
                        <?php
                                if ($_SESSION['mobile']==null) {
                                    echo "Unknown";
                                }
                                else {
                                    echo $_SESSION['mobile'];
                                }
                          ?> 

                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">Entries</a>
                  <a href="#" class="btn btn-primary">Entries 2</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>

<?php include ('footer.php') ?>