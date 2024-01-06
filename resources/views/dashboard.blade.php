<x-app-layout>
    @if(Session::has('success'))
        <div style="background-color: greenyellow;color: white" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div style="background-color: red;color: white" class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
