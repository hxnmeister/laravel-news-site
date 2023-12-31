<?php

    namespace App\Http\Controllers;

use App\Models\Review;
use GuzzleHttp\Client;
    use Illuminate\Http\Request;
    use Illuminate\View\View;
    use Illuminate\Http\RedirectResponse;
    use App\Rules\CheckPhoneNumber;

    class MainController extends Controller
    {
        function index() : View
        {
            $client = new Client();
            $apiKey = '691ba4a3118340929def144af253526e';
            $newsCount = 4;
            $newsApiUrl = 'https://newsapi.org/v2';
            $mainNewsToSend = [];

            $mainNews = json_decode($client->get("$newsApiUrl/everything?q=Ukraine&apiKey=$apiKey")->getBody(), true);
            $sideNews = json_decode($client->get("$newsApiUrl/top-headlines?country=ua&apiKey=$apiKey")->getBody(), true);

            $randomNumbers = range(0, count($mainNews['articles']) - 1);
            shuffle($randomNumbers);

            for($i = 0; $i < $newsCount; $i++)
            {
                $mainNewsToSend[] = $mainNews['articles'][$randomNumbers[$i]];
            } 

            return view('index', compact('mainNewsToSend', 'sideNews'));
        }

        function contacts() : View
        {
            return view('contacts');
        }

        function workForm() : View
        {
            return view('work-form');
        }

        function sendWorkForm(Request $request) : RedirectResponse
        {
            $request->validate
            (
                [
                    'fName' => 'required|min:2|max:20',
                    'pNumber' => [new CheckPhoneNumber],
                    'email' => 'required|email',

                    'age' => 'required|',
                ]
            );

            $age = $request->age;
            $email = strip_tags($request->email);
            $fName = $request->fName;
            $gender = $request->gender ?? 'Not choosed!';
            $pNumber = $request->pNumber ?? 'No number!';
            $qualities = $request->qualities ?? 'No info about qualities!';
            $favAnimals = $request->favAnimals ?? [];

            $message = "Here`s information about candidate:\n\n Name: $fName\n PhoneNumber: $pNumber\n E-Mail: $email\n Age: $age\n Gender: $gender\n Personal Qualities: $qualities\n Favorite Animals: ".(empty($favAnimals) ? "No favorite animals =(" : implode(', ', $favAnimals));
            mail('valeriy.stronskiy@gmail.com', 'Work Form', $message);

            return redirect()->back()->with('success', 'Information successfully submited!');
        }

        function reviews() : View
        {
            $reviewsDbData = Review::orderBy('created_at', 'desc')->get();

            return view('reviews', compact('reviewsDbData'));
        }

        function sendReview(Request $request) : RedirectResponse
        {
            $request->validate
            (
                [
                    'name' => 'required|min:2|max:25',
                    'rating' => 'required',
                    'review' => 'required|min:5'
                ]
            );

            $review = new Review();
            $name = strip_tags($request->name);

            $review->name = $name;
            $review->email = strip_tags($request->email);
            $review->rate = $request->rating;
            $review->content = htmlentities($request->review);
            $review->save();
            
            return redirect()->back()->with('success', "Thanks for your review $name!");
        }
    }
