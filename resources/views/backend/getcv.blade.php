<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV or Remuse Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }

        body {
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 1000px;
            min-height: 1000px;
            background: #fff;
            margin: 50px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            box-shadow: 0 35px 55px rgba(211, 68, 68, 0.1);
        }

        .container .left_Side {
            position: #fff;
            background: #fff;
            padding: 40px;
        }

        .profileText {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(179, 46, 46, 0.2);
        }

        .profileText .imgBx {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;

        }

        .profileText .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profileText h2 {
            color: black;
            font-size: 1.5em;
            margin-top: 20px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 600;
            line-height: 1.4em;
        }

        .profileText h2 span {
            font-size: 0.8em;
            font-style: 300;
        }

        .contactInfo {
            padding-top: 40px;
        }

        .title {
            color: black;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 20px;

        }

        .contactInfo ul {
            position: relative;
        }

        .contactInfo ul li {
            position: relative;
            list-style: none;
            margin: 10px 0;
            cursor: pointer;
        }

        .contactInfo ul li .icon {
            display: inline-block;
            width: 30px;
            font-size: 18px;
            color: #e37b7d;
        }

        .contactInfo ul li span {
            color: black;
            font-weight: 300;
        }

        .contactInfo.education li {
            margin-bottom: 15px;

        }

        .contactInfo.education h5 {
            color: black;
            font-weight: 500;
        }

        .contactInfo.education h4 {
            color: black;
            font-weight: 500;
        }

        .contactInfo.education h4:nth-child(2) {
            color: black;
            font-weight: 300;
        }

        .contactInfo.language .percent {
            position: relative;
            width: 100%;
            height: 6px;
            background: #fff;
            display: block;
            margin-top: 5px;
        }

        .contactInfo.language .percent div {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: #fff;
        }

        .container .right_Side {
            position: relative;
            background: #fff;
            padding: 40px;
        }

        .about {
            margin-bottom: 50px;

        }

        .about:last-child {
            margin-bottom: 0;
        }

        .title2 {
            color: #003147;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        p {
            color: #333;
        }

        .about .box {
            display: flex;
            flex-direction: row;
            margin: 20px 0;
        }

        .about .box .year_company {
            min-width: 150px;
        }

        .about .box .year_company h5 {
            text-transform: uppercase;
            color: #848c90;
            font-weight: 600;
        }

        .about .box .text h4 {
            text-transform: uppercase;
            color: rgb(148, 8, 8);
            font-size: 16px;
        }

        .skills .box {
            position: relative;
            width: 100%;
            display: grid;
            grid-template-columns: 150px 1fr;
            justify-content: center;
            align-items: center;
        }

        .skills .box h4 {
            text-transform: uppercase;
            color: #848c99;
            font-weight: 500;

        }

        .skills .box .percent {
            position: relative;
            width: 100%;
            height: 10px;
            background: #c1baba;
        }

        .skills .box .percent div {
            position: absolute;
            top: 0;
            left: 00;
            height: 100%;
            background: rgb(148, 8, 8);
        }

        .interest ul {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .interest ul li {
            list-style: none;
            color: #333;
            font-weight: 500;
            margin: 10px 0;
        }

        .interest ul li .fa {
            color: #800b0d;
            font-size: 18px;
            width: 20px;
        }

        .contactInfo language {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left_Side">
            <div class="profileText">
                @php
                $image =App\Models\Image::where('user_id',Auth::user()->id)->first();

                @endphp
                <div class="imgBx">
                    <img class="picture" src="{{$image->img}}" alt="">
                </div>
                @php
                $info =App\Models\Info::where('user_id',Auth::user()->id)->first();

                @endphp
                <h2>{{$info->name}}<br></h2>
            </div>
            <div class="contactInfo">
                <h3 class="title">Contact Info</h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="text">{{$info->phone}}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="text">{{$info->email}}</span>
                    </li>


                    <li>
                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span class="text">{{$info->city}},{{$info->address}}</span>
                    </li>

                </ul>
            </div>
            <div class="contactInfo education">

                <h3 class="title">EDUCATION</h3>
                @php
                $edus =App\Models\education::where('user_id',Auth::user()->id)->where('level_id',1)->get();

                @endphp
                <ul>
                    @foreach($edus as $edu)
                    <li>
                        <h5>{{$edu->StartDate}} - {{$edu->EndDate}}</h5>
                        <h4> {{$edu->field}}</h4>
                        <h4>{{$edu->eduName}} </h4>
                    </li>

                    @endforeach

                </ul>
            </div>

            <br>
            <br>
            @php
            $lang =App\Models\Laguage::where('user_id',Auth::user()->id)->first();
            $langName =$lang->name;
            $langs =explode(',', $langName);
            @endphp
            <div class="contactInfo education">
                <h3 class="title">LANGUAGES</h3>
                <ul>
                    @foreach($langs as $lang)
                    <li>

                        <h4>{{$lang}}</h4>
                    </li>
                    @endforeach


                </ul>
            </div>

        </div>
        <div class="right_Side">
            <div class="about">
                @php
                $profile =App\Models\Profile::where('user_id',Auth::user()->id)->first();

                @endphp
                <h2 class="title2">Profile</h2>
                <p>{{$profile->desc}}</p>
            </div>
            <div class="about">
                <h2 class="title2">Experience</h2>
                @php
                $edus =App\Models\education::where('user_id',Auth::user()->id)->where('level_id',4)->get();

                @endphp
                @foreach($edus as $edu)

                <div class="box">
                    <div class="year_company">
                        <h5>{{$edu->StartDate}} To {{$edu->EndDate}}</h5>
                        <h5>{{$edu->eduName}}</h5>
                    </div>
                    <div class="text">
                        <h4>{{$edu->field}}</h4>
                        <p>{{$edu->desc}}</p>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="about">
                <h2 class="title2">Award</h2>
                @php
                $edus =App\Models\education::where('user_id',Auth::user()->id)->where('level_id',2)->get();

                @endphp
                @foreach($edus as $edu)

                <div class="box">
                    <div class="year_company">

                        <h5>{{$edu->eduName}}</h5>
                    </div>
                    <div class="text">
                        <h4>{{$edu->field}}</h4>
                        <p>{{$edu->desc}}</p>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="about skills">
                <h2 class="title2">Professional Skills</h2>
                @php
                $skill =App\Models\Skill::where('user_id',Auth::user()->id)->first();
                $skillName =$skill->skillName;
                $skills =explode(',', $skillName);
                @endphp

                @foreach($skills as $skill)
                <div class="box">
                    <h4>{{$skill}}</h4>
                    <div class="percent">
                        <div style="width:95%;"></div>
                    </div>
                </div>
                @endforeach



            </div>

        </div>
    </div>
</body>

</html>