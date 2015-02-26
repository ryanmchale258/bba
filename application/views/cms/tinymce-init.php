<script type="text/javascript">
tinymce.init({
    selector: "textarea.richtext",
    menubar : false,
    height: 400,
    toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | fontsizeselect | bullist numlist | code",
    external_plugins: {
        "code": "<?php echo base_url(); ?>js/vendor/code/plugin.min.js"
    }
 });
</script>