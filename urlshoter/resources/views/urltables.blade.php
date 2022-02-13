<x-app-layout>
    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
 
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Url Shoter') }}
         </h2>
     </x-slot>
     <style>
      #snackbar {
        visibility: hidden;
        min-width: 25px;
        margin-left: -125px;
        background-color: rgb(73, 73, 73);
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 12px;
      }
      
      #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
      }
      
      @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;} 
        to {bottom: 30px; opacity: 1;}
      }
      
      @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
      }
      
      @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;} 
        to {bottom: 0; opacity: 0;}
      }
      
      @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
      }
      </style>
     
       <div class="container-xm">         
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Url</th>
                        <th scope="col">Shot url Code</th>
                        <th scope="col">No.Clicks</th>
                        <th scope="col"> Created on</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allUrls as $urls)
                        <tr>
                            <th scope="row">{{++$id}}</th>
                            <td>{{$urls->Url}}<button onClick="SelfCopy(this.id)"  id="{{$urls->Url}}"><img src="https://img.icons8.com/material-sharp/15/000000/copy.png"/></td>
                            <td> localhost:8000/shot/{{$urls->Code}}<button onClick="SelfCopy(this.id)"  id="localhost:8000/shot/{{$urls->Code}}"><img src="https://img.icons8.com/material-sharp/15/000000/copy.png"/></button>
                              
                            </td>
                            <td>{{$urls->Clicks}}</td>
                            <td>{{$urls->created_at}} </td>
                            <td> <a href="{{route('delete',$urls->id)}}" class="btn btn-warning" >Delete</a> </td>
                          </tr>
                          <div id="snackbar">Url Copied</div>
                           
                        @endforeach
                    
                      
                    </tbody>
                  </table>
                            
                 </div>
 </x-app-layout>
 <script>
 function SelfCopy(copyText){   
   var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
    navigator.clipboard.writeText(copyText);
     
  }
  </script>