<section class="features" id="services">

    @foreach($services as $service)
    <div class="feature">
        <i class="{{$service->icon}} feature__icon" aria-hidden="true"></i>
        <h4 class="heading-4 heading-4--dark feature__header">{{$service->service}}</h4>
        <p class="feature__text">
            {{ $service->description }}
        </p>
    </div>
    @endforeach

</section>