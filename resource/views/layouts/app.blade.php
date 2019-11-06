<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$title ?? 'Hyperf'}}</title>
    <link rel="stylesheet" href="https://www.layuicdn.com/layui-v2.5.5/css/layui.css">
    @yield('style')
    <style>
        .header {
            height: 59px;
            border-bottom: 1px solid #404553;
            background-color: #393D49;
        }

        .logo {
            position: absolute;
            left: 20px;
            top: 16px;
            color: rgba(255, 255, 255, .7);
        }

        .logo img {
            width: 82px;
            height: 31px;
        }

        .header .layui-nav {
            position: absolute;
            right: 0;
            top: 0;
            padding: 0;
            background: none;
        }

        .header .layui-nav .layui-nav-item {
            margin: 0 20px;
        }

        .header .layui-nav .layui-nav-item[mobile] {
            display: none;
        }

        .header .layui-container .logo {
            left: 15px;
        }

        .header .layui-container .layui-nav {
            right: 15px;
        }

        .header .layui-nav .layui-badge,
        .header .layui-nav .layui-badge-dot {
            right: 0;
        }

        .footer {
            text-align: center;
            line-height: 50px;
            height: 50px;
            background-color: #393D49;
            color: rgba(255, 255, 255, .7);
        }
    </style>
</head>

<body>
<div class="layui-fluid" style="padding: 0">
    <div class="header">
        <div class="logo">
            <h3>{{$title ?? 'Hyperf'}} - Power By nfangxu</h3>
        </div>
        <ul class="layui-nav">
            <li class="layui-nav-item">
                <a href="/pocket/index">记账本</a>
            </li>
            <li class="layui-nav-item">
                <a href="/note/index">记事本</a>
            </li>
        </ul>
    </div>
    <div class="layui-container" style="margin-top: 10px;min-height: 1000px">
        @yield('content')
    </div>
    <div class="footer">
        <span>京ICP-1234567890</span>
    </div>
</div>
<script src="https://www.layuicdn.com/layui-v2.5.5/layui.js"></script>
<script>
    layui.use(['element'], function () {
        //
    });
</script>
@yield('script')
</body>

</html>