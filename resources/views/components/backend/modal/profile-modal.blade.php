<div class="modal fade modal-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card client-card mt-4">
                        <div class="card-body text-center">
                            <img src="{{ auth()->user()->image }}" alt="user" class="rounded-circle thumb-xl">
                            <h5 class=" client-name">{{ auth()->user()->name }} ({{ auth()->user()->username }})</h5>
                            <span class="text-muted mr-3"><i class="far fa-envelope mr-2 text-info"></i>{{ auth()->user()->email }}</span>
                            {{-- <span class="text-muted mr-3"><i class="dripicons-location mr-2 text-info"></i>New York, USA</span> --}}
                            <span class="text-muted"><i class="dripicons-phone mr-2 text-info"></i>{{ auth()->user()->phone }}</span>
                            <p class="text-muted text-center mt-3">Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                            {{-- <button type="button" class="btn btn-sm btn-soft-secondary">Project</button> --}}
                            {{-- <button type="button" class="btn btn-sm btn-soft-primary">Message</button> --}}
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
