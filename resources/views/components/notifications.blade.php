<div id='notification-container'>
    <!-- Render errors if any -->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
        <div class="toast-header bg-danger text-white">
            <strong class="mr-auto">Error</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ $error }}
        </div>
    </div>
    @endforeach
    <script type="application/javascript">
        $(document).ready(function(){
            $(".toast").toast('show');
        });
    </script>
    @endif
    @if (\Session::has('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"  data-delay="2000">
        <div class="toast-header bg-success text-white">
            <strong class="mr-auto">Success</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ \Session::get('success') }}
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function(){
            $(".toast").toast('show');
        });
    </script>
    @endif
</div>