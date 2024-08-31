<x-app-layout>
    <div>
        <form action="{{ route('notes.store')}}" method="POST">
            @csrf
            <x-input-label for="password" :value="__('Your note')" />
            <x-text-input id="note" class="block mt-1 w-full"
                            type="note"
                            name="note" />
            <x-primary-button type='submit'>Create note</x-primary-button>

        </form>
    </div>
</x-app-layout>
