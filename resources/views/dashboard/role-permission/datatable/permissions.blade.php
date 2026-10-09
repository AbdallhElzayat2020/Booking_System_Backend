@if($role->name === 'Super Admin')
    <span class="badge badge-danger mt-1"> All Permissions </span>
@else
    <span class="badge text-bg-danger">
        @foreach($role->permissions  as $permission)
            <span class="badge badge-primary mt-1">{{$permission->name}}</span>
        @endforeach
    </span>
@endif
