<?php
 require 'header.php';
?>
   <div class="graph-visual tables-main animated fadeInRight" id="formcontent">
     <h2 class="inner-tittle">Secret Code Setting</h2>
        <div class="graph">
<div class="row">
    <div class="col-md-8">
   <div class="content">

<?php

     if (isset($_POST['currentpaswd'])) {
        $currentpaswd=sqlInjections($_POST['currentpaswd']);
        $Oldcode=sqlInjections($_POST['Oldcode']);
        $Newcode=sqlInjections($_POST['Newcode']);
        $Newcodeagain=sqlInjections($_POST['Newcodeagain']);

        if (!empty($currentpaswd) && !empty($Oldcode) && !empty($Newcode) && !empty($Newcodeagain)) {
            $code=1111;
            $dbpaswd=getuserfield('password');
            $currentpaswd=md5($currentpaswd);
            if ($dbpaswd==$currentpaswd) {
                
                $oldsecretcode=getuserfield('secret_code');
                $Oldcode=md5($Oldcode);
               if ($oldsecretcode==$Oldcode) {
                  if ($Newcode==$Newcodeagain) {

                    if ($Newcode!=$code) {
                      $query="UPDATE users SET secret_code='".md5($Newcode)."' WHERE userID='".$_SESSION['RCMS_user_id']."'";
                    if (mysqli_query($link,$query)) {
                        $Message="Secret Code successfully changed";
                        $UserName=getuserfield('username');
                        $staffID=getuserInfo('staffID','staff','email',$UserName);
                        $today=time();
                        $notifymessage="You have changed your secret code today ".$today." if you haven't done so, Please contact the system administrator of the RCMS";
                        notifyPasswordchange($UserName,$notifymessage,$staffID,"staff");
                    }else{
                        $errorMessage="System couldn't update your secret Code, contact the system Admin";
                    }
                    }else{
                      $errorMessage="The secret code choosen was used as the default, Choose another one";
                    }
                }else{
                    $errorMessage="New secret codes given don't match, Try again";
                }
               }else{
                $errorMessage="Old Secret Code given is incorrect, Try again";
               }
            }else{
                $errorMessage="Old password given is incorrect, Try again";
            }
        }else{
            $errorMessage="Please fill in all password fields";
        }
     }
    ?>
       <form class="form" data-toggle="validator" action="" method="POST" id="formsubmit">
            <h3 class="title3">Change the secret code</h3>
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
                            <label for="password">Current Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Current Password" name="currentpaswd" autofocus required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Old Secret Code</label>
                            <input type="password" class="form-control" placeholder="Old Secret Code" name="Oldcode" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New Secret Code</label>
                            <input type="password" class="form-control" placeholder="New Secret Code" name="Newcode" data-minlength="4" id="Newcode" required>
                            <div class="help-block">Minimum of 4 characters</div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Re-type Secret Code</label>
                            <input type="password" class="form-control" placeholder="new password" name="Newcodeagain" data-match="#Newcode" data-match-error="Whoops, the secret code don't match" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-fill pull-right">Update</button>
                <div class="clearfix"></div>
            </form>
        </div>
</div>
<!-- Uploading the picture -->
</div><!-- closing the row div how the two profile changes -->
        
</div>
<?php
require("../footer.php");
?>