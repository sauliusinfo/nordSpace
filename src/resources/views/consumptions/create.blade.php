@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h5 class="text-end">Add Consumption</h5>

                <p>Last declared:<br>
                    water - {{ $consumptionFirst->water }} | electricity - {{ $consumptionFirst->electricity }}</p>

                <form method="post" action="{{ route('consumptions-store') }}" enctype="multipart/form-data">
                    <div class="mb-3" data-bs-theme="dark">
                        @php
                            $currentDate = date('Y-m-d');
                        @endphp
                        <label for="date">Select date</label>
                        <input name="date" type="date" class="form-control" value="{{ old('date', $currentDate) }}">
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label for="water">Water (currently last consumption)</label>
                        <input name="water" type="text" class="form-control"
                            value="{{ old('water', $consumptionFirst->water) }}">
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label for="electricity">Electricity (currently last consumption)</label>
                        <input name="electricity" type="text" class="form-control"
                            value="{{ old('electricity', $consumptionFirst->electricity) }}">
                    </div>
                    <div class="mb-3" data-bs-theme="dark">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('consumptions-index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-outline-success">Declare</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection
