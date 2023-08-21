@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5>Consumptions</h5>
                <table class="table table-dark table-hover my-table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th>Date</th>
                            <th>Water</th>
                            <th>Electricity</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = ($consumptions->currentPage() - 1) * $consumptions->perPage() + 1;
                        @endphp

                        @forelse($consumptions as $consumption)
                            <tr>
                                <td scope="row">{{ $counter++ . '. ' }}</td>
                                <td>{{ $consumption->date }}</td>
                                <td>{{ $consumption->water }}</td>
                                <td>{{ $consumption->electricity }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">
                                        <img class="small-image" src="{{ asset('images/' . $consumption->image_path) }}"
                                            alt="image">
                                    </a>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5">
                                    <p class="text-center" style="color: crimson">Has No Consumptions</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Consumption of {{ $consumption->date }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('images/' . $consumption->image_path) }}" class="img-fluid"
                                    alt="image">
                            </div>
                        </div>
                    </div>
                </div>

                <div data-bs-theme="dark">
                    {{ $consumptions->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@endsection
