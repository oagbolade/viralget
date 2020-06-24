@extends('layouts.app')

@section('content')
   <!-- Header -->
   <header class="header   text-white bg-info">
      <div class="container">
        <h3>Welcome, {{ ucwords($user->handle) }}</h3>
        {{-- Adjusted to remove pricing --}}
        {{-- <p>You are currently on the: <strong>{{ $subscription->plan->name}} Plan</strong> subscription. <small>@if($subscription->plan->name !== 'Enterprise') <a href="{{ route('pricing') }}">Upgrade</a> | @endif<a href="{{ route('pricing') }}">View all pricing<i class="ti-arrow-right fs-10 ml-1"></i></a></small></p> --}}
      </div>
    </header><!-- /.header -->

    <main class="main-content">
      <section class="section">
        <div class="container">
          <div class="row gap-y">
          @include('layouts.partials.status')
            <div class="col-md-6 mx-auto">
              <div class="card card-body shadow-3 hover-shadow-6 text-default" href="#">
                <div class="media align-items-center">
                  <div class="mr-5">
                    <span class="iconbox iconbox-xxl bg-pale-primary">
                      <i class="icon-profile-male text-primary"></i>
                    </span>
                  </div>
                  <div class="media-body">
                    <h5>Profiling Usage</h5>
                    <h3 class="mb-4">{{$subscription->plan->profiling_limit - $subscription->profiling_balance}}/{{$subscription->plan->profiling_limit}}</h3>
                    <a class="btn btn-warning btn-sm" href="{{ route('profiles') }}">Search Profiles</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 mx-auto">
              <div class="card card-body shadow-3 hover-shadow-6 text-default" href="#">
                <div class="media align-items-center">
                  <div class="mr-5">
                    <span class="iconbox iconbox-xxl bg-pale-info">
                      <i class="icon-genius text-info"></i>
                    </span>
                  </div>
                  <div class="media-body">
                    <h5>Reporting Usage</h5>
                    <h3 class="mb-4">{{$subscription->plan->reporting_limit - $subscription->reporting_balance}}/{{$subscription->plan->reporting_limit}}</h3>
                    <a class="btn btn-danger btn-sm" href="{{ route('search') }}">Search Hashtags</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <h5>Profiling History <small>[<a href="{{ route('profiling') }}">See all]</a></small></h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User handle</th>
                    <th>Package</th>
                    <th>Report Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @if($profiling->count() == 0)
                  <tr>
                    <th colspan="4">No data recorded yet</th>
                  </tr>
                  @else
                  @php $count = 1; @endphp
                  @foreach($profiling as $report)
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td><a target="_blank" href="{{ route('reporting.profile', ['id' => $report->id])}}">{{ '@'.$report->handle }}</a></td>
                    <td><strong>{{ $report->plan->name ?? '-' }}</strong></td>
                    <td>{{ $report->created_at->diffInHours() > 24 ? $report->created_at->toDayDateTimeString() : $report->created_at->diffForHumans() }}</td>
                    <td><a target="_blank" href="{{ route('reporting.profile', ['id' => $report->id])}}" class="btn btn-sm btn-warning">View Report</td>
                  </tr>
                  @php $count++; @endphp
                  @endforeach

                  @endif
                </tbody>
              </table>                    
            </div>

            <div class="col-md-12">
              <h5>Reports History <small>[<a href="{{ route('reporting') }}">See all]</a></small></h5>
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
            </div>
          </div>        
        </div>

      </section>
    </main>

@endsection