<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <Link href="{{ route('users.create') }}" class="p-4 bg-green-500 text-white rounded-lg"> Create User </Link>
            <x-splade-table :for="$users">
                <x-splade-cell actions as="$user" class="">
                    <x-splade-link href="{{ route('users.edit', $user) }}"
                        class="p-2 bg-blue-400 text-white rounded-lg">Edit</x-splade-link>
                    <x-splade-form action="{{ route('users.destroy', $user) }}" method="delete" confirm="Delete User"
                        confirm-text="Are you sure you want to delete your User?"
                        confirm-button="Yes, delete this User!" cancel-button="No, I want to stay!">
                        <x-splade-button class="p-4 bg-red-500 text-white rounded-lg">Delete</x-splade-button>
                    </x-splade-form>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
