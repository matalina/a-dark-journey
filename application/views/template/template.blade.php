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
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    {{ Asset::container('bootstrapper')->styles() }}
    <link href='http://fonts.googleapis.com/css?family=Creepster|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    {{ HTML::style('assets/css/style.css') }}
    
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
        <div class="push"></div>
      </article>
      <div class="row-fluid">
        <div class="span12 bc"></div>
      </div>
      <footer class="row-fluid">
        <div class="span3 offset9">
          <p>
            &copy; 1999 - {{ date('Y') }} <a href="http://journal.aliciawilkerson.com">Alicia Wilkerson</a>
          </p>
        </div>
      </footer>
    </div>
    {{ Asset::container('bootstrapper')->scripts() }}
    {{ HTML::script('assets/js/jquery.jcrumb.js') }}
    {{ HTML::script('assets/js/script.js') }}
  </body>
</html>




