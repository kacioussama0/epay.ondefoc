<style>

    .loader {
        width: 100vw;
        height: 100vh;
        background-color: #6D1A3D;
        position: fixed;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: .7s;
    }

    .logo-loader {
        width: 300px;
    }

</style>

<script>

    document.body.style.overflow = 'hidden';

    window.onload = function () {

        setTimeout(()=> {
            document.body.style.overflow = 'visible';
            document.querySelector('.loader').style.opacity = '0';
            document.querySelector('.loader').style.zIndex = '-1';
        },1450)

    }

</script>

<div class="loader d-flex flex-column gap-5">

    <img src="{{asset('/images/logo.svg')}}" alt="Logo Ondefoc" class="logo-loader" />

    <div class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

</div>
