@extends('body')

@section('content')
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/catalog">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Nav Item - User -->
        <li class="nav-item">
            <a class="nav-link" href="/catalog/user">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
        </li>

        <!-- Nav Item - Device -->
        <li class="nav-item">
            <a class="nav-link" href="/catalog/device">
                <i class="fas fa-fw bi-display-fill"></i>
                <span>Device</span>
            </a>
        </li>

        <!-- Nav Item - Location -->
        <li class="nav-item">
            <a class="nav-link" href="/catalog/location">
                <i class="fas fa-fw bi-geo-alt-fill"></i>
                <span>Location</span>
            </a>
        </li>

        <!-- Nav Item - Rack -->
        <li class="nav-item">
            <a class="nav-link" href="/catalog/rack">
                <i class="fas fa-fw bi-inboxes-fill"></i>
                <span>Rack</span>
            </a>
        </li>

        <!-- Nav Item - Software -->
        <li class="nav-item active">
            <a class="nav-link" href="/catalog/software">
                <i class="fas fa-fw bi-motherboard-fill"></i>
                <span>Software</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column mt-3">
        <div id="content">
            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Software</h1>
                    <a href="/software/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Software
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Information</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($softwares as $software)
                                    <tr>
                                        <td>{{ $software->name }}</td>
                                        <td>{{ $software->information }}</td>
                                        <td class="text-center">
                                            {{-- edit --}}
                                            <a href="{{ route('software.edit', $software->id) }}" class="btn btn-primary mr-4">
                                                <i class="bi bi-wrench-adjustable-circle-fill"></i>
                                            </a>
                                            {{-- delete --}}
                                            <form action="{{ route('software.delete', $software->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-link">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
