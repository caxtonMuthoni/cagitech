@extends('index')

@section('content')

<header class="header2">
    <h4 class="heading-2 mb-md">Thank you for getting in touch!</h4>

    <h4 class="heading-4 sent__header">
        We appreciate you contacting CAGITECH. One of our colleagues will get back in touch with you soon! <br>
        <br> Have a great day!</h4>
</header>

<section class="js--section-about">
</section>

<div class="sent">
    <img src="{{asset('resources/imgs/sent.svg')}}" alt="" class="sent__img">
    <a href="/" class="btn-secondary sent__btn mt-md"> <i class="fas fa-arrow-left    "></i> Back Home</a>
</div>

@endsection