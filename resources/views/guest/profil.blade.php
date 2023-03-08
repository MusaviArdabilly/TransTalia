@extends('guest.layout')
@section('title', 'Profil')
@section('content')

<script type="text/javascript">
    document.getElementById('profil').classList.add('fw-bold', 'border-bottom', 'border-primary', 'rounded-bottom');
</script>

    <div class="minvh100-157">
        Hello World profil
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <h3>Tentang</h3>
                    <h1 class="fw-semi-bold">Trans Talia</h1>
                    <P>Trans Talia adalah perusahaan jasa yang bergerak dibidang transportasi darat. <br> Memiliki (10) armada bus yang terbagi menjadi dua kategori yaitu big bus dan medium bus.</p>
                </div>
            </div>
        </div>
    </div>

@endsection