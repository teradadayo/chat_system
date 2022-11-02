@extends('layout')
@section('content')
   <div class="container">
     <div class="row">
       <div class="col col-md-offset-3 col-md-6">
         <nav class="panel panel-default">
           <div class="panel-heading">会社を追加する</div>
           <div class="panel-body">
             @if($errors->any())
               <div class="alert alert-danger">
                 @foreach($errors->all() as $message)
                   <p>{{ $message }}</p>
                 @endforeach
               </div>
             @endif
         <tbody>
             <form action="{{ route('companies.save')}}" method="POST">

               @csrf
               <div class="form-group">
                 <label for="title">名前</label>
                 <input type="text" class="form-control" name="name"  />
               </div>
               <div class="form-group">
                 <label for="due_date">年</label>
                 <input type="text" class="form-control" name="open_years"/>
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
