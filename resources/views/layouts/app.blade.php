<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <nav class="container navbar navbar-expand-lg navbar-dark bg-dark mt-5 pl-5 pr-5">
    <img class="logo mr-5" src="{{ asset('img/iti-logo.png') }}" />
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">


        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('feedback') }}">Send</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile') }}">Profile</a>
        </li>
      </ul>

      <label class="name-label mr-2">{{auth()->user()->name}}</label>
      <a class="nav-link links" href="{{ route('logout') }}">Logout</a>
      @endauth

      @guest
      </ul>
      <a class="nav-link links" href="{{ route('login') }}">Login</a>
      |
      <a class="nav-link links" href="{{ route('register') }}">Register</a>
      @endguest
    </div>
  </nav>

  <div class="container bg-light text-center my-5 col-4">
    <p class='typewriter'><span class="beautiful-dot">.</span>
      <span class='typewriter-text' data-text='[ 
                "Gehad Kassap",
                "Ahmed Maher",
                "Amira Reda",
                "Ahmed Shuaib",
                "Merna Hammam",
                "Kholud Shokry",
                "Esraa Ahmed",
                "Mohamed Hassan",
                "Esraa Abo Elyazed",
                "Abeer Omar",
                "Ahmed Shebl",
                "Toka Yasser",
                "Omaima Mohsen",
                "Bassant Sayed",
                "Alaa Ali",
                "Mostafa Mahmoud",
                "Elsayed Abdallah",
                "Eman Mamdouh",
                "Nirdeen Naeem",
                "Alaa Ahmed",
                "Ahmed Tarek",
                "Sayed Safwet"
                
                ]'></span>
    </p>
  </div>



  @yield("firstContainer")

  <div class="container">
    @yield("secondContainer")
  </div>

  <div class="container">
    @yield("thirdContainer")
  </div>

</body>




<script>
  $(document).ready(function(e) {


typing( 0, $('.typewriter-text').data('text') );

function typing( index, text ) {
  
  var textIndex = 1;

  var tmp = setInterval(function() {
    if ( textIndex < text[ index ].length + 1 ) {
              $('.typewriter-text').text( text[ index ].substr( 0, textIndex ) );
              textIndex++;
          } else {
      setTimeout(function() { deleting( index, text ) }, 2000);
      clearInterval(tmp);
    }

      }, 150);

  }

  function deleting( index, text ) {

  var textIndex = text[ index ].length;

  var tmp = setInterval(function() {

    if ( textIndex + 1 > 0 ) {
      $('.typewriter-text').text( text[ index ].substr( 0, textIndex ) );
      textIndex--;
    } else {
      index++;
      if ( index == text.length ) { index = 0; }
      typing( index, text );
      clearInterval(tmp);
    }

      }, 150)

}

});

</script>

</html>