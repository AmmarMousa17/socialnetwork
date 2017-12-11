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
                       <div class="col-md-6 col-md-offset-3">
              <header><h3>What do you have to say?</h3></header>
               <form action="{{ route('post.create') }}" method="post">
                <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="80px" height="80px" class="img-circle"/>
                <div class="form-group">

                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .new-post {
    padding: 16px 0;
    border-bottom: 1px solid #ccc;
}

.new-post header,
.posts header {
    margin-bottom: 20px;
}

.posts .post {
    padding-left: 10px;
    border-left: 3px solid #a21b24;
    margin-bottom: 30px;
}

.posts .post .info {
    color: #aaa;
    font-style: italic;
}

</style>
@endsection
