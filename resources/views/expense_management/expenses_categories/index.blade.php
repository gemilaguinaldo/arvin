@extends('layouts.app')

@section('title')
Expense Categories
@stop

@section('breadcrumbs')
Expense Management > Expense Categories
@stop

@section('content')
<div class="row mb-3">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-success createCategory">Create Category</button>
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
      @foreach($cats as $cat)
            <tr>
                <th scope="row">{{ $cat->display_name }}</th>
                <td>{{ $cat->description ?: 'N/A' }}</td>
                <td class="text-right">
                    <button data-id="{{ $cat->id }}" data-displayname="{{ $cat->display_name }}" data-description="{{ $cat->description }}" class="updateCategory btn btn-sm btn-success">Update</button>
                    <button data-id="deleteCategory{{ $cat->id }}" class="deleteCategory btn btn-sm btn-danger">Remove</button>
                    <form id="deleteCategory{{ $cat->id }}" action="{{ route('categories.destroy', $cat->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
      @endforeach
  </tbody>
</table>
{{ $cats->links() }}
@include('expense_management.expenses_categories.includes.modals.delete')
@include('expense_management.expenses_categories.includes.modals.update')
@include('expense_management.expenses_categories.includes.modals.create')
@stop

@section('footer-scripts')
<script>
    // Delete Confirm
    $('.deleteCategory').on('click', function() {
        var id = $(this).data('id');
        $('#deleteCategoryModal').modal('show');
        $('#confirmDeleteBtn').on('click', function() {
            $('#' + id).submit();
        });
    });

    $('.updateCategory').on('click', function() {
        var id = $(this).data('id');
        var display_name = $(this).data('displayname');
        var description = $(this).data('description');
        $('#updateCategoryModal').modal('show');
        $('#updateCategory').attr('action', '/expenses/categories/' + id);
        $('input#display_name').val(display_name);
        $('textarea#description').val(description);
    });

    $('.createCategory').on('click', function() {
        $('#createCategoryModal').modal('show');
    });
</script>
@stop