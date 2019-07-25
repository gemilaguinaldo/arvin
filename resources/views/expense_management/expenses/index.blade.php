@extends('layouts.app')

@section('title')
Expenses
@stop

@section('breadcrumbs')
Expense Management > Expenses
@stop

@section('content')
<div class="row mb-3">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-success createExpense">Create Expense</button>
    </div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Expense Category</th>
      <th scope="col">Amount</th>
      <th scope="col">Entry Date</th>
      <th scope="col">Created At</th>
      <th scope="col" class="text-right">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($expenses as $expense)
            <tr>
                <th scope="row">{{ $expense->expenseCategory->display_name }}</th>
                <td>${{ $expense->amount }}</td>
                <td>{{ $expense->entry_date->format('Y-m-d') }}</td>
                <td>{{ $expense->created_at->format('Y-m-d')}}</td>
                <td class="text-right">
                    <button data-id="{{ $expense->id }}" data-amount="{{ $expense->amount }}" data-entry_date="{{ $expense->entry_date->format('Y-m-d') }}" data-expense_category_id="{{ $expense->expense_category_id }}" class="updateExpense btn btn-sm btn-success">Update</button>
                    <button data-id="deleteExpense{{ $expense->id }}" class="deleteExpense btn btn-sm btn-danger">Remove</button>
                    <form id="deleteExpense{{ $expense->id }}" action="{{ route('expenses.destroy', $expense) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
      @endforeach
  </tbody>
</table>
{{ $expenses->links() }}
@include('expense_management.expenses.includes.modals.delete')
@include('expense_management.expenses.includes.modals.update')
@include('expense_management.expenses.includes.modals.create')
@stop

@section('footer-scripts')
<script>
    // Delete Confirm
    $('.deleteExpense').on('click', function() {
        var id = $(this).data('id');
        $('#deleteExpenseModal').modal('show');
        $('#confirmDeleteBtn').on('click', function() {
            $('#' + id).submit();
        });
    });

    $('.updateExpense').on('click', function() {
        var id = $(this).data('id');
        var expense_category_id = $(this).data('expense_category_id');
        var amount = $(this).data('amount');
        var entry_date = $(this).data('entry_date');
        $('#updateExpenseModal').modal('show');
        $('#updateExpense').attr('action', '/expenses/' + id);
        $('input#amount').val(amount);
        $('input#entry_date').val(entry_date);
        $('select[name=expense_category_id] option[value=' + expense_category_id + ']').prop('selected', true);
    });

    $('.createExpense').on('click', function() {
        $('#createExpenseModal').modal('show');
    });
</script>
@stop