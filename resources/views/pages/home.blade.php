@extends('index')

@section('content')
 
<header class="header" id="homei">
        <div class="header__content">
            <h1 class="heading-1 heading-1-dark mb-md">
                Full-cycle software development company
            </h1>
            <h4 class="heading-4 heading-4--dark mb-lg header__description">
                Reliable programming partner for growing startups, established businesses around the globe.
                Our top quality services consistently exceed our customers’ expectations.
            </h4>

            <div class="header__btns">
                <a href="#contact-form" class="btn btn-default">Get in touch</a>
                <a href="#about" class="btn ml-md btn-outline-primary header__learn-btn">Learn more <i
                        class="fas fa-arrow-right    "></i></a>
            </div>
        </div>

        <div class="header__illustration">
            <img src="/resources/imgs/home3.svg" alt="Illustration" class="header__illustration-img">
        </div>
    </header>

    <section class="about js--section-about" id="about">
        <div class="about__content">
            <h3 class="heading-2 heading-2--dark mb-md">About Cagitech</h3>
            <p class="mb-sm about__content--paragraph">
                We are a digital transformation consultancy and engineering company that delivers cutting edge solutions
                for global organisations and technology startups. Since 2007 we have been helping companies and
                established brands reimagine their business through digitalisation.
            </p>

            <p class="about__content--paragraph">
                Our mission is to help enterprises accelerate adoption of new technologies, untangle complex issues that
                always emerge during digital evolution, and orchestrate ongoing innovation. Whether it is a
                consumer-oriented app or a transformative enterprise-class solution, the company leads the process from
                ideation and concept to delivery, and provides ongoing support through its IS360 framework.
            </p>
        </div>
        <div class="about__cycles">
            <div class="about__indicator"><i class="fas fa-chevron-down about__indicator-icon   "></i></div>
            <span class="about__cycle about__cycle--1">Requirements</span>
            <span class="about__cycle about__cycle--2">Analysis</span>
            <span class="about__cycle about__cycle--3">Design</span>
            <span class="about__cycle about__cycle--4">Implementation</span>
            <span class="about__cycle about__cycle--5">Testing</span>
            <span class="about__cycle about__cycle--6">Maintenance</span>
            <!-- <span class="about__cycle about__cycle--7"></span>
            <span class="about__cycle about__cycle--8"></span> -->
        </div>
        <!-- <div class="about__images">
            <img class="about__image about__image--1" src="/resources/imgs/project/mobile.webp" alt="Project 1">
            <img class="about__image about__image--2" src="/resources/imgs/project/web.webp" alt="Project 2">
            <img class="about__image about__image--3" src="/resources/imgs/project/responsive.webp" alt="Project 3">
        </div> -->
    </section>

    <section class="features" id="services">
        <div class="feature">
            <i class="fa fa-globe feature__icon" aria-hidden="true"></i>
            <h4 class="heading-4 heading-4--dark">Web Development</h4>
            <p class="feature__text">
                We help global brands design and build superior digital products, enabling seamless user experiences
                across all modern platforms and devices.
            </p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt feature__icon   "></i>
            <h4 class="heading-4 heading-4--dark">App Development</h4>
            <p class="feature__text">
                Our professional team of app developers delivered projects for 500+ clients, leveraging world-class code
                quality and agile development best practices.
            </p>
        </div>

        <div class="feature">
            <i class="fas fa-paint-brush feature__icon   "></i>
            <h4 class="heading-4 heading-4--dark">UX/UI Design</h4>
            <p class="feature__text">
                Our design team is a small design studio within a large software company that will help you build an
                engaging product easily and quickly.
            </p>
        </div>

        <div class="feature">
            <i class="fas fa-users feature__icon   "></i>
            <h4 class="heading-4 heading-4--dark">Dedicated Teams</h4>
            <p class="feature__text">
                A dedicated, customized, and secure Team Extension model follows our client's internal development
                practices, methodologies, and culture.
            </p>
        </div>

        <div class="feature">
            <i class="fas fa-shield-alt  feature__icon  "></i>
            <h4 class="heading-4 heading-4--dark">Cyber Security</h4>
            <p class="feature__text">
                Cagitech offers thorough security assessments, software testing and QA services, as well as
                incident response and expertise in developing stronger, more reliable security for your software.
            </p>
        </div>

        <div class="feature">
            <i class="fas fa-money-bill-wave feature__icon   "></i>
            <h4 class="heading-4 heading-4--dark">Payment Integration</h4>
            <p class="feature__text">
                By automating your accounting and enterprise resource planning (ERP) with integrated point of sale
                systems, you’ll bypass the time consuming process of entering and reconciling transaction data.
            </p>
        </div>

    </section>

    @include('includes.testimonials')

    @include('includes.contact-form')

@endsection