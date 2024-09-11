<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <a href="{{ route('create') }}">New Note</a>
    <h1>Your notes</h1>
    <div>
        @foreach ($notes as $note)
            <div>
                <b>{{ $note->created_at }}</b>
                <p>{{ $note->notes }}</p>
                <a href="{{ route('note.show', $note->id) }}">View</a>
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
