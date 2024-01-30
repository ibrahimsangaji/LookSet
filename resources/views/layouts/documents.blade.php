@extends('body')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="font-weight-bold text-primary">Documents</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Doc Number</th>
                                <th>Asset Number</th>
                                <th class="text-center">Category</th>
                                <th class="px-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $document->document_number }}</td>
                                    <td>{{ $document->asset_number }}</td>
                                    <td class="text-center">
                                        @if ($document->condition)
                                            {{ $document->condition->type }}
                                        @endif
                                    </td>
                                    <td class="text-center px-2">
                                        <a href="#" class="btn btn-primary mr-4">
                                            <i class="bi bi-printer-fill"></i>
                                        </a>
                                        <a href="{{ route('documents.detail', $document->id) }}" class="btn btn-primary">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
