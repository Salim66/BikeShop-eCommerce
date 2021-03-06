@extends('layouts.main')

@section('content')

<!-- start Main Content (Media Page Section) -->

<div id="tm-media-section" class="uk-block uk-block-small">

    <div class="uk-container uk-container-center uk-width-8-10">
        <div class="media-container  uk-container-center">
            <a class="uk-button uk-button-large uk-button-link uk-text-muted" href="index.html"><i class=" uk-icon-arrow-left uk-margin-small-right"></i> Back</a>
        </div>

        <div class="uk-grid">
            <div class="uk-width-medium-5-10">
                <div  class="media-cover mt-50">
                    <div class="uk-margin" data-uk-slideset="{small: 2, medium: 1, large: 1}">
                    <div class="uk-slidenav-position uk-margin">
                        <ul class="uk-slideset uk-grid uk-flex-center">

                            @php
                                $images = json_decode($product->image);

                            @endphp

                            @foreach($images as $image)
                            <li>
                                <a href="media.html">
                <img src="{{ Voyager::image($image) }}" width="700" height="400" alt="">
                                </a>
                            </li>
                            @endforeach






                        </ul>

                    </div>
                <ul class="uk-slideset-nav uk-dotnav uk-dotnav-contrast uk-flex-center uk-margin-top"></ul>
            </div>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['wishlist.store']]) !!}
                {!! Form::hidden('product_id', $product->id) !!}
                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-margin-top" type="submit"><i class="uk-icon-heart uk-margin-small-right"></i> Add to Favourites</button>
                {!! Form::close() !!}


                <a class="uk-button uk-button-link color-y uk-text-muted uk-button-large uk-width-1-1 uk-margin-top" href="{{ url('contact') }}"><i class="uk-icon-receiver uk-margin-small-right "></i> Contact Us</a>
            </div>
            <div class="uk-width-medium-5-10">
                <div class="">
                    <ul class="uk-tab uk-tab-grid " data-uk-switcher="{connect:'#media-tabs'}">
                        <li class="uk-width-medium-1-3 uk-active"><a href="#">Description</a></li>
                        <li class="uk-width-medium-1-3"><a href="#">Reviews</a></li>
                        <li class="uk-width-medium-1-3"><a href="#">book now</a></li>
                        <li class="uk-tab-responsive uk-active uk-hidden" aria-haspopup="true" aria-expanded="false"><a>Active</a><div class="uk-dropdown uk-dropdown-small uk-dropdown-up"><ul class="uk-nav uk-nav-dropdown"></ul><div></div></div></li></ul>
                    </div>

                    <ul id="media-tabs" class="uk-switcher">

                            <!--     start Tab Panel 1 (Reviews Sections) -->

                        <li>
                            <h2 class="uk-text-contrast uk-margin-large-top">{{ $product->product_name }} <span class="rating uk-margin-small-left uk-h4 uk-text-warning">
                                @if (isset($reviews) && count($reviews) > 0)
                                @foreach ($reviews as $review)
                                    @if($review->reviews_one == 1)
                                    <i class="uk-icon-star "></i>
                                    @elseif($review->review_two == 2)
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    @elseif($review->reviews_three == 3)
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    @elseif($review->reviews_four == 4)
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    @elseif($review->reviews_five == 5)
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    <i class="uk-icon-star "></i>
                                    @endif
                                @endforeach
                                @else
                                    <h2 class="bold m-blouk">Add Rating</h2>
                                @endif

                                {{-- <i class="uk-icon-star "></i>
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i> --}}
                            </span></h2>
                            <ul class="uk-subnav uk-subnav-line">
                                <li ><i class="uk-icon-star uk-margin-small-right"></i> 1</li>
                                <li><i class="uk-icon-clock-o uk-margin-small-right"></i> {{ date('F d, Y', strtotime($product->created_at)) }}</li>
                                <li><i class="fas fa-award uk-margin-small-right"></i>price : {{ $product->product_price }}</li>

                            </ul>
                            <hr>
                            <p class="uk-text-muted uk-h4">{{ $product->product_content }}</p>
                            <dl class="uk-description-list-horizontal uk-margin-top">
                                <dt> Wheel Size :</dt>
                                <dd><ul class="uk-subnav ">
                                    <li><a href="#">{{ $product->wheel_size }}</a></li>
                                </ul></dd>
                                <dt> Model Number : </dt>
                                <dd><ul class="uk-subnav ">
                                    <li><a href="#">{{ $product->model_number }}</a></li>
                                </ul></dd>
                                <dt> Color : </dt>
                                <dd><ul class="uk-subnav ">
                                    <li><a href="#"><i style="color: {{ $product->color }}; font-size: 15px;" class="uk-icon-image"></i></a></li>
                                </ul></dd>
                                <dt> CategorY : </dt>
                                <dd><ul class="uk-subnav ">
                                    <li><a href="#"></a>{{ @$product->category->name}}</li>
                                </ul></dd>
                                    <dt> Wattage : </dt>
                                <dd><ul class="uk-subnav ">
                                    <li><a href="#">{{ $product->wattage }}</a></li>
                                </ul></dd>


                            </dl>



                            </li>

                            <!--    ./ Tab Panel 1  -->

                            <!--     start Tab Panel 2  (Reviews Section) -->

                            <li>
                                <div class="uk-margin-small-top">


                                    @guest
                                    <h3 class="uk-text-contrast uk-margin-top">Product a Review</h3>
                                    <div class="uk-alert uk-alert-warning" data-uk-alert="">
                                        <a href="" class="uk-alert-close uk-close"></a>
                                        <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> Please <a class="uk-text-contrast" href="login.html"> Log in</a> or Sign up to post reviews quicker.</p>
                                    </div>
                                    @endguest

                                    {!! Form::open(['method' => 'POST', 'route' => ['review.store'], 'class' => 'uk-form uk-margin-bottom']) !!}
                                    {!! Form::hidden('porduct_id', $product->id) !!}
                                        <div class="uk-form-row">
                                            <textarea class="uk-width-1-1" name="reviews_content" cols="30" rows="5" placeholder="Type your review here..."></textarea>
                                            <p class="uk-form-help-block">The <code>.uk-form-help-block</code> class creates an associated paragraph.</p>
                                        </div>
                                        <div class="uk-margin">

                                            <div class="uk-form-controls">
                                                <label><input class="uk-radio" name="reviews_one" type="radio" value="1"> <i class="uk-icon-star "></i></label>
                                                <label><input class="uk-radio" name="reviews_two" type="radio" value="2">  <i class="uk-icon-star "></i><i class="uk-icon-star "></i></label>
                                                <label><input class="uk-radio" name="reviews_three" type="radio" value="3">  <i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i></label>
                                                <label><input class="uk-radio" name="reviews_four" type="radio" value="4"  <i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i></label>
                                                <label><input class="uk-radio" name="reviews_five" type="radio" value="5">  <i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i><i class="uk-icon-star "></i></label>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <button type="submit" class="uk-button uk-button-large uk-button-success uk-float-right">Post</button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div  class="uk-scrollable-box uk-responsive-width " >
                                        <ul class="uk-comment-list uk-margin-top" >

                                            @foreach($product->reviews as $review)
                                            <li>
                                                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                                                    <header class="uk-comment-header">
                                                        <img class="uk-comment-avatar uk-border-circle" src="{{ URL::to(Voyager::image($review->user->avatar)) }}" width="50" height="50" alt="">
                                                        <h4 class="uk-comment-title">{{ $review->user->name }}</h4>
                                                        <div class="uk-comment-meta">{{ $review->created_at->diffForHumans() }} </div>
                                                    </header>
                                                    <div class="uk-comment-body">
                                                        <p>{{ $review->reviews_content }}</p>
                                                    </div>
                                                </article>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </li>
                                <!--     ./ Tab Panel 2  -->


                                <!--     start Tab Panel 3 (Trailer Section)  -->

                                <li>

                                    @guest
                                    <div class="uk-margin-small-top">
                                    <h3 class="uk-text-contrast uk-margin-top">Book It Now</h3>
                                    <div class="uk-alert uk-alert-warning" data-uk-alert="">
                                        <a href="" class="uk-alert-close uk-close"></a>
                                        <p><i class="uk-icon-exclamation-triangle uk-margin-small-right "></i> Please <a class="uk-text-contrast" href="login.html"> Log in</a> or Sign up to post reviews quicker.</p>
                                    </div>
                                    @endguest


                                    {!! Form::open(['method' => 'POST', 'route' => ['book.store'], 'class' => 'uk-form uk-margin-bottom']) !!}
                                        <div class="uk-form-row">
                                            <textarea class="uk-width-1-1" name="book_content" cols="30" rows="5" placeholder="Type your review here..."></textarea>
                                            <p class="uk-form-help-block">The <code>.uk-form-help-block</code> class creates an associated paragraph.</p>
                                        </div>
                                        <div class="uk-form-row">
                                            <button type="submit" class="uk-button uk-button-large uk-button-success uk-float-right">Book Now</button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>
                                </li>

                                <!--     ./ Tab Panel 3  -->


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- ./ Main Content (Media Page Section) -->
@endsection
