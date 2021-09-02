@extends('layouts.main')

@section('content')
<!--     start Main Section   -->
<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">

    <div class="uk-grid">
        <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">
            <div class="uk-panel">
                <ul class="uk-nav  uk-nav-side uk-nav-parent-icon uk-margin-bottom" data-uk-nav="">
                    <li class="uk-active">
                    <a href="{{ url('category') }}">All Categories</a></li>
                    @foreach($fresh_category as $category)
                    <li><a href="{{ url('category') }}/{{ $category->slug }}">{{ $category->name }}</a></li>
                    @endforeach


                    <li class="uk-parent ">
                        <a href="#">MORE Categories</a>
                        <ul class="uk-nav-sub">
                            @foreach($all_category as $category)
                            <li><a href="{{ url('category') }}/{{ $category->slug }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="uk-nav-divider"></li>
                </ul>
                <ul class="uk-nav uk-nav-comments uk-nav-side" data-uk-nav="">
                    <li class="uk-nav-header uk-margin-small-bottom">Latest BLOG</li>

                    @foreach($news as $new)
                    <li>

                        <a href="{{ url('news') }}/{{ $new->slug }}">
                            <img src="{{ Voyager::image($new->image) }}" alt="Image" class="uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-fade">
                            {!! Str::words($new->title, 60, '...') !!}<div> {!! htmlspecialchars_decode(Str::words($new->body, 30, '...')) !!} </div></a>
                    </li>
                    @endforeach

                    <li class="uk-nav-divider"></li>
                </ul>
                <div class="uk-panel">
                    <h5 class="uk-panel-header uk-margin-top widget-header">SIMBLE Login</h5>
                    <form class="uk-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <fieldset>
                            <div class="uk-form-row">
                                <input id="email" type="email" placeholder="Your E-Mail" class="uk-width-1-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="uk-form-row">
                                <input id="password" type="password" placeholder="Password" class="uk-width-1-1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="uk-form-row">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember me
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="uk-form-row">
                                <button class="uk-button uk-button-success uk-width-1-1" type="submit">log in</button>
                                <a href="{{ route('password.request') }}" class="uk-button uk-button-link uk-button-small uk-margin-top ">forgot?</a>
                                <a href="{{ route('register') }}" class="uk-button uk-button-link uk-button-small uk-margin-top uk-text-muted uk-float-right">Sign up</a>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>


        <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
            <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-3" data-uk-grid="{gutter:20}">

                @foreach($products as $product)
                    @php
                        $images = $product->image;
                        $image = json_decode($images);
                    @endphp
                <div>
                    <div class="uk-overlay uk-overlay-hover">
                        <img src="{{ Voyager::image($image[0]) }}" alt="Image" >
                        <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                        <a class="uk-position-cover" href="{{ url('products/') }}/{{ $product->slug }}"></a>
                    </div>
                    <div class="uk-panel">

                        <h5 class="uk-panel-title">{{ $product->product_name }}</h5>
                        <p>
                            <span class="rating">
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i>
                                <i class="uk-icon-star"></i>
                            </span>
                            <span class="uk-float-right">{{ date('Y', strtotime($product->created_at)) }}</span>
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="uk-margin-large-top uk-margin-bottom">
                <ul class="uk-pagination">
                    <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                    <li class="uk-active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">20</a></li>
                    <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--     ./ Main Section   -->
@endsection
