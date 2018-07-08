<form action="/">
    <div class="form-row">
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="search" name="search" placeholder="Type to search..." value="{{$search}}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-dark" ><i class="fa fa-search"></i></button>
                <a href="{{url('/')}}" class="btn btn-outline-dark"><i class="fa fa-times"></i></a>
            </div>
        </div>
</div>
</form>


