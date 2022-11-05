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
  <h1 class="title">お問い合わせ</h1>

<!-----------名前------------->
  <form class="form" action="/confirm" method="POST">
    @csrf
  <div class="form-item">
    <p class="form-item-label">
      お名前<span class="necesssary">※</span>
    </p>
    <input type="text" name="firstname" value="{{$form['firstname']}}" class="form-item-input_namae">
    <input type="text" name="name"  value="{{$form['name']}}" class="form-item-input_myouji">
  </div>

  <div class="ex_kata">
  <p class="form-item-ex_namae">
      例)山田</p>
      <p class="form-item-ex_myouji">
      例)太郎</p>
</div>
@if ($errors->has('name'))
  <div class="ex_kata">
  <p class="form-item-ex_namae">
      {{$errors->first('firstname')}}</p>
      <p class="form-item-ex_myouji">
      {{$errors->first('name')}}</p>
</div>
@endif



<!-----------性別------------->
  <div class="form-item">
    <p class="form-item-label">
      性別<span class="necesssary">※</span>
      </p>
      @if ($form['gender']==1)
    <input type="radio" name="gender" value=1 class="form-item-input-radio" checked="checked">
    <p class="gender">
      男性
      </p>
    <input type="radio" name="gender" value=2 class="form-item-input-radio">
    <p class="gender">
      女性
      </p>
      @elseif ($form['gender']==2)
      <input type="radio" name="gender" value=1 class="form-item-input-radio">
    <p class="gender">
      男性
      </p>
    <input type="radio" name="gender" value=2 class="form-item-input-radio" checked="checked">
    <p class="gender">
      女性
      </p>
      @endif
  </div>
@if ($errors->has('gender'))
      <div class="ex_kata">
  <p class="form-item-ex_task">
      {{$errors->first('gender')}}</p>
</div>
@endif

<!-----------アドレス------------->
  <div class="form-item">
    <p class="form-item-label">メールアドレス<span class="necesssary">※</span>

    </p>
    <input type="email" name="email"  value="{{$form['email']}}" class="form-item-input" >
  </div>

    <div class="ex_kata">
  <p class="form-item-ex_task">
      例)test@example.com</p>
</div>

@if ($errors->has('email'))
      <div class="ex_kata">
  <p class="form-item-ex_task">
      {{$errors->first('email')}}</p>
</div>
@endif



<!-----------郵便番号------------->
  <div class="form-item">
    <p class="form-item-label">郵便番号<span class="necesssary">※</span>
    </p>
    <p class="adress_mark">〒
    </p>
    <input type="text" name="postcode" pattern="\d{3}-\d{4}" value="{{$form['postcode']}}" class="form-item-input_adress" onKeyUp="AjaxZip3.zip2addr(this,'','adress','adress');">
  </div>

      <div class="ex_kata">
  <p class="form-item-ex_yubin">
      例)123-4567</p>
</div>

@if ($errors->has('postcode'))
      <div class="ex_kata">
  <p class="form-item-ex_task">
      {{$errors->first('postcode')}}</p>
</div>
@endif



  <!-----------住所------------->
   <div class="form-item">
    <p class="form-item-label">住所<span class="necesssary">※</span>

    </p>
    <input type="text" name="address" value="{{$form['address']}}" class="form-item-input" >
  </div>

      <div class="ex_kata">
  <p class="form-item-ex_task">
      例）東京都渋谷区千駄ヶ谷1-2-3</p>
</div>

@if ($errors->has('address'))
      <div class="ex_kata">
  <p class="form-item-ex_task">
      {{$errors->first('address')}}</p>
</div>
@endif


  <!-----------建物------------->
   <div class="form-item">
    <p class="form-item-label">建物名
    </p>
    <input type="text" name="building_name" value="{{$form['building_name']}}"class="form-item-input">
  </div>

      <div class="ex_kata">
  <p class="form-item-ex_task">
      例)千駄ヶ谷マンション101</p>
</div>

@if ($errors->has('building_name'))
      <div class="ex_kata">
  <p class="form-item-ex_task">
      {{$errors->first('building_name')}}</p>
</div>
@endif


    <!-----------ご意見------------->
  <div class="form-item">
    <p class="form-item-label-iken">ご意見<span class="necesssary">※</span>
  </p>
    <textarea name="opnion" class="form-item-textarea" maxlength="120">{{$form['opnion']}}
    </textarea>
  </div>

  @if ($errors->has('opnion'))
      <div class="ex_kata">
  <p class="form-item-ex_task">
      {{$errors->first('opnion')}}</p>
</div>
@endif


  <!-----------ボタン------------->
  <input type="submit" class="form-btn" value="確認">
</form>
  
</body>
</html>