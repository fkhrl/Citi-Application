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
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:400,500" rel="stylesheet">
    </head>
    <body>
        <?php include_once'include/header.php';?>
<!--    header section end here    -->

<!--slider section end here-->

        <section class="slider-image">
            <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
                <div class="orbit-wrapper">
                    <div class="orbit-controls">
                        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                    </div>

                    <ul class="orbit-container" style="height: 935.8px;"  tabindex="0">
                        <?php
                            $slider = $obj->FlyQuery("SELECT * FROM slider order by id desc");
                            if(!empty($slider)){
                                foreach ($slider as $photo) {
                        ?>
                        <li class="is-active orbit-slide">
                            <figure class="orbit-figure">
                                <img class="orbit-image" src="cms-admin/upload/<?= $photo->image; ?>" alt="Space">
                                <figcaption class="orbit-caption"><?= $photo->name; ?></figcaption>
                            </figure>
                        </li>
                        <?php
                                    }
                                }

                        ?>
                    </ul>
                    <div class="last_line" style=" "></div>
                </div>

                  



            </div>
        </section>
<!--slider section end here-->

        <section class="blog">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">
                    <?php 
                        $welcome_content = $obj->FlyQuery("SELECT * FROM welcome_content order by id desc");
                    ?>
                    <div class="small-full medium-4 large-4 cell">
                        <h6 class="medium-text-uppercase" style="color: #000080;"><strong>WELCOME TO</strong></h6>
                        <h3 class="medium-text-uppercase" style="color:#CE000B;"><strong><?= $welcome_content[0]->name; ?></strong></h3>

                    </div>
                    <div class="small-full medium-8 large-8 cell">
                        <blockquote>
                            <?= $welcome_content[0]->details; ?>
                            <cite><?= $welcome_content[0]->author; ?></cite>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>

        <section class="card-content card-divider">

            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">
                    <?php 
                    $our_products = $obj->FlyQuery("SELECT 
                                                    p.id,
                                                    p.short_details,
                                                    p.heading,
                                                    p.category_one,
                                                    p.category_two,
                                                    pc.name as `category_one_name`,
                                                    pc.photo as `category_one_photo`,
                                                    pcc.name as `category_two_name`,
                                                    pcc.photo as `category_two_photo`
                                                    FROM our_products as p
                                                    LEFT JOIN product_category as pc on p.category_one=pc.id
                                                    LEFT JOIN product_category as pcc on p.category_two=pcc.id");
                    ?>
                    <div class="small-full medium-6 large-6 blog-content">
                        <h3 class="medium-text-uppercase">Our Products</h3>
                        <p class="text-left"><?= $our_products[0]->short_details; ?>
                        </p>
                        <a href="our-product.php?product=<?= $our_products[0]->id; ?>" style="color: red;">[ READ MORE.... ]</a>
                    </div>
                    <div class="small-full medium-6 large-6">
                        <div class="grid-x grid-padding-x  product-image-box">
                            
                            <div class="cell small-full medium-6 large-6">
                                <div class="thumbnail">
                                    <img class="img_content" src="cms-admin/upload/<?= $our_products[0]->category_one_photo; ?>" alt="<?= $our_products[0]->category_one_name; ?>">

                                </div>
                                <p class="text-center text-uppercase" style="color: #0C108C;">  <b><a href="products.php?product=<?= $our_products[0]->category_one; ?>"><?= $our_products[0]->category_one_name; ?></a></b></p>
                            </div>

                            <div class="cell small-full medium-6 large-6">
                                <div class="thumbnail">
                                    <img class="img_content" src="cms-admin/upload/<?= $our_products[0]->category_two_photo; ?>" alt="<?= $our_products[0]->category_two_name; ?>">

                                </div>
                                <p class="text-center text-uppercase" style="color: #0C108C;">  <b><a href="products.php?product=<?= $our_products[0]->category_two; ?>"><?= $our_products[0]->category_two_name; ?></a></b></p>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <section class="card-title">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container">
                    <?php 
                                $product_category = $obj->FlyQuery("SELECT * FROM `product_category` as pc WHERE (pc.id NOT IN (SELECT category_one FROM our_products) AND pc.id NOT IN (SELECT category_two FROM our_products)) limit 4");
                                if(!empty($product_category))
                                {
                                    foreach ($product_category as $pro) {
                            ?>
                    <div class="cell small-full medium-3 large-3">
                        <div class="thumbnail">
                            <img class="card_img" src="cms-admin/upload/<?= $pro->photo; ?>" alt="<?= $pro->name; ?>">
                        </div>
                        <p class="text-center text-uppercase" style="color: #0C108C;">  <b><a href="products.php?product=<?= $pro->id; ?>"><?= $pro->name; ?></a></b></p>
                    </div>
                    <?php }}?>
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