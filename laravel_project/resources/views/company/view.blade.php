<!DOCTYPE html>
<html lang="jp">
<head>
    @extends('layout')

  @section('content')
  <div class="panel-body">
    <a href="{{ route('companies.create') }}" class="btn btn-default btn-block">
      会社を追加する
    </a>
  </div>
    <table class="table">
     <thead>
        <tr>
            <th>名前</th>
              <th>年数</th>
             <th>時間</th>
            <th></th>
          </tr>
        </thead>
      <tbody>
        @foreach($companies as $company)

     <tr>
        <td>{{ $company->name }}</td>
        <td>{{ $company->open_years }}</td>
        <td>{{ $company->created_at }}</td>
        <td><a href="{{ route('companies.edit', ['id' => $company->id,]) }}">編集</a></td>
        <td><a href="{{ route('companies.dalete', ['id' => $company->id,]) }}">削除</a></td>
      </tr>
     </tr>
    @endforeach
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
