<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="/">
            <img src="{{asset('assets/img/logo.png')}}" alt="MostEvent"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('pagehome')}}">{{__('messages.Home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('speaker')}}">{{__('messages.Speakers')}}</a>
                </li>
               <li class="nav-item">
                    <a class="nav-link " href="{{route('contact')}}">{{__('messages.Contact')}}</a>
                </li>
              
           
             <ul class="navbar-nav ml-5">
                @auth
                  <li class="nav-item"><a class="nav-link" href="{{route('Clientsatuts.edit',auth()->user()->id)}}">{{auth()->user()->fullname()}} </a></li>
                  @if(auth()->user()->haveEvent())
                    <li class="nav-item"><a class="nav-link" href="{{route('CreatorEvents.show',auth()->user()->cevent()->id)}}">{{__('messages.Manage')}}</a></li>
                    @endif
                    @if(auth()->user()->haveOner())
                    <li class="nav-item"><a class="nav-link" href="{{route('oner.show',auth()->user()->oner()->id)}}">{{__('messages.Manage')}}</a></li>
                    @endif
                    @if(auth()->user()->role === "user")
                    <li class="nav-item"><a class="nav-link" href="{{route('Clientsatuts.show',auth()->user()->client()->id)}}">{{__('messages.Statusbooking')}}</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">{{__('messages.Logout')}}</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">{{__('messages.Login')}}</a></li>
                    @endauth
                </ul>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('messages.Language')}}
                    </button>
                    <div class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                      <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}</a>
                      @endforeach
                    </div>
                  </div>

                <li class="search_btn">
                    <a  href="{{route('search')}}">
                       <i class="ion-ios-search"></i>
                    </a>
                </li>
             
                
            </ul>
            </ul>
        </div>
    </div>
    <!-- Styles -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
    </header>