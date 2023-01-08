<div class="row">  
    @if (session('error') == 'si')
        <div class="col-12 bg-red">
            <h6 class="text-white mt-2">
                {{Session::get('mensaje')}}
            </h6>
        </div> 
    @endif

    @if (session('error') == 'no' )
        <div class="col-12 bg-success">
            <h6 class="text-white mt-2">
                {{Session::get('mensaje')}}
            </h6>
        </div> 
    @endif

</div>