<section class="testimonials" id="happy">
    <h2 class="heading-2 heading-2--light testimonials__heading">Happy Clients</h2>
    <div class="customers">
        <div class="jcarousel">
            <ul>

            @foreach($testimonies as $testimony)
                <li>
                    <div class="customers__testmony">
                        <p class="customers__text">
                           {{ $testimony->testimony }}
                        </p>
                        <div class="customers__details">
                            <img src="{{asset('/resources/imgs/'.$testimony->avatar)}}" alt="" class="customers__photo">
                            <div class="customers__personal">
                                <p class="customers__personal-name">{{$testimony->name}}</p>
                                <p class="customers__personal-occupation">{{$testimony->occupation}}</p>
                            </div>
                        </div>
                    </div>

                </li>
                @endforeach

            </ul>

            <p class="jcarousel-pagination">
               
            </p>
            
        </div>
    </div>
</section>