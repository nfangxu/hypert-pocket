@extends('layouts.app')

@section('style')
    <style>
        .demo-carousel {
            height: 280px;
            line-height: 280px;
            text-align: center;
        }

        #comment {
            position: fixed;
            bottom: 55px;
            right: 0;
            height: 300px;
            width: 400px;
        }
    </style>
@stop

@section('content')
    <div class="layui-row">
        <div class="layui-col-md9">
            <div class="layui-carousel" id="carousel">
                <div carousel-item>
                    <div>
                        <p class="layui-bg-green demo-carousel">在这里，你将以最直观的形式体验 layui！</p>
                    </div>
                    <div>
                        <p class="layui-bg-red demo-carousel">在编辑器中可以执行 layui 相关的一切代码</p>
                    </div>
                    <div>
                        <p class="layui-bg-blue demo-carousel">你也可以点击左侧导航针对性地试验我们提供的示例</p>
                    </div>
                    <div>
                        <p class="layui-bg-orange demo-carousel">如果最左侧的导航的高度超出了你的屏幕</p>
                    </div>
                    <div>
                        <p class="layui-bg-cyan demo-carousel">你可以将鼠标移入导航区域，然后滑动鼠标滚轮即可</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-md3">
            <div id="datetime"></div>
        </div>
    </div>
    <hr class="layui-bg-gray">
    <div class="layui-row">
        <div class="layui-col-md9">
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月18日</h3>
                        <p>
                            layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
                            <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
                            <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月16日</h3>
                        <p>杜甫的思想核心是儒家的仁政思想，他有“<em>致君尧舜上，再使风俗淳</em>”的宏伟抱负。个人最爱的名篇有：</p>
                        <ul>
                            <li>《登高》</li>
                            <li>《茅屋为秋风所破歌》</li>
                        </ul>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利72周年
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">过去</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="layui-col-md3">
            <div id="comment">
                <fieldset class="layui-elem-field">
                    <legend>壮士请留步</legend>
                    <div class="layui-field-box">
                        <div class="layui-form">
                            <div class="layui-form-item">
                                <input type="text" class="layui-input" name="nickname" autocomplete="off"
                                       placeholder="如何称呼？">
                            </div>
                            <div class="layui-form-item">
                                <input type="text" class="layui-input" name="email" autocomplete="off"
                                       placeholder="如何联系？">
                            </div>
                            <div class="layui-form-item">
                                <textarea name="content" placeholder="有何吩咐！" class="layui-textarea"></textarea>
                            </div>
                            <div class="layui-form-item" style="float: right">
                                <button class="layui-btn layui-btn-sm layui-btn-primary">溜了溜了</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        layui.use(['carousel', 'laydate'], function () {
            let carousel = layui.carousel
                , laydate = layui.laydate;

            carousel.render({
                elem: '#carousel'
                , width: '100%' //设置容器宽度
                , height: 280
                , arrow: 'none' //不显示箭头
                , anim: 'fade' //切换动画方式
            });

            laydate.render({
                elem: '#datetime'
                , position: 'static'
                , showBottom: false
                , calendar: true
                , theme: 'grid'
                , mark: {
                    '{{ date('Y-m-d') }}': '今天'
                }
            });
        });
    </script>
@stop