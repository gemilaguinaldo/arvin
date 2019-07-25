@extends('layouts.app')

@section('title')
Roles
@stop

@section('breadcrumbs')
User Management > Roles
@stop

@section('content')
<div class="row mb-3">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-success createRole">Create Role</button>
    </div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Display Name</th>
      <th scope="col">Description</th>
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($roles as $role)
            <tr>
                <th scope="row">{{ $role->display_name }}</th>
                <td>{{ $role->description ?: 'N/A' }}</td>
                <td class="text-right">
                    <button data-id="{{ $role->id }}" data-displayname="{{ $role->display_name }}" data-description="{{ $role->description }}" data-admin="{{ $role->is_admin }}" class="updateRole btn btn-sm btn-success">Update</button>
                    <button data-id="deleteRole{{ $role->id }}" class="deleteRole btn btn-sm btn-danger">Remove</button>
                    <form id="deleteRole{{ $role->id }}" action="{{ route('roles.destroy', $role) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
      @endforeach
  </tbody>
</table>
{{ $roles->links() }}
@include('user_management.roles.includes.modals.delete')
@include('user_management.roles.includes.modals.update')
@include('user_management.roles.includes.modals.create')
@stop

@section('footer-scripts')
<script>
    // Delete Confirm
    $('.deleteRole').on('click', function() {
        var id = $(this).data('id');
        $('#deleteRoleModal').modal('show');
        $('#confirmDeleteBtn').on('click', function() {
            $('#' + id).submit();
        });
    });

    $('.updateRole').on('click', function() {
        var id = $(this).data('id');
        var display_name = $(this).data('displayname');
        var description = $(this).data('description');
        var isadmin = $(this).data('admin');
        $('#updateRoleModal').modal('show');
        $('#updateRole').attr('action', '/roles/' + id);
        $('input#display_name').val(display_name);
        $('textarea#description').val(description);
        if(isadmin == 1) {
            $('input#is_admin').prop( "checked", true );    
        } else {
            $('input#is_admin').prop( "checked", false );    
        }
    });

    $('.createRole').on('click', function() {
        $('#createRoleModal').modal('show');
    });
</script>
@stop