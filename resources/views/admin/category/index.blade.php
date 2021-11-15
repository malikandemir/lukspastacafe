<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="/category/create">Yeni</a>
                <table class="table-fixed">
                    <thead>
                    <tr>
                        <th class="w-1/2 ">ID</th>
                        <th class="w-1/4 ">İsim</th>
                        <th class="w-1/4 ">Resim</th>
                        <th class="w-1/4 ">Açıklama</th>
                        <th class="w-1/4 "></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->img}}</td>
                            <td>{{$category->description}}</td>
                            <td><button class="button text-gray-800 bg-indigo-50">Düzenle</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
