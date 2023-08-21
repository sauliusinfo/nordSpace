@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <h1 class="card-title text-center">{{ __('Statistics') }}</h1>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}

                        <div class="row">
                            <div class="col-md-1">&#8226;</div>
                            <div class="col-md-8">Total Clients</div>
                            <div class="col-md-3">{{ $users->count() }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">&#8226;</div>
                            <div class="col-md-8">Total Consumptions</div>
                            <div class="col-md-3">{{ $consumptions->count() }}</div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="d-grid gap-2">
                                <a href="{{ route('consumptions-create') }}" class="btn btn-outline-danger">Add
                                    Consumption</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
