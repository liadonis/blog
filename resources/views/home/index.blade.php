@extends('layouts.home')

@section('info')

    <title>{{Config::get('web.web_title')}} - {{Config::get('web.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}"/>
    <meta name="description" content="{{Config::get('web.description')}}"/>

@endsection

@section('content')

    <div class="banner">
        <section class="box">
            <ul class="texts">
                <p>打了死結的青春，捆死一顆蒼白絕望的靈魂。</p>
                <p>為自己掘一個墳墓來葬心，紅塵一夢，不再追尋。</p>
                <p>加了鎖的青春，不會再因誰而推開心門。</p>
            </ul>
            <div class="avatar"><a href="#"><span>部落格</span></a> </div>
        </section>
    </div>
    <div class="template">
        <div class="box">
            <h3>
                <p><span>站長推薦  </span>Recommend</p>
            </h3>
            <ul>
                @foreach($imgs as $k=>$v)

                    <li><a href="{{url('a/'.$v->art_id)}}"  target="_blank"><img src="{{url($v->art_thumb)}}"></a><span>{{$v->art_title}}</span></li>

                @endforeach
            </ul>
        </div>
    </div>
    <article>
        <h2 class="title_tj">
            <p>文章<span>推薦</span></p>
        </h2>
        <div class="bloglist left">
            @foreach($data as $n)
            <h3>{{$n->art_title}}</h3>
            <figure><img src="{{url($n->art_thumb)}}"></figure>
            <ul>
                <p>{{$n->art_description}}</p>
                <a title="{{$n->art_title}}" href="{{url('a/'.$n->art_id)}}" target="_blank" class="readmore">閱讀全文>></a>
            </ul>
            <p class="dateview"><span>{{date('Y-m-d',$n->art_time)}}</span><span>作者：{{$n->art_editor}}</span></p>
            @endforeach
            <div class="page">

                {{$data->links()}}

            </div>
        </div>
        <aside class="right">
            <!--  Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!--  Button END -->
            <div class="blank"></div>
            <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
            <div class="news">
                <h3>
                    <p>最新<span>文章</span></p>
                </h3>
                <ul class="rank">
                    @foreach($new as $i)
                        <li><a href="{{url('a/'.$i->art_id)}}" title="{{$i->art_title}}" target="_blank">{{$i->art_title}}</a></li>
                    @endforeach
                </ul>
                <h3 class="ph">
                    <p>點擊<span>排行
                        </span></p>
                </h3>
                <ul class="paih">
                    @foreach($hot as $h)
                        <li><a href="{{url('a/'.$h->art_id)}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
                    @endforeach
                </ul>
                <h3 class="links">
                    <p>友站<span>連結</span></p>
                </h3>
                <ul class="website">
                    @foreach($links as $l)
                        <li><a href="{{url($l->link_url)}}" target="_blank" title="{{$l->link_title}}">{{$l->link_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </article>


@endsection

