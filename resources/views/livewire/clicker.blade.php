<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div class="flex">
        <h2 class="text-center font-semibold text-2xl text-gray-800 mb-5">Create New Account</h2>
    </div>

    @if (session('success'))
        <span class="w-100 p-3 m-5 bg-green-300 rounded">{{ session('success') }}</span>
    @endif

    <form wire:submit="createNewUser" action="">
        <label for="name" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Name</label>
        <input
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2 mt-1"
            wire:model="name" id="name" type="text" placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label for="email" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Email</label>
        <input
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2 mt-1"
            wire:model="email" type="email" id="email" placeholder="email">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label for="password" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Password</label>
        <input
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2 mt-1"
            wire:model="password" type="password" id="password" placeholder="password">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label for="profile-picture" class="mt-3 block text-sm font-medium leading-6 text-gray-900">Profile
            Picture</label>
        <input accept="image/png, image/jpeg, image/jpg"
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-3 py-2 mt-1"
            wire:model="image" type="file" id="profile-picture" placeholder="password">
        @error('image')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        @if ($image)
            <img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
        @endif

        <div wire:loading wire:target="image">
            <span class="text-green-500">Uploading...</span>
        </div>

        <button type="submit"
            class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Create
            +</button>
    </form>
</div>
