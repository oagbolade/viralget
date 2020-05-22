@extends('admin.layouts.app')

@section('page_title')
Categories
@endsection

@section('content')
        <div class="content">
            <div class="container-fluid">
                <a href="{{ route('admin.categories.add') }}" class="btn btn-sm btn-primary btn-fill">Add New Category</a>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Categories</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                @include('layouts.notifications')
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Parent Category</th>
                                    	<th>Profiles</th>
                                    	<th>Keywords</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @if($categories->count() > 0)
                                        @php $id = ($categories->currentPage() - 1) * $categories->perPage() + 1  @endphp
                                        @foreach($categories as $category)
                                        <tr>
                                        	<td>{{ $id++ }}</td>
                                        	<td>{{ $category->name }}</td>
                                        	<td>{{ $category->parent_id ? $category->parent->name : '-' }}</td>
                                        	<td>{{ $category->profiles ? $category->profiles->count() : '-' }}</td>
                                        	<td>
                                                @php 
                                                    $keywords = [];
                                                    $count
                                                @endphp
                                                @foreach($category->keywords->take(4) as $keyword) 
                                                     @php   $keywords[] = $keyword->tag; @endphp
                                                @endforeach
                                                
                                                {{ implode(', ', $keywords) }} 
                                                @if($category->keywords->count() > 4) + more @endif
                                            </td>
                                        	<td>
                                                <a href="{{ route('profiles.category', ['category' => $category->slug]) }}" target="_blank" class="btn btn-sm btn-success">View</a>
                                                <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td rowspan="6">No category handle added yet</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $categories->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection