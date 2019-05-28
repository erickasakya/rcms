<?php
 require 'header.php';
?>
   <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Edit Your Profile</h2>
        <div class="graph">
<div class="row">
    <div class="col-md-8">
   <div class="content">

<?php

     if (isset($_POST['UserName'])) {
        $UserName=sqlInjections($_POST['UserName']);
        $Oldpaswd=sqlInjections($_POST['Oldpaswd']);
        $Newpaswd=sqlInjections($_POST['Newpaswd']);
        $Newpaswdagain=sqlInjections($_POST['Newpaswdagain']);

        if (!empty($UserName) && !empty($Oldpaswd) && !empty($Newpaswd) && !empty($Newpaswdagain)) {
            
            $curentpaswd=getuserfield('password');
            $Oldpaswdhash=md5($Oldpaswd);
            if ($curentpaswd==$Oldpaswdhash) {
                
                if ($Newpaswd==$Newpaswdagain) {

                    $query="UPDATE users SET password='".md5($Newpaswd)."' WHERE userID='".$_SESSION['RCMS_user_id']."'";
                    if (mysqli_query($link,$query)) {
                        $Message="Password successfully changed";
                        $staffID=getuserInfo('staffID','staff','email',$UserName);
                        $today=time();
                        $notifymessage="You have changed your password today ".$today." if you haven't done so, Please contact the system administrator of the RCMS";
                        notifyPasswordchange($UserName,$notifymessage,$staffID,"staff");
                    }else{
                        $errorMessage="System couldn't update your password, contact the system Admin";
                    }
                }else{
                    $errorMessage="New passwords don't match, Try again";
                }
            }else{
                $errorMessage="Old password given is incorrect, Try again";
            }
        }else{
            $errorMessage="Please fill in all password fields";
        }
     }
    ?>
    <form class="form" data-toggle="validator" action="" method="POST">
            <h3 class="title3">Change Password</h3>
                <div class="row">
        <?php
         if (isset($errorMessage)) {
          ?>
          <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $errorMessage;?></div>
          <?php                    
         }elseif(isset($Message)) {
           ?>
          <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $Message;?></div>
          <?php
                 }
                  ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" readonly class="form-control" placeholder="Username" name="UserName" required value="<?php echo $Lectureremail;?>" >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Old password</label>
                            <input type="password" class="form-control" placeholder="Old password" name="Oldpaswd" autofocus required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" class="form-control" placeholder="New password" name="Newpaswd" id="Newpaswd" data-minlength="4" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Re-type Password</label>
                            <input type="password" class="form-control" placeholder="new password" name="Newpaswdagain" required data-match="#Newpaswd" data-match-error="Whoops, the passwords don't match">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-fill pull-right">Update Profile</button>
                <div class="clearfix"></div>
            </form>
        </div>
</div>
<!-- Uploading the picture -->
<div class="col-md-4">
<div class="card card-user">
    <div class="image">
        <h3 class="title3">Change profile picture</h3>
    </div>
    <div class="content">
        <div class="author">
             <a href="#">
            <img class="avatar border-gray down" src="<?php if(!empty($profilepic)){ echo $profilepic=getuserfield('profilepic');}else{ echo '../images/tim_vector.jpe';}?>" alt="profile picture"/>
              <h4 class="title">
              <?php echo ucfirst($Lecturerfname." ".$Lecturerlname);?><br />
              </h4>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php
          if (isset($_FILES['image'])) {
            $tmp_location = $_FILES['image']['tmp_name'];
            $image_name =$_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $location = "../images/".$_FILES['image']['name'];
            $extension=strtolower(trim(end(explode('.', $image_name))));
            if (empty($image_name)) {
              $message="Please choose an image for your profile";
            }elseif($extension!='jpg' && $extension!='jpeg' && $extension!='png'){
              $errormessage="Please upload only an image";
            }elseif ($image_size>2097152) {
              $errormessage="Please upload an image less than 2mb";
            } else{
            move_uploaded_file($tmp_location, $location);
            $query=mysqli_query($link,"UPDATE users SET profilepic='$location' WHERE userID=".$_SESSION['RCMS_user_id']);
            if($query){
              $message="Profile picture updated successfully, please refresh";
            }else{
              $errormessage="Upload of you Profile picture failed";
            }
            }
        }
?>
          <form enctype="multipart/form-data" method="POST" action="">
          <?php
                if (isset($errormessage)) {
              ?>
              <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $errormessage;?>
              </div>

              <?php                    
                  }elseif(isset($message)) {
               ?>
                  <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $message;?>
                  </div>
                 <?php }?>
       <div class="form-group">
           <label>File Name</label>
           <input type="file" class="form-control" name="image" id="file" value="" required="required" title="">

        </div>
   <button type="submit" class="btn btn-success btn-fill pull-right">Upload</button>
   </form>
</div>
             
    </div>
    <hr>
</div>
</div>
</div><!-- closing the row div how the two profile changes -->
        
</div>
<?php
require("../footer.php");
?>