<!DOCTYPE html>

<html>
  <head>
    <title> Health Care Information Systems </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    <meta charset="utf-8">
  </head>


  <body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            {{ link_to_route('home', 'HCIS', [], ['class' => 'navbar-brand']) }}
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse">
            <!--navbar left--->
            <ul class="nav navbar-nav">
              <!--Record-->
              <li class="Record">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Record <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>

              <!--Patient-->
              <li class="Patient">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Patient <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>{{ link_to_route('patient.index', 'Index') }}</li>
                  <li>{{ link_to_route('patient.create', 'Create') }}</li>
                </ul>
              </li>

              <!--Facility-->
              <li class="Facility">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Facility <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>

              <!--Staff-->
              <li class="Staff">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Staff <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>

            <!--Search Bar-->
            {{Form::open(['route'=>'patient.search', 'class' => "navbar-form navbar-left"])}}
            <div class="form-group">
              {{Form::text('keyword', null, ['placeholder' => 'Search',  'class' => 'form-control'])}}
            </div>
            {{Form::submit('Search', ['class' => 'btn btn-default'])}}
            {{Form::close()}}

            <!--navbar right-->
            <ul class="nav navbar-nav navbar-right">
              @if (Auth::check())
              <!--Profile-->
              <li><p class="navbar-text">Signed in as {{ Auth::user()->username }}.</p></li>
              <!--Logout-->
              <li>
                {{ Form::open(['route' => 'login.destroy', 'method' => 'DELETE']) }}
                {{ Form::submit('Logout', ['class' => 'btn btn-default navbar-btn']) }}
                {{ Form::close() }}
              </li>
              @else
              <p class="navbar-text">Login required.</p>
              @endif

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </div>


    <!-- Main content -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="container">
        <!--- Flash messages -->
        @if (Session::get('flash_message_success'))
        <div class="alert alert-success fade in" role="alert">
          <button class="close" data-dismiss="alert">×</button>
          {{ Session::get('flash_message_success') }}
        </div>
        @endif
        @if (Session::get('flash_message_info'))
        <div class="alert alert-info fade in" role="alert">
          <button class="close" data-dismiss="alert">×</button>
          {{ Session::get('flash_message_info') }}
        </div>
        @endif
        @if (Session::get('flash_message_warning'))
        <div class="alert alert-warning fade in" role="alert">
          <button class="close" data-dismiss="alert">×</button>
          {{ Session::get('flash_message_warning') }}
        </div>
        @endif
        @if (Session::get('flash_message_danger'))
        <div class="alert alert-danger fade in" role="alert">
          <button class="close" data-dismiss="alert">×</button>
          {{ Session::get('flash_message_danger') }}
        </div>
        @endif

        <!-- Content-->
        @yield('content')
      </div>
    </div>

    <!-- END HOME -->

    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    <script>
      //Auto close alert after a set time.
      window.setTimeout(function() { $(".alert").alert('close'); }, 4000);
    </script>
  </body>
</html>

