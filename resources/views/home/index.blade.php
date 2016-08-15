@extends('layouts.home')

@section('info')

    <title>部落格</title>
    <meta name="keywords" content="個人部落格模板"/>
    <meta name="description" content="尋夢主題的個人部落格模板、優雅、穩重、大氣,低調。"/>

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
                @foreach($hot as $k=>$v)

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
            @foreach($data as $m=>$n)
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
            <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
            <div class="news">
                <h3>
                    <p>最新<span>文章</span></p>
                </h3>
                <ul class="rank">
                    <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
                    <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
                    <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
                    <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
                    <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
                    <li><a href="/" title="建站流程篇——教你如何快速学会做网站" target="_blank">建站流程篇——教你如何快速学会做网站</a></li>
                    <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
                    <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
                </ul>
                <h3 class="ph">
                    <p>点击<span>排行</span></p>
                </h3>
                <ul class="paih">
                    <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
                    <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
                    <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
                    <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
                    <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
                </ul>
                <h3 class="links">
                    <p>友情<span>链接</span></p>
                </h3>
                <ul class="website">
                    <li><a href="http://www.houdunwang.com">后盾网</a></li>
                    <li><a href="http://bbs.houdunwang.com">后盾论坛</a></li>
                </ul>
            </div>
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->
        </aside>
    </article>


@endsection

