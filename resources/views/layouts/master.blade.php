<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <style>
        #app {
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        .el-header {
            background-color: #bef1ff;
            color: #333;
            line-height: 60px;
        }

        .el-footer {
            background-color: #c8e4f8;
            color: #333;
            line-height: 60px;
        }

        .el-aside {
            color: #333;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div id="app">
    <el-container>
        @include('layouts.partials.aside')
        <el-container>
            @include('layouts.partials.header')
            <el-main>@yield('content')</el-main>
            @include('layouts.partials.footer')
        </el-container>
    </el-container>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>