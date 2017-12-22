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
                      
          

<section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
             <img src="{{url('../')}}/public/img/{{$post->pic}}" width="80px" height="80px" class="img-circle">
                <article class="post" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->name }} on {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                    </div>
                </article>
            @endforeach
        </div>
       
    </section>


     </div>
            </div>
        </div>
    </div>
</div>
 
   <script>
        var token = '{{ Session::token() }}';
       
        var urlLike = "{{ route('like') }}";
    </script>


    @endsection