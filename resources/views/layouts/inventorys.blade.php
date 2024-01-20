@extends('body')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="font-weight-bold text-primary">Inventorys</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Asset Number</th>
                                <th>Name</th>
                                <th>Device</th>
                                <th>Category</th>
                                <th>Rack</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $document->asset_number }}</td>
                                    <td>{{ $document->name }}</td>
                                    <td>{{ $document->device_name }}</td>
                                    <td>{{ $document->category }}</td>
                                    <td>{{ $document->rack_explanation }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
