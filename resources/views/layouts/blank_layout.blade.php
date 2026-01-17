@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset


@extends('layouts/common_master')

@section('layoutContent')
  <!-- Content -->
  @yield('content')
  <!--/ Content -->
@endsection
