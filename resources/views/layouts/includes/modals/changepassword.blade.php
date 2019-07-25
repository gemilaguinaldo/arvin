<form action="{{ route('user.changepassword') }}" method="POST">
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="old_password" class="col-form-label">Old Password:</label>
            <input type="password" name="old_password" class="form-control" id="old_password" value=""></input>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">New Password:</label>
            <input type="password" name="password" class="form-control" id="password" value=""></input>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="col-form-label">Confirm New Password:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value=""></input>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update Password</button>
      </div>
    </div>
  </div>
</div>
</form>