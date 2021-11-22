@extends('layouts.app')

@section('content')

  <section class="main-slider inner-banner">
      <div class="container">
            <h1>{{ $pageTitle }}</h1>
          </div>
  </section>
  <section class="breadcrumbs">
  <div class="container">
      <ul>
        <li><a href="/">HOME    </a></li><li><i class="fa fa-angle-right"></i>
      </li>
        <li>PRIVACY POLICY</li>
        </ul>
    </div>
</section>
  <section class="about-block">

  <div class="container">
      <div class="about-title">
          <!-- <h1>{{ $pageTitle }}</h1> -->
        <div class="pagecontent">{!! $content !!} </div>
        </div>
    </div>

  </section>
@endsection