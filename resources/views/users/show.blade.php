@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
             @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#">TimeLine</a></li>
                <li><a href="#">Followings</a></li>
                <li><a href="#">Followers</a></li>
            </ul>
             @if (Auth::id() == $user->id)
                  {!! Form::open(['route' => 'microposts.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
@endsection