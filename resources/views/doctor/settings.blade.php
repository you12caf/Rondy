<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('doctor.settings.store') }}" method="POST">
                        @csrf

                        <!-- Work Start Time -->
                        <div>
                            <label for="work_start_time" class="block font-medium text-sm text-gray-700">{{ __('Work Start Time') }}</label>
                            <input type="time" id="work_start_time" name="work_start_time" value="{{ old('work_start_time', $settings->work_start_time ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <!-- Work End Time -->
                        <div class="mt-4">
                            <label for="work_end_time" class="block font-medium text-sm text-gray-700">{{ __('Work End Time') }}</label>
                            <input type="time" id="work_end_time" name="work_end_time" value="{{ old('work_end_time', $settings->work_end_time ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>

                        <!-- Booking Status -->
                        <div class="mt-4">
                            <label for="is_booking_enabled" class="block font-medium text-sm text-gray-700">{{ __('Booking Status') }}</label>
                            <select name="is_booking_enabled" id="is_booking_enabled" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="1" {{ old('is_booking_enabled', $settings->is_booking_enabled ?? '') == 1 ? 'selected' : '' }}>Enabled</option>
                                <option value="0" {{ old('is_booking_enabled', $settings->is_booking_enabled ?? '') == 0 ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>

                        <!-- Save Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Save Settings') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>