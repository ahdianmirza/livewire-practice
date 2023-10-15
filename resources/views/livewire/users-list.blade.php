<div wire:poll.keep-alive class="mt-10 p-5 shadow border-teal-500 border-t-2">
    <h1 class="font-semibold text-2xl text-gray-800 mb-5">Users List</h1>

    <table class="table-fixed border border-slate-500 mb-4 w-full">
        <thead>
            <tr>
                <th class="border border-slate-600 px-3 py-1">NAME</th>
                <th class="border border-slate-600 px-3 py-1">EMAIL</th>
                <th class="border border-slate-600 px-3 py-1">JOINED</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border border-slate-600 px-3 py-1">{{ $user->name }}</td>
                    <td class="border border-slate-600 px-3 py-1">{{ $user->email }}</td>
                    <td class="border border-slate-600 px-3 py-1">{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
