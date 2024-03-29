<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <div class="card m-3 p-3">
        <h5 class="card-header d-flex justify-content-between align-items-center bg-secondary text-white">
            {{__("Banner")}}
            <a class="btn btn-primary" href="/carousel/create">Yeni</a>
        </h5>

        <table class="table table-striped table-hover">
            <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">İsim</th>
                <th scope="col">Resim</th>
                <th scope="col">Açıklama</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($carousels as $carousel)
                <tr>
                    <th>{{$carousel->id}}</th>
                    <td><img class="h-1" style="height: 250px;" src="{{asset('storage/img/'.$carousel->img)}}" /></td>
                    <td>{{$carousel->name}}</td>
                    <td>{{$carousel->description}}</td>
                    <td>
                        <button onclick="window.location='{{ url("carousel/$carousel->id/edit") }}'" class="button px-4 py-1 text-gray-800 bg-red-600">Düzenle</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
