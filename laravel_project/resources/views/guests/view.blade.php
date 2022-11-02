    @extends('layout')

  @section('content')
  <style>
     tr, a, th{
     font-family: 'Amatic SC', cursive;
        }

        td{
        font-family: 'Amatic SC', cursive;
           }

    body {
      background-color: #CCFFFF;
    }
    table{
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
}

table tr{
  border-bottom: solid 1px #eee;
  cursor: pointer;
}

table tr:hover{
  background-color: #d4f0fd;
}

table th,table td{
  text-align: center;
  width: 25%;
  padding: 15px 0;
}

table td.icon{
  background-size: 35px;
  background-position: left 5px center;
  background-repeat: no-repeat;
  padding-left: 30px;
}

table td.icon.bird{
  background-image: url(icon-bird.png)
}

table td.icon.whale{
  background-image: url(icon-whale.png)
}

table td.icon.crab{
  background-image: url(icon-crab.png)
}


    </style>
    <h1><center>LIN〇(掲示板寄り...)</center></h1>
    </head>
    <body>
    <table class="table">
     <thead>
        <tr>
            <th>画像</th>
              <th>名前</th>
              <th>性別</th>
             <th>時間</th>
            <th></th>
          </tr>
        </thead>
      <tbody>
        @foreach($guests as $guest)
     <tr>
         <td>
             <img src="{{ asset($guest->image) }}"width="150" height="150">
         </td>
        <td><h4>{{ $guest->name }}</h4></td>
        <td>
        <!-- @if($guest->sex == 1)
        <h4><p style='color:blue;'>男性</h4>
        @else($guest->sex == 2)
        <h4><p style='color:red;'>女性</h4>
        @endif -->
        <h4><span class="sex">{{ $guest->sex_text }}</span></h4>
        </td>
        <td><h4>{{ $guest->created_at }}</td></h4>
        <td><a href="{{ route('guests.edit', ['id' => $guest->id,]) }}">編集</a></td>
        <td><a href="{{ route('guests.dalete', ['id' => $guest->id,]) }}"onclick="return confirm('削除しますか？')">削除</a></td>
        <td><a href="{{ route('chats.index', ['guest_id' => $guest->id,]) }}">チャット</a></td>
      </tr>
     </tr>
    @endforeach
    <a href="{{ route('guests.create', ['id' => $guest->id,]) }}">ユーザー登録</a>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </table>
 @endsection
