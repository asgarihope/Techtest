@extends('layouts.base')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">


                <h1>{{trans('label.panel.article.articles')}}</h1>
                <ul id="article-list" class="list-unstyled"></ul>
                <div id="loading">Loading...</div>


            </div>
        </div>
    </div>


    <div class="modal fade" id="article-modal" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5> <small id="modal-date" class="ps-3"></small>
                </div>
                <div class="modal-body">
                    <p id="modal-content"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{trans('label.close')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="module" src="{{url('assets/js/article.js')}}"></script>
@endsection
