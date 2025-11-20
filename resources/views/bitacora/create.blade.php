    <x-layouts.app>
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Create entrie') }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">
                {{ __('Please fill the following form to create an entrie') }}</p>
            <form method="POST" action="{{ route('bitacora.store') }}" class="space-y-3">
                @csrf
                <div>
                    <x-forms.input label="Dia" name="day" type="date" value="{{ old('day') }}" />
                </div>
                <div>
                    <x-forms.input label="Hora de la toma" name="time_of_test" type="time"
                        value="{{ old('time_of_test') }}" />
                </div>
                <div>
                    <x-forms.select label="Condicion" name="condition" :data=App\Enums\Condition::cases() />
                </div>
                <div>
                    <x-forms.input label="Nivel de glucosa" name="glucose" type="number"
                        value="{{ old('glucose') }}" />
                </div>
                <div>
                    <x-forms.input label="Alimentos" name="food" type="text" value="{{ old('food') }}" />
                </div>
                <div class="mt-3">
                    <x-button>Create</x-button>
                </div>
            </form>
        </div>
    </x-layouts.app>
