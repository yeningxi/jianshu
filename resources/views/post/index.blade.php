@extends('layout/main')
@section('content')
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div>
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol><!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="http://ww1.sinaimg.cn/large/44287191gw1excbq6tb3rj21400migrz.jpg" alt="..."/>
                            <div class="carousel-caption">...</div>
                        </div>
                        <div class="item">
                            <img src="http://ww3.sinaimg.cn/large/44287191gw1excbq5iwm6j21400min3o.jpg" alt="..."/>
                            <div class="carousel-caption">...</div>
                        </div>
                        <div class="item">
                            <img src="http://ww2.sinaimg.cn/large/44287191gw1excbq4kx57j21400migs4.jpg" alt="..."/>
                            <div class="carousel-caption">...</div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <div style="height: 20px;">
            </div>
            <div>
                @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="/user/5">{{$post->user->name}}</a></p>

                    <p>{!! str_limit($post->content,100,'...') !!}
                    <p class="blog-post-meta">赞 0 | 评论 0</p>
                </div>
                @endforeach


                {{--<ul class="pagination">--}}

                    {{--<li class="disabled"><span>&laquo;</span></li>--}}


                    {{--<li class="active"><span>1</span></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=2">2</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=3">3</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=4">4</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=5">5</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=6">6</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=7">7</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=8">8</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=9">9</a></li>--}}
                    {{--<li><a href="http://127.0.0.1:8000/posts?page=10">10</a></li>--}}


                    {{--<li><a href="http://127.0.0.1:8000/posts?page=2" rel="next">&raquo;</a></li>--}}
                {{--</ul>--}}
                {{$posts->links()}}

            </div><!-- /.blog-main -->
        </div>

        <div id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">


            <aside id="widget-welcome" class="widget panel panel-default">
                <div class="panel-heading">
                    欢迎！
                </div>
                <div class="panel-body">
                    <p>
                        欢迎来到简书网站
                    </p>
                    <p>
                        <strong><a href="/">简书网站</a></strong> 基于 Laravel5.4 构建
                    </p>
                    <div class="bdsharebuttonbox bdshare-button-style0-24" data-bd-bind="1494580268777"><a href="#"
                                                                                                           class="bds_more"
                                                                                                           data-cmd="more"></a><a
                                href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#"
                                                                                                   class="bds_renren"
                                                                                                   data-cmd="renren"
                                                                                                   title="分享到人人网"></a><a
                                href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#"
                                                                                                    class="bds_weixin"
                                                                                                    data-cmd="weixin"
                                                                                                    title="分享到微信"></a><a
                                href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#"
                                                                                                   class="bds_tqq"
                                                                                                   data-cmd="tqq"
                                                                                                   title="分享到腾讯微博"></a><a
                                href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a></div>
                    <script>window._bd_share_config = {
                            "common": {
                                "bdSnsKey": {"tsina": "120473611"},
                                "bdText": "",
                                "bdMini": "2",
                                "bdMiniList": false,
                                "bdPic": "",
                                "bdStyle": "0",
                                "bdSize": "24"
                            },
                            "share": {},
                            "image": {
                                "viewList": ["tsina", "renren", "douban", "weixin", "qzone", "tqq", "bdhome"],
                                "viewText": "分享到：",
                                "viewSize": "16"
                            },
                            "selectShare": {
                                "bdContainerClass": null,
                                "bdSelectMiniList": ["tsina", "renren", "douban", "weixin", "qzone", "tqq", "bdhome"]
                            }
                        };
                        with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
                </div>
            </aside>
            <aside id="widget-categories" class="widget panel panel-default">
                <div class="panel-heading">
                    专题
                </div>

                <ul class="category-root list-group">
                    <li class="list-group-item">
                        <a href="/topic/1">旅游
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/topic/2">轻松
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/topic/5">测试专题
                        </a>
                    </li>
                </ul>

            </aside>
        </div>
    </div>    </div><!-- /.row -->

@endsection