@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     Welcome To Your Profile {{Auth::user()->name}} <br>
                      <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="100px" height="100px" class="img-circle"/>
                     
                     <br>
                     <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                            
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="file" name="pic" class="form-control"/>
                            
                            <input type="submit" class="btn btn-success" name="btn"/>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
