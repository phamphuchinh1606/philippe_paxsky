<div id="deleteModal" class="modal fade">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Conform Delete</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want delete : "<span id="confirm-delete-name"></span>" ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form class="inline" action="route_delete" method="post" id="formHolder">
                    @csrf
                    <button class="btn btn-danger" type="submit">OK</button>
                </form>

            </div>
        </div>

    </div>

</div>

<script>
    function dataDeletePopup() {
        $('.anchorClick').each(function () {
            $(this).on('click', function () {
                var $url = $(this).attr('data-url');
                var $name = $(this).attr('data-name');
                $('#formHolder').attr('action', $url);
                $('#confirm-delete-name').html($name);
            });
        });

    }
    $(document).ready(function () {
        dataDeletePopup();
    })
</script>
