

<html>
   <head>
   {{--   <script src="{{asset('resources/js/app.js')}}"></script> --}}
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   </head>
   <body>
    <form  action="{{url('admin/sender')}}" method="POST">
        @csrf          
      <label for="projectinput1"> العنوان  </label>
      <input type="text" name="message">


      <button type="submit" class="btn btn-primary">
          <i class="la la-check-square-o"></i> حفظ
      </button>

       
    </form>
   
   
   </body>
 </html>