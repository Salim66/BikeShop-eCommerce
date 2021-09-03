@extends('layouts.main')

@section('content')

<!--     start Main Content Section   -->

<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">

<div class="uk-grid">

    <div id="tm-right-section" class="uk-width-large-1-1 uk-width-medium-7-10"  data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">
        <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-4" data-uk-grid="{gutter: 20}">


            <div>
                <div class="uk-overlay uk-overlay-hover">
                    <img src="assets/img/news.png" alt="Image" >
                    <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background  uk-overlay-icon"></div>
                    <a class="uk-position-cover" href="#"></a>
                </div>
                <div class="uk-panel" >

                    <h5 class="uk-panel-title">Media title goes here</h5>
                    <p>
                        <a href="">READ MORE</a>
                        <span class="uk-float-right">2016</span>
                    </p>
                </div>
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

<!--     ./ Main Content Section   -->
@endsection
