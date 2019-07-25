<form id="updateUser" action="" method="POST">
    <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateUserModalTitle">Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <input type="hidden" name="_method" value="PATCH">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" value=""></input>
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email Address:</label>
                    <input type="email" name="email" class="form-control" id="email" value=""></input>
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label">New Password:</label>
                    <input type="password" name="password" class="form-control" id="password" value=""></input>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-form-label">Confirm New Password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value=""></input>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-form-label">Role:</label>
                    <select name="role_id" id="role" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </div>
    </div>
    </div>
</form>