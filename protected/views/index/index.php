<?php

?>

<style>
    .hide_me {
        opacity: 0;
    }
</style>
<script>
    $(document).ready(function () {
        $('.banner_img1').fadeIn(1500);
        setTimeout(function () {
            $('.banner_img2').fadeIn(1500);
        }, 500);

        /* Every time the window is scrolled ... */
        $(window).scroll(function () {

            /* Check the location of each desired element */
            $('.hide_me').each(function (i) {

                var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();

                /* If the object is completely visible in the window, fade it it */
                if (bottom_of_window > bottom_of_object) {

                    $(this).animate({'opacity': '1'}, 500);

                }
            });
        });
    });
</script>

<div class="home_banner">
    <div class="container">
        <div class="col-md-7">
            <div class="col-md-6">
                <img class="banner_img1" src="images/resume_banner_1.png">
            </div>
            <div class="col-md-6">
                <img class="banner_img2" src="images/resume_banner_2_.png">
            </div>
        </div>
        <div class="col-md-5">
            <p class="font_40 text-right" style="margin: 18% 0;">
                Create Beautiful<br>Professional<span class="font_50"> RESUMES</span><br>
                In Minutes
            </p>
        </div>
    </div>
</div>

<div class="features_of_resume ">
    <h3 class="font_32">Features of Resume Builder</h3>
    <div class="row">
        <div class="col-md-5 text-left">
            <h3><strong>Content Areas</strong></h3>
            <h4 style="color: gray;font-size: 20px;">For areas that need more space</h4>
            <p class="font_17 text-justify">
                If you need elements such as tables, comments, tabs, description areas and many others, we have got
                you covered.
                We took into consideration multiple use cases and come up with some specific elements that you will
                love to use.
            </p>

        </div>
        <div class="col-md-6" style="float: right">
            <img class="hide_me feature_img" src="images/feature_banner.png">
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-12 hide_me text-center">
        <h1 style=" margin-top: 20px">SAMPLES</h1>
    </div>
    <div class="sample_box">

        <div class="col-md-4" style="padding: 5%;">
            <img class="hide_me sample_img" src="images/sample_2.png" width="100%">
        </div>
        <div class="col-md-4" style="padding: 5%;">
            <img class="hide_me sample_img" src="images/sample_1.png" width="100%">
        </div>
        <div class="col-md-4 " style="padding: 5%;">
            <img class="hide_me sample_img" src="images/sample_2.png" width="100%">
        </div>

    </div>
</div>






