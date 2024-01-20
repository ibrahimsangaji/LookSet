@extends('body')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex align-items-center">
                <h3 class="font-weight-bold text-primary">Update</h3>
            </div>

            <div class="card-header py-3 text-center">
                <h5 class="m-0 font-weight-bold text-primary">IT Room</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Asset Number</th>
                                <th>Name</th>
                                <th>Device</th>
                                <th>PIC</th>
                                <th>Condition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <a href="">
                                    <th>ASN-0000023</th>
                                    <th>HP Pavilion 27 i7</th>
                                    <th>Computer</th>
                                    <th>Humam Septi</th>
                                    <th>Good</th>
                                </a>
                            </tr>
                            <a href="">
                                <tr>
                                    <th>ASN-0000003</th>
                                    <th>HP Pavilion 27 i7</th>
                                    <th>Computer</th>
                                    <th>Humam Septi</th>
                                    <th>Good</th>
                                </tr>
                            </a>
                            <tr>
                                <th><a href="">ASN-0000003</a></th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
