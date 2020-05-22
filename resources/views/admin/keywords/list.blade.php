@extends('admin.layouts.app')

@section('page_title')
Keywords
@endsection

@section('content')
        <div class="content">
            <div class="container-fluid">
                <a href="{{ route('admin.keywords.add') }}" class="btn btn-sm btn-primary btn-fill">Add New keyword</a>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Keywords</h4>
                                <!-- <p class="category">Here is a subtitle for this table</p> -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Keyword</th>
                                    	<th>Category</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
                                    @if($keywords->count() > 0)
                                        @php $id = ($keywords->currentPage() - 1) * $keywords->perPage() + 1  @endphp
                                        @foreach($keywords as $keyword)
                                        <tr>
                                        	<td>{{ $id++ }}</td>
                                        	<td>{{ $keyword->tag }}</td>
                                        	<td>{{ $keyword->category->name }}</td>
                                        	<td>
                                                <a href="#" target="_blank" class="btn btn-sm btn-success">View</a>
                                                <button type="button" class="btn btn-sm btn-primary">Edit</button>
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
                                    {!! $keywords->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection