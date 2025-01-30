<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 dark:text-white leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full rounded-lg overflow-hidden">
                <div class="p-6 bg-white dark:bg-gray-700">
                    <h1 class="text-gray-700 text-2xl dark:text-white">
                        {{$data->name}}
                    </h1>
                    <p class="text-gray-700 text-sm dark:text-white mt-2">Menu list in the {{$data->name}} category</p>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6">

                @if ($food)

                @foreach ($food as $item)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden flex justift-between items-center">
                    <img src="{{asset('storage/images/food/'.$item->image)}}" alt="Food" class="w-2/3 h-48 p-6 object-cover">
                    <div class="p-4 w-1/2">
                        <h3 class="text-lg dark:text-white font-semibold">{{$item->name}}</h3>
                        <p class="text-gray-600 dark:text-white text-sm">{{Str::limit($item->desc, 50)}}</p>
                        <p class="mt-2 text-red-600 font-bold">IDR {{number_format($item->price)}}</p>
                    </div>
                </div>
                @endforeach

                @endif

            </div>
        </div>
    </div>
</x-app-layout>