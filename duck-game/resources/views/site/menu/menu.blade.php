<head>
    <title>{{ $pageTitle ?? file_get_contents('/etc/hostname') }}</title>
    <link rel="icon" href="{{ asset('images/duck-game.png') }}" type="image/x-icon">
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .topnav {
        background-color: black;
        overflow: hidden;
        height: 50px;
        margin-top: 0px;
    }
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        margin-top: 4px;
        padding: 14px 16px;
        margin-left: 5px;
        text-decoration: none;
        font-size: 17px;
    }
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }
    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }
</style>
<div class="topnav">
    <a class="{{ $menu === 'home' ? 'active' : '' }}" href="{{ route('site.show') }}">Home</a>
    <a class="{{ $menu === 'duck' ? 'active' : '' }}" href="{{ route('site.duck') }}">Duck</a>
    <a class="{{ $menu === 'game' ? 'active' : '' }}" href="{{ route('site.game') }}">Game</a>
</div>