<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" href="http://127.0.0.1:8000/">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="">
    <meta property="og:image" content=""/>
    <meta property="og:site_name" content="http://127.0.0.1:8000/"/>
    <meta property="og:description" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:type" content=""/>
    
    <title>@yield('title')</title>
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="/frontend/css/price-range.css" rel="stylesheet">
    <link href="/frontend/css/animate.css" rel="stylesheet">
	<link href="/frontend/css/main.css" rel="stylesheet">
	<link href="/frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="public/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/frontend/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "110697024583751");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    @include('frontend.includes.header')
	<!--/header-->

	@yield('content')
	
    @include('frontend.includes.footer')
	<!--/Footer-->
	

    
    <script src="/frontend/js/jquery.js"></script>
    
	<script src="/frontend/js/bootstrap.min.js"></script>
	<script src="/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="/frontend/js/price-range.js"></script>
    <script src="/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="/frontend/js/main.js"></script>
</body>
</html>