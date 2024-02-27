{{-- @if (auth()->user()->role->id == 1)
    <h1>Welcome, {{ auth()->user()->name }} as {{ auth()->user()->role->name }}</h1>
@else
    <h1>Welcome, guest-name</h1>
@endif --}}

@can('superadmin')
    <h1>Welcome, {{ auth()->user()->name }} as {{ auth()->user()->role->name }}</h1>
@endcan
@can('admin')
    <h1>Hi, admin</h1>
@endcan
