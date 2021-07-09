<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="canonical" href="http://buixuanxep.laravel/">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="">
    <meta property="og:image" content=""/>
    <meta property="og:site_name" content="http://buixuanxep.laravel/"/>
    <meta property="og:description" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:type" content=""/>
    
    <title>@yield('title')</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href={{asset("/frontend/css/bootstrap.min.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/font-awesome.min.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/prettyPhoto.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/price-range.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/animate.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/main.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/responsive.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/lightslider.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/lightgallery.min.css")}} rel="stylesheet">
    <link href={{asset("/frontend/css/prettify.css")}} rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="public/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/frontend/images/ico/apple-touch-icon-57-precomposed.png">
   
   
    
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>  
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
    <script src="/frontend/js/lightgallery-all.min.js"></script>
    <script src="/frontend/js/lightslider.js"></script>
    <script src="/frontend/js/prettify.js"></script>
    <script src="/frontend/js/simple.money.format.js"></script>
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
    <script>
       $('#keywords').keyup(function(){
			var query = $(this).val();
      // alert(query);
			if( query != ''){
				var _token = $('input[name = "_token"]').val();
				$.ajax({
					url: "{{ url('/autocomplete-ajax') }}",
					method:"POST",
					data:{query:query,_token:_token},
					success:function(data){
						$('#searchajax').fadeIn();
						$('#searchajax').html(data);
					}
				});
			}else{
				$('#searchajax').fadeOut();
			}
		});
		$(document).on('click','.lisearch',function(){
			$('#keywords').val($(this).text());
			$('#searchajax').fadeOut();
		});

    
    </script>
</body>
</html>
<script>
   $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
   


  });
  
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script> 
		$( function() {
    $( "#slider-range" ).slider({
      orientation: "horizontal",
      min:{{ $min_price }},
      max:{{ $max_price }},
      range: true,
      values: [ {{$min_price}}, {{$max_price}} ],
      slide: function( event, ui ) {
        $( "#amount_one" ).val(  ui.values[ 0 ]).simpleMoneyFormat();
        $( "#amount_two" ).val(  ui.values[ 1 ]).simpleMoneyFormat();
        $( "#minprice" ).val(ui.values[ 0 ]);
		    $( "#maxprice" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount_one" ).val($( "#slider-range" ).slider( "values", 0 )).simpleMoneyFormat();
    $( "#amount_two" ).val($( "#slider-range" ).slider( "values", 1 )).simpleMoneyFormat();
  } );
 
	</script> 