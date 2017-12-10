@extends('profile.master')

@section('content')
<div class="container">
    <div class="row">
          @include('profile.sidebar')
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     Welcome To Your Profile {{Auth::user()->name}} <br>
                      <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="120px" height="120px" class="img-circle"/>
                      <a href="{{url('/')}}/changePhoto">Change image</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
