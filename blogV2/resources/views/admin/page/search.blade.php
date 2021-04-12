<div class="container mb-2 mt-2">
  <div class="row">
    <div class="col-md-6 m-auto">
      <form method="GET" action="{{ route('admin.search') }}" class="form-inline mr-auto">
        <input type="text" name="search" value="" class="form-control col-sm-8"
          placeholder="Search events or blog posts..." aria-label="Search">
        <button class="btn btn-sm" type="submit">Search</button>
      </form>
    </div>
  </div>
</div>