<!-- Design By : Munira
Develop By : fkhrl -->
<?php 
    include_once'cms-admin/class/db_Class.php';
    $obj= new db_Class();
    

 ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CITI Application</title>

        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/app.css"/>




<script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
<?php include_once'include/header.php';?>
        <!--    header section end here    -->

        <section class="product-header">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">

                    <div class="pro-head small-full medium-12 large-12 cell ">
                        <h3><strong>CONTACT & LOCATION</strong></h3>
                    </div>

                </div>

            </div>

        </section>

        <section class="blog-part">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">

                    <div class="small-full medium-6 large-6 cell">

                        <div class="small-full medium-3 large-3 cell">
                            <span><strong><i class="fa fa-mobile-phone" aria-hidden="true"></i>  <?= $site_basic_info[0]->phone ?></strong></span> 
                        </div>
                        
                        <div class="small-full medium-3 large-3 cell">
                            
                            <span>
                                <strong><i class="fa fa-home" aria-hidden="true"></i> <?= html_entity_decode($site_basic_info[0]->address); ?>
                                </strong>
                            </span>
                        </div>
                        
                        <div class="small-full medium-3 large-3 cell"> 
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span><strong>Email:  <a href="mailto:<?= $site_basic_info[0]->email ?>"><?= $site_basic_info[0]->email ?></a>(enquiry only by email)</strong></span>
                        </div>
                        
                        <div class="small-full medium-3 large-3  cell">
                             <span><i class="fa fa-skype" aria-hidden="true"></i> Skype: <?= $site_basic_info[0]->skype ?></span> 
                        </div>
                        <div class="small-full medium-3 large-3  cell">
                             <img src="images/QR.png" alt="QB"> 
                        </div>
                    </div>
                    <div class="small-full medium-6 large-6 cell">

                      

                            <div class="grid-container card-divider">

                                <div class="input-group-field">
                                    <h4>Enquiry From</h4>
                                    <?php 
                                        if(isset($_POST['submit'])) {
                                            //print_r($_POST['submit']);
                                                $fname = $_POST['fname'];
                                                $lname = $_POST['lname'];
                                                $email = $_POST['email'];
                                                $phone = $_POST['phone'];
                                                $message = $_POST['message'];
                                        //shaiful1408@gmail.com
                                                    $to      = 'shaiful1408@gmail.com';
                                                    $subject = 'Citi Application new request information';
                                                    // $message = 'Name:    '.$fname. ' '.$lname."\r\n";
                                                    // $message.= 'Phone:   '.$phone. "\r\n";
                                                    // $message.= 'Message: '.$message. "\r\n";





$message = '<html><body>';
            $message .= '<h2>Citi Website</h2>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
            $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
            $message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";



                                                   
                                                    $headers .= "From: Citi" . "\r\n";
                                                    $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                                                       $mail= mail($to, $subject, $message, $headers);

                                            }
                                            if(@$mail==1)
                                            {
                                                echo '<h4 class="hollow button success" style="color:#000;">Your message has been sent successfully. Thanks</h4>
                                                ';
                                            }
                                    ?>
                                    <form action="" method="post" id="form">
                                        
                                    <div class="small-full medium-8 large-8">

                                        <input type="text" name="name" placeholder="Your name" required>

                                    </div>
                                    <div class="small-full medium-8 large-8">

                                        <input type="email" name="email" placeholder="Your Email Address" required>

                                    </div>
                                    <div class="small-full medium-8 large-8">

                                        <input type="text" name="phone" placeholder="Your Phone Number" required>

                                    </div>
                                    <div class="small-full medium-8 large-8">

                                        <textarea rows="4" cols="50" name="message" placeholder="Type Your Message here..." required></textarea>

                                    </div>
                                    <div class="small-full medium-8 large-8">
                                        <div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6Lf0fTMUAAAAAKooCcK7-cbrpQquDHn_ngPUT0te"></div>
                                    </div><br>
                                    <div class="small-full medium-8 large-8">
                                        <input  class="button expanded" type="submit" name="submit" value="Submit">
                                    </div>
                                 </form>
                                    
                                </div>
                            </div>
                            









                    </div>   


                </div>
            </div>
        </section>


        <section class="map">
            <div class="grid-container">
                <div class="hipe_solid_row">
                    <span class="headline_3">CT International Google location map </span><br><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2392.4072461473957!2d-2.321249884168698!3d53.1567318799398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a5a35cbc1bfe3%3A0x815e565ad69491b9!2sCT+International!5e0!3m2!1sen!2s!4v1493154008218" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>


        <!--footer section start here-->
        <?php include_once'include/footer.php';?>
    <!--footer section end here-->


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.min.js"></script>
    <script>
        $(document).foundation();
        $(window).load(function () {
            $('#slider').orbit();
        });
    </script>

    <!--    robot js-->
    <script type="text/javascript">
        function scaleCaptcha(elementWidth) {
            // Width of the reCAPTCHA element, in pixels
            var reCaptchaWidth = 304;
            // Get the containing element's width
            var containerWidth = $('.container').width();

            // Only scale the reCAPTCHA if it won't fit
            // inside the container
            if (reCaptchaWidth > containerWidth) {
                // Calculate the scale
                var captchaScale = containerWidth / reCaptchaWidth;
                // Apply the transformation
                $('.g-recaptcha').css({
                    'transform': 'scale(' + captchaScale + ')'
                });
            }
        }

        $(function () {

            // Initialize scaling
            scaleCaptcha();

            // Update scaling on window resize
            // Uses jQuery throttle plugin to limit strain on the browser
            $(window).resize($.throttle(100, scaleCaptcha));

        });</script>
<script type="text/javascript">
    $("#form").submit(function(event) {

   var recaptcha = $("#g-recaptcha-response").val();
   if (recaptcha === "") {
      event.preventDefault();
      alert("Please check the recaptcha");
   }
});
</script>
</body>

</html>