url generated before job : <b>{{$url_before}}</b> <br>
<br>
<span style="color: red">The following two urls should be the same, this is where things fails, when the mail is send through a worker:</span><br>
<br>
Url generated inside of mail blade file : <b>{{route('world')}}</b>  <br>
<br>
Url in the 'build' function (which is ran by the worker/queue/job): <b>{{$url_on_build}}</b> <br>
