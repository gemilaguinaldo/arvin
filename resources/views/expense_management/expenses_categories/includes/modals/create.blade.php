<form id="createCategory" action="{{ route('categories.store') }}" method="POST">
    <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createCategoryModalTitle">Create Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="display_name" class="col-form-label">Display Name:</label>
                    <input type="text" name="display_name" class="form-control" id="create_role_display_name" value=""></input>
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea name="description" id="create_role_description" style="resize:none;" rows="10" class="form-control"></textarea>
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