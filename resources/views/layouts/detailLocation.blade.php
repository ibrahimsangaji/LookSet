@extends('body')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex align-items-center">
                <h3 class="font-weight-bold text-primary">Detail Location</h3>
                @if(auth()->user()->role == 'user')
                    <h3 class="font-weight-bold text-primary ml-auto">
                        <a href="/locations/update">Update</a>
                    </h3>
                @endif
                @if(auth()->user()->role == 'admin')
                    <h3 class="font-weight-bold text-primary ml-auto">
                        <a href="/locations/update">Update</a>
                    </h3>
                @endif
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
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000023</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Humam Septi</th>
                                <th>Good</th>
                            </tr>
                            <tr>
                                <th>ASN-0000027</th>
                                <th>HP Pavilion 27 i7</th>
                                <th>Computer</th>
                                <th>Sehan Adillah</th>
                                <th>Not Good</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
