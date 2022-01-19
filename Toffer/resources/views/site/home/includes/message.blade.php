@if($errors->any())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif


@if(session('message'))
    <div style="width:100%;margin-top:20px;" class="alert alert-success">
        {{session('message')}}
        @php session()->forget('message');; @endphp
    </div>
@endif

@push('scripts')
    <script>
        function messageTimeOut(){
            if(document.querySelector(".alert")){
                let divClassMessageAlert = document.querySelector(".alert");
                setTimeout(function() { 
                    divClassMessageAlert.style.display = "none"
                }, 3000);
            }
        }
        messageTimeOut();
    </script>
@endpush