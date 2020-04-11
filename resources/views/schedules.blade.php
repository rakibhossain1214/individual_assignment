<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <meta name="_token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <title>Bus Ticket Reservation System</title>
  </head>
  <body>
    @include('navbar')

  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

  @if($layout == 'index')
  
  <div class="form-group">
    <label for="search">Ajax Search location</label>
    <input type="search" id="search" class="form-control" >
    <button onClick="search()" class="btn btn-primary">Search</button>
  </div>
    
   
        <div class="container-fluid">
            <div class="row">
                <section class="col">
                    @include("scheduleslist")
                </section>
            </div>
        </div>

        @elseif($layout == 'create')
        <div class="container-fluid">
            <div class="row">
                <section class="col">
                    @include("scheduleslist")
                </section>
                <section class="col">
                    @include("schedulesadd")
                </section>
            </div>
        </div>

        @elseif($layout == 'edit')
        <div class="container-fluid">
            <div class="row">
                <section class="col">
                 
                </section>
                <section class="col">
                    @include("schedulesedit")
                </section>
            </div>
        </div>

    @endif


    <script>
        function search(){
            var search = $('#search').val();
            console.log(search);
           
            $.ajax({
                type: "POST",
                url:'{{ url("buses") }}',
                data:{
                    search: search,
                    "_token": $('#token').val()
                },
                datatype: 'html',
                success: function(response){
                    console.log(response);
                    $("#success").html(response);
                }

            });
        }
</script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>