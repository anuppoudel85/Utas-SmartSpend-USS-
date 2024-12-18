@extends('layout.app')
@section('title', 'Details')

@section('content')
    <div class="bg-light border-top border-bottom">
        <div class="container py-5">
            <h1 class="text-center fw-bold">Details about the conference</h1>
        </div>
    </div>

    <div class="container pt-4">
        <h2 class="mb-4 fw-bold">Conference Date: 22-24 September 2023</h1>

            <h3 class="fw-bold">Submission deadlines and page limits
        </h2>

        <table class="table table-striped mb-5">
            <thead>
            <tr>
                <th></th>
                <th>Pages</th>
                <th>Deadline</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Paper</td>
                <td>6 pages plus 1 page references if required</td>
                <td>1 April</td>
            </tr>
            <tr>
                <td>Working group</td>
                <td>2 pages</td>
                <td>1 April</td>
            </tr>
            <tr>
                <td>Poster</td>
                <td>1 page</td>
                <td>15 Jun</td>
            </tr>
            <tr>
                <td>Doctoral consortium</td>
                <td>2 pages</td>
                <td>15 Jun</td>
            </tr>
            <tr>
                <td>Tips, techniques & courseware</td>
                <td>2 pages</td>
                <td>15 Jun</td>
            </tr>
            </tbody>
        </table>

        <!-- Contact Address -->
        <h2>Contact Address</h2>

        <table class="table small-table">
            <tr>
                <th>Conference Chair</th>
                <td>conferencechair@conference.com</td>
            </tr>
            <tr>
                <th>Organization</th>
                <td>organization@conference.com</td>
            </tr>
            <tr>
                <th>Supporter Liaison</th>
                <td>support@conference.com</td>
            </tr>
        </table>
    </div>
@endsection
