<div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/{{request()->segment(1)}}">{{ ucwords(request()->segment(1)) }}</a></li>
                        @if (request()->segment(2))
                            <li class="breadcrumb-item"><a href="#">{{ ucwords(request()->segment(2)) }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ ucwords(request()->segment(3)) }}</a></li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
