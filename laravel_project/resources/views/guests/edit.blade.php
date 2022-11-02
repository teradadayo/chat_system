
@extends('layout')
@section('content')

   <div class="container">
     <div class="row">
       <div class="col col-md-offset-3 col-md-6">
         <nav class="panel panel-default">

         <body>
           <div class="panel-heading">会社を追加する</div>
           <div class="panel-body">
             @if($errors->any())
               <div class="alert alert-danger">
                 @foreach($errors->all() as $message)
                   <p>{{ $message }}</p>
                 @endforeach
               </div>
             @endif
             <thead>
             <form  action="{{ route('guests.editsave', ['id' => $g_data->id] ) }}"  method="POST" enctype="multipart/form-data">
                 @csrf
                 <input type="hidden" name="id" value="{{$g_data->id}}">
               <div class="form-group">
                 <label for="title">名前</label>
                 <input type="text" class="form-control" name="name"  value="{{ $g_data->name }}"/>
               </div>
               <div class="form-group">
                  <?php
                  if ($g_data["sex"] == "1") {
                  ?>
                 <label for="due_date">性別a</label>
                 <input type="radio" name="sex" value="1"checked="checked">男
                  <input type="radio" name="sex" value="2">女
                  <class="form-control" name="sex"  value="{{ $g_data->sex }}"/>
                  <?php
                    }
                    elseif ($g_data["sex"] == "2") {
                    ?>
                   <label for="due_date">性別b</label>
                   <input type="radio" name="sex" value="1">男
                    <input type="radio" name="sex" value="2"checked="checked">女
                    <class="form-control" name="sex"  value="{{ $g_data->sex }}"/>
                    <?php
                }
                ?>
               </div>

               <div class="form-group">
                 <label for="due_date">画像</label>
                 <img src="{{ asset($g_data->image) }}" alt="image"width="150" height="150">
                  <input type="file" name="image">

               </div>

                 <button type="submit" class="btn btn-primary">送信</button>
               </div>
             </form>
            </thead>
           </div>
         </nav>
       </div>
     </div>
   @endsection
</body>
</html>
