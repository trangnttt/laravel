<div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #06abea14;color: #007bff;">
                <h5 class="modal-title">Edit Category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="" placeholder="Category Name"
                            required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div>
        </form>
    </div>
</div>


<div class="modal fade show" id="deleteCategoryModal" style="padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #f1c4c4; color: #ad2e2e;">
                <h4 class="modal-title">DETELE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center" style="color: #ad2e2e;">Are you sure to delete category
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <div style="margin:auto">
                    <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                    <a href="#" class="btn btn-primary btn-danger">Yes,
                        delete</a>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
$('.edit-category').on('click', function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var url = "{{ url('category') }}/" + id;
    $('#editCategoryModal form').attr('action', url);
    $('#editCategoryModal form input[name="name"]').val(name);
});
</script>
@endpush