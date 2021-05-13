@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">

            <div class="card-body">
                <h2 class="card-title">Challenge</h2>
                <p class="card-text text-justify">Write a process that imports the contents of a JSON-file cleanly and
                    consistently to a
                    database. Preferably this is done as a background job in Laravel. Docker use is encouraged
                    (but not required).
                </p>
                <p class="card-text text-justify">When analyzing your solution, our focus is mainly on its structure. We
                    prefer to see a solid,
                    clean and maintainable solution that is not 100% functional or finished, rather than a
                    complete solution that is sloppy or hard to understand. We are particularly interested in the
                    thought process behind your approach.</p>
                <p>Requirements:</p>
                <ul>
                    <li>[Primary] Write a process such that it may be terminated (by anything, including a
                        SIGTERM, power failure, what have you) at any time, after which it may resume in a
                        robust, reliable manner. The process must continue exactly where it left off, without
                        writing duplicate entries.
                    </li>
                    <li>Design your solution 'for the future', that is: taking into account a hypothetical
                        customer who typically changes and extends their requirements time after time.
                    </li>
                    <li>The data model must be sensible, but is not a focus of the test. Code for Eloquentmodels
                        or any other access structure itself is not crucial.
                    </li>
                    <li>Only process records for which the subject's age is between 18 and 65 (or is
                        unknown).
                    </li>
                </ul>

            </div>

        </div>
    </div>
@endsection
