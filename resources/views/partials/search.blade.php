<form class="d-flex" action="{{route('concerts.search')}}">
    <div class="form-group">
        <!-- Affiche dans le champ d'input ce qui a été précédemment entré -->
        <input class="form-control" type="text" name="search" value="{{request()->search ?? ''}}">
    </div>
    <button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>