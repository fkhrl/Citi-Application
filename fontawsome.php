<!-- Design By : Munira
Develop By : fkhrl -->
<header class="text-center">

</style>
<ul class="example-orbit" data-orbit>
    <li>
        <img src="images/895829-strawberry-wallpaper.jpg" alt="slide 1" />
        <div class="orbit-caption">
            Caption One.
        </div>
    </li>
    <li class="active">
        <img src="images/white-rose-flower-garden-wallpaper-5.jpg" alt="slide 2" />
        <div class="orbit-caption">
            Caption Two.
        </div>
    </li>
    <li>
        <img src="images/white-rose.jpg" alt="slide 3" />
        <div class="orbit-caption">
            Caption Three.
        </div>
    </li>
</ul>
<script>
    $(document).foundation();
    $('.orbit-caption').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
</script>

</header>