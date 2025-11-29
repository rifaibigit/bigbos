<style>
    body{background-color: #efefef !important}

    #rounded{
        position: absolute;
        top:35%;
        left:55%;
        transform: translate(-50%, -50%);
        width: 120px;
        height: 120px;
    }

    .loading{
        padding: 5px;
        width: calc(100% - 0px);
        height: calc(100% - 0px);
        border:3px solid #eaeaea;
        border-radius: 50%;
        border-top: 3px solid #09a804;
        border-bottom: 3px solid #e80606;
        animation: rotate 5s linear infinite;
    }

    @keyframes rotate 
    {
        100% {transform: rotate(360deg)}
    }
</style>

<!-- Content Wrapper. Contains page content -->

<section class="content">
    <div class="content-wrapper">

        <div id="rounded">
            <div class="loading">
                <div class="loading">
                    <div class="loading">
                        <div class="loading">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
