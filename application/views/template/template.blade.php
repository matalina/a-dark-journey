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
    <link href='http://fonts.googleapis.com/css?family=Eagle+Lake|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    {{ HTML::style('assets/css/style.css') }}
    
  </head>
  <body>
    @yield('navbar')
    <div class="container">
      <header class="row-fluid">
        <div class="span9 visible-desktop"></div>
        <div class="span3">
          {{ HTML::image('assets/images/logo.png','A Dark Journey',array('id' => 'logo')); }}
        </div>
      </header>
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
        <div class="span1 visible-desktop"></div>
        <div class="span10" id="main">
          @yield('content')
          
          <div id="disqus_thread"></div>
          <script type="text/javascript">
              /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
              var disqus_shortname = 'adarkjourney'; // required: replace example with your forum shortname
              var disqus_developer = 1; // developer mode on
              var disqus_identifier = '{{ URI::current() }}'; // unique identifier
              var disqus_url = '{{ URL::full() }}'; // current url
  
              /* * * DON'T EDIT BELOW THIS LINE * * */
              (function() {
                  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                  dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
              })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
          
        </div>
        <div class="span1 visible-desktop"></div>
      </article>
      <footer class="row-fluid">
        <div class="span9 visible-desktop"></div>
        <div class="span3">
          <p>
            &copy; 1999 - {{ date('Y') }} <a href="http://journal.aliciawilkerson.com">Alicia Wilkerson</a>
          </p>
        </div>
      </footer>
    </div>
    {{ Asset::container('bootstrapper')->scripts() }}
    {{ HTML::script('assets/js/script.js') }}
  </body>
</html>




