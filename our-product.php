<!-- Design By : Munira
Develop By : fkhrl -->
<?php 
    include_once'cms-admin/class/db_Class.php';
    $obj= new db_Class();
    $filter = $_GET['product'];
    $our_products = $obj->FlyQuery("SELECT * FROM our_products where id='".$filter."'");          
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





    </head>
    <body>

        <?php include_once'include/header.php';?>
        <!--    header section end here    -->

        <section class="product-header">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">

                    <div class="pro-head small-full medium-12 large-12 cell ">
                        <h3><strong>Our Product</strong></h3>
                    </div>

                </div>

            </div>

        </section>

        <section class="blog-part">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">


                    <div class="small-full medium-12 large-12 cell content-middle grid-container">

                        <p class="align-center text-left text-truncate">
                            <?= $our_products[0]->long_details; ?>

                        </p>




                    </div>   


                </div>
            </div>
        </section>


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

</body>

</html>