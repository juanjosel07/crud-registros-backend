    <div class="alert-container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close close-alert" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close close-alert"  data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <script>
            document.addEventListener('DOMContentLoaded', function () {
            const closeButtons = document.querySelectorAll('.close-alert');

            closeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const alertBox = button.closest('.alert');
                    if (alertBox) {
                        alertBox.remove(); 
                    }
                });
            });
        });
    </script>