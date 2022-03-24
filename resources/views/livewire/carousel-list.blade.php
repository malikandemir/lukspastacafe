<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($carousels as $carousel)
                <div class="carousel-item active">
                    <img src="{{asset('storage/img/'.$carousel->img)}}" class="d-block w-100" alt="...">

                </div>
            @endforeach
        </div>
    </div>
</div>
