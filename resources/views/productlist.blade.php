<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($products as $product)
                    @if($product->status == 1)
                    <figure class="float-left flex-grow md:flex bg-gray-200 rounded-xl p-8 md:p-4 gap-4 m-4 shadow">
                        <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto"
                             style="height: 150px;width: 150px;"
                             src="{{asset('storage/img/'.$product['img'])}}"  >
                        <div class="pt-6 md:p-8 text-center md:text-left space-y-4" style="width: 150px;height: 150px;">
                            <blockquote>
                                <p class="text-lg font-semibold">
                                    {{$product['description']}}
                                </p>
                            </blockquote>
                            <figcaption class="font-medium">
                                <div class="text-cyan-600">
                                    {{number_format($product->price, 2, ',', '.')}} TL
                                </div>
                            </figcaption>
                        </div>
                    </figure>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
