@extends('admin.templates.index')
@section('title', 'All Reviews')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total number of reviews</span>
                    <span class="info-box-number">{{count($allReviews)}}</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Average review rating</span>
                    <span class="info-box-number">{{$avgRating}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{route('reviews.create')}}" class="btn btn-outline-info mb-5">Create a Review</a>

        <table class="table table-bordered">
            <thead>
                <th>#</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Rate</th>
                <th>Review Text</th>
            </thead>
    
            <tbody>
                @foreach ($allReviews as $review)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$review->name}}</td>
                        <td>{{$review->email ? $review->email : 'The user did not leave an email!'}}</td>
                        <td>{{$review->rate}}</td>
                        <td>{{$review->content}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection