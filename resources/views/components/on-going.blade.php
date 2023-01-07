<div class="d-flex py-4 align-items-center containercuy h-100 col-md-12 mb-2 px-0"
        style="background-image: linear-gradient(to left, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.5)), url({{$image}}); background-size: 100% 100%; background-repeat: no-repeat"
        >
            <div class="ps-3 d-flex flex-column">
                <p class="m-0 text-white text-wrap"><strong>{{$title}}</strong></p>
                <p class="m-0 text-white"><span><i class="p-2 ps-0 fa-solid fa-location-dot"></i></span>{{$loc}}</p>
                <p class="m-0 text-white"><span><i class="p-2 ps-0 fa-solid fa-calendar-days"></i></span>{{$date}}</p>
                <p class="m-0">
                    <a
                        href="{{$href??''}}" class="btn d-sm-inline-flex text-white shadow d-none d-sm-block btn-sm btn-outline-info btn-pill">Beli
                        Tiket</a>
                    <a href="{{$href??''}}" class="btn d-inline-flex d-block d-sm-none btn-sm btn-outline-info btn-pill">Beli
                        Tiket</a>
                </p>
            </div>
        {{-- </div> --}}
        {{-- <img src="{{$image}}" class="event-image bg-dark img-fluid" alt="..."> --}}
    </div>
