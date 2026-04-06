<x-app-layout>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{ __('You are logged in!') }}
        </div>
        @hasrole('admin')
            Hello {{ auth()->user()->name }}
        @endhasrole
        @hasrole('user')
            Hello {{ auth()->user()->name }}
        @endhasrole
        @hasrole('worker')
            Hello {{ auth()->user()->name }}
        @endhasrole
    </div>
</x-app-layout>
