@extends('admin.layouts.app')

@section('page_title')
Social Profiles
@endsection

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile<h4>
                            </div>
                            <div class="content">
                                @include('layouts.notifications')
                                <form method="post" action="{{ route('admin.profile.edit.post', ['id' => $profile->id]) }}"> 
                                    @csrf                                    
                                    <div class="form-group">
                                        <input name="handle" class="form-control border-input" placeholder="Profile Handle" value="{{$profile->handle}}"/>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="platform">
                                        <option value="">Select Platform</option>
                                        @foreach($platforms as $platform)
                                        <option value="{{ $platform->id }}" @if($platform->id == $profile->platform->id) selected @endif>{{ $platform->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $profile->category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
@endsection