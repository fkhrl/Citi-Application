<?php
    $site_basic_info = $obj->SelectAll("site_basic_info");
?>
<section class="header-info">
            <div class="grid-container">
                <div class="row grid-x grid-margin-x grid-container align-center">
                    <div class="small-full medium-3 large-3 cell">
                        <i class="fa fa-headphones text-blue" aria-hidden="true"></i> <span class="capitalize">Order On Phone: <?= $site_basic_info[0]->phone ?></span> 
                    </div>

                    <div class="small-full medium-3 large-3 cell">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email:  <a href="mailto:<?= $site_basic_info[0]->email ?>"><?= $site_basic_info[0]->email ?></a></span> 
                    </div>

                    <div class="small-full medium-3 large-3  cell">
                        <i class="fa fa-skype" aria-hidden="true"></i> <span>Skype: <?= $site_basic_info[0]->skype ?></span> 
                    </div>

                    <div class="small-full medium-3 large-3 cell socail">
                        <a href="" target="_blank"><i class="fa fa fa-wifi fa-lg" style="color: #cc8b00;"></i></a>
                        <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-lg" style="color:#1779ba ;"></i></a>
                        <a href="https://www.pinterest.com/"><i class="fa fa-pinterest-square fa-lg"style="color: red;"></i></a>
                        <a href="https://vimeo.com/"><i class="fa fa-vimeo-square fa-lg" style="color:lightblue;"></i></a>
                        <a href="https://facebook.com/"><i class="fa fa-facebook-square fa-lg blue" ></i></a>
                    </div>
                </div>
            </div>



        </section>
        <section class="menu-section">
            <div class="row">

                <div class="grid-container">
                    <div class="row grid-x grid-margin-x grid-container">

                        <div class="title-bar cell" data-responsive-toggle="responsive-menu" data-hide-for="medium">
                            <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
                            <div class="title-bar-title">Menu</div>
                        </div>

                        <div class="top-bar cell" id="responsive-menu">
                            <div class="top-bar-left">
                            <a href="index.php">   
                                <img class="logo" src="cms-admin/upload/<?= $site_basic_info[0]->site_logo ?>">
                            </a>

                            </div>
                            <div class="top-bar-right">
                                <ul class="dropdown menu" data-dropdown-menu>

                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="products.php">products</a></li>
                                    <li><a href="contact.php">Contact & Location</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>


            </div>


        </section>