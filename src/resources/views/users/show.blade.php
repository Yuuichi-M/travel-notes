@extends('layouts.app')

@section('title', 'マイページ')

@include('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex flex-row">

                        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                            <i class="fas fa-user-circle fa-3x"></i>
                        </a>

                        <!--フォローボタン-->
                        @if( Auth::id() !== $user->id )
                        <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                        </follow-button>
                        @endif

                    </div>
                    <h2 class="card-title m-0">

                        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                            {{ $user->name }}
                        </a>

                    </h2>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <a href="" class="text-muted">
                            10 フォロー
                        </a>
                        <a href="" class="text-muted">
                            10 フォロワー
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
