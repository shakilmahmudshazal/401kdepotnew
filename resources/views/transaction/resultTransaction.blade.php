@exteneds('layouts.master')
@section('content')
 
 <ul>
     <li> <h1>Transaction was </h1></li>
       <li> <h1>Transaction id: {{$transaction->tid}}</h1></li>
         <li> <h1>Transaction response code: {{$transaction->trcode}}</h1></li>
         <li> <h1>Transaction auth code: {{$transaction->tacode}}</h1></li>
     
     
     
 </ul>
 @endsection
  
  
   
   
   
    



