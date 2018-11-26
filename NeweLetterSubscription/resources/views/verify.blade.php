<!DOCTYPE html>
<html>

<body>


<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@else
    <div class="row justify-content-center">

          <center style="text-align: center;">
            @if(Session::has('success')) 
          <font style="color:red;">{!!session('success')!!}</font>

          @endif
      </center>

          
        <div class="col-md-8">
            <div class="card">
               <h2>Welcome to the site {{$verifyUser->name,""}}</h2>
            <br/>
            Your registered email-id is {{$verifyUser->email}} , Please click on the bellow button to verify your email.
            <br/>
            <form method="GET" action="{{route('verifytocken',$token)}}">

             
                <button type="submit">Verify</button>

            </form>
           
            </div>
        </div>
    </div>

    @endif
</div>

</body>
</html>