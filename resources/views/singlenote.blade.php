<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        @foreach ($notes as $note)
            <div>
                <b>{{ $note->created_at }}</b>
                <p>{{ $note->notes }}</p>
                <x-primary-button>{{ __('View') }}</x-primary-button>
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
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

</x-app-layout>
