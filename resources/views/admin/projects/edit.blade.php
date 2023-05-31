@extends('layouts.admin')

@section('page-title', "Modifica: $project->title")

@section('content')
    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror " id="link" name="link"
                value="{{ old('link', $project->link) }}">
            @error('link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">

            <label for="cover_image" class="form-label">Seleziona immagine di copertina</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror " id="cover_image" name="cover_image">

                @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Seleziona tipo di linguaggio</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option @selected(old('type_id', $project->type_id) == '') value="">Nessuna tipo selezionato</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Testo dell'articolo</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            @foreach ($technologies as $technology)
                @if ($errors->any())
                    <input id="tag_{{ $technology->id }}" @if (in_array($technology->id, old('technologies', []))) checked @endif type="checkbox"
                        name="technologies[]" value="{{ $technology->id }}">
                @else
                    <input id="tag_{{ $technology->id }}" @if ($project->technologies->contains($technology->id)) checked @endif type="checkbox"
                        name="technologies[]" value="{{ $technology->id }}">
                @endif
                <label for="tag_{{ $technology->id }}" class="form-label">{{ $technology->name }}</label>
                <br>
            @endforeach
            @error('tags')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            @error('technologies')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Salva</button>
        <button type="reset" class="btn btn-danger">Cancella</button>

    </form>
@endsection
