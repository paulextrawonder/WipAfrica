@if(isset($errors) && $errors->any())              
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
            title: 'Error',
            message: "{{$error}}",
            position: "topRight",
            });
        </script>
    @endforeach
    @endif

    @if(session()->has('success'))
    <script>
        iziToast.success({
        title: 'Success',
        message: "{{session()->get('success')}}",
        position: "topRight",
        });
    </script>
     @endif

     @if(session()->has('error'))
    <script>
        iziToast.error({
        title: 'Error',
        message: "{{session()->get('error')}}",
        position: "topRight",
        });
    </script>
     @endif

     @if(session()->has('warning'))
    <script>
        iziToast.warning({
        title: 'Warning',
        message: "{{session()->get('warning')}}",
        position: "topRight",
        });
    </script>
     @endif