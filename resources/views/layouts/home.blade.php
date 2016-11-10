<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ACCELAAR</title>
    <meta name="csrf_token" content="{{csrf_token()}}">
    {{--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="screen" title="no title" charset="utf-8">
    @yield('extra_css')
    <script type="text/javascript">(function(o){var b="https://api.autopilothq.com/anywhere/",t="bd8cfcc3317e432cb983ec7dc09c074322278337ced14a2dad54a3336b8d08fe",a=window.AutopilotAnywhere={_runQueue:[],run:function(){this._runQueue.push(arguments);}},c=encodeURIComponent,s="SCRIPT",d=document,l=d.getElementsByTagName(s)[0],p="t="+c(d.title||"")+"&u="+c(d.location.href||"")+"&r="+c(d.referrer||""),j="text/javascript",z,y;if(!window.Autopilot) window.Autopilot=a;if(o.app) p="devmode=true&"+p;z=function(src,asy){var e=d.createElement(s);e.src=src;e.type=j;e.async=asy;l.parentNode.insertBefore(e,l);};if(!o.noaa){z(b+"aa/"+t+'?'+p,false)};y=function(){z(b+t+'?'+p,true);};if(window.attachEvent){window.attachEvent("onload",y);}else{window.addEventListener("load",y,false);}})({});</script>
</head>

<body>
    <div class="page">
        @include('partials._header')
        @yield('content')
        @include('partials._footer')
    </div>
    @yield('modals')
    @include('partials._flash_data')
</body>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
@yield('extra_js')
</html>