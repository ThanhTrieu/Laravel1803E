@extends('layout')

@section('content')
    @foreach ($allPd as $key => $pd)
        <div class="col-lg-4 mt-3 mb-3">
            <div class="card" style="min-width: 265px;">
                <img class="card-img-top" src="http://www.viettien.com.vn/admin/wp-content/uploads/2018/07/somi-17a.jpg" alt="Card image cap" style="width: 100%; height: 50%">
                <div class="card-body">
                    <h5 class="card-title">{{ $pd->name }}</h5>
                    <p class="card-text"> {{ number_format($pd->price) }}  vnd</p>
                    <p class="card-text"> {{ $pd->description }} </p>
                    <a href="{{ route('addcart',['id'=>$pd->id]) }}" class="btn btn-primary">Add cart + </a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
