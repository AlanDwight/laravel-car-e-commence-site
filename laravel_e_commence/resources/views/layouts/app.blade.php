{{-- @extends('layouts.clean')

@section('childContent')
  @include('layouts.partials.header')
  @yield('content')
  @include('layouts.partials.footer')

@endsection --}}
@props(['title'=> '', 'bodyClass' => '', 'footerLinks' => ''])

<x-base-layout :title=$title :bodyClass=$bodyClass>
    {{-- @include('layouts.partials.header') --}}
    <x-layouts.header></x-layouts.header>
        {{ $slot }}
    {{-- @include('layouts.partials.footer') --}}
    <x-layouts.footer :footerLinks=$footerLinks></x-layouts.footer>
    {{-- @yield('footerLinks') --}}
</x-base-layout>