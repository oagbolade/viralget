@extends('admin.layouts.app')

@section('page_title')
Categories
@endsection

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header text-center">
                                <h4 class="title">Edit categories</h4>
                            </div>
                            <div class="content">
                                @include('layouts.notifications')
                                <form method="post" action="{{ route('admin.categories.edit.post', ['id' => $category->id]) }}"> 
                                    @csrf                                    
                                    <div class="form-group">
                                        <input type="text" name="category" class="form-control border-input" value="{{ $category->name }}" placeholder="Category name"/>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="parent">
                                        <option value="">No Parent Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" @if($category->id == $cat->parent_id) selected @endif>{{ $cat->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center">                                
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Category</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

        </div>
@endsection