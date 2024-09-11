<x-app-layout>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Single note') }}
            </h2>
        </x-slot>
        <div class="p-6 text-gray-900">
            <p>{{ $note->notes }}</p>
            <p><small>Created at: {{ $note->created_at }}</small></p>
            <a href="{{ route('note.edit', $note->id)}}" style="color: blue">Edit</a>
            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-danger-button
                    x-data=""
                    type='submit'
                >{{ __('Delete Note') }}</x-danger-button>
            </form>
        </div>
    </div>
</x-app-layout>
