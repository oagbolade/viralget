@extends('admin.layouts.auth')

@section('content')

<div class="content" style="min-height: 90vh">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 160px; margin-bottom: 50px">
                <div class="card">
                    <div class="header">
                        <h4 class="title text-center">User Login</h4>
                        <hr/>
                    </div>                
                    <div class="content">
                        @include('layouts.notifications')
                        <form action="{{ route('admin.login.post') }}" method="post">
                            @csrf                            
                            <div class="form-group">
                                <input type="text" name="email" class="form-control border-input" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control border-input" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-fill btn-primary btn-lg btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
