<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 dark:text-white leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full rounded-lg overflow-hidden">
                <!-- Card Header -->
                <div class="relative">
                    <video autoplay muted loop class="w-full h-56 object-cover rounded-xl">
                        <source src="{{asset('asset/videoidn.mp4')}}" type="video/mp4">
                    </video>
                    <div class="relative -mt-16 p-4">
                        <!-- Card 1 -->
                        <div class="bg-white dark:bg-gray-700 text-white w-full h-24 rounded-xl p-4 flex justify-between items-center">
                            <div class="p-2">
                                <h1 class="text-xl text-red-700 dark:text-white font-semibold">Category</h1>
                                <span class="text-center mt-4 text-sm text-gray-700 dark:text-white">List all categories</span>
                            </div>
                            <div class="p-2">
                                <a href="{{route('category.create')}}" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-700">Create New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-700 text-gray-700 p-6 rounded-lg mx-4 shadow-md">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg">
                        <thead class="bg-gray-200 dark:bg-red-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-700 dark:text-white uppercase tracking-wider">
                                    Category Name
                                </th>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-700 dark:text-white uppercase tracking-wider">
                                    Total Menu
                                </th>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-700 dark:text-white uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">

                            @foreach ($data as $item)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{$item->name}}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{$item->food_count}} Menu
                                </td>
                                <td>
                                    <form action="{{route('category.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a href="{{route('category.show', $item->id )}}" class="text-red-600 font-semibold p-2">Detail</a>
                                        <button type="submit" class="text-red-600 font-semibold p-2" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{$data}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>