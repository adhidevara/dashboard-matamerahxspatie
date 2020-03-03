@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'clientConnectionPath', 'environment', 'openWeatherMapKey'))
<div id="dashboard">
    <dashboard class="font-sans bg-red-700">
        <!-- <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a16"></twitter>--}}
        <tile-timer on="16:00" off="19:00">--}}
            <trains position="a1:a9" max-trains="3"></trains>
        </tile-timer>  -->
        <time-weather position="e1:e9" date-format="dddd, DD MMM YYYY" time-zone="Asia/Jakarta" weather-city="Bandung" location="Bandung"></time-weather>
        <!-- <internet-connection position="e1:e6"></internet-connection> -->
        <statistics-moota position="e10:e27" Avatar="https://i.ibb.co/9N70TnL/Slice-3.png"></statistics-moota>
        <statistics-amal-sholeh position="d10:d27" Avatar="https://i.ibb.co/d5qMK3d/Slice-4-1.png"></statistics-amal-sholeh>
        <!-- <uptime position="a1:a10"></uptime> -->
        <!-- <calendar position="e7:e16"></calendar> -->
        <!-- <velo position="e17:e24"></velo> -->
        <team-member name="adhidevara" avatar="{{ gravatar('adriaan@spatie.be') }}" birthday="1995-02-14" position="a1:a9"></team-member>
        <team-member name="antoniusandre1" avatar="{{ gravatar('adriaan@spatie.be') }}" birthday="1995-10-22" position="a10:a18"></team-member>
        <team-member name="richard07210650" avatar="{{ gravatar('rias@spatie.be') }}" birthday="1992-05-25" position="a19:a27"></team-member>
        <team-member name="ruben" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="a28:a36"></team-member>
        <team-member name="tama" avatar="{{ gravatar('adriaan@spatie.be') }}" birthday="1995-10-22" position="b1:b9"></team-member>
        <team-member name="brent" avatar="{{ gravatar('brent@spatie.be') }}" birthday="1994-07-30" position="b10:b18"></team-member>
        <team-member name="bryant" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="b19:b27"></team-member>
        <team-member name="buyar" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="b28:b36"></team-member>
        <team-member name="alex" avatar="{{ gravatar('alex@spatie.be') }}" birthday="1996-02-05" position="c1:c9"></team-member>
        <team-member name="freek" avatar="{{ gravatar('freek@spatie.be') }}" birthday="1979-09-22" position="c10:c18"></team-member>
        <team-member name="anton" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="c19:c27"></team-member>
        <team-member name="devara" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="c28:c36"></team-member>
        <team-member name="anugrah" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="d1:d9"></team-member>
        <team-member name="pratama" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="d28:d36"></team-member>
        <team-member name="rega" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="e28:e36"></team-member>
    </dashboard>
</div>

@endsection
