<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>bs4 simple chat app - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css"> body{margin-top:20px;} /*************** 1.Variables ***************/ /* ------------------ Color Pallet ------------------ */ /*************** 2.Mixins ***************/ /************************************************ ************************************************ Search Box ************************************************ ************************************************/ .chat-search-box { -webkit-border-radius: 3px 0 0 0; -moz-border-radius: 3px 0 0 0; border-radius: 3px 0 0 0; padding: .75rem 1rem; } .chat-search-box .input-group .form-control { -webkit-border-radius: 2px 0 0 2px; -moz-border-radius: 2px 0 0 2px; border-radius: 2px 0 0 2px; border-right: 0; } .chat-search-box .input-group .form-control:focus { border-right: 0; } .chat-search-box .input-group .input-group-btn .btn { -webkit-border-radius: 0 2px 2px 0; -moz-border-radius: 0 2px 2px 0; border-radius: 0 2px 2px 0; margin: 0; } .chat-search-box .input-group .input-group-btn .btn i { font-size: 1.2rem; line-height: 100%; vertical-align: middle; } @media (max-width: 767px) { .chat-search-box { display: none; } } /************************************************ ************************************************ Users Container ************************************************ ************************************************/ .users-container { position: relative; padding: 1rem 0; border-right: 1px solid #e6ecf3; height: 100%; display: -ms-flexbox; display: flex; -ms-flex-direction: column; flex-direction: column; } /************************************************ ************************************************ Users ************************************************ ************************************************/ .users { padding: 0; } .users .person { position: relative; width: 100%; padding: 10px 1rem; cursor: pointer; border-bottom: 1px solid #f0f4f8; } .users .person:hover { background-color: #ffffff; /* Fallback Color */ background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff)); /* Saf4+, Chrome */ background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff); /* Chrome 10+, Saf5.1+, iOS 5+ */ background-image: -moz-linear-gradient(right, #e9eff5, #ffffff); /* FF3.6 */ background-image: -ms-linear-gradient(right, #e9eff5, #ffffff); /* IE10 */ background-image: -o-linear-gradient(right, #e9eff5, #ffffff); /* Opera 11.10+ */ background-image: linear-gradient(right, #e9eff5, #ffffff); } .users .person.active-user { background-color: #ffffff; /* Fallback Color */ background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff)); /* Saf4+, Chrome */ background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff); /* Chrome 10+, Saf5.1+, iOS 5+ */ background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff); /* FF3.6 */ background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff); /* IE10 */ background-image: -o-linear-gradient(right, #f7f9fb, #ffffff); /* Opera 11.10+ */ background-image: linear-gradient(right, #f7f9fb, #ffffff); } .users .person:last-child { border-bottom: 0; } .users .person .user { display: inline-block; position: relative; margin-right: 10px; } .users .person .user img { width: 48px; height: 48px; -webkit-border-radius: 50px; -moz-border-radius: 50px; border-radius: 50px; } .users .person .user .status { width: 10px; height: 10px; -webkit-border-radius: 100px; -moz-border-radius: 100px; border-radius: 100px; background: #e6ecf3; position: absolute; top: 0; right: 0; } .users .person .user .status.online { background: #9ec94a; } .users .person .user .status.offline { background: #c4d2e2; } .users .person .user .status.away { background: #f9be52; } .users .person .user .status.busy { background: #fd7274; } .users .person p.name-time { font-weight: 600; font-size: .85rem; display: inline-block; } .users .person p.name-time .time { font-weight: 400; font-size: .7rem; text-align: right; color: #8796af; } @media (max-width: 767px) { .users .person .user img { width: 30px; height: 30px; } .users .person p.name-time { display: none; } .users .person p.name-time .time { display: none; } } /************************************************ ************************************************ Chat right side ************************************************ ************************************************/ .selected-user { width: 100%; padding: 0 15px; min-height: 64px; line-height: 64px; border-bottom: 1px solid #e6ecf3; -webkit-border-radius: 0 3px 0 0; -moz-border-radius: 0 3px 0 0; border-radius: 0 3px 0 0; } .selected-user span { line-height: 100%; } .selected-user span.name { font-weight: 700; } .chat-container { position: relative; padding: 1rem; } .chat-container li.chat-left, .chat-container li.chat-right { display: flex; flex: 1; flex-direction: row; margin-bottom: 40px; } .chat-container li img { width: 48px; height: 48px; -webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px; } .chat-container li .chat-avatar { margin-right: 20px; } .chat-container li.chat-right { justify-content: flex-end; } .chat-container li.chat-right > .chat-avatar { margin-left: 20px; margin-right: 0; } .chat-container li .chat-name { font-size: .75rem; color: #999999; text-align: center; } .chat-container li .chat-text { padding: .4rem 1rem; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; background: #ffffff; font-weight: 300; line-height: 150%; position: relative; } .chat-container li .chat-text:before { content: ''; position: absolute; width: 0; height: 0; top: 10px; left: -20px; border: 10px solid; border-color: transparent #ffffff transparent transparent; } .chat-container li.chat-right > .chat-text { text-align: right; } .chat-container li.chat-right > .chat-text:before { right: -20px; border-color: transparent transparent transparent #ffffff; left: inherit; } .chat-container li .chat-hour { padding: 0; margin-bottom: 10px; font-size: .75rem; display: flex; flex-direction: row; align-items: center; justify-content: center; margin: 0 0 0 15px; } .chat-container li .chat-hour > span { font-size: 16px; color: #9ec94a; } .chat-container li.chat-right > .chat-hour { margin: 0 15px 0 0; } @media (max-width: 767px) { .chat-container li.chat-left, .chat-container li.chat-right { flex-direction: column; margin-bottom: 30px; } .chat-container li img { width: 32px; height: 32px; } .chat-container li.chat-left .chat-avatar { margin: 0 0 5px 0; display: flex; align-items: center; } .chat-container li.chat-left .chat-hour { justify-content: flex-end; } .chat-container li.chat-left .chat-name { margin-left: 5px; } .chat-container li.chat-right .chat-avatar { order: -1; margin: 0 0 5px 0; align-items: center; display: flex; justify-content: right; flex-direction: row-reverse; } .chat-container li.chat-right .chat-hour { justify-content: flex-start; order: 2; } .chat-container li.chat-right .chat-name { margin-right: 5px; } .chat-container li .chat-text { font-size: .8rem; } } .chat-form { padding: 15px; width: 100%; left: 0; right: 0; bottom: 0; background-color: #ffffff; border-top: 1px solid white; } ul { list-style-type: none; margin: 0; padding: 0; } .card { border: 0; background: #f4f5fb; -webkit-border-radius: 2px; -moz-border-radius: 2px; border-radius: 2px; margin-bottom: 2rem; box-shadow: none; } </style>

</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Chat App</h5>
            </div>
{{--           <a class="btn btn-danger" href="{{ route('logout') }}"> Logout</a>--}}
            <div class="" aria-labelledby="navbarDropdown">
                <a class="btn btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3" style="height: 80vh; overflow-x: hidden; overflow-y: auto; ">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                    @foreach(\App\Models\User::all() as $user)
                                        <li class="person" data-chat="person1">
                                            <div class="user">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                <span class="status busy"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name">{{$user->name}}</span>
                                                <span class="time">{{$user->created_at->diffForHumans()}}</span>
                                            </p>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span><span class="name">Chat Room</span></span>
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    @foreach(\App\Models\Message::all() as $message)
{{--                                        {{dd($message->sender)}}--}}
                                        @if($message->sender_id == auth()->user()->id)
                                            <li class="chat-right">
                                                <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                                <div class="chat-text">
                                                    <br> {{$message->content}}
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                                                    <div class="chat-name">{{$message->sender->name}}</div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="chat-left">
                                                <div class="chat-avatar">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar{{rand(1, 8)}}.png" alt="Retail Admin">
                                                    <div class="chat-name">{{$message->sender->name}}</div>
                                                </div>
                                                <div class="chat-text">
                                                    <br>{{$message->content}}
                                                </div>
                                                <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                            </li>
                                        @endif

                                    @endforeach

                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <div class="chat-box bg-white">
                                        <div class="input-group">
                                            <input class="form-control border no-shadow no-rounded" placeholder="Type your message here">
                                            <span class="input-group-btn">
                                    <button class="btn btn-success no-rounded" type="button">Send</button>
                                    </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>

@vite('resources/js/app.js')
</body>
</html>
