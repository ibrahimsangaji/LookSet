@extends('body')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="font-weight-bold text-primary">Locations</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Location Number</th>
                                <th>Name Location</th>
                                <th class="text-center">Sum Goods</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>LN-0000001</td>
                                <td>Financial</td>
                                <td class="text-center">73</td>
                                <td class="text-center">
                                    <a href="/locations/detail" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>LN-0000002</td>
                                <td>Room</td>
                                <td class="text-center">73</td>
                                <td class="text-center">
                                    <a href="/locations/detail" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>LN-0000003</td>
                                <td>Divisi</td>
                                <td class="text-center">73</td>
                                <td class="text-center">
                                    <a href="/locations/detail" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>LN-0000004</td>
                                <td>Loho loho</td>
                                <td class="text-center">73</td>
                                <td class="text-center">
                                    <a href="/locations/detail" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>LN-0000005</td>
                                <td>Alatop</td>
                                <td class="text-center">73</td>
                                <td class="text-center">
                                    <a href="/locations/detail" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>LN-0000006</td>
                                <td>Financial Room</td>
                                <td class="text-center">73</td>
                                <td class="text-center">
                                    <a href="/locations/detail" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
