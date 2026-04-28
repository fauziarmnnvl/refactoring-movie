@extends('layout.template')

@section('title', 'Homepage')

@section('content')
<h1 class="mt-4">Popular Movie</h1>
<div class="row">
    @foreach ($movies as $movie)
    <div class="col-lg-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/images/{{ $movie['foto_sampul'] }}" class="img-fluid rounded-start" alt="{{ $movie['judul'] }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['judul'] }}</h5>
                        <p class="card-text text-truncate">{{ $movie['sinopsis'] }}</p>
                        <a href="/movie/{{ $movie['id'] }}" class="btn btn-success">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>
@endsection