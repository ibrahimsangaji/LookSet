@extends('body')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="font-weight-bold text-primary">Approval</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Asset Number</th>
                                <th class="text-center">Category</th>
                                <th class="px-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approvals as $approval)
                                <tr>
                                    <td>{{ $approval->asset_number }}</td>
                                    <td class="text-center">
                                        @if ($approval->condition)
                                            {{ $approval->condition->type }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form method="post" action="{{ route('approval.process', $approval->id) }}">
                                            @csrf
                                            <input type="hidden" name="action" value="approved">
                                            <button type="submit" class="btn btn-success mr-3"><i class="bi bi-check-circle-fill"></i></button>
                                            <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#rejectModal{{ $approval->id }}"><i class="bi bi-x-circle-fill"></i></button>
                                            <a href=" " class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                        </form>

                                        <!-- Modal for Reject Confirmation -->
                                        <div class="modal fade" id="rejectModal{{ $approval->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rejectModalLabel">Reject Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to reject this approval?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form method="post" action="{{ route('approval.process', $approval->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="action" value="reject">
                                                            <button type="submit" class="btn btn-danger">Reject</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
