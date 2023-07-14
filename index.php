
<?php

include "./head.php";
include "./connection.php";
?>
<body>
    <nav class="navbar">
        <a href="./index.html"><img src="./assets/logo.png" alt=""></a>
        <div class="lgin">
            <a href="login.php">Login</a>
            <a href="register.php">Sign Up</a>
        </div>
    </nav>
    <div class="hero">
        <div class="context">
            <h1 class="title">
                BlaBla BlaBla BlaBla.....!
            </h1>
            <p>
                Lorem Ipsum is simply dummy text of
                the printing and typesetting industry.
            </p>
        </div>
        <div class="regs">
            <button>Register Now <i class="fas fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="about">
        <h1 class="abt_head">About Us</h1>
        <div class="row">
            <div class="item">
                <div class="item_icon">
                    <i class="fas fa-solid fa-clock"></i>
                </div>
                <div class="item_content">
                    <h1>
                        Free, Fast Setup
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet conse
                        ctetur adipisicing elit sed do.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="item_icon">
                    <i class="fas fa-regular fa-money-bill-wave"></i>
                </div>
                <div class="item_content">
                    <h1>
                        Free Online Check Software
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet conse
                        ctetur adipisicing elit sed do.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="item_icon">
                    <i class="fas fa-solid fa-headset"></i>
                </div>
                <div class="item_content">
                    <h1>
                        24/7 Customer Service
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet conse
                        ctetur adipisicing elit sed do.
                    </p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="item">
                <div class="item_icon">
                    <i class="fas fa-solid fa-signal"></i>
                </div>
                <div class="item_content">
                    <h1>
                        Free Search Engine Service
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet conse
                        ctetur adipisicing elit sed do.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="item_icon">
                    <i class="fas fa-solid fa-laptop"></i>
                </div>
                <div class="item_content">
                    <h1>
                        Virtual Terminal Included
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet conse
                        ctetur adipisicing elit sed do.
                    </p>
                </div>
            </div>
            <div class="item">
                <div class="item_icon">
                    <i class="fas fa-regular fa-credit-card"></i>
                </div>
                <div class="item_content">
                    <h1>
                        Reliable payment methods
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet conse
                        ctetur adipisicing elit sed do.
                    </p>
                </div>
            </div>

        </div>
    </div>
</body>
<?php
include "./footer.php"
?>
<script>
    $(window).on("scroll", function() {
    if($(window).scrollTop() > 100) {
        $(".navbar").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".navbar").removeClass("active");
    }
});
</script>
</html>