<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Update entrie') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1 mb-2">
            {{ __('Please fill the following form to update an entrie') }}</p>
        @if (session('success'))
            <x-toast type="success" position="top-right">
                Operation completed successfully!
            </x-toast>
        @endif
        <form method="POST" action="{{ route('bitacora.update', $bitacora) }}" class="space-y-3">
            @csrf
            @method('PATCH')
            <div>
                <x-forms.input label="Dia" name="day" type="date"
                    value="{{ old('day', $bitacora->day->format('Y-m-d')) }}" />
            </div>
            <div>
                <x-forms.input label="Hora de la toma" name="time_of_test" type="time"
                    value="{{ old('time_of_test', $bitacora->time_of_test) }}" />
            </div>
            <div>
                <x-forms.select label="Condicion" name="condition" :data=App\Enums\Condition::cases()
                    :selected="$bitacora->condition" />
            </div>
            <div>
                <x-forms.input label="Nivel de glucosa" name="glucose" type="number"
                    value="{{ old('glucose', $bitacora->glucose) }}" />
            </div>
            <div>
                <x-forms.input label="Alimentos" name="food" type="text"
                    value="{{ old('food', $bitacora->food) }}" />
            </div>
            <div class="mt-3">
                <x-button>Update</x-button>
            </div>
        </form>
    </div>
</x-layouts.app>
