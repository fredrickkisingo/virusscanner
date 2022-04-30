@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="POST" action="{{ route('get-scan-report') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="userinput1">Input URL</label>
                            <input type="text" id="scan_url" class="form-control border-primary" placeholder="https://abc.com"
                                   name="scan_url" value="" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Submit
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
