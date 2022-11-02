@extends('layout')
@section('content')
   <div class="container">
     <div class="row">
       <div class="col col-md-offset-3 col-md-6">
         <nav class="panel panel-default">
           <div class="panel-heading">ユーザーを追加する</div>
           <div class="panel-body">
             @if($errors->any())
               <div class="alert alert-danger">
                 @foreach($errors->all() as $message)
                   <p>{{ $message }}</p>
                 @endforeach
               </div>
             @endif
         <tbody>
             <form action="{{ route('chats.save')}}" method="POST">

               @csrf
               <div class="form-group">
                 <label for="title">メッセージ</label>
                 <input type="text" class="form-control" name="message"  />
               </div>
                 <button type="submit" class="btn btn-primary">送信</button>
               </div>
             </form>
            </thead>
           </div>
         </nav>
       </div>
     </div>
   </div>
 @endsection
</body>
</html>
