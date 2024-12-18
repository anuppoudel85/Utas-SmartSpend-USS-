@forelse($reviews as $review)
    <p>{{ $review->user?->name }} - Score: {{ $review->result }}</p>
@empty
    <p>No reviews yet.</p>
@endforelse
