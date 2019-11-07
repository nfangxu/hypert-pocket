@extends('layouts.app')

@section('content')

@stop

@section('script')
    <script>
        layui.use(['layim'], function () {
            let layim = layui.layim;

            layim.config({
                brief: true //是否简约模式（如果true则不显示主面板）
                , init: {
                    mine: {
                        "username": "壮士" //我的昵称
                        , "id": "100000" //我的ID
                        , "status": "online" //在线状态 online：在线、hide：隐身
                        , "sign": "在深邃的编码世界，做一枚轻盈的纸飞机" //我的签名
                        , "avatar": "https://ali-static.oss-cn-beijing.aliyuncs.com/default.png" //我的头像
                    }
                }
            }).chat({
                name: '客服姐姐'
                , type: 'friend'
                , avatar: 'https://ali-static.oss-cn-beijing.aliyuncs.com/default.png'
                , id: -2
            });

            layim.on('sendMessage', function (r) {
                console.log(r.mine);
            });
        });
    </script>
@stop