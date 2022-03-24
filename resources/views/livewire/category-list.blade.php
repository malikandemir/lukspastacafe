<div>
    <div class="grid md:grid-cols-3 gap-4 mt-4">
        @foreach ($categories as $category)
        <div class="md:w-85 md:h-auto rounded-md shadow-lg mx-auto bg-gray-200 text-center p-2 m-3" style="height: 200px;width: 270px;">
            <a href="productlist?cat_id={{$category->id}}">
            <img src="{{asset('storage/img/'.$category->img)}}"
                 style="height: 150px;width: 250px;" />
            <p class="text-gray-500 md:font-mono text-3xl text-center gap-8 font-mono">{{$category->name}}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>


