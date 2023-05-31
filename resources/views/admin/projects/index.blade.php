@extends('layouts.admin')

@section('page-title', 'Elenco dei progetti')

@section('content')
    <a href="{{ route('admin.projects.create') }}" class="btn btn-warning m-3">Crea nuovo progetto</a>
    <div class="container d-flex flex-wrap p-0">
        @foreach ($projects as $project)
            <div class="card m-3" style="width: 18rem;">
                @if ($project->cover_image)
                    <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top p-3" alt="...">
                @else
                    <h3 class="card-img-top p-3 text-danger">NESSUNA IMMAGINE DISPONIBILE</h3>
                    <i class="fa-solid fa-camera-slash"></i>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <h6 class="card-subtitle mb-3 text-success">Tipo di linguaggio:
                        {{ $project->type ? $project->type->name : '-' }}
                        {{-- {{ $project->type?->name}} --}}
                    </h6>
                    <h6 class="card-subtitle mb-3 text-primary">Tecnology:
                        @forelse ($project->technologies as $technology)
                            <li>{{ $technology->name }}</li>
                        @empty
                            <span>-</span>
                        @endforelse
                    </h6>
                    <a class="btn btn-primary" href="{{ route('admin.projects.show', $project->slug) }}">Vedi</a>
                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a>
                    <a href="{{ $project->link }}" class="ms-3 btn btn-success">Vai</a>

                    <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Sei sicuro che vuoi eliminare questo progetto?')"
                            class="mt-3 btn btn-danger">Elimina</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
@endsection
