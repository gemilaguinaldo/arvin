<form id="createExpense" action="{{ route('expenses.store') }}" method="POST">
    <div class="modal fade" id="createExpenseModal" tabindex="-1" role="dialog" aria-labelledby="createExpenseModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createExpenseModalTitle">Create Expense</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="expense_category_id" class="col-form-label">Expense Category:</label>
                    <select name="expense_category_id" id="create_user_expense_category_id" class="form-control">
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->display_name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="amount" class="col-form-label">Amount:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dollarSign">$</span>
                    </div>
                    <input type="number" id="create_user_amount" name="amount" step="0.01" min="0" value="" class="form-control" aria-describedby="dollarSign">
                </div>

                <div class="form-group">
                    <label for="entry_date" class="col-form-label">Entry Date:</label>
                    <input type="date" name="entry_date" class="form-control" id="create_expense_entry_date" value=""></input>
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