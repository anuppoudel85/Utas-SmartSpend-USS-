@extends('layout.app')
@section('title', 'Submit new Paper')

@section('content')
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Submit a New Paper</h2>

        <form action="{{ route('submissions.store') }}" method="post" id="submission_form" data-author-check="0">

            <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">

            <div class="row">
                <div class="col" id="author-details">
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" id="author" class="form-control" required>
                        <p class="form-error text-danger" style="display: none" id="error-author"></p>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <p class="form-error text-danger" style="display: none" id="error-email"></p>
                    </div>

                    <div class="mb-3">
                        <label for="affiliate" class="form-label">Affiliate</label>
                        <input type="text" name="affiliate" id="affiliate" class="form-control" required>
                        <p class="form-error text-danger" style="display: none" id="error-affiliate"></p>
                    </div>

                    <div class="mb-5" id="author-actions">
                        <p id="author-found-text"></p>

                        <button type="button" class="btn btn-outline-success preview-button" style="display: none">Show Paper</button>
                        <button type="button" class="btn btn-outline-success submit-anyway" style="display: none">Submit Paper</button>

                        <a href="{{ route('submissions.index') }}" class="btn btn-secondary me-2 cancel-button">Cancel</a>
                        <input type="submit" value="Next" class="btn btn-primary next-button">
                    </div>
                </div>
                <div class="col" id="paper-details" style="display: none">
                    <div class="mb-3">
                        <label for="paper_type" class="form-label">Type of Paper</label>
                        <select name="paper_type" id="paper_type" class="form-select">
                            <option value="">Select the type of paper</option>
                            @foreach($paper_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <p class="form-error text-danger" style="display: none" id="error-paper_type"></p>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        <p class="form-error text-danger" style="display: none" id="error-title"></p>
                    </div>

                    <div class="mb-3">
                        <label for="abstract" class="form-label">Abstract</label>
                        <input type="text" name="abstract" id="abstract" class="form-control">
                        <p class="form-error text-danger" style="display: none" id="error-abstract"></p>
                    </div>

                    <div class="mb-5" id="paper-actions">
                        <button type="button" id="paper-cancel" class="btn btn-secondary me-2">Cancel</button>
                        <input type="submit" value="Add Paper" class="btn btn-primary">
                    </div>
                </div>

                <div class="col" id="paper-detail-view" style="display: none">
                    <div class="mb-3">
                        <h6 class="fw-bold">Paper Type</h6>
                        <p id="paper-type-view">Loading...</p>
                        <hr>

                        <h6 class="fw-bold">Paper Title</h6>
                        <p id="paper-title-view">Loading...</p>
                        <hr>

                        <h6 class="fw-bold">Abstract</h6>
                        <p id="paper-abstract-view">Loading...</p>
                        <hr>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/submission.js') }}"></script>
@endsection
