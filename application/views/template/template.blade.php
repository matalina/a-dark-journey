<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="description" content="@yield('description')">
      <meta name="viewport" content="width=device-width">
    <title>@yield('title') | A Dark Journey</title>
    <!-- Bootstrap -->
    {{ Asset::container('bootstrapper')->styles() }}
    {{ HTML::style('assets/css/style.css');}}
  </head>
  <body>
    <header>
      <nav class="navbar">
        @yield('navbar')  
      </nav>
    </header>
    <div class="container">
      @if(Session::get('success'))
        {{ Alert::success(Session::get('success')) }}
      @endif
      @if(Session::get('error'))
        {{ Alert::error(Session::get('error')) }}
      @endif
      @if(Session::get('warning'))
        {{ Alert::warning(Session::get('warning')) }}
      @endif
      @if(Session::get('info'))
        {{ Alert::info(Session::get('info')) }}
      @endif
      @if(Session::get('danger'))
        {{ Alert::success(Session::get('danger')) }}
      @endif
      <article class="row-fluid">
        <div class="span10 offset1">
          @yield('content')
        </div>
      </article>
      <footer>
        Test Footer
      </footer>
    </div>
    {{ Asset::container('bootstrapper')->scripts() }}
  </body>
</html>




