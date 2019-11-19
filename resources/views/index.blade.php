<div class="alert alert-danger">
{{ session('status') }}
</div>
<h1>TOPページです</h1>

@foreach($profiles as $profile)
    {{ $profile->name }}<br>
    <img src="{{ $profile->image_path }}"><br>
    {{ $profile->message }}<br>
    現在の得票数{{ $vote->where('profile_id', $profile->id)->count() }}票
<form action="/" method="POST">
    @csrf    
    <input type="hidden" name="profile_id" value="{{ $profile->id }}"/>
    <input type="submit" value="投票する" id="submit" />
</form>
@endforeach

<script type="text/javascript">
    var submit = document.getElementById("submit");
    [...document.querySelectorAll("#submit")].forEach((element, index) => {
     element.addEventListener("click", function(e){
        e.preventDefault();
        alert("本当によろしいですか？");
    });
    });
</script>
