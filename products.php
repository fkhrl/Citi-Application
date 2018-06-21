<!-- Design By : Munira
Develop By : fkhrl -->
<?php
    include_once'cms-admin/class/db_Class.php';
    $obj= new db_Class();
    @$filter = $_GET['product'];
    if(isset($_GET['product']))
    {
        $product_category_detail = $obj->FlyQuery("SELECT * FROM `product_category` where id='".$_GET['product']."'"); 
        $product_image = $obj->FlyQuery("SELECT * FROM `product` WHERE `product_category` = '".$_GET['product']."'");

    }
    $product_category = $obj->FlyQuery("SELECT * FROM `product_category` order by id asc");

    $product_img = $obj->FlyQuery("SELECT * FROM `product` WHERE `product_category` = '".$product_category[0]->id."'"); 

    
    
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
                        <h3><strong><?php 
                        if(isset($product_category_detail))
                        {
                            echo "Our Products | ".$product_category_detail[0]->name;
                        }
                        else
                        {
                            echo "Our Products| ".$product_category[0]->name;;
                        }
                         

                        ?></strong></h3>
                    </div>

                </div>

            </div>

        </section>

        <section class="blog-part">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">

                    <div class="small-full medium-3 large-3 cell">
                        <div class="row collapse">
                            <div class="medium-3 columns">
                `           <!-- <h2 class="hh2">Our Products</h2>
                                <ul class="vertical tabs" data-tabs id="example-tabs" >

                                    <?php 
                                
                                if(!empty($product_category))
                                {
                                    foreach ($product_category as $pro) {
                            ?>
                                    <li class="tabs-title"><a href="products.php?product=<?= $pro->id; ?>" aria-selected="true"><?= $pro->name; ?></a></li>
                                    <?php }}?>

                                </ul> -->
                                <style type="text/css">



/* Made By AllBlogTools.com */



#ddblueblockmenu{

border: 1px solid #000000; /*Main Border Color */

border-bottom-width: 0;

width: 100%;
margin-top: -20px;
margin-bottom: 10px;
}



#ddblueblockmenu ul{

margin: 0;

padding: 0;

list-style-type: none;

font: normal 100% 'Trebuchet MS', 'Lucida Grande', Arial, sans-serif;

}



#ddblueblockmenu a{

display: block;

padding: 10px 0;

padding-left: 9px;

width: 100%; /*94% minus all left/right paddings and margins*/

text-decoration: none;

color: #ffffff; /* Menu Font Color */

background-color: #2175bc; /*Menu background Color */

border-bottom: 1px solid #90bade; /*Bottom border color */

border-left: 7px solid #1958b7; /*Left border color */

list-style-type:none; 

}



* html #ddblueblockmenu a{ /*IE only */

width: 100%; /*IE 5*/

}



#ddblueblockmenu a:hover {

background-color: #2586d7; /*Menu background Color On Hover*/

border-left-color: #B73131; /*Left border color On Hover*/

}



#ddblueblockmenu div.menutitle{

color: #ffffff; /* Title Font Color */

border-bottom: 1px solid black;

padding: 10px 0;

padding-left: 5px;

background-color: #000000;  /*Menu Tite Background Color*/

font: bold 100% 'Trebuchet MS', 'Lucida Grande', Arial, sans-serif;
font-size: 20px;

}

/* Made By AllBlogTools.com */

</style>



<div id="ddblueblockmenu">



<div class="menutitle">Our Products</div>

<ul>
<?php 
                                
                                if(!empty($product_category))
                                {
                                    foreach ($product_category as $pro) {
                            ?>
<a href="products.php?product=<?= $pro->id; ?>" aria-selected="true"><?= $pro->name; ?></a>
<?php }}?>
</ul>
</div>
                            </div>
                            
                            

                        </div>

                    </div>
                    <div class="small-full medium-9 large-9 cell content-middle">
                        <?php 
                        if(isset($product_category_detail))
                        {
                            ?>
                            <div class="grid-x">
                                <div class="small-full medium-6 large-6">
                                <div class="column column-block card-top-img">
                                    <img src="cms-admin/upload/<?=$product_category_detail[0]->photo?>" alt="<?=$product_category_detail[0]->name?>">
                                    </div>
                                </div>
                                <div class="small-full  medium-6 large-6">
                                    <div class="column column-block card-top-img">
                                    <img   src="cms-admin/upload/<?=$product_category_detail[0]->photo_2?>" alt="<?=$product_category_detail[0]->name?>">
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                        ?>
                        <div class="grid-x">
                            <div class="small-full medium-6 large-6">
                            <div class="column column-block card-top-img">
                                <img src="cms-admin/upload/<?=$product_category[0]->photo?>" alt="<?=$product_category[0]->name?>">
                                </div>
                            </div>
                            <div class="small-full  medium-6 large-6">
                                <div class="column column-block card-top-img">
                                <img   src="cms-admin/upload/<?=$product_category[0]->photo_2?>" alt="<?=$product_category[0]->name?>">
                                </div>
                            </div>
                        </div>
                        <?php    
                        }
                        ?>
                        
                        <p class="align-left text-justify text-truncate">
                            <?php 
                            if(isset($product_category_detail))
                            {
                                echo html_entity_decode(htmlentities($product_category_detail[0]->content));
                            }
                            else
                            {
                                echo html_entity_decode(htmlentities($product_category[0]->content));
                            }

                             ?>
                                
                        </p>
                        

                    </div>   

                     <div class="small-full medium-3 large-3 cell sidebar-image">

                        <div class="grid-container">

                            <!-- <div class="row grid-y grid-margin-x grid-container">
                                <blockquote class="cell"> -->
                                    <?php 
                                    // if(isset($product_image)){
                                    //     if(count($product_image) > 1){                                                 
                                    //     foreach ($product_image as $photo) {
                                    ?>
                                    <!-- <div class="cell small-full medium-2 large-2">
                                        <div class="thumbnail">
                                            <img class="card_img" src="cms-admin/upload/<?= $photo->photo; ?>" alt="<?= $photo->name; ?>">
                                        </div>

                                    </div> -->
                                    <?php 
                                    //     }
                                    //     }else{
                                    //                 echo "No results were found.";
                                    //              }
                                    // }else
                                    // {
                                    //     foreach ($product_img as $photo) {

                                        ?>
                                        <!-- <div class="cell small-full medium-2 large-2">
                                        <div class="thumbnail">
                                            <img class="card_img" src="cms-admin/upload/<?= $photo->photo; ?>" alt="<?= $photo->name; ?>">
                                        </div>

                                    </div> -->
                                        <?php
                                    // }
                                    // }
                                ?>
                                <!-- </blockquote>

                            </div> -->


                        </div>



                    </div>
                </div>
            </div>
        </section>

<div style="display: block;clear: both;"></div>
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