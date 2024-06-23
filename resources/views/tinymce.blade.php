@section('script')
    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
    <script>
        //deal with copying the ckeditor text into the actual textarea
        CKEDITOR.on('instanceReady', function () {
            $.each(CKEDITOR.instances, function (instance) {
                CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
                CKEDITOR.instances[instance].document.on("paste", CK_jQ);
                CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
                CKEDITOR.instances[instance].document.on("blur", CK_jQ);
                CKEDITOR.instances[instance].document.on("change", CK_jQ);
            });
        });

        function CK_jQ() {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }

        CKEDITOR.replace('editor1', {height: 450});

    </script>
@endsection