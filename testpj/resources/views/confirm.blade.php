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
  <h1 class="title">内容確認</h1>

<!-----------名前------------->
  <form class="form" action="/thanks" method="POST">
    @csrf
  <div class="form-item">
    <p class="form-item-label">
      お名前
    </p>
    <div class="confirm_name">
      
    <p class="confirm_myouji">{{$form['firstname']}}</p>
       <p class="confirm_namae">{{$form['name']}}</p>
  </div>
</div>
<input type="hidden" name="fullname" value="{{$form['firstname']}}{{$form['name']}}">


<!-----------性別------------->
  <div class="form-item">
   
    <p class="form-item-label">
      性別
      </p>
    @if($form['gender']==1)
    <p class="confirm_txt">男性</p>
    @elseif($form['gender']==2)
    <p class="confirm_txt">女性</p>
    @endif
  </div>
  <input type="hidden" name="gender" value="{{$form['gender']}}">

<!-----------アドレス------------->
  <div class="form-item">
 
    <p class="form-item-label">メールアドレス

    </p>
    <p class="confirm_txt">{{$form['email']}}</p>
</div>
<input type="hidden" name="email" value="{{$form['email']}}">


<!-----------郵便番号------------->
  <div class="form-item">
  
    <p class="form-item-label">郵便番号
    </p>
    <p class="confirm_txt">{{$form['postcode']}}</p>
</div>
<input type="hidden" name="postcode" value="{{$form['postcode']}}">



  <!-----------住所------------->
   <div class="form-item">
  
    <p class="form-item-label">住所

    </p>
    <p class="confirm_txt">{{$form['address']}}</p>
</div>
<input type="hidden" name="address" value="{{$form['address']}}">


  <!-----------建物------------->
   <div class="form-item">
   
    <p class="form-item-label">建物名
    </p>
    <p class="confirm_txt">{{$form['building_name']}}</p>
</div>
<input type="hidden" name="building_name" value="{{$form['building_name']}}">


    <!-----------ご意見------------->
  <div class="form-item">
    <p class="form-item-label">ご意見
  </p>
    <p class="confirm_opnion">{{$form['opnion']}}</p>
  </div>
  <input type="hidden" name="opnion" value="{{$form['opnion']}}">


  <!-----------ボタン------------->
  <input type="submit" class="form-btn" value="送信">
</form>
<a href="/" class="fix_btm">修正する</a>
  
    

</ul>
</body>
</html>