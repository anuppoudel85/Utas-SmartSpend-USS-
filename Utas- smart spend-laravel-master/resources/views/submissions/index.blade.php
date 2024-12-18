@extends('layout.app')
@section('title', 'Submissions')

@section('content')
    <div class="container py-5">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Submissions List</h2>

            <a href="{{ route('submissions.create') }}" class="btn btn-secondary">Submit a new paper</a>
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Type</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Location</th>
                <th>Scores</th>
                <th style="width: 250px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($submissions as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user?->name }}</td>
                <td>{{ $item->paperType?->name }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->abstract }}</td>
                <td>{{ $item->paperType?->location?->name }}</td>
                <td>{{ round($item->reviews_avg_result, 2) }}</td>
                <td>
                    <button type="button" data-id="{{ $item->id }}" class="review btn btn-sm btn-primary me-2">
                        Reviewer
                    </button>
                    <a href="{{ route('submissions.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">
                        Edit
                    </a>
                    <button type="button" data-id="{{ $item->id }}" class="delete btn btn-sm btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No submissions found.</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>


    <!-- Modal for Reviews -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reviewModalLabel">Reviews for Submission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="review-response">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- CSRF Token for Delete -->
    <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/submission-index.js') }}"></script>
@endsection
