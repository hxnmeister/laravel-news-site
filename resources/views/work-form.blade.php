@extends('templates.main')
@section('content')
    <style>
        .required::after
        {
            content: ' *';
            color: red;
        }
    </style>

    <h1>Sample application for employment at a zoo</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <em class="required">Please fill out the form. Required fields are marked </em>
    <form action="{{route('sendWorkForm')}}" method="post" class="p-2">
        @csrf

        <fieldset class="mt-3 border-top border-dark">
            <legend>Contact Information</legend>

            <label for="fName" class="required">Name</label>
            <input type="text" name="fName" id="fName" class="form-control mb-3 @error('fName') is-invalid @enderror" value="{{old('fName')}}">
            @error('fName')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <label for="pNumber">Phone number</label>
            <input type="tel" name="pNumber" id="pNumber" class="form-control mb-3 @error('pNumber') is-invalid @enderror" value="{{old('pNumber')}}">
            @error('pNumber')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <label for="email" class="required">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </fieldset>

        <fieldset class="mt-5 border-top border-dark">
            <legend>Personal Information</legend>

            <label for="age" class="required">Age</label>
            <input type="number" name="age" id="age" min="18" max="60" step="1" class="form-control mb-3 @error('age') is-invalid @enderror"  value="{{old('age')}}">
            @error('age')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-select mb-3">
                <option value="" selected>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="qualities">List your personal qualities</label>
            <textarea name="qualities" id="qualities" cols="10" rows="4" class="form-control">{{old('qualities')}}</textarea>
        </fieldset>

        <fieldset class="mt-5 border-top border-dark">
            <legend>Choose your favorite animals</legend>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="zebra" id="zebra">
                        <label for="zebra">Zebra</label>
                    </div>
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="cat" id="cat">
                        <label for="cat">Cat</label>
                    </div>
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="anaconda" id="anaconda">
                        <label for="anaconda">Anaconda</label>
                    </div>
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="human" id="human">
                        <label for="human">Human</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="elephant" id="elephant">
                        <label for="elephant">Elephant</label>
                    </div>
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="dog" id="dog">
                        <label for="dog">Dog</label>
                    </div>
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="pigeon" id="pigeon">
                        <label for="pigeon">Pigeon</label>
                    </div>
                    <div class="col">
                        <input type="checkbox" name="favAnimals[]" value="crab" id="crab">
                        <label for="crab">Crab</label>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top border-dark mt-5">
            <button class="btn btn-outline-success mt-3">Send Information</button>
        </div>
    </form>
@endsection