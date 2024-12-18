$(function () {
    $(".delete").on("click", function (e) {
        e.preventDefault();

        const id = $(this).data("id");

        if (confirm("Are you sure you want to delete this submission?")) {
            $.ajax({
                method: 'DELETE',
                url: "/submissions/" + id ,
                data: {
                    _token: $('#token').val(),
                },
                success: function (response) {
                    response = typeof response === "string" ? JSON.parse(response) : response;

                    if (response.success) {
                        alert("Submission deleted successfully!");
                        window.location.href = "/submissions/?deleted=" + id;
                        return;
                    }

                    alert("Failed to delete. Please refresh the page.");
                },
                error: function(response) {
                    alert("Failed to delete. Please refresh the page.");
                }
            });
        }
    });

    $(".review").on("click", function (e) {
        e.preventDefault();

        const id = $(this).data('id');


        openReviewModal();

        $.ajax({
            url: '/submissions/' + id + '/reviews',
            success: function (response) {
                $('#review-response').html(response);
            },
            error: function (response) {
                alert('Failed to load reviews for this submission!');
            },
        });
    });

    function openReviewModal() {
        $('#review-response').html('Loading...');

        const reviewModal = new bootstrap.Modal('#reviewModal');
        reviewModal.show();
    }
});
