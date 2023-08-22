<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="max-w-7xl mx-auto px-4 mt-8 flex flex-col lg:w-1/2" :errors="$errors" />

    <form class="max-w-7xl mx-auto px-4 mt-10 flex flex-col lg:w-1/2"
          method="POST"
          action="{{ action('App\Http\Controllers\UserController@store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')"/>
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')"/>
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')"/>
            <x-input id="password" class="block mt-1 w-full"
                     type="password"
                     name="password"
                     required autocomplete="new-password"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-input id="password_confirmation" class="block mt-1 w-full"
                     type="password"
                     name="password_confirmation" required/>
        </div>


        <!-- Is Addmin -->
        <div class="flex gap-4 items-center mt-4">
            <x-input id="isAdmin" class="block w-4 h-4"
                     value="1"
                     type="checkbox"
                     name="is_admin"/>
            <x-label for="isAdmin" class="ml-4" :value="__('Admin Role')"/>
        </div>

        <x-button class="ml-auto mt-4">
            {{ __('Save User') }}
        </x-button>
    </form>

</x-admin-layout>
