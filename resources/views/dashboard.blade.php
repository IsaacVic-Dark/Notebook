<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <a href="{{ route('create') }}">New Note</a>
    <h1>Your notes</h1>
    <div>
        @foreach ($notes as $note)
            <div>
                <b>{{ $note->created_at }}</b>
                <p>{{ $note->notes }}</p>
                <a href="{{ route('notes.display', $note->id) }}">View</a>
                <a href="{{ route('note.edit', $note->id)}}">Edit</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-danger-button
                        x-data=""
                        type='submit'
                    >{{ __('Delete Note') }}</x-danger-button>
                </form>
            </div>
        @endforeach
    </div>
    {{ $notes->links() }}

</x-app-layout>
