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
                    <div class="overflow-x-auto mt-4">
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
                                @if($food)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td colspan="3" class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{$food}}
                                    </td>
                                </tr>
                                @else
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td colspan="3" class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white text-center">
                                        Empty Data
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>