<style>
    .loader__wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 99999;
    }

    #loader__effect {
        width: 48px;
        height: 48px;
        display: inline-block;
        position: relative;
    }

    #loader__effect::after,
    #loader__effect::before {
        content: "";
        box-sizing: border-box;
        width: 48px;
        height: 48px;
        border: 3px solid #222;
        position: absolute;
        left: 0;
        top: 0;
        border-radius: 2px;
        animation: rotation 2s ease-in-out infinite alternate;
    }

    #loader__effect::after {
        border-color: var(--green-cl);
        animation-direction: alternate-reverse;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="loader__wrap" class="loader__wrap">
    <span id="loader__effect"></span>
</div>
<script>
    window.addEventListener('load', function () {
        loader = document.querySelector('#loader__wrap');
        loaderE = document.querySelector('#loader__effect');
        setTimeout(function () {
            loader.classList.remove('loader__wrap');
            loaderE.style.display = 'none'
        }, 500);
    })
</script>