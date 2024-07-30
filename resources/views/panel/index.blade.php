@extends('panel._panelLayout')
@section('title')
    {{$editArticle?(trans('label.panel.article.edit').': '.$editArticle->title):config('app.name')}}
@endsection
@section('body')
    <div class="row">
        <div class="col-md-8">
            <ul class="list-unstyled">
                @foreach($articles as $article)
                    <li class="bg-dark bg-opacity-25 mb-3 rounded-3 p-2">
                        <div class="mb-1">
                            <strong>{{$article->title}}</strong> <small>({{\Illuminate\Support\Carbon::make($article->createdAt)->format('Y-d-m H:i')}})</small>
                            <a href="{{ request()->fullUrlWithQuery(['edit' => $article->id]) }}">
                                {{ trans('label.edit') }}
                            </a>
                            <form action="{{route('panel.article.destroy', $article->id)}}" method="post" class="d-inline-flex">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn-link btn py-0 text-danger confirmDelete">{{trans('label.delete')}}</button>
                            </form>
                        </div>
                        {{Str::limit($article->content, 100, '...')}}

                    </li>
                @endforeach
            </ul>
            {{$articles->links()}}

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{trans('label.panel.article.addArticle')}}
                </div>
                <div class="card-body">
                    <form action="{{$editArticle?route('panel.article.update',$editArticle->id):route('panel.article.store')}}" method="post">
                        @csrf
                        @if($editArticle)
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="title">{{trans('label.panel.article.title')}}</label>
                            <input class="form-control" type="text" id="title" name="title" value="{{old('title',$editArticle?$editArticle->title:'')}}" placeholder="{{trans('label.panel.article.title')}}">
                        </div>

                        <div class="mb-3">
                            <label for="content">{{trans('label.panel.article.content')}}</label>
                            <textarea class="form-control" type="text" id="content" name="content" rows="10" placeholder="{{trans('label.panel.article.content')}}">{{old('content',$editArticle?$editArticle->content:'')}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-dark">{{trans('label.submit')}}</button>
                        @if($editArticle)
                            <a href="{{route('panel.index',['page'=>request()->query('page')])}}" class="btn btn-outline-dark">{{trans('label.cancel')}}</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script type="module">
        $(document).ready(function () {
            $(".confirmDelete").click(function () {
                if (!confirm("{{trans('message.confirmToDelete')}}")) {
                    return false;
                }
            });
        });

    </script>
@endsection
