<?php include 'inc/header.php'; ?>
	<!-- Internal Page Header -->
	<div class="internal-page-title about-page" data-parallax="scroll" data-image-src="../assets/img/contact-header.jpg">
		<h1><span>Contact</span> us</h1>
		<ol class="breadcrumb"><!-- Internal Page Breadcrumb -->
            <li><a href="">Home</a></li>
            <li class="active">Contact Us</li>
        </ol>
	</div>
	<!-- End of Internal Page Header -->
	
	<!-- Contact Page Container -->
	<div class="contact-page-container container">

		<!-- Contact Info -->
		<div class="contact-info-main-box clearfix">
			<div class="contact-info-box col-md-4">
				<div class="inner-content">
					<i class="fa fa-envelope-o"></i><div class="info">info@pinar.com</div>
				</div>
			</div>
			<div class="contact-info-box col-md-4">
				<div class="inner-content">
					<i class="fa fa-phone"></i><div class="info">0185 26 37 48 59</div>
				</div>
			</div>
			<div class="contact-info-box col-md-4">
				<div class="inner-content">
					<i class="fa fa-map-marker "></i><div class="info">133 Elizabethstreet, Sydney 4000, Australia</div>
				</div>
			</div>
		</div>

		<!-- Contact Form -->
		<div class="contact-form-container">
			<div class="how-contact col-md-4">
				<div class="title"><b>How</b> to contact</div>
				<div class="desc">
					Some description about that how the users of website can contact to you. Also you can add some description about the reply process and how much time it takes that your staff will reply the message.
				</div>
			</div>
			<div class="contact-form-box col-md-8">
				<?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $fm->validation($_POST['name']);
                    $email = $fm->validation($_POST['email']);
                    $subject = $fm->validation($_POST['subject']);
                    $message = $fm->validation($_POST['message']);

                    $name = mysqli_real_escape_string($db->link, $name);
                    $email = mysqli_real_escape_string($db->link, $email);
                    $subject = mysqli_real_escape_string($db->link, $subject);
                    $message = mysqli_real_escape_string($db->link, $message);

                    if ($name == "" || $email == "" || $subject == "" || $message == "") {
                        echo"<span style='color:red;'>Field must not be Empty!</span>";
                    }
                    else{
                       
                        $query = "INSERT INTO  tbl_contact(name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')";
                        $contactinsert = $db->insert($query);

                        if ($contactinsert) {
                            echo"<span style='color:green;'>Your Mail Send Successfully</span>";
                        }else {
                             echo"<span style='color:red;'>Your Mail Not Send</span>";
                        }
                    }
                  }
               ?>

				<form class="contact-form clearfix">
					<div class="col-md-6">
						<input type="text" name="name" placeholder="Full Name :">
						<input type="email" name="email" placeholder="Email :">
						<input type="text" name="subject" placeholder="Subject :">
					</div>
					<div class="col-md-6">
						<textarea name="message" placeholder="Your Message : "></textarea>
					</div>
					<div class="submit-container">
						<input type="submit" value="Submit" class="btn btn-default">
					</div>
				</form>


			</div>
		</div>

	</div>
	<!-- End of Contact Page Container -->

	<?php include 'inc/footer.php'; ?>