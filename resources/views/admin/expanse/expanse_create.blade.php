@if(Session::has('version'))
    @extends('layouts.'.Session::get('version').'.adminpages')
@endif

@section('content')

<main role="main" class="col-md-11 ml-sm-auto col-lg-11 pt-3 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 border-bottom">
        <h2>{{$title}}</h2>
        <a class="btn btn-sm btn-primary" href="{{route('expanse.index')}}">Back</a>
    </div>
    <form method="post" action="{{ route('expanse.store') }}" data-parsley-validate class="form-horizontal form-label-left">

        <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }} row">
            <label for="name" class="col-sm-2 col-form-label">Details</label>
            <div class="col-sm-10">
                <textarea id="details" name="details" rows="3"  value="{{ Request::old('details') ?: '' }}" class="form-control col-md-7 col-xs-12"></textarea>
                @if ($errors->has('details'))
                    <span class="help-block">{{ $errors->first('details') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }} row">
            <label for="email" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="number" value="{{ Request::old('amount') ?: '' }}" id="amount" name="amount" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('amount'))
                    <span class="help-block">{{ $errors->first('amount') }}</span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }} row">
            <label for="password" class="col-sm-2 col-form-label">Date & Time</label>
            <div class="col-sm-10">
                <input type="text" value="{{ Request::old('date') ?: '' }}" id="date" name="date" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('date'))
                    <span class="help-block">{{ $errors->first('date') }}</span>
                @endif
            </div>
        </div>

        <div class="ln_solid"></div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-success">Add Expanse</button>
            </div>
        </div>
    </form>
</main>
</div>
</div>

@endsection