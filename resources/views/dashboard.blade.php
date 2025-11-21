<x-layouts.app>
    <div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Dashboard')}}</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">{{ __('Welcome to the dashboard') }}</p>
    </div>

            <a href="{{route('bitacora.create')}}" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Create an entrie</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Average Glucose of') }} {{ $month }}</p>
                    @if ($average_glucose)
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{ $average_glucose }}</p>
                    @else
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">--</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                    @endif
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Three month average --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Average Glucose of the past three months') }} </p>
                    @if ($three_month_average_glucose)
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{ $three_month_average_glucose }}</p>
                    @else
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">--</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                    @endif
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Six month average --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Average Glucose of the past six months') }} </p>
                    @if ($six_month_average_glucose)
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{ $six_month_average_glucose }}</p>
                    @else
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">--</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                    @endif
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Yearly average --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Average Glucose of the past year') }} </p>
                    @if ($yearly_average_glucose)
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{ $yearly_average_glucose}}</p>
                    @else
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">--</p>
                    <p class="text-xs text-gray-500 flex items-center mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ __('No data') }}
                    </p>
                    @endif
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end items-center mb-3">
    <form method="GET" action="{{ route('dashboard') }}" class="flex justify-between items-center space-x-3">
        <label for="month">Filter month</label>
        <select id="month" name="month" class='block px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium rounded-lg text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs bg-gray-700'>
            @foreach ($months as $day => $month)
            <option value="{{$day}}" @selected($day == request()->month)>{{$month}}</option>
            @endforeach
        </select>
        <label for="year">Filter Year</label>
        <select id="year" name="year" class='block px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium rounded-lg text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs bg-gray-700'>
            @foreach ($user_years as $key => $year)
            <option value="{{$year[0]}}" @selected($year[0] == request()->year)>{{$year[0]}}</option>
            @endforeach
        </select>
        <x-button>Filter</x-button>
        <a href="{{ route('dashboard') }}">Reset Filter</a>
    </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
        <!-- Card with Header and Footer -->
        @forelse ($bitacoras as $bitacora)
        <x-card>
            <x-slot name="header">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">{{ $bitacora->condition }} {{ $bitacora->day->format('d-m-Y') }}</h3>
            </x-slot>

            <p class="text-gray-600 dark:text-gray-400">Glucosa {{ $bitacora->glucose }}</p>
            <p class="text-gray-600 dark:text-gray-400">Alimentos {{ $bitacora->food }}</p>
            <p class="text-gray-600 dark:text-gray-400">Hora de la toma {{ $bitacora->time_of_test }}</p>

            <x-slot name="footer">
                <div class="flex justify-end">
                    <a href="{{route('bitacora.edit', $bitacora)}}" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Edit</a>
                </div>
            </x-slot>
        </x-card>
        @empty
            <div class="flex flex-col justify-center items-center space-x-4 col-span-5 mt-5">
                <p class="text-xl">There is no data!</p>
                <div>
                    <a href="{{route('bitacora.create')}}" class="font-medium text-fg-brand text-blue-600 hover:underline">Create an entrie</a>
                </div>
            </div>
        @endforelse
    </div>
        {{ $bitacoras->links() }}
</x-layouts.app>
