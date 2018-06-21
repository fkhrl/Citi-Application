<section class="fullscreen-image">

            <div class="grid-container">
                <div class="row grid-x grid-container align-center">


                    <div class="small-full medium-8 large-8">
                        <h1>SEND YOUR REQUEST</h1>
                        <p class="lead">
                            <strong>We will get in touch with you as soon as possible</strong> 

                        </p>

                    </div>
                    <div class="small-full medium-4 large-4  contact-btn">
                        <a class=" hollow button success large" href="contact.php">Contact  us</a>
                    </div>


                </div>

            </div>



        </section>
        <section class="footer">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">



                    <div class="small-full medium-3 large-3 ">
                        <div class="link-column1">
                            <h4>Navigation</h4>              

                            <ul class="menu vertical">

                                <li><a href="index.php"><strong>Home</strong></a></li>
                                <li><a href="about.php"><strong>About Us</strong></a></li>
                                <li><a href="products.php"><strong>Produces</strong></a></li>
                                <li><a href="contact.php"><strong>contact & location</strong></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="small-full medium-3 large-3" >
                        <div class="link-column1">
                            <h4>CONTACT US</h4>
                            <ul class="menu vertical" style="color: #5e5e5e;">
                                <li><strong>TEL : </strong> <?= $site_basic_info[0]->phone ?></li>
                                <li><strong>Email :</strong> <?= $site_basic_info[0]->email ?></li>
                                <li><strong>Skype :</strong> <?= $site_basic_info[0]->skype ?></li>
                                <li><strong>Address :</strong><?= html_entity_decode($site_basic_info[0]->address); ?></li>
                            </ul>
                        </div>


                    </div>

                    <div class="small-full medium-6 large-6">
                        <div class="link-column1">
                            <h4 class="grid-x  large-offset-1">QUICK ENQUERIY</h4>
                             <?php 
                                        if(isset($_POST['submits'])) {
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
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['fname']) . ' '. strip_tags($_POST['lname']) . "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
            $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
            $message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";



                                                   
                                                    @$headers .= "From: Citi" . "\r\n";
                                                    $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                                                       $mail= mail($to, $subject, $message, $headers);

                                            }
                                            if(@$mail==1)
                                            {
                                               ?>
                                               <script type="text/javascript">
                                                   alert('Your message has been sent successfully. Thanks');
                                               </script>
                                               
                                                ';
                                                <?php
                                            }
                                    ?>
                                    <!-- <img src="../images/logo.png" alt="placeholder+image"> -->
                            <form action="" method="post">

                                <div class="grid-x  large-offset-1">
                                    <div class="small-full medium-6 large-6" >
                                        <div class="small-full medium-3 large-3">
                                            <input type="text" name="fname" placeholder="FIRST NAME" aria-describedby="exampleHelpText">
                                        </div>

                                        <div class="small-full medium-3 large-3">
                                            <input type="text" placeholder="LAST NAME" name="lname" aria-describedby="exampleHelpText">
                                        </div>
                                    </div>

                                    <div class="small-full medium-6 large-6">
                                        <div class="small-full medium-3 large-3">
                                            <input type="text" placeholder="EMAIL" name="email" aria-describedby="exampleHelpText">
                                        </div>
                                        <div class="small-full medium-3 large-3">
                                            <input type="text" placeholder="PHONE NUMBER" name="phone" aria-describedby="exampleHelpText">
                                        </div>
                                    </div>

                                    <div class="small-full medium-12 large-12">
                                        <textarea rows="3" cols="10" name="message" placeholder="MESSAGE" aria-describedby="exampleHelpText"></textarea>
                                    </div>

                                </div>
                                <div class="small-full medium-12 large-12">
                                        <div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6Lf0fTMUAAAAAKooCcK7-cbrpQquDHn_ngPUT0te"></div>
                                    </div>
                                <div class="small-full medium-8 large-8  large-offset-1">
                                    <input  class="button" type="submit" name="submits" value="Submit">


                                </div>

                            </form>
                        </div>
                    </div>


<style type="text/css">
    textarea:focus { 
    background-color: #fff !important;

}
</style>





                </div>

            </div>

        </div>


    </section>
    <section class="footer-bootm">

        <div class="grid-container">
            <div class="row grid-x grid-margin-x grid-container">

                <div class="small-full medium-6 large-6 left align-left">
                    Copyright &COPY; <?= date('Y') ?> http://www.citiworldtrade.com. All rights reseverd
                </div>
                <div class="small-full medium-6 large-6 right align-right" style="text-align: right;">
                    Develop By : <a target="blank" href="http://www.skeletonit.com/">SkeletonIt</a>
                </div>


            </div>
        </div>



    </section>