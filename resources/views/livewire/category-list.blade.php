<div>
    <div class="grid md:grid-cols-3 gap-4">
        @foreach ($categories as $category)
        <div class="w-75 h-75 md:w-85 md:h-auto md:rounded-none rounded-full mx-auto">
            <img src="{{asset('storage/img/'.$category['img'])}}" />
        <p class="text-gray-800 md:font-sans text-3xl text-center gap-8">{{$category['name']}}</p>
        </div>
        @endforeach
    </div>
</div>
