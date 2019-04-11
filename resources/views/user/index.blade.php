{{-- @extends('layouts.app')

@section('content')

    @include('user.particals.info')
    <div class="container">
        <main class="row">
            <div class="col-lg-3 left-box">
                <div class="widget categories">
                    @if (Auth::guest())
                    @else
                        @if(!$categories['yourCategory']->isEmpty())
                            <h3 class="h6">Your Categories</h3>
                            @foreach ($categories['yourCategory'] as $category)
                                <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top" title="{{ $category->articles_count }} bài viết ">
                                    <a href="{{ url('category', ['name' => $category->name]) }}">@if($category->articles_count == 0)<i class="fas fa-exclamation-triangle text-yellow"></i>@else <i class="fas fa-check text-green"></i> @endif {{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                                </div>
                            @endforeach
                            <hr>
                        @endif
                    @endif
                    <h3 class="h6">Public Categories</h3>
                    @foreach ($categories['public'] as $category)
                        @if($category->articles_count != 0)
                            <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top" title="{{ $category->articles_count }} bài viết ">
                                <a href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                            </div>
                        @endif
                    @endforeach
                    <hr>
                    @if(!$categories['other']->isEmpty())
                        <h3 class="h6">Other Categories</h3>
                        @foreach ($categories['other'] as $category)
                            @if($category->articles_count != 0)
                                <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top" title="{{ $category->articles_count }} bài viết ">
                                    <a href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#recent-articles" data-toggle="tab">Recent Articles</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recent-discussions" data-toggle="tab">{{ lang('Recent Discussions') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recent-comments" data-toggle="tab">{{ lang('Recent Comments') }}</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="recent-articles">
                                
                                @include('user.particals.articles')

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane posts-listing" id="recent-discussions">

                                @include('user.particals.discussions')

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="recent-comments">
                               
                                @include('user.particals.comments')

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </main>
    </div>
@endsection

@section('scripts')
<script>
let acc = document.getElementsByClassName("accordion");
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight){
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        } 
    }
}

</script>
@endsection --}}

@extends('layouts.app')
@section('styles')
<style>
.navbar.navbar-expand-lg {
    display: none;
}

.header_bg {
    width: 130%;
    position: absolute;
    z-index: 0;
    height: 100%;
    background-attachment: fixed;
    opacity: 0.09;
    left: 0;
    top: 0;
}

.pen_cta a {
    background: none;
    color: #ffff;
    border: 2px solid #ef8e27;
    padding: 7px 15px;
    font-size: 12px;
    font-family: "montserrat";
    transition: all 0.3s;
    cursor: pointer;
}

.pen_cta a:hover {
    color: white !important;
    background: #ef8e27;
}


.penfolio_inner__contact {
    padding: 10px 10px;
    text-align: center;
    padding-bottom: 100px;
}

.penfolio_inner__contact img {
    width: 100px;
    border-radius: 100px;
    margin: 24px 0px;
    border: 2px solid white;
}

.slogan p {
    color: #ef8e27;
    font-family: Lora;
    font-weight: 100;
    font-size: 18px;
    font-style: italic;
    text-align: center;
}

.slogan h3 {
    color: #ef8e27 !important;
    margin: 0;
    font-size: 16px;
    font-family: Lora;
    font-weight: 100;
    font-style: italic;
}

.penfolio_inner__home {
    padding-bottom: 20px;
    background: #121318;
    overflow: hidden;
    position: relative;
    border-top: 2px solid #ef8e27;
}

.penfolio_inner__home header {
    height: 120px;
    z-index: 2;
    position: relative;
    margin-top: -70px;
}

.penfolio_inner__home header a {
    text-decoration: none;
}

.penfolio_inner__home .pen_logo {
    float: left;
    padding: 40px;
}

.penfolio_inner__home .pen_cta {
    float: right;
    position: relative;
    padding: 40px;
    top: 9px;
}

.penfolio_inner__home .pen_intro {
    text-align: center;
    margin-top: 30px;
    position: relative;
    z-index: 1;
}

.penfolio_inner__home .pen_intro nav {
    margin-bottom: 80px;
    margin-top: 90px;
}

.penfolio_inner__home .pen_intro h2 {
    color: #ef8e27;
    font-size: 16px;
    margin: 10px 0px 0px 0px;
}

.penfolio_inner__home .pen_intro h3 {
    margin: 0;
    color: #ffff;
    font-weight: 100;
    font-size: 12px;
    opacity: 0.9;
    padding: 10px;
}

.penfolio_inner__home .pen_intro h4 {
    color: White;
    font-size: 12px;
}

.penfolio_inner__home .pen_intro h5 {
    font-size: 26px;
    line-height: 38px;
    color: #e2f1ea;
    font-weight: 100;
    font-family: 'lora';
    width: 460px;
    margin: 0 auto;
    line-height: 23px;
    font-size: 18px;
    margin: 40px auto -40px auto;
}

.penfolio_inner__home .pen_intro__image {
    width: 90px;
    margin: 0 auto 10px auto;
}

.penfolio_inner__home .pen_intro__image img {
    width: 100%;
    border: 3px solid white;
    border-radius: 200px;
}

@media (max-width: 768px) {
    .penfolio_inner__home .pen_intro h5 {
        width: 100%;
        padding: 20px;
    }

    .penfolio_inner__about .about_left h2 {
        font-size: 32px;
    }

    .pen_logo,
    .pen_cta {
        width: 100% !important;
        text-align: center;
    }

    .penfolio_inner__home .pen_cta,
    nav {
        display: none;
    }

    .pen_cta {
        margin-top: 20px;
    }

    .pen_intro {
        margin: 0px 0px 54px 0px !important;
    }
}

@keyframes dot {
    0% {
        left: 0;
    }

    50% {
        left: 88px;
    }

    100% {
        left: 0;
    }
}


.chart {
    position: absolute;
    width: 450px;
    height: 450px;
    top: 50%;
    left: 50%;
    margin: -225px 0 0 -225px;
}

.doughnutTip {
    position: absolute;
    min-width: 30px;
    max-width: 300px;
    padding: 5px 15px;
    border-radius: 1px;
    background: rgba(0, 0, 0, .8);
    color: #ddd;
    font-size: 17px;
    text-shadow: 0 1px 0 #000;
    text-transform: uppercase;
    text-align: center;
    line-height: 1.3;
    letter-spacing: .06em;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    pointer-events: none;

    &::after {
        position: absolute;
        left: 50%;
        bottom: -6px;
        content: "";
        height: 0;
        margin: 0 0 0 -6px;
        border-right: 5px solid transparent;
        border-left: 5px solid transparent;
        border-top: 6px solid rgba(0, 0, 0, .7);
        line-height: 0;
    }
}

.doughnutSummary {
    position: absolute;
    top: 50%;
    left: 50%;
    color: #d5d5d5;
    text-align: center;
    text-shadow: 0 -1px 0 #111;
    cursor: default;
}

.doughnutSummaryTitle {
    position: absolute;
    top: 50%;
    width: 100%;
    margin-top: -27%;
    font-size: 22px;
    letter-spacing: .06em;
}

.doughnutSummaryNumber {
    position: absolute;
    top: 50%;
    width: 100%;
    margin-top: -15%;
    font-size: 55px;
}

.chart path:hover {
    opacity: 0.65;
}
</style>
@endsection
@section('content')
    @include('particals.top-info')
@endsection
@section('scripts')
<script>
$(function() {
    $("#doughnutChart").drawDoughnutChart([
        { title: "Tokyo", value: 120, color: "#2C3E50" },
        { title: "San Francisco", value: 80, color: "#FC4349" },
        { title: "New York", value: 70, color: "#6DBCDB" },
        { title: "London", value: 50, color: "#F7E248" },
        { title: "Sydney", value: 40, color: "#D7DADB" },
        { title: "Berlin", value: 20, color: "#FFF" }
    ]);
});
/*!
 * jquery.drawDoughnutChart.js
 * Version: 0.4.1(Beta)
 * Inspired by Chart.js(http://www.chartjs.org/)
 *
 * Copyright 2014 hiro
 * https://github.com/githiro/drawDoughnutChart
 * Released under the MIT license.
 * 
 */
;
(function($, undefined) {
    $.fn.drawDoughnutChart = function(data, options) {
        var $this = this,
            W = $this.width(),
            H = $this.height(),
            centerX = W / 2,
            centerY = H / 2,
            cos = Math.cos,
            sin = Math.sin,
            PI = Math.PI,
            settings = $.extend({
                segmentShowStroke: true,
                segmentStrokeColor: "#0C1013",
                segmentStrokeWidth: 1,
                baseColor: "rgba(0,0,0,0.5)",
                baseOffset: 4,
                edgeOffset: 10, //offset from edge of $this
                percentageInnerCutout: 75,
                animation: true,
                animationSteps: 90,
                animationEasing: "easeInOutExpo",
                animateRotate: true,
                tipOffsetX: -8,
                tipOffsetY: -45,
                tipClass: "doughnutTip",
                summaryClass: "doughnutSummary",
                summaryTitle: "TOTAL:",
                summaryTitleClass: "doughnutSummaryTitle",
                summaryNumberClass: "doughnutSummaryNumber",
                beforeDraw: function() {},
                afterDrawed: function() {},
                onPathEnter: function(e, data) {},
                onPathLeave: function(e, data) {}
            }, options),
            animationOptions = {
                linear: function(t) {
                    return t;
                },
                easeInOutExpo: function(t) {
                    var v = t < .5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t;
                    return (v > 1) ? 1 : v;
                }
            },
            requestAnimFrame = function() {
                return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimationFrame ||
                    function(callback) {
                        window.setTimeout(callback, 1000 / 60);
                    };
            }();

        settings.beforeDraw.call($this);

        var $svg = $('<svg width="' + W + '" height="' + H + '" viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>').appendTo($this),
            $paths = [],
            easingFunction = animationOptions[settings.animationEasing],
            doughnutRadius = Min([H / 2, W / 2]) - settings.edgeOffset,
            cutoutRadius = doughnutRadius * (settings.percentageInnerCutout / 100),
            segmentTotal = 0;

        //Draw base doughnut
        var baseDoughnutRadius = doughnutRadius + settings.baseOffset,
            baseCutoutRadius = cutoutRadius - settings.baseOffset;
        $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
            .attr({
                "d": getHollowCirclePath(baseDoughnutRadius, baseCutoutRadius),
                "fill": settings.baseColor
            })
            .appendTo($svg);

        //Set up pie segments wrapper
        var $pathGroup = $(document.createElementNS('http://www.w3.org/2000/svg', 'g'));
        $pathGroup.attr({ opacity: 0 }).appendTo($svg);

        //Set up tooltip
        var $tip = $('<div class="' + settings.tipClass + '" />').appendTo('body').hide(),
            tipW = $tip.width(),
            tipH = $tip.height();

        //Set up center text area
        var summarySize = (cutoutRadius - (doughnutRadius - cutoutRadius)) * 2,
            $summary = $('<div class="' + settings.summaryClass + '" />')
            .appendTo($this)
            .css({
                width: summarySize + "px",
                height: summarySize + "px",
                "margin-left": -(summarySize / 2) + "px",
                "margin-top": -(summarySize / 2) + "px"
            });
        var $summaryTitle = $('<p class="' + settings.summaryTitleClass + '">' + settings.summaryTitle + '</p>').appendTo($summary);
        var $summaryNumber = $('<p class="' + settings.summaryNumberClass + '"></p>').appendTo($summary).css({ opacity: 0 });

        for (var i = 0, len = data.length; i < len; i++) {
            segmentTotal += data[i].value;
            $paths[i] = $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
                .attr({
                    "stroke-width": settings.segmentStrokeWidth,
                    "stroke": settings.segmentStrokeColor,
                    "fill": data[i].color,
                    "data-order": i
                })
                .appendTo($pathGroup)
                .on("mouseenter", pathMouseEnter)
                .on("mouseleave", pathMouseLeave)
                .on("mousemove", pathMouseMove);
        }

        //Animation start
        animationLoop(drawPieSegments);

        //Functions
        function getHollowCirclePath(doughnutRadius, cutoutRadius) {
            //Calculate values for the path.
            //We needn't calculate startRadius, segmentAngle and endRadius, because base doughnut doesn't animate.
            var startRadius = -1.570, // -Math.PI/2
                segmentAngle = 6.2831, // 1 * ((99.9999/100) * (PI*2)),
                endRadius = 4.7131, // startRadius + segmentAngle
                startX = centerX + cos(startRadius) * doughnutRadius,
                startY = centerY + sin(startRadius) * doughnutRadius,
                endX2 = centerX + cos(startRadius) * cutoutRadius,
                endY2 = centerY + sin(startRadius) * cutoutRadius,
                endX = centerX + cos(endRadius) * doughnutRadius,
                endY = centerY + sin(endRadius) * doughnutRadius,
                startX2 = centerX + cos(endRadius) * cutoutRadius,
                startY2 = centerY + sin(endRadius) * cutoutRadius;
            var cmd = [
                'M', startX, startY,
                'A', doughnutRadius, doughnutRadius, 0, 1, 1, endX, endY, //Draw outer circle
                'Z', //Close path
                'M', startX2, startY2, //Move pointer
                'A', cutoutRadius, cutoutRadius, 0, 1, 0, endX2, endY2, //Draw inner circle
                'Z'
            ];
            cmd = cmd.join(' ');
            return cmd;
        };

        function pathMouseEnter(e) {
            var order = $(this).data().order;
            $tip.text(data[order].title + ": " + data[order].value)
                .fadeIn(200);
            settings.onPathEnter.apply($(this), [e, data]);
        }

        function pathMouseLeave(e) {
            $tip.hide();
            settings.onPathLeave.apply($(this), [e, data]);
        }

        function pathMouseMove(e) {
            $tip.css({
                top: e.pageY + settings.tipOffsetY,
                left: e.pageX - $tip.width() / 2 + settings.tipOffsetX
            });
        }

        function drawPieSegments(animationDecimal) {
            var startRadius = -PI / 2, //-90 degree
                rotateAnimation = 1;
            if (settings.animation && settings.animateRotate) rotateAnimation = animationDecimal; //count up between0~1

            drawDoughnutText(animationDecimal, segmentTotal);

            $pathGroup.attr("opacity", animationDecimal);

            //If data have only one value, we draw hollow circle(#1).
            if (data.length === 1 && (4.7122 < (rotateAnimation * ((data[0].value / segmentTotal) * (PI * 2)) + startRadius))) {
                $paths[0].attr("d", getHollowCirclePath(doughnutRadius, cutoutRadius));
                return;
            }
            for (var i = 0, len = data.length; i < len; i++) {
                var segmentAngle = rotateAnimation * ((data[i].value / segmentTotal) * (PI * 2)),
                    endRadius = startRadius + segmentAngle,
                    largeArc = ((endRadius - startRadius) % (PI * 2)) > PI ? 1 : 0,
                    startX = centerX + cos(startRadius) * doughnutRadius,
                    startY = centerY + sin(startRadius) * doughnutRadius,
                    endX2 = centerX + cos(startRadius) * cutoutRadius,
                    endY2 = centerY + sin(startRadius) * cutoutRadius,
                    endX = centerX + cos(endRadius) * doughnutRadius,
                    endY = centerY + sin(endRadius) * doughnutRadius,
                    startX2 = centerX + cos(endRadius) * cutoutRadius,
                    startY2 = centerY + sin(endRadius) * cutoutRadius;
                var cmd = [
                    'M', startX, startY, //Move pointer
                    'A', doughnutRadius, doughnutRadius, 0, largeArc, 1, endX, endY, //Draw outer arc path
                    'L', startX2, startY2, //Draw line path(this line connects outer and innner arc paths)
                    'A', cutoutRadius, cutoutRadius, 0, largeArc, 0, endX2, endY2, //Draw inner arc path
                    'Z' //Cloth path
                ];
                $paths[i].attr("d", cmd.join(' '));
                startRadius += segmentAngle;
            }
        }

        function drawDoughnutText(animationDecimal, segmentTotal) {
            $summaryNumber
                .css({ opacity: animationDecimal })
                .text((segmentTotal * animationDecimal).toFixed(1));
        }

        function animateFrame(cnt, drawData) {
            var easeAdjustedAnimationPercent = (settings.animation) ? CapValue(easingFunction(cnt), null, 0) : 1;
            drawData(easeAdjustedAnimationPercent);
        }

        function animationLoop(drawData) {
            var animFrameAmount = (settings.animation) ? 1 / CapValue(settings.animationSteps, Number.MAX_VALUE, 1) : 1,
                cnt = (settings.animation) ? 0 : 1;
            requestAnimFrame(function() {
                cnt += animFrameAmount;
                animateFrame(cnt, drawData);
                if (cnt <= 1) {
                    requestAnimFrame(arguments.callee);
                } else {
                    settings.afterDrawed.call($this);
                }
            });
        }

        function Max(arr) {
            return Math.max.apply(null, arr);
        }

        function Min(arr) {
            return Math.min.apply(null, arr);
        }

        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        function CapValue(valueToCap, maxValue, minValue) {
            if (isNumber(maxValue) && valueToCap > maxValue) return maxValue;
            if (isNumber(minValue) && valueToCap < minValue) return minValue;
            return valueToCap;
        }
        return $this;
    };
})(jQuery);
</script>
@endsection