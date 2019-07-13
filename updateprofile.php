<?php include 'inc/header.php'; ?>
<?php
    $userid =Session::get('userId');

?>
	
	
	<!-- Contact Page Container -->
	<div class="contact-page-container container">

		<!-- Contact Form -->
		<div class="contact-form-container">
			<div class="contact-form-box col-md-8" style="padding: 50px 0;">
				
				<div class="user-profile" style="margin-top: 100px;">
            <?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $fm->validation($_POST['name']);
            $username = $fm->validation($_POST['username']);
            $email = $fm->validation($_POST['email']);
            $phone = $fm->validation($_POST['phone']);
            $password = md5($_POST['password']);
            $address = $fm->validation($_POST['address']);
            $zip = $fm->validation($_POST['zip']);
            $city = $fm->validation($_POST['city']);

            $name = mysqli_real_escape_string($db->link, $name);
            $username = mysqli_real_escape_string($db->link, $username);
            $email = mysqli_real_escape_string($db->link, $email);
            $phone = mysqli_real_escape_string($db->link, $phone);
            $password = mysqli_real_escape_string($db->link, $password);
            $address = mysqli_real_escape_string($db->link, $address);
            $zip = mysqli_real_escape_string($db->link, $zip);
            $city = mysqli_real_escape_string($db->link, $city);
            if (empty($name) || empty($username) || empty($email)  || empty($phone) || empty($password) || empty($address) || empty($zip) || empty($city) ) {
                echo"<span style='color:red;'>Field must not be Empty!</span>";
            }else{
                $query = "UPDATE tbl_user
                    SET
                     name = '$name',
                     username = '$username',
                     email = '$email',
                     phone = '$phone',
                     password = '$password',
                     address = '$address',
                     zip = '$zip',
                     city = '$city'
                    WHERE id ='$userid'";
                $update_user = $db->update($query);

                if ($update_user) {
                    echo"<span style='color:green;'>User Update Successfully</span>";
                }else {
                     echo"<span style='color:red;'>User not Update</span>";
                }
            }
          }
        ?>
			<?php
                $query = "SELECT * FROM tbl_user WHERE id ='$userid'";
                $getuser = $db->select($query);
                if ($getuser) {
                     while ($result = $getuser->fetch_assoc()) {

               ?>
				<div class="block">
                <form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
                    <div class="form-contact">
                        
                        <div class="form-contact-fields col-sm-8">
                            <label for="">Name</label>
                            <span class="wpcf7-form-control-wrap your-name">
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" size="40" class="wpcf7-form-control">
                            </span>
                        </div>
                        <div class="form-contact-fields col-sm-8">
                            <label for="">User Name</label>
                            <span class="wpcf7-form-control-wrap your-email">
                                <input type="test" name="username" value="<?php echo $result['username']; ?>" size="40" class="wpcf7-form-control">
                            </span>
                        </div>
                    
                        <div class="form-contact-fields col-sm-8">
                            <label for="">Email</label>
                            <span class="wpcf7-form-control-wrap your-subject">
                                <input type="email" name="email" value="<?php echo $result['email']; ?>" size="40" class="wpcf7-form-control">
                            </span>
                        </div>

                        <div class="form-contact-fields col-sm-8">
                            <label for="">Phone</label>
                            <span class="wpcf7-form-control-wrap your-subject">
                                <input type="text" name="phone" value="<?php echo $result['phone']; ?>" size="40" class="wpcf7-form-control">
                            </span>
                        </div>

                        <div class="form-contact-fields col-sm-8">
                            <label for="">Password</label>
                            <span class="wpcf7-form-control-wrap your-subject">
                                <input type="password" name="password" value="" size="40" class="wpcf7-form-control">
                            </span>
                        </div>
                
                        <div class="form-contact-fields col-sm-8">
                            <label for="">Address</label>
                            <span class="wpcf7-form-control-wrap your-message">
                                <textarea name="address" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"><?php echo $result['address']; ?></textarea>
                                 </span><br>
                        </div>
                        <div class="form-contact-fields col-sm-8">
                            <label for="">Zip Code</label>
                            <span class="wpcf7-form-control-wrap your-subject">
                                <input type="text" name="zip" value="<?php echo $result['zip']; ?>" size="40" class="wpcf7-form-control">
                            </span>
                        </div>
                        <div class="form-contact-fields col-sm-8">
                            <label for="">City</label>
                            <span class="wpcf7-form-control-wrap your-subject">
                                <input type="text" name="city" value="<?php echo $result['city']; ?>" size="40" class="wpcf7-form-control">
                            </span><br>
                            <input type="submit" value="Update" class="wpcf7-form-control wpcf7-submit">
                        </div>
                    </div>
                </form>
                </div>
             <?php } } ?>      
			</div>

			</div>
		</div>

	</div>
	<!-- End of Contact Page Container -->

	<?php include 'inc/footer.php'; ?>