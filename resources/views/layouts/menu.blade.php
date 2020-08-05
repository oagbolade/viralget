@extends('layouts.menuLayout')

@php $isDarkBg = isset($isDarkBg) ?? false; @endphp
<section class="topbar d-lg-flex bg-transparent @if($isDarkBg) text-white @endif">
  @push('menuCSS')
  <link href="{{ asset('static/assets/css/menu.css') }}" rel="stylesheet">
  @endpush
  <div class="container small-3">
    <nav class="nav">
      <a class="nav-link" href="{{ route('about') }}">About</a>
      <a class="nav-link" href="{{ route('terms') }}">Terms</a>
      <a class="nav-link" href="{{ route('privacy') }}">Policy</a>
      <a class="nav-link" href="{{ route('faqs') }}">FAQs</a>
      <a class="nav-link" href="{{ route('contact') }}">Contact</a>
      <a class="nav-link" href="{{ route('pricing.trends') }}">Twitter Trends</a>
      <a class="nav-link" href="{{ route('pricing.management') }}">Influencer Management</a>
      <a class="nav-link" href="{{ route('pricing') }}">Subscription</a>
    </nav>

    <div class="dropdown mr-4  open-on-hover">
      @guest
      <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-top">Login</a>
      @else

      <span class="dropdown-toggle" data-toggle="dropdown">My Account</span>
      <div class="dropdown-menu dropdown-menu-right">
        @guest
        <a class="dropdown-item" href="#">Account Settings</a>
        @else
        <a class="dropdown-item" href="{{ route('campaigns.trends') }}">Trends</a>
        <a class="dropdown-item" href="{{ route('campaigns.influencermanagement') }}">Influencer Management</a>
        @endguest
        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
      </div>
      @endguest
    </div>
  </div>
</section>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg @if($isDarkBg) navbar-light navbar-stick-dark stick @else navbar-dark @endif"
  data-navbar="smart">
  <div class="container">

    <div class="navbar-left mr-auto">
      <button class="navbar-toggler" type="button">&#9776;</button>
      <a class="navbar-brand" href="{{ route('home') }}">
        @if($isDarkBg)
        <img class="logo-light" src="{{ asset('static/assets/img/logo-light.png') }}" alt="logo">
        <img class="logo-dark" src="{{ asset('static/assets/img/logo-dark.png') }}" alt="logo">
        @else
        <img class="logo-dark" src="{{ asset('static/assets/img/logo-dark.png') }}" alt="logo">
        @endif
      </a>
    </div>

    <section class="navbar-mobile">

      <!-- <nav class="nav nav-navbar nav-text-normal mr-auto">
            <a class="nav-link" href="{{ route('about') }}">About</a>           -->
      <ul class="nav nav-navbar nav-text-normal larger-menu-link">
        <li class="hide-on-lg nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
          <a class="nav-link" href="{{ route('pricing.trends') }}">Twitter Trends</a>
          <a class="nav-link" href="{{ route('pricing.management') }}">Influencer Management</a>
          <a class="nav-link" href="{{ route('pricing') }}">Subscription</a>
        </li>

        @foreach(\App\Category::where('is_featured', 1)->take(5)->get() as $category)
        @php $sub_cats = $category->children(); @endphp
        <li class="bold-navigations nav-item">
          <a class="bold-navigations nav-link" href="#">{{ $category->name }}<span class="arrow"></span></a>
          <ul class="nav">
            @foreach($sub_cats->take(10)->get() as $cat)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profiles.category', ['category' => $cat->slug]) }}">
                {{ $cat->name }}</a>
            </li>
            @endforeach
          </ul>
          @endforeach
        </li>

        {{-- @foreach(\App\Category::where('is_featured', 1)->take(5)->get() as $category)
            @php $sub_cats = $category->children(); @endphp
            <li class="nav-item">
              <a class="nav-link" href="#">{{ $category->name }} @if($sub_cats->count() > 0)<span
          class="arrow"></span>@endif</a>
        <ul class="nav">
          @foreach($sub_cats->take(10)->get() as $cat)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.category', ['category' => $cat->slug]) }}">
              {{ $cat->name }}</a>
          </li>
          @endforeach
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.category', ['category' => $category->slug]) }}">View All <i
                class="ti-arrow-right"></i></a>
          </li>
        </ul>
        </li>
        @endforeach --}}

        @guest
        <li class="nav-item display-mobile">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        @else
        <li class="nav-item display-mobile">
          <a class="nav-link" href="{{ route('campaigns.view') }}">Dashboard</a>
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
        </li>
        @endguest
        <li>
          <form class="form-inline mt-5 display-mobile" action="{{ route('profiles') }}">
            <div class="input-group">
              <input type="text" name="q" class="form-control form-control-sm"
                value="{{ isset($q) ? urldecode($q) : '' }}" placeholder="@username or keyword or #hashtag">
              <input type="hidden" name="isSearchbar" value="true">
              <div class="input-group-append">
                <button class="btn btn-warning" type="submit">Go!</button>
              </div>
            </div>
          </form>
        </li>
      </ul>


      {{-- Only show when authenticated: Update suspended feature --}}
      {{-- @if(Auth::user())         
            <div>
              <a href="{{ route('search-page') }}"><button type="button"
        class="btn btn-sm btn-round btn-warning">Search</button></a>
  </div>
  @endif --}}

  @if(Auth::user())
  <div>
    <a href="{{ route('campaigns.view') }}"><button type="button"
        class="btn btn-round btn-sm btn-warning">Dashboard</button></a>
  </div>
  @endif
  </section>
  <form class="@if($isDarkBg) input-glass @endif input-round w-400 hide-mobile" action="{{ route('profiles') }}"
    style="margin-top: -5px">
    <div class="input-group">
      <input type="text" name="q" class="form-control form-control-sm" value="{{ isset($q) ? urldecode($q) : '' }}"
        placeholder="@username or keyword or #hashtag">
      <input type="hidden" name="isSearchbar" value="true">
      <div class="input-group-append">
        <button class="btn btn-warning" type="submit">Go!</button>
      </div>
    </div>
  </form>
  </div>

</nav><!-- /.navbar -->

<!-- Modal - Position top -->
<div class="modal modal-top fade" id="modal-top" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class="lead-3 fw-200"><strong>Please, log in</strong></p>

        <p>
          {{-- <a href="{{ route('login.twitter') }}">
          <button type="button" class="btn btn-label btn-twitter">
            <label><i class="fa fa-twitter"></i></label> Sign in with Twitter
          </button>
          </a> --}}
          <a href="{{ route('login.google') }}" class="btn btn-social btn-label btn-lg btn-google">
            <i class="fa fa-google"></i>
            Sign in with Google
          </a>
        </p>

        <a href="/faqs#collapse-1-1" target="_blank"><small>Why do I need to log in with my account?</small></a>
      </div>

    </div>
  </div>
</div>
@push('menuCSS')
<style>
  @media (max-width: 1225px) {
    .display-mobile {
      display: initial;
    }
</style>
@endpush
