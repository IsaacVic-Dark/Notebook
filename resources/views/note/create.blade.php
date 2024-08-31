<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create note') }}
            </h2>
        </x-slot>
        <form action="{{ route('notes.store')}}" method="POST">
            @csrf
            <x-text-input id="note" class="block mt-1 w-full"
                            type="note"
                            name="note" />

            <x-primary-button type='submit'>Create note</x-primary-button>

        </form>
    </div>
</x-app-layout>
