@extends('admin.layouts.app')

@section('page_title')
Social Profiles
@endsection

@section('content')
        <div class="content">
            <div class="container-fluid">
                <a href="{{ route('admin.profile.add') }}" class="btn btn-sm btn-primary btn-fill">Add New Profile</a>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Social Profiles</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                @include('layouts.notifications')
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Social Handle</th>
                                    	<th>Category</th>
                                    	<th>Platform</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @if($profiles->count() > 0)
                                        @php $id = ($profiles->currentPage() - 1) * $profiles->perPage() + 1  @endphp
                                        @foreach($profiles as $profile)
                                        <tr>
                                        	<td>{{ $id++ }}</td>
                                        	<td>{{ $profile->handle }}</td>
                                        	<td>{{ $profile->category->name }}</td>
                                        	<td>{{ $profile->platform->name }}</td>
                                        	<td>
                                                <a href="{{ route('profiles', ['q' => $profile->handle]) }}" target="_blank" class="btn btn-sm btn-success">View</a>
                                                <a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ route('admin.profile.delete', ['id' => $profile->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td rowspan="6">No social media handle added yet</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $profiles->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection