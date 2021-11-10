<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($categories as $category)
        <div class="{{$category['class']}}"><img src="{{asset('storage/img/'.$category['img'])}}" /></div>
        @endforeach
    </div>
</div>
