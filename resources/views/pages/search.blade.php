@extends('layouts.app')

@section('content')
@php
    $today = new \Carbon\Carbon();
    $to =  $today->format('m/d/Y');
    $from = $today->subDays('30')->format('m/d/Y');
@endphp
   <!-- Header -->
   <header class="header text-center text-white bg-info">
      <div class="container">
      <h2 class="text-white">Track and Analyze your Hashtag</h2>
      <p>See how many impressions your hashtag has generated, and how many people have been reached</p>
        <div class="col-md-8 offset-md-2">
                  <form class="rounded p-5 mt-7" action="{{ route('profiles') }}" style="background-color: rgba(64, 60, 53, 0.2);">
                        <div class="col">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ti-search mt-1"></i></span>
                            </div>
                            <input type="text" class="form-control" name="q" placeholder="@username or keyword or #hashtag">
                            <input type="hidden" name="isSearchbar" value="true">
                          </div>
                        </div>
                        <div class="advancedSearch col-md-6  offset-md-3 mt-2">
                            <label>Filter by Date range</label>
                            {{-- value="{{ $from }} - {{ $to }}"  --}}
                            <input type="text" class="form-control text-center" id="daterange" />
                            <input type="hidden" name="fromDate" id="fromDate" />
                            <input type="hidden" name="toDate" id="toDate"/>
                        </div>
                        {{-- <a id="toggleAdvancedSearch" href="#">Advanced Search</a> --}}

                        <div class="col-lg-auto">
                          <button class="btn btn-lg btn-success mt-3" type="submit">Search</button>
                        </div>
                      </div>
                    </form>
                </div>      </div>
    </header><!-- /.header -->

    <main class="main-content">
      <section class="section">
        <div class="container">
          <div class="row gap-y">

            <div class="col-md-12 mx-auto text-center">
                <h5>Trending Hashtags</h5>

                <div id="trendsList"><i class="fa fa-spinner fa-spin text-primary" style="font-size: 30px"></i></div>
            </div>


          </div>
        </div>

      </section>
    </main>

@endsection
@section('scripts')
<script>
  $(document).ready(function() {

    $(document).ready(function() {
        $('input#daterange').daterangepicker({
            opens: 'center',
            locale: {
                format: 'M/DD hh:mm A'
            }
        }, function(start, end, label) {
            $('#fromDate').val(`${start.format('YYYYMMDDHHMM')}`);
            $('#toDate').val(`${end.format('YYYYMMDD')}0000`);
            // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    })


    $('#toggleAdvancedSearch').click(function() {
        console.log('hhch')
        $('.advancedSearch').toggle();
    })

    $.ajax({
      url: '/api/v1/trends',
      dataType: 'json',
    }).done(function(data) {
      if(data.status === 'success') {
        let a = '';
        data.data.map((trend, index) => {
          a += `<a href="/hashtag/${trend.query}"><span class="badge badge-pill badge-secondary">${trend.name }</span></a>`;
        })
        $('#trendsList').html(a);
      } else {
        $('#trendsList').html(`<p class="text-white"><small><em>${data.message}</em></small></p>`);
      }
      console.log(data)
    })
  })
</script>
@endsection
