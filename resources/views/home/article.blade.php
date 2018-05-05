@extends('layouts.home')
@section('title', $article->title)
@section('keywords', $article->keywords)
@section('description', $article->description)
@section('css')
    <link rel="stylesheet" href="{{ asset('tpl/plugins/share/css/share.min.css') }}">
    <link href="//cdn.bootcss.com/highlight.js/9.12.0/styles/atom-one-dark.min.css" rel="stylesheet">
    {!! editor_css() !!}
@stop
@section('content')
    <div class="col-sm-8">
        <div class="ibox">
            <div class="ibox-content articleContent">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right">
                            @foreach($article->tag as $tag)
                                <a href="{{route('tag',$tag->tag_id)}}"
                                   class="  btn @if(($tag->tag_id)%2==0)btn-white @else btn-info @endif  btn-xs tag"><i
                                        class="fa fa-tag"></i>&nbsp;{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center article-title">
                            <h1>
                                {{$article->title}}
                            </h1>
                        </div>
                        <div class="content markdown-body editormd-html-preview" style="padding:0;">
                            {!! $article->html !!}
                        </div>
                        <div class="social-share text-center"
                             data-disabled="google,twitter, facebook, diandian,linkedin,douban"></div>
                        <div>
                            <ul class="copyright">
                                <li><strong>本文作者：</strong>{{$article->author}}</li>
                                <li><strong>本文链接：</strong> {{route('article',$article->id)}}
                                </li>
                                <li><strong>版权声明： </strong>本博客所有文章除特别声明外，均采用 <a
                                        href="https://creativecommons.org/licenses/by-nc-sa/3.0/"
                                        rel="external nofollow" target="_blank">CC BY-NC-SA 3.0</a> 许可协议。转载请注明出处！
                                </li>
                            </ul>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="prev-next">
                            <div class="prev pull-left">
                                @if(blank($prev))
                                    {{--<a href="javascript:void(0)" class="btn btn-primary btn-outline btn-block">没有了</a>--}}
                                @else
                                    <a href="{{route('article',$prev['id'])}}"
                                       class="btn btn-primary btn-outline btn-block"><i class="fa fa-arrow-left"></i>&nbsp;{{re_substr($prev['title'],0,8,true)}}
                                    </a>
                                @endif
                            </div>
                            <div class="next pull-right">
                                @if(blank($next))
                                    {{--<a href="javascript:void(0)" class="btn btn-primary btn-outline btn-block">没有了</a>--}}
                                @else
                                    <a href="{{route('article',$next['id'])}}"
                                       class="btn btn-primary btn-outline btn-block">{{re_substr($next['title'],0,8,true)}}&nbsp;<i
                                            class="fa fa-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-sm-12">
                        {{--  @include('conponent.comment')  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('tpl/plugins/share/js/jquery.share.min.js') }}"></script>
    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
    <script>
        $(function () {
            hljs.initHighlightingOnLoad();
            // 新页面跳转
            $('.content a').attr('target', '_blank');
            $(".content img").addClass('img-responsive');
            $('.social-share').share();
        });
    </script>
@stop
