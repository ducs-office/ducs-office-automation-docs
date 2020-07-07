@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">Department of Computer Science</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">University of Delhi</h2>

            <p class="text-lg">A guide for getting started with the portal's development<br class="hidden sm:block"> Read for a better understanding of the project and contribute</p>

            <div class="flex my-10">
                <a href="{{ $page->url('/docs/getting-started') }}" title="{{ $page->siteName }} getting started" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>

                <a href="http://office.cs.du.ac.in" title="DUCS Office Portal" class="bg-gray-400 hover:bg-gray-600 text-blue-900 font-normal hover:text-white rounded py-2 px-6">Visit Portal</a>
            </div>
        </div>

        <img src="{{ $page->url('/assets/img/university-emblem.png') }}" alt="{{ $page->siteName }} large logo" class="mx-auto my-6 w-64 h-64">
    </div>

    <hr class="block my-8 border lg:hidden">
</section>
@endsection
