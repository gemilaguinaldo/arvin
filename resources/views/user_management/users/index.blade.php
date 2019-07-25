@extends('layouts.app')

@section('title')
Users
@stop

@section('breadcrumbs')
User Management > Users
@stop

@section('content')
<div class="row mb-3">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-success createUser">Create user</button>
    </div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Role</th>
      <th scope="col">Created At</th>
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->name }}</th>
                <td>{{ $user->email }}</td>
                <td>{{ isset($user->role) ? $user->role->display_name : 'N/A' }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td class="text-right">
                    <button data-userid="{{ $user->id }}" data-username="{{ $user->name }}" data-useremail="{{ $user->email }}" data-userrole="{{ $user->role_id }}" class="updateUser btn btn-sm btn-success">Update</button>
                    <button data-id="deleteUser{{ $user->id }}" class="deleteuser btn btn-sm btn-danger">Remove</button>
                    <form id="deleteUser{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
      @endforeach
  </tbody>
</table>
{{ $users->links() }}
@include('user_management.users.includes.modals.delete')
@include('user_management.users.includes.modals.update')
@include('user_management.users.includes.modals.create')
@stop

@section('footer-scripts')
<script>
    // Delete Confirm
    $('.deleteuser').on('click', function() {
        var id = $(this).data('id');
        $('#deleteUserModal').modal('show');
        $('#confirmDeleteBtn').on('click', function() {
            $('#' + id).submit();
        });
    });

    $('.updateUser').on('click', function() {
        var userid = $(this).data('userid');
        var username = $(this).data('username');
        var useremail = $(this).data('useremail');
        var userrole = $(this).data('userrole');
        $('#updateUserModal').modal('show');
        $('#updateUser').attr('action', '/users/' + userid);
        $('input#name').val(username);
        $('input#email').val(useremail);
        $('select[name=role_id] option[value=' + userrole + ']').prop('selected', true);
    });

    $('.createUser').on('click', function() {
        $('#createUserModal').modal('show');
    });
</script>
@stop