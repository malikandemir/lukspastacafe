<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="/category">
                {{ csrf_field() }}
                <div class="grid md:grid-cols-2 gap-4">
                    <div><p>Yeni Kategori Ekle</p></div>
                    <div></div>
                    <div><label>{{ __('name') }}</label></div>
                    <div><input type="text" name="name" id="name" value=""></div>
                    <div><label>{{ __('img') }}</label></div>
                    <div><input type="text" name="img" id="img" value=""></div>
                    <div><label>{{ __('description') }}</label></div>
                    <div><input type="text" name="description" id="description" value=""></div>
                    <div></div>
                    <div><button class="border-gray-100 bg-gray-400 rounded p-2" type="submit">Kaydet</button></div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
