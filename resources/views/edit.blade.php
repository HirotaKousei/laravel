@extends('layouts/app')

@section('content')
<div class="card text-bg-dark">
    {{-- <img src="{{ asset('/storage/30109534_m.jpg')}}" class="card-img opacity-25 .img-fluid" alt="画像"> --}}
    <div class="card-img-overlay">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent">
                    <h1 class="card-header">編集</h1>
                    <div class="card-body">
                      <h1 class="card-text text-dark">
                        @foreach ($memos as $me)
                            <a href = "/edit/{{ $me["id"] }}">{{ $me->content }}<br/></a>
                        @endforeach
                    </h1>

                    <form action = "{{ route('update', ['id' => $memo['id'] ] ) }}" method="POST">
                        @csrf
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $memo["content"] }}</textarea>
                        <input type="hidden" name="user_id" value="{{ $user["id"] }}">
                        <button type="submit" class="btn btn-outline-success fs-3 w-25">変更</button>
                    </form>

                    <form method='POST' action = "/delete/{{ $memo['id'] }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user["id"] }}">
                        <button type = "submit" class="btn btn-outline-danger fs-3 w-25">削除する</button>
                    </form>

                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
