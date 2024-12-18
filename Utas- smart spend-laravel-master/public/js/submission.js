$(function () {
    const form = $("#submission_form");

    if (!form) {
        return;
    }

    // CSRF Token
    const token = $('#token');

    // Form: Author Details
    const author = $("#author");
    const email = $("#email");
    const affiliate = $("#affiliate");

    // Form: Paper Details
    const paper_type = $("#paper_type");
    const title = $("#title");
    const abstract = $("#abstract");

    // Form Sections
    const paper_details = $("#paper-details");
    const paper_details_view = $("#paper-detail-view");

    // Buttons
    const author_actions = $("#author-actions");
    const author_found = $("#author-found-text");

    // Author Detail Handle
    form.on("submit", function (e) {
        e.preventDefault();

        // Stage 1: Check for author details
        if (parseInt(form.data("author-check")) !== 1) {
            $.ajax({
                url: "/submissions/check",
                method: 'POST',
                data: {
                    author: author.val(),
                    email: email.val(),
                    affiliate: affiliate.val(),
                    _token: token.val(),
                },
                success: function (response) {
                    handleAuthorFormSubmitResponse(response);
                },
                error: function (error) {
                    alert("There was an error submitting the form. Please try again!");
                },
            });
        } else {
            $.ajax({
                url: "/submissions",
                method: 'POST',
                data: {
                    author: author.val(),
                    email: email.val(),
                    affiliate: affiliate.val(),
                    paper_type: paper_type.val(),
                    title: title.val(),
                    abstract: abstract.val(),
                    _token: token.val(),
                },
                success: function (response) {
                    response = typeof response === "string" ? JSON.parse(response) : response;

                    if (response.success) {
                        alert("Paper has been submitted!");
                        window.location.href = "/submissions";
                        return;
                    }

                    if (response.error) {
                        alert("Failed to save paper. Error: " + response.error);
                    }
                },
                error: function(response) {
                    const error = response.responseJSON;

                    alert(error.message ?? 'Please fill all the fields properly and try again');
                }
            });
        }
    });

    // Handle Author Form Submit Response
    function handleAuthorFormSubmitResponse(response) {
        response = typeof response === "string" ? JSON.parse(response) : response;

        // set toggle to 1 - this makes we skip author check next time we submit form
        form.data("author-check", 1);

        // If we do not find author, allow them to create paper details as it is.
        if (!response.author_found) {
            paper_details.fadeIn();
            disableAuthorSection();
            author_actions.fadeOut();
            return;
        }

        // We found the author, handle if they have paper or not.
        if (!response.paper_submitted) {
            disableAuthorSection();
            author_actions.find(".submit-anyway").fadeIn();
            author_actions.find(".next-button").fadeOut();

            author_found.text("You have already provided author information but no paper was submitted. Do you want to continue to submit the paper?");
            return;
        }

        // If we reach here, we found author and author has paper submitted.
        disableAuthorSection();

        author_actions.find(".next-button").hide();
        author_actions.find(".cancel-button").hide();
        author_actions.find(".preview-button").fadeIn();
        author_actions.find(".preview-button").data("paper-id", response.paper_id);

        author_found.text("You have already submitted the paper. Do you want to view it?");
    }

    // Handle Submit Anyway
    author_actions.find(".submit-anyway").on("click", function (e) {
        e.preventDefault();

        paper_details.fadeIn();
        disableAuthorSection();
        author_actions.fadeOut();
    });

    // Handle Preview (of already submitted paper)
    author_actions.find(".preview-button").on("click", function (e) {
        e.preventDefault();
        console.log("CLICKED");

        const button = $(this);

        paper_details_view.show();
        disableAuthorSection();
        author_actions.fadeOut();

        // Load Data
        $.ajax({
            url: "/submissions/" + button.data("paper-id"),
            success: function (response) {
                response = typeof response === "string" ? JSON.parse(response) : response;

                if (!response.success) {
                    alert("Failed to load details. Reason: " + (response.error ?? "General error"));
                    return;
                }

                console.log({response, paper: response.paper});

                paper_details_view.find(".loading").fadeOut();

                $("#paper-type-view").text(response.paper.paper_type);
                $("#paper-title-view").text(response.paper.title);
                $("#paper-abstract-view").text(response.paper.abstract);

                paper_details_view.find(".details").fadeIn();
            },
            error: function (response) {
                alert("Failed to load paper details. Please try again!");
            },
        });
    });

    // Handle Cancel button on "Paper Details" section
    $("#paper-cancel").on("click", function (e) {
        e.preventDefault();

        // Hide paper details section
        paper_details.fadeOut();

        // Empty values on paper details part
        title.val(null);
        paper_type.val(null);
        abstract.val(null);

        // Re-activate form author check value
        form.data("author-check", 0);

        // activate author section
        activateAuthorSection();
    });

    // Disable fields in author section
    function disableAuthorSection() {
        author.attr("disabled", "disabled");
        email.attr("disabled", "disabled");
        affiliate.attr("disabled", "disabled");
    }

    // Activate fields in author section
    function activateAuthorSection() {
        author.removeAttr("disabled");
        email.removeAttr("disabled");
        affiliate.removeAttr("disabled");
        author_actions.fadeIn();

        $("#author-found-text").hide();
        $(".submit-anyway").hide();
        $(".next-button").show();
    }
});
