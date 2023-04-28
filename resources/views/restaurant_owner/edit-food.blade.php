@extends('layouts.main-nav')
@section('css-link')
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lato', sans-serif;
    font-family: 'Oswald', sans-serif;
  }
  .wrapper{
    position: fixed;
    top: 0;
    /*left: -100%;*/
    right: -100%;
    height: 100%;
    width: 100%;
    background: #000;
    /*background: linear-gradient(90deg, #f92c78, #4114a1);*/
    /* background: linear-gradient(375deg, #1cc7d0, #2ede98); */
   /* background: linear-gradient(-45deg, #e3eefe 0%, #efddfb 100%);*/
    transition: all 0.6s ease-in-out;
  }
  #active:checked ~ .wrapper{
    /*left: 0;*/
    right:0;
  }
  .menu-btn{
    position: absolute;
    z-index: 2;
    right: 20px;
    /*left: 20px; */
    top: 20px;
    height: 50px;
    width: 50px;
    text-align: center;
    line-height: 50px;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    /*color: #fff;*/
    /*background: linear-gradient(90deg, #f92c78, #4114a1);*/
    /* background: linear-gradient(375deg, #1cc7d0, #2ede98); */
   /* background: linear-gradient(-45deg, #e3eefe 0%, #efddfb 100%); */
    transition: all 0.3s ease-in-out;
  }
  .menu-btn span,
  .menu-btn:before,
  .menu-btn:after{
      content: "";
      position: absolute;
      top: calc(50% - 1px);
      left: 30%;
      width: 40%;
      border-bottom: 2px solid #fff;
      transition: transform .6s cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  .menu-btn:before{
    transform: translateY(-8px);
  }
  .menu-btn:after{
    transform: translateY(8px);
  }
  
  
  .close {
      z-index: 1;
      width: 100%;
      height: 100%;
      pointer-events: none;
      
      transition: background .6s;
  }
  
  /* closing animation */
  #active:checked + .menu-btn span {
      transform: scaleX(0);
  }
  #active:checked + .menu-btn:before {
      transform: rotate(45deg);
    border-color: #fff;
  }
  #active:checked + .menu-btn:after {
      transform: rotate(-45deg);
    border-color: #fff;
  }
  .wrapper ul{
    position: absolute;
    top: 60%;
    left: 50%;
    height: 90%;
    transform: translate(-50%, -50%);
    list-style: none;
    text-align: center;
  }
  .wrapper ul li{
    height: 10%;
    margin: 15px 0;
  }
  .wrapper ul li a{
    text-decoration: none;
    font-size: 25px;
    font-weight: 200;
    padding: 5px;
    color: #fff;
    border-radius: 50px;
    /* position: absolute; */
    line-height: 50px;
    margin: 5px 30px;
    opacity: 0;
    transition: all 0.3s ease;
    transition: transform .6s ;
  }
  .wrapper ul li a:after{
    position: absolute;
    content: "";
    background: #fff;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: 50px;
    transform: scaleY(0);
    z-index: -1;
    transition: transform 0.7s ease;
  }
  /* .wrapper ul li a:hover:after{
    transform: scaleY(1);
  } */
  .wrapper ul li a:hover{
    color: #1a73e8;
  }
  input[type="checkbox"]{
    display: none;
  }
  .content{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
    text-align: center;
    width: 100%;
    color: #202020;
  }
  .content .title{
    font-size: 40px;
    font-weight: 700;
  }
  .content p{
    font-size: 35px;
    font-weight: 600;
  }
  
  #active:checked ~ .wrapper ul li a{
    opacity: 1;
  }
  .wrapper ul li a{
    transition: opacity 1.2s, transform 1.2s cubic-bezier(0.215, 0.61, 0.355, 1);
    transform: translateX(100px);
  }
  #active:checked ~ .wrapper ul li a{
      transform: none;
      transition-timing-function: ease, cubic-bezier(.1,1.3,.3,1); /* easeOutBackを緩めた感じ */
     transition-delay: .6s;
    transform: translateX(-100px);
  }
  body{
    background: linear-gradient(to right, #5ba4cf ,#055a8c, #055a8c,  #242444);
    margin: 0;
    height: 100%;
    font-family: 'Times New Roman', serif;
  }
  
    </style>
@endsection
@section('content')
    </p>
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center my-2" role="alert" style="margin:auto; width: 80%;">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="page rounded-3 bg-white py-3 px-5 my-5"
            style="margin:auto; width: 80%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <h3 class="text-center">Add New Food</h3>
            <div class="my-5">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                      </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{$food->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label" style="margin-top: 2%">Price</label>
                        <input type="text" class="form-control " id="price" name="price" value="{{$food->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="materials" class="form-label" style="margin-top: 2%">Materials</label>
                        <input type="text" class="form-control " id="materials" name="materials" value="{{$food->materials}}">
                    </div>
                    <select class="form-select " name="type" style="margin-top: 3%" required>
                        <option selected>Select Food Type</option>
                        @foreach ($food_categories as $food_category)
                            @if ((int) $food_category->id == $food->type->id)
                            <option value="{{ $food_category->id }}" selected>
                                @else
                                <option value="{{ $food_category->id }}">
                            @endif
                                {{ $food_category->name }}
                            </option>
                        @endforeach
                    </select>

                    <select class="form-select " name="discount" style="margin-top: 3%" required>
                        <option value="null" selected>Select Discount</option>
                        @foreach ($discounts as $discount)
                        @if ($discount->id == $food->discount_id)
                            <option value="{{ $discount->id }}" selected>
                                @else
                                <option value="{{ $discount->id }}">
                            @endif
                                {{$discount->name}}&nbsp;with&nbsp;{{ $discount->percentage }}%&nbsp;off
                            </option>
                        @endforeach
                    </select>

                    <button name="update" type="submit" class="btn btn-primary my-2">Update Food</button>
                    <small class="mx-3 text-danger">All the users gonna see your updated food</small>
                </form>
            </div>
        </div>
    </div>
@endsection
