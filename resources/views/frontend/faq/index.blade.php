@extends('layouts.frontend')

@section('title', 'Freequently Asked Question')

@section('content')
<!-- FAQ Section Start -->
<div class="container mt-5">
    <h1 class="text-center mb-5">Frequently Asked Questions</h1>
    
    <div id="faqAccordion" class="accordion">
        @foreach($faqs as $faq)
        <!-- FAQ Item -->
        <div class="card">
            <div class="card-header" id="heading{{ $faq->id }}">
                <h5 class="mb-0">
                    <button class="btn btn-link {{ $loop->first ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                        {{ $faq->question }}
                    </button>
                </h5>
            </div>
            <div id="collapse{{ $faq->id }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $faq->id }}" data-parent="#faqAccordion">
                <div class="card-body">
                    {!! $faq->answeer !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- FAQ Section End -->
@endsection
