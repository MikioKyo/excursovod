<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
	<script src="{{ asset('js/fullpage.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('css/fullpage.css') }}">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<script
		src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>

<body>
	<style>
		.jumbotron_content {
			opacity: 1; 
			font-family: "Oswald", sans-serif;
		}
		.jumbotron_content h1 {
			opacity: 1; 
			font-family: "Oswald", sans-serif;
		}
		
		.jumbotron_content p {
			opacity: 1; 
			font-family: "Oswald", sans-serif;
		}
		
@import url(https://fonts.googleapis.com/css?family=Montserrat);
html, body {
  overflow: hidden;
}

.background {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  overflow: hidden;
  will-change: transform;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  height: 130vh;
  position: fixed;
  width: 100%;
  -webkit-transform: translateY(30vh);
          transform: translateY(30vh);
  transition: all 1.2s cubic-bezier(0.22, 0.44, 0, 1);
}
.background:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.4);
}
.background:first-child {
  background-image: url(http://emilyhayman.com/codepens/bgd1.jpg);
  -webkit-transform: translateY(-15vh);
          transform: translateY(-15vh);
}
.background:first-child .content-wrapper {
  -webkit-transform: translateY(15vh);
          transform: translateY(15vh);
}
.background:nth-child(2) {
  background-image: url( {{ asset('css/images/landing/slide1.jpg') }} );
}
.background:nth-child(3) {
  background-image: url( {{ asset('css/images/landing/slide2.jpg') }} );
}

.background:nth-child(4) {
  background-image: url( {{ asset('css/images/landing/slide3.jpg') }} );
}

/* Set stacking context of slides */
.background:nth-child(1) {
  z-index: 3;
}

.background:nth-child(2) {
  z-index: 2;
}

.background:nth-child(3) {
  z-index: 1;
}

.content-wrapper {
  height: 100vh;
  display: flex;
  justify-content: center;
  text-align: center;
  flex-flow: column nowrap;
  color: #fff;
  font-family: Oswald;
  text-transform: uppercase;
  -webkit-transform: translateY(40vh);
          transform: translateY(40vh);
  will-change: transform;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transition: all 1.7s cubic-bezier(0.22, 0.44, 0, 1);
}
.content-title {
  font-size: 8vh;
  line-height: 1.4;
}

.content-subtitle {
  font-size: 2vh;
  line-height: 1.4;
}

.content-subtitle button a:hover {
 text-decoration: none;
 color: #26445f;
}

.content-subtitle button a {
 text-decoration: none;
 color: #0e5d84;
}
.background.up-scroll {
  -webkit-transform: translate3d(0, -15vh, 0);
          transform: translate3d(0, -15vh, 0);
}
.background.up-scroll .content-wrapper {
  -webkit-transform: translateY(15vh);
          transform: translateY(15vh);
}
.background.up-scroll + .background {
  -webkit-transform: translate3d(0, 30vh, 0);
          transform: translate3d(0, 30vh, 0);
}
.background.up-scroll + .background .content-wrapper {
  -webkit-transform: translateY(30vh);
          transform: translateY(30vh);
}

.background.down-scroll {
  -webkit-transform: translate3d(0, -130vh, 0);
          transform: translate3d(0, -130vh, 0);
}
.background.down-scroll .content-wrapper {
  -webkit-transform: translateY(40vh);
          transform: translateY(40vh);
}
.background.down-scroll + .background:not(.down-scroll) {
  -webkit-transform: translate3d(0, -15vh, 0);
          transform: translate3d(0, -15vh, 0);
}
.background.down-scroll + .background:not(.down-scroll) .content-wrapper {
  -webkit-transform: translateY(15vh);
          transform: translateY(15vh);
}

		
		
	</style>
<!--
	<div id="fullpage">
		<div class="section" style='background-image: url({{ asset('css/images/landing/slide1.jpg') }})'>
			<div style='width: 50%;margin: 0 auto;'>
				<div class="jumbotron" style='border-radius: 12px; background-color:rgba(255, 255, 255, 0.85);'>
					<div class="jumbotron_content">
						<h1>Привет, мир!</h1>
						<p>Уот так уот</p>
						<p><a class="btn btn-primary btn-lg" role="button">Узнать больше</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="section">
			<div class="slide" data-anchor="slide1">Slide 2.1</div>
			<div class="slide" data-anchor="slide2">Slide 2.2</div>
		</div>
		<div class="section">Section 3</div>
		<div class="section">Section 4</div>
	</div>
	-->
    <section class="background up-scroll">
		<div class="content-wrapper">
		  <p class="content-title">Экскурсовод</p>
		  <p class="content-subtitle">Сервис для проведения виртуальных экскурсий</p>
		</div>
	</section>
	
	<section class="background">
		<div class="content-wrapper">
		  <p class="content-title">Создавай или открывай новые для себя пути</p>
		  <p class="content-subtitle">Прими на себя роль экскурсовода или туриста. Или обе сразу!</p>
		</div>
	</section>
	
	<section class="background">
		<div class="content-wrapper">
		  <p class="content-title">Etiam consequat lectus.</p>
		  
		  <p class="content-subtitle">Присоединяйтесь!</p>
		  <p class="content-subtitle">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".register">
			  Зарегистрироваться
			</button>
		  </p>
		  
		  <p class="content-subtitle">Уже с нами?</p>
		  <p class="content-subtitle">
		  	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".login">
			  Войти
			</button>
		  </p>
		  
		</div>
    </section>

	
	<div class="modal fade register" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" style='width: 45%;'>
			<div class="modal-content">
				<div class="modal-header">
					Регистрация
				</div>
				<div class="modal-body">
					@yield('registersection')
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" style='width: 45%;'>
			<div class="modal-content">
				<div class="modal-header">
					Вход
				</div>
				<div class="modal-body">
					@yield('loginsection')
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<script> 
// ------------- VARIABLES ------------- //
var ticking = false;
var isFirefox = (/Firefox/i.test(navigator.userAgent));
var isIe = (/MSIE/i.test(navigator.userAgent)) || (/Trident.*rv\:11\./i.test(navigator.userAgent));
var scrollSensitivitySetting = 30; //Increase/decrease this number to change sensitivity to trackpad gestures (up = less sensitive; down = more sensitive) 
var slideDurationSetting = 600; //Amount of time for which slide is "locked"
var currentSlideNumber = 0;
var totalSlideNumber = $(".background").length;

// ------------- DETERMINE DELTA/SCROLL DIRECTION ------------- //
function parallaxScroll(evt) {
  if (isFirefox) {
    //Set delta for Firefox
    delta = evt.detail * (-120);
  } else if (isIe) {
    //Set delta for IE
    delta = -evt.deltaY;
  } else {
    //Set delta for all other browsers
    delta = evt.wheelDelta;
  }

  if (ticking != true) {
    if (delta <= -scrollSensitivitySetting) {
      //Down scroll
      ticking = true;
      if (currentSlideNumber !== totalSlideNumber - 1) {
        currentSlideNumber++;
        nextItem();
      }
      slideDurationTimeout(slideDurationSetting);
    }
    if (delta >= scrollSensitivitySetting) {
      //Up scroll
      ticking = true;
      if (currentSlideNumber !== 0) {
        currentSlideNumber--;
      }
      previousItem();
      slideDurationTimeout(slideDurationSetting);
    }
  }
}

// ------------- SET TIMEOUT TO TEMPORARILY "LOCK" SLIDES ------------- //
function slideDurationTimeout(slideDuration) {
  setTimeout(function() {
    ticking = false;
  }, slideDuration);
}

// ------------- ADD EVENT LISTENER ------------- //
var mousewheelEvent = isFirefox ? "DOMMouseScroll" : "wheel";
window.addEventListener(mousewheelEvent, _.throttle(parallaxScroll, 60), false);

// ------------- SLIDE MOTION ------------- //
function nextItem() {
  var $previousSlide = $(".background").eq(currentSlideNumber - 1);
  $previousSlide.removeClass("up-scroll").addClass("down-scroll");
}

function previousItem() {
  var $currentSlide = $(".background").eq(currentSlideNumber);
  $currentSlide.removeClass("down-scroll").addClass("up-scroll");
}
	</script>
</body>
</html>