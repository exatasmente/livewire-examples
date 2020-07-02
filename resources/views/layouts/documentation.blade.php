@extends('layouts.master')

@section('nav-menu')
    <h2 class="text-3xl font-semibold">Examples</h2>
    <nav class="nav-menu">
        @include('includes.menu', ['items' => $pages->all()])
    </nav>
@endsection

@section('content')
<section class="container px-6 py-12 mx-auto md:px-8">
    <h2 class="text-3xl font-semibold">Examples</h2>
    <div class="flex flex-col lg:flex-row">
        <nav class="nav-menu hidden lg:block">
            @include('includes.menu', ['items' => $pages->all()])
        </nav>
        <div class="w-full break-words md:w-4/5 lg:w-3/5 lg:pl-4 content">
            @yield('content')
        </div>
    </div>
</section>
@overwrite
