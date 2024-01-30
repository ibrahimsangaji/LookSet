<div class="container-fluid">
    <div class="card shadow">

        <div class="card-header text-center">
            <h1 class="font-weight-bold text-primary">
                @if ($document->condition)
                    {{ $document->condition->type }}
                @endif
            </h1>
        </div>

        <div class="container-fluid">
            <div class="container">

                <div class="mt-3 mb-3 row">
                    <label class="col-sm-2 col-form-label">Asset Number : </label>
                    <div class="col-sm-10">
                        {{ $document->asset_number }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Name : </label>
                    <div class="col-sm-10">
                        {{ $document->name }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Device : </label>
                    <div class="col-sm-10">
                        @if ($document->device_id)
                            {{ $document->device->name }}
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Description : </label>
                    <div class="col-sm-10">
                        {{ $document->explanation }}
                    </div>
                </div>

                <div class="mt-5 py-5 d-flex justify-content-between">
                    <div class="col-2">
                        <div style="border-bottom: 2px solid black; width: 100%;"></div>
                        <p class="font-weight-bold text-center">PIC</p>
                    </div>
                    <div class="col-2">
                        <div style="border-bottom: 2px solid black; width: 100%;"></div>
                        <p class="font-weight-bold text-center">PIC</p>
                    </div>
                    <div class="col-2">
                        <div style="border-bottom: 2px solid black; width: 100%;"></div>
                        <p class="font-weight-bold text-center">PIC</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
