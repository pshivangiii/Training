<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <title>USER DETAILS</title>
</head>
<body>
{{-- <body background=
"data:image/jpeg;base64,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"> --}}
    <form class ="row g-3" action="{{url('/')}}/show" method="POST">
        {{ csrf_field() }}
        <div class="container">
            <h2 style="background-color:#b6d39b;">Your Team Details are here:</h2>
            {{-- <p>Type something to search the table for team, designation or emails:</p>   --}}
            <input style="background-color:#ddd8c2;" class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
    
        <table class="table table-bordered table-striped">
            <thead>
        <tr style="background-color:#aa9cdf;">
            <th></th>
            <th>ID</th>
            <th>EMAIL</th>
            <th>TEAM</th>
            <th>DESIGNATION</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody id="myTable">
          @foreach($data as $key => $data)
          <tr>
              <td></td>
            <td>{{ $data->id}}</td>
          <td>{{ $data->email}}</td>
          <td>{{ $data->team }}</td>
          <td>{{ $data->designation }}</td>
         
          <td style="background-color:#e9b0b3;"><a href = '/show/{{ $data->id }}'>Delete</a></td>
          </tr>
        
          @endforeach
        
        </tbody>
      
      </table>
  
    </div>
    
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
    
    </body>
    </html>