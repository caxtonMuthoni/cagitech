<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;1,400&family=Nunito:ital,wght@0,300;0,400;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
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
        <img src="/resources/imgs/logo 1.svg" alt="logo" class="footer__logo">
        <ul class="footer-nav mb-md">
            <li class="footer-nav__item"><a href="/" class="footer-nav__link">Home</a></li>
            <li class="footer-nav__item"><a href="/company" class="footer-nav__link"></a></li>
            <li class="footer-nav__item"><a href="/services" class="footer-nav__link">Services</a></li>
            <li class="footer-nav__item"><a href="technologies" class="footer-nav__link">Technologies</a></li>
            <li class="footer-nav__item"><a href="/contact" class="footer-nav__link">Get in touch</a></li>
        </ul>
        <p class="footer__text">
            I’m an innovative software engineer with 4+ years of experience managing all aspects of the development
            process for small to complex-sized companies.
        </p>
        <p class="footer__legal">
            &copy; copyright 2021. Designed and developed with <i class="fa fa-heart " aria-hidden="true"></i> by <a
                href="#" class="footer__legal-link">Muthoni G. Caxton</a>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/resources/js/vendor/jquery.waypoints.min.js"></script>
    <script src="/resources/js/script.js"></script>
</body>

</html>