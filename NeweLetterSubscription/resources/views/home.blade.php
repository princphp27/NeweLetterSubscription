@extends('layouts.app')

@section('content')




<div class="container">
   <div class="content-wrapper">
    <div class="page-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>&nbsp;Subscriber List
        </h1>
      </div>
     
    </div>
   
 

    <div class="row" >

  
    
      <div class="col-md-12">
        <div class="table-responsive" style="min-height: 400px;">
       
          <table class="table table-striped" id="table_id">
            <thead>
              
              <tr>
                <th>Host Name</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>State</th>
                <th>Status</th>

             

                
            </tr>          
            </thead>
            <tbody>
             


               @foreach($alluser as $user)
                 
           
             
                   <tr>
                    <td >{{$user->host_name,""}}</td>
                    <td>{{$user->name}} </td>
                    <td >{{$user->email,""}}</td>
                    <td>{{$user->address}} </td>
                    <td >{{$user->state,""}}</td>
                    <td>@if($user->verified==1)Verified @else Not Verified @endif</td>
                


                  </tr>
                

               
              @endforeach
  
            </tbody>
        
          </table>
         
        </div>
      </div>
       
  
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">
<script type="text/javascript">
    $(document).ready(function () {
        $('#table_id').dataTable();
    });
</script>
@endsection
