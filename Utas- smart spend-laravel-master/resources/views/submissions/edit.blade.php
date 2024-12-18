@extends('layout.app')
@section('title', 'Edit Submission')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Update Paper Details</h2>

        <form action="{{ route('submissions.update', $paper->id) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input
                    type="text"
                    disabled
                    id="author"
                    class="form-control"
                    value="{{ $paper->user?->name }}"
                >
            </div>

            <div class="mb-3">
                <label for="paper_type" class="form-label">Type of Paper</label>
                <select name="paper_type" id="paper_type" class="form-select">
                    <option value="">Select the type of paper</option>
                    @foreach($paper_types as $type)
                        <option
                            value="{{ $type->id }}"
                            @selected(old('paper_type', $paper->paper_type_id) == $type->id)
                        >
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('paper_type')
                <p class="form-error text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="{{ old('title', $paper->title) }}"
                >

                @error('title')
                <p class="form-error text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="abstract" class="form-label">Abstract</label>
                <input
                    type="text"
                    name="abstract"
                    id="abstract"
                    class="form-control"
                    value="{{ old('abstract', $paper->abstract) }}"
                >

                @error('abstract')
                <p class="form-error text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mt-3">
                <a href="{{ route('submissions.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
