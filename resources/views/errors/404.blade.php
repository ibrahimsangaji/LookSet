@extends('body')

@section('content')
    <div id="wrapper" class="container">
        <div id="content-wrapper" class="row d-flex flex-column mt-5">
            <div id="content">
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center mt-5 mb-5">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">Looks like you found an error on the LookSet page...</p>
                        <a href="/wellcome">&larr; Back to Home page</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
