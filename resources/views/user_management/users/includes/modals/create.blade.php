<form id="createUser" action="{{ route('users.store') }}" method="POST">
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createUserModalTitle">Create User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="create_user_name" value=""></input>
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email Address:</label>
                    <input type="email" name="email" class="form-control" id="create_user_email" value=""></input>
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="create_user_password" value=""></input>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-form-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="create_user_password_confirmation" value=""></input>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-form-label">Role:</label>
                    <select name="role_id" id="create_user_role" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </div>
    </div>
    </div>
</form>