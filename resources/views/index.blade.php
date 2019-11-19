<link rel="stylesheet" href="css/app.css" type="text/css" />
<style type="text/css">
    body{
        position: relative;
    }
    #dialog{
        width: 500px;
        height: 300px;
        position: absolute;
        margin:auto;
        top:0;
        left: 0;
        right: 0;
        text-align: center;
        display: table;
        border:1px solid black;
    }
    #dialog p{
        display: table-cell;
        vertical-align: middle;
    }
</style>


<div class="alert alert-danger">
{{ session('status') }}
</div>
<h1>TOPページです</h1>

@foreach($profiles as $profile)
<div>
    <p class="name">{{ $profile->name }}</p><br>
    <img src="{{ $profile->image_path }}"><br>
    {{ $profile->message }}<br>
    現在の得票数{{ $vote->where('profile_id', $profile->id)->count() }}票
<form action="/" method="POST">
    @csrf    
    <input type="hidden" name="profile_id" value="{{ $profile->id }}"/>
    <input type="submit" value="投票する" id="submit" />
</form>
</div>
@endforeach


<div id="dialog" class="card">
    <p>あなたが投票するのは、○○です。<br>本当によろしいですか？</p>
</div>
<script type="text/javascript">
    [...document.querySelectorAll("#submit")].forEach((element, index) => {
     element.addEventListener("click", function(e){
        e.preventDefault();
        const name = this.parentNode.parentNode.firstElementChild.textContent;
        document.getElementById("dialog").style.top = this.offsetTop - 300;
        // document.getElementById("dialog").textContent = "あなたが投票するのは"+ name + "\n本当によろしいですか？";
    });
    });
</script>
