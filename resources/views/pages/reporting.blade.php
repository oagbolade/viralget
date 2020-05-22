@extends('layouts.app')

@section('content')
   <!-- Header -->
   <header class="header   text-white bg-info">
      <div class="container">
        <h3>Reports History</h3>
      </div>
    </header><!-- /.header -->

    <main class="main-content">
      <section class="section">
        <div class="container">
          <div class="row gap-y">
          @if(session()->get('error'))
          <div class="col-md-12">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong><br/>{{ session()->get('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>        
          </div>
          @endif



            <div class="col-md-12">
              <h5>Reports History</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Keyword</th>
                    <th>Package</th>
                    <th>Report Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($reporting->count() == 0)
                  <tr>
                    <th colspan="4">No data recorded yet</th>
                  </tr>
                  @else
                  @php $count = 1; @endphp
                  @foreach($reporting as $report)
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td><a target="_blank" href="{{ route('reporting.hashtag', ['id' => $report->id])}}">{{ $report->query }}</a> </td>
                    <td><strong>{{ $report->plan->name ?? '-' }}</strong></td>
                    <td>{{ $report->created_at->diffInHours() > 24 ? $report->created_at->toDayDateTimeString() : $report->created_at->diffForHumans() }}</td>
                    <td><a target="_blank" href="{{ route('reporting.hashtag', ['id' => $report->id]) }}" class="btn btn-sm btn-warning">View Report</td>
                  </tr>
                  @php $count++; @endphp
                  @endforeach

                  @endif
                </tbody>
              </table>       
              {{ $reporting->links() }}                             
            </div>
          </div>        
        </div>

      </section>
    </main>

@endsection