@if(Session::has('version'))
  @extends('layouts.'.Session::get('version').'.adminpages')
@endif

@section('content')
   
    <main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 border-bottom">
        <h2>{{$title}}</h2>
        <a class="btn btn-sm btn-primary" href="{{route('expanse.create')}}">Add New Expanse</a>
      </div>
      @if(count($expanses) > 0)
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>id</th>
                <th>Expanse Details</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Added By</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($expanses as $expanse)
                    <tr>
                      <td>{{ $expanse->id }}</td>
                      <td>{{ $expanse->details }}</td>
                      <td>{{ $expanse->amount }}</td>
                      <td>{{ $expanse->date }}</td>
                      <td>{{ $expanse->user->name }}</td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-primary" href="{{ route('expanse.edit', ['id' => $expanse->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Expanse"></i> </a>
                          <a class="btn btn-danger" href="{{ route('expanse.show', ['id' => $expanse->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
            </tbody>
          </table>
          {{ $expanses->links() }}
        </div>
      @else
        <div class="alert alert-info" role="alert">
          There is no record found!
        </div>
      @endif
    </main>
  </div>
</div>
@endsection