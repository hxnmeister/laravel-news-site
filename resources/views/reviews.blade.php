@extends('templates.main')
@section('content')
    <style>
        .required::after
        {
            content: '*';
            color: red;
        }
    </style>

    <h1>Reviews Page</h1>
    
    @if (session('values'))
        <div class="alert alert-success">
            {{session('values')['success']}}
        </div>
    @endif

    <form action="{{route('sendReview')}}" method="post">
        @csrf

        <label for="name" class="required mt-3">Name</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <label for="email" class="mt-3">E-Mail</label>
        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <label for="rating" class="required mt-3">Rate</label>
        <input type="number" name="rating" id="rating" min="1" max="5" step="1" value="{{old('rating')}}" class="form-control @error('rating') is-invalid @enderror">
        @error('rating')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <label for="review" class="required mt-3">Review Text</label>
        <textarea name="review" id="review" cols="10" rows="5" class="form-control @error('review') is-invalid @enderror">{{old('review')}}</textarea>
        @error('review')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <button class="btn btn-outline-success mb-5">Send Review</button>
        </div>
    </form>

    <div class="container mt-5">
        @foreach ($reviewsDbData as $review)
            <div class="container border-top border-info p-3">
                <h5>{{$review->name}}</h5>
                <em>{{$review->email}}</em>
                <p>Rating: {{$review->rate}} stars</p>
                <p style="font-weight: bold">{{$review->content}}</p>
                <u>{{$review->created_at ? "Added at: ".$review->created_at->format('d.m.Y H:i') : ""}}</u>
            </div>
        @endforeach
    </div>

@endsection