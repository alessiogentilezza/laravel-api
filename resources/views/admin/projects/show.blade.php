@extends('layouts.admin')


@section('page-title', $project->title)

@section('content')
    <div class="card m-3" style="width: 18rem;">

        <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top p-3" alt="...">

        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
            <h6 class="card-subtitle mb-3 text-success">Tipo di linguaggio:
                {{ $project->type ? $project->type->name : 'Nessun linguaggio scelto' }}</h6>
            <h6 class="card-subtitle mb-3 text-primary">Tecnology:
                @forelse ($project->technologies as $technology)
                    {{ $technology->name }}
                @empty
                    <span>Non hai selezionato nessua tecnologia</span>
                @endforelse
            </h6>
            <a href="{{ $project->link }}" class="btn btn-success">Vai</a>
            <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Lista preogetti</a>
        </div>
    </div>
@endsection
