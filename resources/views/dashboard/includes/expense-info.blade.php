<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col" class="text-center">Expense Category</th>
      <th scope="col" class="text-right">Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cats as $cat)
        <tr>
            <td class="text-center">{{ $cat->display_name }}</td>
            <td class="text-right">$ {{ $cat->expenses()->where('user_id', \Auth::user()->id)->sum('amount') }}</td>
        </tr>
    @endforeach
  </tbody>
</table>