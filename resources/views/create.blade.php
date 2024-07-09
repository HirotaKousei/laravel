@extends('layouts/app')

@section('content')
<div class="card text-bg-dark">
    <img src="{{ asset('/storage//30109534_m.jpg')}}" class="card-img opacity-25 .img-fluid" alt="画像">
    <div class="card-img-overlay">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent">
                    <h1 class="card-header text-white">編集</h1>
                    <div class="card-body">
                      <h1 class="card-text text-dark">
                        @foreach ($memos as $me)
                            <a href = "/edit/{{ $me["id"] }}">{{ $me->content }}<br/></a>
                        @endforeach
                    </h1>

                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <input type="hidden" name="user_id" value="{{ $user["id"] }}"></input>
                        <button type="submit" class="btn btn-primary">追加する</button>
                    </form>

                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
