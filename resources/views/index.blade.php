<link rel="stylesheet" href="css/app.css" type="text/css" />
<script type="text/javascript" src="js/app.js"></script>

@if(session('status') !== null)
<div class="alert alert-danger">
{{ session('status') }}
</div>
@endif

<h1>TOPページです。あなたのマイナンバーは{{ session("mynumber") }}</h1>
<div class="container row mx-auto">
@foreach($profiles as $profile)
<div class="col-md-3 mb-3">
    <div class="card">
        <img class="card-img-top" src="{{ $profile->image_path }}" alt="イメージ">
        <div class="card-body">
        <p class="name">{{ $profile->name }}</p><br>
        {{ $profile->message }}<br>
        現在の得票数{{ $vote->where('profile_id', $profile->id)->count() }}票
        
        <form action="/" method="POST" name="form{{ $profile->id }}">
            @csrf    
            <input type="hidden" name="profile_id" value="{{ $profile->id }}"/>
        </form>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $profile->id }}">
        投票する
        </button>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ご確認</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            あなたがクリックしたのは、{{ $profile->name }}です。<br>
            本当に投票しますか？
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">やっぱりやめる</button>
            <button type="button" class="btn btn-primary" data-val="{{$profile->id }}">投票する</button>
          </div>
        </div>
      </div>
    </div>
@endforeach
</div>

<script type="text/javascript">
    [...document.querySelectorAll('.modal-footer button:nth-child(2)')].forEach((element, index) => {
     element.addEventListener("click", function(e){
        const id= element.dataset.val;
         document.forms["form" + id].submit();
    });
    });
</script>
