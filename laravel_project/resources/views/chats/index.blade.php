
@extends('layout')


@section('content')
   <div class="container">
     <div class="row">
       <div class="col col-md-offset-3 col-md-6">
         <nav class="panel panel-default">
           <div class="panel-body">
             @if($errors->any())
               <div class="alert alert-danger">
                 @foreach($errors->all() as $message)
                   <p>{{ $message }}</p>
                 @endforeach
               </div>
             @endif
             <style>
             table{
               width: 100%;
               border-collapse:separate;
               border-spacing: 0;
             }
             body {
               background-color: #CCFFCC;
             }
             table th:first-child{
               border-radius: 5px 0 0 0;
             }

             table th:last-child{
               border-radius: 0 5px 0 0;
               border-right: 1px solid #3c6690;
             }

             table th{
               text-align: center;
               color:white;
               background: linear-gradient(#829ebc,#225588);
               border-left: 1px solid #3c6690;
               border-top: 1px solid #3c6690;
               border-bottom: 1px solid #3c6690;
               box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
               width: 25%;
               padding: 10px 0;
             }

             table td{
               text-align: center;
               border-left: 1px solid #a8b7c5;
               border-bottom: 1px solid #a8b7c5;
               border-top:none;
               box-shadow: 0px -3px 5px 1px #eee inset;
               width: 25%;
               padding: 10px 0;
             }

             table td:last-child{
               border-right: 1px solid #a8b7c5;
             }

             table tr:last-child td:first-child {
               border-radius: 0 0 0 5px;
             }

             table tr:last-child td:last-child {
               border-radius: 0 0 5px 0;
             }
             </style>
             <thead>
             <form  action="{{ route('chats.create') }}"  method="POST">
                 @csrf
                 <input type="hidden" name="id" value="{{$guest_id}}">
                 <h4><a href="/guests">TOP</a></h4>
               <div class="form-group">
                 <label for="title">メッセージ</label>
                 <input type="text" class="form-control" name="message"/>
               </div>
                 <button type="submit" class="btn btn-primary">送信</button>
               </div>
               <table class="table">
                 <thead>
                 <tr>
                   <th>名前</th>
                   <th>メッセージ</th>
                   <th>時間</th>
                 </tr>
                 </thead>
                 <tbody>

                   @if(!empty($chats))
                      @foreach($chats as $chat)
                            @if($guest_id == $chat->guest_id )
                                <tr>
                                 <td><p style='color:red;'>{{ $chat->name }}</p></td>
                                 <td>
                                    <p style='color:red;'>{{ $chat->message }}</p>
                                 </td>
                                 <td><p style='color:red;'>{{ $chat->created_at }}</p></td>
                               </tr>
                           @else
                               <tr>
                                <td>{{ $chat->name }} </td>
                                <td>
                                   <?php if($guest_id == $chat->guest_id) {  ?>
                                   <p style='color:red;'>{{ $chat->message }}</p>
                               <?php } else { ?>
                                   <p>{{ $chat->message }}</p>
                               <?php } ?>
                                </td>
                                <td>{{ $chat->created_at }}</td>
                              </tr>
                           @endif
                      @endforeach
                   @endif
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     @endsection
   </table>
   </main>
   </body>
   </html>
   <!-- Log::debug($chat); -->
