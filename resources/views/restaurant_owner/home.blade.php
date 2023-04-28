@extends('layouts.main-nav')


@section('css-link')
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 2fr));
            grid-gap: 20px;
            align-items: stretch;
        }

        .grid>article {
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
        }

        .grid>article img {
            max-width: 100%;
        }

        .text {
            padding: 0 10px 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container grid">
        @foreach ($foods as $food)
        @if ($food->discount_id == $food_party_id)
        <article class="rounded p-3 mb-2 bg-secondary text-white">
            @else
            <article class="rounded " style="background-color: white">
        @endif
                
                    <img class="rounded-top"
                        src="{{asset($food->image)}}"
                        alt="user-photo"
                        style="box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;width:100%">
                    <div class="text ">
                        <h3 style="margin:10% 0"><b>{{ $food->name }}</b></h3>
                        <div>
                            @if ($food->materials)
                            <p>Materials: {{ $food->materials }}</p>
                            @endif
                            @if ($food->discount_id)
                            <p>Price: <span style="text-decoration: line-through;"> {{ $food->price}}</span> -> with {{$food->discount*100}}% off <span>{{$food->price - ($food->price*$food->discount)}}</span></p>
                            @else
                            <p>Price: {{ $food->price }}</p>
                            @endif
                            <form action="" method="post">
                                <button class="btn btn-danger" type="submit" value="{{$food->id}}">Delete</button>
                                <a  href="{{route('get-edit-food')}}" class="btn btn-warning mx-2">Edit</a>
                            </form>
                        </div>
                        {{-- <a href="user/{{$user->id}}" class="btn btn-primary">More</a> --}}
                        
                    </div>
                </article>
                
        @endforeach
    </div>
    </div>
@endsection
