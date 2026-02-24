document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('profile_image');
    const preview = document.getElementById('image_output');

    if (!input || !preview) {
        console.log('要素が取得できていません');
        return;
    }

    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

});

