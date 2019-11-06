@extends('layouts.app')

@section('style')
    <style>
    </style>
@stop

@section('content')
    <div class="layui-row">
        <div class="layui-col-md8">
            <div id="dashboard" style="width:100%;height:800px;"></div>
        </div>
        <div class="layui-col-md4">
            <div class="layui-row">
                <table class="layui-table" id="pocketData"></table>
            </div>
            <div class="layui-row">
                <form class="layui-form" method="post">
                    <div class="layui-form-item">
                        <input type="text" class="layui-input" name="expenditure_date" id="datepicker" readonly>
                    </div>
                    <div class="layui-form-item">
                        <select name="category" lay-verify="required">
                            <option value="1">默认分类</option>
                        </select>
                    </div>
                    <div class="layui-form-item">
                        <input type="number" class="layui-input" name="expenditure" min="0" placeholder="金额"
                               autocomplete="off"
                               lay-verify="required">
                    </div>
                    <div class="layui-form-item">
                        <input type="text" class="layui-input" name="comment" placeholder="备注" autocomplete="off"
                               lay-verify="required">
                    </div>
                    <div class="layui-form-item" style="float: right">
                        <button class="layui-btn" lay-submit lay-filter="*">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="https://cdn.bootcss.com/echarts/4.2.1-rc1/echarts-en.common.min.js"></script>
    <script>
        layui.use(['element', 'form', 'laydate', 'table', 'layer'], function () {
            let element = layui.element
                , form = layui.form
                , $ = layui.$
                , table = layui.table
                , layer = layui.layer
                , laydate = layui.laydate;

            laydate.render({
                elem: '#datepicker'
                , value: "{{ date('Y-m-d') }}"
                , showBottom: false
                , max: 0
            });

            table.render({
                elem: '#pocketData'
                , id: 'pocketData'
                , url: '/pocket/data'
                , page: {
                    layout: ['prev', 'next', 'count']
                }
                , limit: 10
                , limits: [15, 50]
                , cols: [[
                    {field: 'expenditure_date', title: '日期'}
                    , {field: 'category_name', title: '分类'}
                    , {field: 'expenditure', title: '金额'}
                    , {field: 'comment', title: '备注'}
                ]]
                , parseData: function (res) {
                    return {
                        "code": 0,
                        "msg": 'ok',
                        "count": res.total,
                        "data": res.data
                    };
                }
            });

            form.on('submit(*)', function (v) {
                let data = v.field;
                $.ajax({
                    url: "/pocket/store"
                    , data: data
                    , method: 'post'
                    , success: function (r) {
                        if (r.code) {
                            let msg = "";
                            $.each(r.data, function (i, error) {
                                $.each(error, function (k, m) {
                                    msg += m + '<br>';
                                });
                            });
                            layer.msg(msg);
                        } else {
                            table.reload('pocketData');
                            layer.msg('操作成功');
                        }
                    }
                    , error: function (e) {
                        layer.msg('网络错误', {icon: 2});
                    }
                });
                return false;
            });

            let dashboard = echarts.init(document.getElementById('dashboard'));

            let option = {
                legend: {},
                tooltip: {
                    trigger: 'axis',
                    showContent: false
                },
                dataset: {
                    source: [
                        ['product', '2019-06', '2019-07', '2019-08', '2019-09', '2019-10', '2019-11'],
                        ['Matcha', 41.1, 30.4, 65.1, 53.3, 83.8, 98.7],
                        ['Milk', 86.5, 92.1, 85.7, 83.1, 73.4, 55.1],
                        ['Cheese', 24.1, 67.2, 79.5, 86.4, 65.2, 82.5],
                        ['Walnut', 55.2, 67.1, 69.2, 72.4, 53.9, 39.1]
                    ]
                },
                xAxis: {type: 'category'},
                yAxis: {gridIndex: 0},
                grid: {top: '55%'},
                series: [
                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                    {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                    {
                        type: 'pie',
                        id: 'pie',
                        radius: '30%',
                        center: ['50%', '25%'],
                        label: {
                            formatter: '{b}: {@2019-06} ({d}%)'
                        },
                        encode: {
                            itemName: 'product',
                            value: '2019-06',
                            tooltip: '2019-06'
                        }
                    }
                ]
            };

            dashboard.on('updateAxisPointer', function (event) {
                let xAxisInfo = event.axesInfo[0];
                if (xAxisInfo) {
                    let dimension = xAxisInfo.value + 1;
                    dashboard.setOption({
                        series: {
                            id: 'pie',
                            label: {
                                formatter: '{b}: {@[' + dimension + ']} ({d}%)'
                            },
                            encode: {
                                value: dimension,
                                tooltip: dimension
                            }
                        }
                    });
                }
            });

            dashboard.setOption(option);
        });
    </script>
@stop