@extends('body')

@section('content')
    <div class="container-fluid">
        <div class="container">

            <div class="card-header py-3 text-center">
                <h1 class="mt-5 font-weight-bold text-primary">ASN-000003</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('inbound.process') }}">
                @csrf
                <div class="mt-5 mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="Lenovo Yoga i9" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputDevice" class="col-sm-2 col-form-label">Device</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="Laptop" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputDescription" name="explanation" rows="3" placeholder="RAM 32 GB, SSD 1 TB"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputRack" class="col-sm-2 col-form-label">PIC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="Humam Septi" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputSoftware" class="col-sm-2 col-form-label">Condition</label>
                    <div class="col-sm-10">
                        <select name="software_id" id="inputSoftware" class="form-select form-control" required>
                            <option value="" disabled selected>Select Condition</option>
                            <option value=" ">Very Good</option>
                            <option value=" ">Good</option>
                            <option value=" ">Not Good</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right mb-3">Update Data</button>
            </form>

        </div>
    </div>
@endsection
