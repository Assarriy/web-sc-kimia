<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Coach Dashboard') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    {{ __('Manage content and users from one place.') }}
                </p>
            </div>
            <div class="flex gap-2">
                <a href="/admin" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    {{ __('Open Admin Panel') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Quick Actions') }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ __('Jump back into Filament to manage content.') }}</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="/admin/news" class="px-3 py-2 bg-indigo-600 text-white text-xs font-semibold rounded-md hover:bg-indigo-500">
                            {{ __('Manage News') }}
                        </a>
                        <a href="/admin/galleries" class="px-3 py-2 bg-amber-500 text-white text-xs font-semibold rounded-md hover:bg-amber-400">
                            {{ __('Manage Galleries') }}
                        </a>
                        <a href="/admin/users" class="px-3 py-2 bg-emerald-600 text-white text-xs font-semibold rounded-md hover:bg-emerald-500">
                            {{ __('Manage Users') }}
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Your Role') }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ __('You are signed in as a coach.') }}</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-700">
                            {{ __('Coach') }}
                        </span>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Next Steps') }}</h3>
                    <ul class="mt-3 space-y-2 text-sm text-gray-600 list-disc list-inside">
                        <li>{{ __('Create new member or coach accounts as needed.') }}</li>
                        <li>{{ __('Publish updates in News and Galleries.') }}</li>
                        <li>{{ __('Review content before publishing.') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
