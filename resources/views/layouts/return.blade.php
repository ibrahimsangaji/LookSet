@extends('body')

@section('content')
    <div class="container-fluid">
        <div class="container">

            <div class="row mt-5">
                <div class="col-2">
                    <a href="/inbounds" style="text-decoration: none; color: black;">
                        <h3 class="font-weight-bold">Inbound</h3>
                    </a>
                </div>
                <div class="col-1" style="display: flex; align-items: center; justify-content: center;">
                    <div style="border-left: 2px solid black; height: 50px;"></div>
                </div>
                <div class="col-2">
                    <a href="/returns" style="text-decoration: none; color: black;">
                        <h3 class="font-weight-bold">Return</h3>
                        <div style="border-bottom: 4px solid blue; width: 55%;"></div>
                    </a>
                </div>
            </div>

            <form method="post" action="{{ route('return.process') }}">
                @csrf
                <div class="mt-5 mb-3 row">
                    <label for="inputAsset_Number" class="col-sm-2 col-form-label">Asset Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAsset_Number" name="Asset_Number" placeholder="Insert Asset Number" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="Name" aria-label="Disabled input example" disabled readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputDescription" name="explanation" rows="3" placeholder="Insert Description"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputRack" class="col-sm-2 col-form-label">Rack</label>
                    <div class="col-sm-10">
                        <select name="rack_id" id="inputRack" class="form-select form-control" required>
                            <option value="" disabled selected>Select Rack</option>
                            @foreach ($racks as $rack)
                                <option value="{{ $rack->id }}">{{ $rack->explanation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status_id" id="inputStatus" class="form-select form-control" required>
                            <option value="" disabled selected>Select Status</option>
                            @foreach ($statuss as $status)
                                @if ($status->id >= 5 && $status->id <= 7)
                                    <option value="{{ $status->id }}">{{ $status->category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right mb-3">Process Return</button>
            </form>

        </div>
    </div>
@endsection
