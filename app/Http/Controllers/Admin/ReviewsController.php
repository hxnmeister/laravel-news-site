<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Review;
    use Illuminate\Http\Request;

    class ReviewsController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $allReviews = Review::all();
            $avgRating = 0;

            foreach($allReviews as $review)
            {
                $avgRating += $review->rate;
            }
            $avgRating /= count($allReviews);

            return view('admin/reviews/index', compact('allReviews', 'avgRating'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('admin/reviews/create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
