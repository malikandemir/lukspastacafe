<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <div class="card m-3 p-3">
        <h5 class="card-header d-flex justify-content-between align-items-center bg-secondary text-white">
            {{__("Ürünler")}}
            <a class="btn btn-primary" href="/product/create">Yeni</a>
        </h5>

        <table class="table table-striped table-hover">
            <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">İsim</th>
                <th scope="col">Resim</th>
                <th scope="col">Açıklama</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <td><img class="h-1" style="height: 250px;" src="{{asset('storage/img/'.$product->img)}}" /></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td> {{$product->price}} TL</td>
                    <td>
                        <button onclick="window.location='{{ url("product/$product->id/edit") }}'" class="button px-4 py-1 text-gray-800 bg-red-600">Düzenle</button>
                    </td>
                    <td>
                        <form  enctype="multipart/form-data" class="row g-2 m-3 p-1" method="post" action="/product/{{$product->id}}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden"  id="status" name="status" value="{{$product->status==1?2:1}}">
                            <button type="submit" class="btn btn-{{$product->status==2?"success":"danger"}}">{{$product->status==1?"Pasif Yap":"Aktif Yap"}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
