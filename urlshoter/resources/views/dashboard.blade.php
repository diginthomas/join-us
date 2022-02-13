<x-app-layout>
   <!-- load jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   <!-- provide the csrf token -->
   <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Url Shoter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <div class="input-group mb-3">
                        <input type="hidden" id='id' value="{{Auth::user()->id}}" name='id'>
                        <input type="url" id="url" class="form-control" required name='url' placeholder=" eg: https://github.com/diginthomas" id="url">
                        <button class="btn btn-outline-danger" type="submit"  id="submit">Convert
                            </button> 
                            
                      </div><b><center>
                      <div  id="error" >
                      
                      </div></center></b>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <center> <b id='gen'> </b>
                      <div class="card text-white bg-success  mb-3" style="max-width: 18rem;">
                   
                      <div class="card-header" id='data'><i>localhost:8000</i></div>
                        
                        </div> <a href="{{route('urltable',Auth::user()->id)}}" class="btn btn-primary" >view all My Shot Urls</a></center>
                    <div class="writeinfo" ></div>   
                </div></div></div></div>
                
</x-app-layout>



    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#submit").click(function(){
               
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/api/urlshoter/add',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, url:$("#url").val(),id:$("#id").val()},
                    dataType: 'JSON',
                    statusCode:{
                      200:function(){
                        document.getElementById("error").innerHTML='Url sucessfully generated ';
                      },
                      422:  function() {
                        document.getElementById("error").innerHTML='Pleace enter a valid url';
                      },
                      500: function(){
                        document.getElementById("error").innerHTML='Service unavailable ';
                      }
                     
                    },
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        // console.log(data.status);
                       document.getElementById("gen").innerHTML=' Generated url';
                        document.getElementById("data").innerHTML = 'localhost:8000/shot/'+data.Code;
                        // $(".card-header").append('localhost:8000/shot/'+data.Code); 
                    }
                }); 
            });
       });   
       function SelfCopy(copyText){   
   var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2000);
    navigator.clipboard.writeText(copyText);
     
  } 
    </script>