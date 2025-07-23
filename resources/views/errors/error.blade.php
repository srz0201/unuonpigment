
    @if(Session::has('alert-success'))
        <script>
            $(document).ready(function () {
                toastr.options.timeOut = 3000;
                @foreach (session('alert-success') as $alert)
                toastr.success('{{$alert}}');
                @endforeach
            });
        </script>
    @endif

    @if(Session::has('alert-info'))
        <script>
            $(document).ready(function () {
                toastr.options.timeOut = 3000;
                @foreach (session('alert-info') as $alert)
                toastr.info('{{$alert}}');
                @endforeach
            });
        </script>
    @endif

    @if(Session::has('alert-error'))
        <script>
            $(document).ready(function () {
                toastr.options.closeButton = true;
                toastr.options.timeOut = 20000;
                @foreach (session('alert-error') as $alert)
                toastr.info('{{$alert}}');
                @endforeach
            });
        </script>
    @endif

    @if(isset($errors))
        @if (count($errors) > 0)
            <script>
                $(document).ready(function () {
                    toastr.options.closeButton = true;
                    toastr.options.timeOut = 20000;
                    @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}')
                    @endforeach
                });
            </script>
        @endif
    @endif
    }





