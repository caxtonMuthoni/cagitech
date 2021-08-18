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
            <a href="#about" class="btn ml-md btn-outline-primary header__learn-btn">Learn more <i class="fas fa-arrow-right    "></i></a>
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
    @foreach($services as $service)
    <div class="feature">
        <i class="{{$service->icon}} feature__icon" aria-hidden="true"></i>
        <h4 class="heading-4 heading-4--dark">{{$service->service}}</h4>
        <p class="feature__text">
            {{ $service->description }}
        </p>
    </div>
    @endforeach

</section>

@include('includes.testimonials')

@include('includes.contact-form')

@endsection