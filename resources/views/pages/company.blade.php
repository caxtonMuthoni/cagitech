@extends('index')

@section('content')
<header class="header2">
  <h4 class="heading-2 mb-md">About Cagitech</h4>

  <h4 class="heading-4">Cagitech Executive Leadership and Senior Management bring decades of industry experience,<br> a global perspective and a passion for achieving results.</h4>
</header>

<section class="js--section-about">
</section>

<section class="mission">
  <i class="fas fa-cloud-sun feature__icon   "></i>
  <h3 class="heading-3 mb-sm">Our mission and vision</h3>
  <h4 class="heading-4 mission__text">
    Our mission is to help enterprises accelerate adoption of new technologies, untangle complex issues that
    always emerge during digital evolution, and orchestrate ongoing innovation. Whether it is a
    consumer-oriented app or a transformative enterprise-class solution, the company leads the process from
    ideation and concept to delivery, and provides ongoing support through its IS360 framework.
  </h4>
</section>

<section class="team">
  <div class="team__header mb-md">
    <i class="fas fa-users  feature__icon  "></i>
    <h3 class="heading-3">Meet Our team leaders</h3>
  </div>
  <div class="team__leader team__leader--1">
    <div class="team__leader-img-container">
      <img src="resources/imgs/caxton.png" alt="" class="team__leader-img">
    </div>
    <div class="team__leader-details">
      <p class="team__leader-name">Caxton Muthoni</p>
      <p class="team__leader-position mb-md">Chief Executive Officer, Co-Founder</p>
      <p class="team__leader-quote">You can avoid technology but you can avoid its consequencies</p>
    </div>
  </div>

  <div class="team__leader team__leader--2">
    <div class="team__leader-img-container">
      <img src="resources/imgs/emma.png" alt="" class="team__leader-img">
    </div>
    <div class="team__leader-details">
      <p class="team__leader-name">Emmanuel Maina</p>
      <p class="team__leader-position mb-md">Chief Technical Officer</p>
      <p class="team__leader-quote">The advance of technology is based on making it fit in so that you don't really even notice it, so it's part of everyday life.</p>
    </div>
  </div>
</section>

@include('includes.services')

@endsection