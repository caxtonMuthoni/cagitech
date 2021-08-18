<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/resources/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/resources/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/resources/favicons/favicon-16x16.png">
    <link rel="manifest" href="/resources/favicons/site.webmanifest">
    <link rel="mask-icon" href="/resources/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/resources/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/resources/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;1,400&family=Nunito:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/main.css">
    <title>CAGITECH | Tech leading company</title>
</head>

<body class="container" id="home">
    <nav class="nav">
        <div class="nav__logo">
            <img src="/resources/imgs/logo 1.svg" alt="Logo" class="nav__logo-img">
        </div>

        <ul class="nav__list" id="menucontainer">
            <li class="nav__item"><a id="home2" href="/" class="nav__link js__nav-link">Home</a></li>
            <li class="nav__item"><a id="services" href="/services" class="nav__link js__nav-link">Services</a></li>
            <li class="nav__item"><a id="technologies" href="/technologies" class="nav__link js__nav-link">Technologies</a></li>
            <li class="nav__item"><a id="company" href="/company" class="nav__link js__nav-link">Company</a></li>
            <li class="nav__item"><a id="contact" href="/contact" class="nav__link js__nav-link">Get in touch</a></li>
        </ul>
        <i class="fas fa-bars nav__activate-icon  js--toggle-menu  "></i>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="top_footer">
            <div class="footer__company">
                <img src="/resources/imgs/logo 2.svg" alt="logo" class="footer__logo">
                <p class="footer__text">
                    Reliable programming partner for growing startups, established businesses around the globe.
                    Our top quality services consistently exceed our customers’ expectations.
                </p>
            </div>
            <ul class="footer-nav mb-md">
                <h3 class="heading-3 heading-3--light">Quick links</h3>
                <li class="footer-nav__item"><a href="/" class="footer-nav__link">Home</a></li>
                <li class="footer-nav__item"><a href="/company" class="footer-nav__link">Company</a></li>
                <li class="footer-nav__item"><a href="/services" class="footer-nav__link">Services</a></li>
                <li class="footer-nav__item"><a href="technologies" class="footer-nav__link">Technologies</a></li>
                <li class="footer-nav__item"><a href="/contact" class="footer-nav__link">Get in touch</a></li>
            </ul>

            <div class="side-info__icons footer__social">
                <h3 class="heading-3 heading-3--light">Find Us on Social Media</h3>
                <a href="https://www.facebook.com/caxton.mathitu/" target="_blank" class="side-info__social side-info__social--1">
                    <i class="fab fa-facebook side-info__social--icon"></i>
                    <span class="side-info__social--name">Facebook</span>
                </a>

                <a href="https://www.linkedin.com/in/caxton-muthoni-7b2444175/" target="_blank" class="side-info__social">
                    <i class="fab fa-linkedin side-info__social--icon  "></i>
                    <span class="side-info__social--name">LinkedIn</span>
                </a>

                <a href="https://api.whatsapp.com/send?phone=+254743751575" target="_blank" class="side-info__social">
                    <i class="fab fa-whatsapp side-info__social--icon"></i>
                    <span class="side-info__social--name">Whatsapp</span>
                </a>

                <a href="https://api.whatsapp.com/send?phone=+254743751575" target="_blank" class="side-info__social">
                    <i class="fab fa-twitter side-info__social--icon   "></i>
                    <span class="side-info__social--name">Twitter</span>
                </a>
            </div>
            <ul class="footer-nav mb-md">
                <h3 class="heading-3 heading-3--light">Other links</h3>
                <li class="footer-nav__item"><a href="/careers" class="footer-nav__link">Careers</a></li>
                <li class="footer-nav__item"><a href="/company" class="footer-nav__link">Company</a></li>
                <li class="footer-nav__item"><a href="/services" class="footer-nav__link">Services</a></li>
                <li class="footer-nav__item"><a href="technologies" class="footer-nav__link">Technologies</a></li>
                <li class="footer-nav__item"><a href="/contact" class="footer-nav__link">Get in touch</a></li>
            </ul>

        </div>

        <p class="footer__legal">
            &copy; copyright 2021. Designed and developed with <i class="fa fa-heart " aria-hidden="true"></i> by <a href="#" class="footer__legal-link">Muthoni G. Caxton</a>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/resources/js/vendor/jquery.waypoints.min.js"></script>
    <script src="/resources/js/vendor/jcarousel.min.js"></script>
    <script src="/resources/js/vendor/jcorousel-auto-scroll-plugin.min.js"></script>
    <script src="/resources/js/vendor/jscorousel-pagination-plugin.min.js"></script>

    <script src="/resources/js/script.js"></script>
</body>

</html>