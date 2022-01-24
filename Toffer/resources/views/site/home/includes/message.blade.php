

@if(session('errors'))
    <div class="alert alert-warning">
        @foreach (session('errors')->messages() as $error )
            @foreach ($error as $message)
                {{$message}}<br>
            @endforeach
        @endforeach
    </div>
    @php session()->forget('errors'); @endphp
@endif


@if(session('credentials'))
    <div class="alert alert-warning">
        {{session('credentials')}}<br>
    </div>
    @php session()->forget('credentials'); @endphp
@endif

@if(session('message'))
    <div style="width:100%;margin-top:20px;" class="alert alert-success">
        {{session('message')}}
        @php session()->forget('message'); @endphp
    </div>
@endif


@push('scripts')
    <script>
        function messageTimeOut(){
            if(document.querySelector(".alert")){
                let divClassMessageAlert = document.querySelector(".alert");
                setTimeout(function() { 
                    divClassMessageAlert.style.display = "none"
                }, 5000);
            }
        }
        messageTimeOut();
    </script>
@endpush