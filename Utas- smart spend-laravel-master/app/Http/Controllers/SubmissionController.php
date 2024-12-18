<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\PaperType;
use App\Models\Review;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SubmissionController extends Controller
{
    /**
     * Show submission list.
     *
     * @return View
     */
    public function index(): View
    {
        $submissions = Paper::query()
            ->with(['user:id,name,email', 'paperType:id,name,location_id', 'paperType.location:id,name'])
            ->withAvg('reviews', 'result')
            ->get();

        return view('submissions.index', compact('submissions'));
    }

    /**
     * Show add submission form.
     *
     * @return View
     */
    public function create(): View
    {
        $paper_types = PaperType::all();

        return view('submissions.create', compact('paper_types'));
    }

    /**
     * Saves the submission. Creates User (Author) if needed.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'author'     => ['required', 'string', 'max:254'],
            'email'      => ['required', 'string', 'email', 'max:254'],
            'affiliate'  => ['required', 'string', 'max:254'],
            'paper_type' => ['required', 'string', 'max:254'],
            'title'      => ['required', 'string', 'max:254'],
            'abstract'   => ['required', 'string', 'max:254'],
        ]);

        $user = $this->checkAuthor($request->input('email'));

        if ($user && $user->paper) {
            throw ValidationException::withMessages([
                'error' => 'You have already submitted the paper.',
            ]);
        }

        if (!$user) {
            // Create User
            $user = User::create([
                'name'        => $request->input('author'),
                'email'       => $request->input('email'),
                'password'    => bcrypt('password'),
                'affiliation' => $request->input('affiliate'),
                'role_id'     => 4, // 4 is the role ID for "Author"
            ]);
        }

        $user->paper()->create([
            'paper_type_id' => $request->input('paper_type'),
            'title'         => $request->input('title'),
            'abstract'      => $request->input('abstract'),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * View submission details. This will be called by AJAX and shown on submission page.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $paper = Paper::findOrFail($id);

        return response()->json([
            'success' => true,
            'paper'   => [
                'title'      => $paper->title,
                'abstract'   => $paper->abstract,
                'paper_type' => $paper->paperType?->name,
            ]
        ]);
    }

    /**
     * Edit page for Submission.
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $paper       = Paper::findOrFail($id);
        $paper_types = PaperType::all();

        return view('submissions.edit', compact('paper', 'paper_types'));
    }

    /**
     * Update the Submission.
     *
     * @param  Request  $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $paper = Paper::findOrFail($id);

        $request->validate([
            'paper_type' => ['required', 'exists:paper_types,id'],
            'title'      => ['required', 'string', 'max:254'],
            'abstract'   => ['required', 'string', 'max:254'],
        ]);

        $paper->update([
            'paper_type_id' => $request->input('paper_type'),
            'title'         => $request->input('title'),
            'abstract'      => $request->input('abstract'),
        ]);

        return redirect()->route('submissions.index');
    }

    public function destroy($id): JsonResponse
    {
        $paper = Paper::findOrFail($id);

        $paper->delete();

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Basic check for Submission. This will be called by AJAX.
     *
     * Checks: If author already exists, if so, if paper was already submitted.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function check(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'author'    => ['required', 'string', 'max:254'],
            'email'     => ['required', 'string', 'email', 'max:254'],
            'affiliate' => ['required', 'string', 'max:254'],
        ]);

        try {
            $validator->validate();
        } catch (ValidationException) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ]);
        }

        // Check If User Exists
        $author = $this->checkAuthor($request->input('email'));

        if (!$author) {
            return response()->json([
                'author_found'    => false,
                'paper_submitted' => false,
            ]);
        }

        // We found the author, do they have paper?
        if (!$author->paper) {
            return response()->json([
                'author_found'    => true,
                'paper_submitted' => false,
                'author_id'       => $author->id,
            ]);
        }

        // We found papers,
        return response()->json([
            'author_found'    => true,
            'paper_submitted' => true,
            'author_id'       => $author->id,
            'paper_id'        => $author->paper->id,
        ]);
    }

    /**
     * Returns the list of reviews.
     * Called by AJAX, returns HTML that is rendered in modal.
     *
     * @param $id
     * @return View
     */
    public function reviews($id): View
    {
        $reviews = Review::query()
            ->where('paper_id', $id)
            ->with('user')
            ->get();

        return view('submissions.reviews', compact('reviews'));
    }

    /**
     * Check if the author with given email exists or not.
     *
     * @param  string  $email
     * @return User|null
     */
    private function checkAuthor(string $email): ?User
    {
        return User::query()
            ->where('email', $email)
            ->with('paper')
            ->first();
    }
}
