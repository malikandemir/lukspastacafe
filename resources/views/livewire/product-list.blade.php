<div>
    @foreach ($products as $product)
    <figure class="float-left flex-grow md:flex bg-gray-200 rounded-xl p-8 md:p-4 gap-4 m-4">
        <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto"
             src="{{asset('storage/img/'.$product['img'])}}"  alt="" width="384" height="512">
        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
            <blockquote>
                <p class="text-lg font-semibold">
                    {{$product['description']}}
                </p>
            </blockquote>
            <figcaption class="font-medium">
                <div class="text-cyan-600">
                    {{$product['name']}}
                </div>
            </figcaption>
        </div>
    </figure>
    @endforeach
</div>
