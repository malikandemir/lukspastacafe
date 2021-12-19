<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <div class="card m-3 p-3">
        <h5 class="card-header d-flex justify-content-between align-items-center bg-secondary text-white">
            {{__("Ürün Düzenle")}}
        </h5>
        <form  enctype="multipart/form-data" class="row g-2 m-3 p-1" method="post" action="/product/{{$product->id}}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Ürün Adı</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Açıklama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="img" class="col-sm-2 col-form-label">Resim</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="img" name="img">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>
</x-app-layout>
