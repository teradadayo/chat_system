<!DOCTYPE html>
<html lang="jp" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <form class="" action="{{ route('tera.editSave') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="text" name="name" placeholder="会社名" value="{{ $c_data->name }}">

            <input type="submit" name="" value="Send">

        </form>


    </body>
</html>
