<div id="loading" class="container-fluid position-absolute bg-dark d-flex justify-content-center w-100 loading">
    <div class="spinner-grow text-secondary justify-content-center" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<script>
    window.onload = setTimeout(() => {
        const loading = document.getElementById('loading');
        loading.classList.add('d-none');        
    }, 3000);
</script>