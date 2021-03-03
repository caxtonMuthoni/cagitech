@extends('index')

@section('content')

<header class="header2">
 <h4 class="heading-2 mb-md">Contact Cagitech</h4>

  <h4 class="heading-4">Need a software ? Send us a message here. Our team is ready to help you at any time</h4>
</header>

<section class="js--section-about">
</section>

@include('includes.contact-form')


<section class="locations">

<div class="locations__header mb-md">
<i class="fas fa-map-marker-alt  locations__icon  "></i>
<h3 class="heading-3">  Our Locations, Doing business with us is easier</h3>
</div>

<div class="locations__list">
    <div class="location">
        <img src="/resources/imgs/nairobi.jpeg" alt="Office 1" class="location__img">
        <div class="location__feature">
            <i class="fas fa-city   location__icon "></i>
            <h3 class="heading-3 location__text">Nairobi, westlands</h3>
        </div>

        <div class="location__feature">
          <i class="fas fa-envelope location__icon   "></i>
            <h3 class="heading-3 location__email">info@cagitech.com</h3>
        </div>

        <div class="location__feature">
            <i class="fas fa-phone  location__icon  "></i>
            <h3 class="heading-3 location__text">+254 743 751 575</h3>
        </div>

        <div class="location__feature">
            <i class="fab fa-line location__icon   "></i>
            <h3 class="heading-3 location__text">We are remote</h3>
        </div>
    </div>
    <div class="location">
        <img src="/resources/imgs/kisumu.jpeg" alt="Office 1" class="location__img">
        <div class="location__feature">
            <i class="fas fa-city   location__icon "></i>
            <h3 class="heading-3 location__text">Kisumu, Mega Plaza</h3>
        </div>

        <div class="location__feature">
          <i class="fas fa-envelope location__icon   "></i>
            <h3 class="heading-3 location__email">info@cagitech.com</h3>
        </div>

        <div class="location__feature">
            <i class="fas fa-phone  location__icon  "></i>
            <h3 class="heading-3 location__text">+254 743 751 575</h3>
        </div>

        <div class="location__feature">
            <i class="fab fa-line location__icon   "></i>
            <h3 class="heading-3 location__text">We are remote</h3>
        </div>
    </div>
    <div class="location">
        <img src="/resources/imgs/mombasa.jpeg" alt="Office 1" class="location__img">
        <div class="location__feature">
            <i class="fas fa-city   location__icon "></i>
            <h3 class="heading-3 location__text">Mombasa</h3>
        </div>

        <div class="location__feature">
          <i class="fas fa-envelope location__icon   "></i>
            <h3 class="heading-3 location__email">info@cagitech.com</h3>
        </div>

        <div class="location__feature">
            <i class="fas fa-phone  location__icon  "></i>
            <h3 class="heading-3 location__text">+254 743 751 575</h3>
        </div>

        <div class="location__feature">
            <i class="fab fa-line location__icon   "></i>
            <h3 class="heading-3 location__text">We are remote</h3>
        </div>
    </div>
</div>



</section>

@include('includes.testimonials')

@endsection