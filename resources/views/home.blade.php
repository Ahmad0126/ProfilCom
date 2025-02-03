<x-root :title="'Home'">
    <x-layout :pointer="1">
        <h1>Selamat Datang, {{ auth()->user()->nama }}</h1>
    </x-layout>
</x-root>