@extends('guest.layout')
@section('title', 'Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('beranda').classList.add('fw-bold', 'border-bottom', 'border-primary', 'rounded-bottom');
</script>

    <div class="minvh100-157">
        <div id="carouselExample" class="carousel slide z-0">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/assets/carousel/dummy7.jpg') }}" class="d-block img-fluid object-fit-cover w-100" style="height: 500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/carousel/dummy5.jpg') }}" class="d-block img-fluid object-fit-cover w-100" style="height: 500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/carousel/dummy6.jpg') }}" class="d-block img-fluid object-fit-cover w-100" style="height: 500px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container position-relative mt-n2 px-sm-0 px-lg-5 z-3">
            <div class="bg-light shadow rounded p-3 d-flex justify-content-center mx-lg-5">
                <span class="fw-semibold me-3 my-auto">Cek Sekarang Ketersediaan Bus Yang Ada</span>
                <button class="btn bg-success text-white">Cek Jadwal</button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    asdasd
                </div>
            </div>
        </div>
    </div>

@endsection