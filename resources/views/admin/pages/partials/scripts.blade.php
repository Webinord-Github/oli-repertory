<script>
    document.querySelector("#title").addEventListener("blur", e => {
    let slug = document.querySelector("#url")
    if(slug.value) {
        return;
    }
    slug.value = e.currentTarget.value
        .toLowerCase()
        .replace(/[^a-z0-9-]+/g, '-')
        .replace(/^-+|-+$/g, '')
    })

    let slug = document.querySelector("#url")

    slug.addEventListener("blur" , ku => {
        slug.value = ku.currentTarget.value
        .toLowerCase()
        .replace(/[^a-z0-9-]+/g, '-')
        .replace(/^-+|-+$/g, '')
    })

    tinymce.init({
        selector: 'textarea',
        plugins: 'image link',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link',
        menubar: false
    });
</script>

