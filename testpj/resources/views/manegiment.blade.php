<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <title>Document</title>
</head>
<body>

  <h1 class="title">管理画面</h1>

<!-----------名前------------->
  <form class="search" action="/confirm" method="POST">
    @csrf
<div class="search-first">
  <div class="search-item">
    <p class="search-item-label">
      お名前
    </p><input type="text" name="fullname" value="{{$input['fullname']}}" class="search-item-input_namae">
</div>



    <!-----------性別------------->

 <div class="search-item">
    <p class="search-item-label-gender">
      性別
      </p>

     @if ($input['gender']==3)
    <input type="radio" name="gender" value=3 class="search-item-input-radio" checked="checked">
    <p class="search_gender">
      全選択
      </p>
    <input type="radio" name="gender" value=1 class="search-item-input-radio" >
    <p class="search_gender">
      男性
      </p>
    <input type="radio" name="gender" value=2 class="search-item-input-radio">
    <p class="search_gender">
      女性
      </p>
      @elseif ($form['gender']==1)
    <input type="radio" name="gender" value=3 class="search-item-input-radio">
    <p class="search_gender">
      全選択
      </p>
    <input type="radio" name="gender" value=1 class="search-item-input-radio" checked="checked">
    <p class="search_gender">
      男性
      </p>
    <input type="radio" name="gender" value=2 class="search-item-input-radio">
    <p class="search_gender">
      女性
      </p>
    @elseif ($form['gender']==2)
    <input type="radio" name="gender" value=3 class="search-item-input-radio">
    <p class="search_gender">
      全選択
      </p>
    <input type="radio" name="gender" value=1 class="search-item-input-radio">
    <p class="search_gender">
      男性
      </p>
    <input type="radio" name="gender" value=2 class="search-item-input-radio" checked="checked">
    <p class="search_gender">
      女性
      </p>
      @endif
</div>
</div>


<!-----------登録日------------->
  <div class="search-item">
    <p class="search-item-label">登録日
    </p>
    <input type="date" name="start_at"  value="{{$input['start_at']}}" class="search-item-input-start" >
    <p class="search-item-kara">〜
    </p>
    <input type="date" name="end_at"  value="{{$input['end_at']}}" class="search-item-input-end" >
  </div>

  <div class="search-item">
    <p class="search-item-label">
      メールアドレス
    </p><input type="text" name="fullname" value="{{$input['email']}}" class="search-item-input_namae">
</div>

  <!-----------ボタン------------->
  <input type="submit" class="form-btn" value="検索">
  <a href="/reset" class="fix_btm">リセット</a>
</form>
</div>



<div class="table_status">
    <table>
    @csrf
      <tr>
        <th  class="td_id">ID</th>
        <th  class="td_name">お名前</th>
        <th  class="td_gender">性別</th>
        <th  class="td_email">メールアドレス</th>
        <th  class="td_opnion">ご意見</th>
        <th  class="td_bottun"></th>
        </tr>
@if(@isset($results))
    @foreach ($results as $result)
    <form action="/edit" method="POST">
      <tr>
        <td class="td_id">
          {{$result->id}}
          <input type="hidden" name="id" value="{{$result->id}}">
        </td>
        <td class="td_name">
          {{$result->name}}
          <input type="hidden" name="id" value="{{$result->name}}">
        </td>
        <td class="td_gender">
            @if ($result['gender']==1)
            <p>男性</p>
            @elseif ($result['gender']==2)
            <p>女性</p>
            @endif
        </td>
        <td class="td_email">
          {{$result->email}}
          <input type="hidden" name="id" value="{{$result->email}}">
        </td>
        <td class="td_opnion">
          {{$result->opnion}}
          <input type="hidden" name="id" value="{{$result->opnion}}">
        </td>
        <td class="td_bottun">
          @csrf
          <button type="submit" formaction="/delete" class="delete_bottun">削除</button>
        </td>
        </tr>
      </form>
    @endforeach
             @endif

             </div>
             </div>

</body>
</html>