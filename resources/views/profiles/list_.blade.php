@extends('layouts.app')


@section('content')
   <!-- Main Content -->
   <main class="main-content">
      <div class="section bg-gray">
        <div class="container" style="margin-top: 100px">
          <div class="row">


          <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <h6 class="sidebar-title">Filter Result</h6>
                <form action="{{ route('profiles') }}" method="GET">
                    <div class="text-center">
                      <h5 class="divider" style="margin:  5px 0">Engagement Rate</h5>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="text" name="min" id="" class="form-control" placeholder="MIN">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <input type="text" name="max" id="" class="form-control" placeholder="MAX">
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <h5 class="divider" style="margin:  5px 0">Followers</h5>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <input type="text" name="min" id="" class="form-control" placeholder="MIN">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <input type="text" name="max" id="" class="form-control" placeholder="MAX">
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <h5 class="divider" style="margin: 5px 0">And/Or Category</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category">
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                          <option value="{{ $category->slug }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                      <h5 class="divider" style="margin: 5px 0">Location</h5>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category">
                          <option value="">Location</option>
                          @foreach($states as $state)
                          <option value="{{ $state->slug }}">{{ $state->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <button class="btn btn-warning btn-block" type="submit">Filter Result</button>
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                @foreach($categories as $category)
                @if($category->is_featured)
                <div class="col-6"><a href="{{ route('profiles.category', ['category' => $category->slug]) }}">{{ $category->name }}</a></div>
                @endif
                @endforeach
                  
                </div>

                <hr>



              </div>
            </div>


            <div class="col-md-8 col-xl-9">

            @if($profiles->count() > 0) 

              <div class="row">
                    @foreach($profiles as $profile)          
                    <div class="col-md-4">
                      @php $profileData = $profile->fetchProfileData(); @endphp
                        <div class="card border hover-shadow-6 mb-6 d-block" style="overflow: hidden">
                              <div class="pt-5 text-center">
                                  @if($profileData) 
                                  <img class="avatar avatar-xl" src="{{ str_replace('_normal', '', @$profileData->profile_image_url) }}"  alt="Card image cap">
                                  @else
                                  <img class="avatar avatar-xl" src="{{ asset('./static/assets/img/avatar/1.jpg') }}"  alt="Card image cap">
                                  @endif

                                <h5 class="card-title mt-5">
                                <a href="{{ route('profile.show', ['handle' => $profile->handle]) }}">{{ $profileData->name ?? $profile->handle }}</a><br/>
                                  <small>{{ '@'.trim($profile->handle) }}</small></h5>
                              </div>
                                  <div class="badges py-3 text-center">
                                    <a class="badge badge-{{ $profile->category->color }}" href="{{ route('profiles', ['category' => $profile->category->slug]) }}">{{ $profile->category->name }}</a>
                                    <a class="badge badge-primary" target="_blank" href="{{ 'http://twitter.com/'.trim($profile->handle) }}" title="Platform">Twitter</a>
                                  </div>
                              <div class="p-1 text-center">
                                    <div class="container text-center"> 
                                      @if(!$profileData)
                                        <em>Could not fetch data</em>
                                      @else 
                                      @php $averages = $profile->calculateER($profileData); @endphp
                                      @if($averages)
                                        <div class="row">
                                          <div class="col">
                                            <h6>{{ \App\Account::numberFormat($profileData->followers_count) }}</h6>
                                            <small><strong>Followers</strong> </small>
                                          </div>
                                          <div class="col">
                                            <h6>{{ \App\Account::numberFormat($profileData->friends_count) }}</h6>
                                            <small><strong>Following</strong> </small>
                                          </div>
                                          <div class="col" title="Engagement Rate">
                                            <h6>{{ round($averages->er, 2).'%' }}</h6>
                                            <small><strong>ER</strong></small>
                                          </div>
                                        </div>
                                      @endif
                                      @endif
                                  </div>                        
                              </div>
                                  <div class="text-center p-5">
                                    <a class="btn btn-warning" href="{{ route('profile.show', ['handle' => $profile->handle]) }}">View Stats</a>
                                  </div>
          
                        </div>
                        
                        <!-- <div class="card border hover-shadow-6 mb-6 d-block">
                          <a href="#"><img class="card-img-top" src="./assets/img/thumb/1.jpg" alt="Card image cap"></a>
                          <div class="p-6 text-center">
                            <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">News</a></p>
                            <h5 class="mb-0"><a class="text-dark" href="#">We relocated our office to a new designed garage</a></h5>
                          </div>
                        </div> -->
                     </div>
                    @endforeach
              </div>


              <nav class="justify-content-center">
                {{ $profiles->links() }}
                <!-- <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a> -->
              </nav>
              @else
                <h1>No result found</h1>
              @endif

            </div>




          </div>
        </div>
      </div>
    </main>


@endsection