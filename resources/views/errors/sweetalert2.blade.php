<script>
    $( document ).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

            @if(Session::has('alert-error'))
                @foreach (session('alert-error') as $alert)
                Toast.fire({
                    icon: 'error',
                    title: '{{$alert}}'
                });
                @endforeach
            @endif

        @if(Session::has('alert-success'))

            @foreach (session('alert-success') as $alert)
            Toast.fire({
                icon: 'success',
                title: '{{$alert}}'
            });
            @endforeach
        @endif

        @if(Session::has('alert-info'))

            @foreach (session('alert-info') as $alert)
            Toast.fire({
                icon: 'info',
                title: '{{$alert}}'
            });
            @endforeach

        @endif

        @if(Session::has('alert-warning'))

            @foreach (session('alert-warning') as $alert)
            Toast.fire({
                icon: 'warning',
                title: '{{$alert}}'
            });
            @endforeach

        @endif


        @if(isset($errors))
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
            Toast.fire({
                icon: 'error',
                title: '{{$error}}'
            });
            @endforeach
        @endif
@endif





});


</script>











